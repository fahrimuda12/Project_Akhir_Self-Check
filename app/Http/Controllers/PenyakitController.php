<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Pertanyaan;
use App\Models\Rule;
use App\Models\SkalarCF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gejala = Gejala::all();
        $nilai = SkalarCF::all();
        return view('admin/kelola-data/penyakit/create', [
            'title' => 'Tambah Penyakit',
            'gejala' => $gejala,
            'nilai' => $nilai
        ]);
    }

    public function storePenyakit(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'gejala' => 'required',
        ]);
        $kode = Penyakit::latest('kode_penyakit')->pluck('kode_penyakit')->first();
        // dd($request->all());
        // dd(Auth::guard('admin')->user()->nip);
        $penyakit = Penyakit::create([
            'kode_penyakit' => ++$kode,
            // 'nip_dokter' => Auth::guard('admin')->user()->nip,
            'nip_dokter' => '197107081999032001',
            'nama_penyakit' => $request->nama,
        ]);
        for ($i = 0; $i < count($request->gejala['kode']); $i++) {
            // dd((int)substr($request->gejala[2], 0, 1));
            if (substr($request->gejala['kode'][$i], 0, 1) === 'G' && (int)substr($request->gejala['kode'][$i], 1) > 0) {
                // echo $request->gejala[$i] . "<br />";
                $penyakit->gejala()->attach($request->gejala['kode'][$i]);
                Rule::where('kode_penyakit', $kode)->where('kode_gejala', $request->gejala['kode'][$i])->update([
                    'nilai_cf' => $request->gejala['nilai'][$i],
                ]);
            } else {
                $kode_gejala = Gejala::latest('kode_gejala')->pluck('kode_gejala')->first();
                $gejala = Gejala::create([
                    'kode_gejala' => ++$kode_gejala,
                    'nip_dokter' => '197107081999032001',
                    'gejala' => $request->gejala['kode'][$i],
                ]);
                $gejala->pertanyaan()->attach($kode_gejala);
                $penyakit->gejala()->attach($kode_gejala);
                Rule::where('kode_penyakit', $kode)->where('kode_gejala', $kode_gejala)->update([
                    'nilai_cf' => $request->gejala['nilai'][$i],
                ]);
            }
        }
        // die();
        if (!$penyakit) {
            return redirect()->back()->withInput($request->all());
        }

        return redirect()->route('admin.kelola-data.tambah-penyakit')->withSuccess('Data berhasil ditambahkan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin/kelola-data/penyakit/create', [
            'title' => 'Edit Penyakit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
