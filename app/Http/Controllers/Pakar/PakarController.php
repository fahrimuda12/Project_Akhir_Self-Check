<?php

namespace App\Http\Controllers\Pakar;

use App\Http\Controllers\BaseController;
use App\Models\Gejala;
use App\Models\Pakar;
use App\Models\Penyakit;
use App\Models\Pertanyaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PakarController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penyakit = Penyakit::all();
        $pakar = Pakar::all()->count();
        $user = User::all()->count();
        $penyakitJson = $penyakit->map(function ($data) {
            return [
                'nama_penyakit' => $data->nama_penyakit,
                'total_terjangkit' => $data->total_terjangkit ?? 0,
            ];
        });

        return view('pakar/dashboard', [
            'title' => 'Dashboard',
            'user' => $user,
            'pakar' => $pakar,
            'penyakit' => $penyakit,
            'penyakitJson' =>  $penyakitJson,
        ]);
    }

    public function indexPenyakit()
    {
        return view('pakar/penyakit/index', [
            'title' => 'Penyakit',
        ]);
    }

    public function indexGejala()
    {
        return view('pakar/gejala/index', [
            'title' => 'Penyakit',
        ]);
    }

    public function indexSkalar()
    {
        $penyakit = Penyakit::all();
        return view('pakar/skalar/index', [
            'title' => 'Skalar CF',
            'penyakit' => $penyakit
        ]);
    }

    public function sortingIndex($kode)
    {
        $penyakit = Penyakit::with('gejala')->where('kode_penyakit', $kode)->first();
        // dd($penyakit->gejala);
        //get data with skalar_cf > 0
        // $penyakit1 = $penyakit->gejala()->where('nilai_cf', '=', 0)->get();
        // $penyakit2 = $penyakit->gejala()->where('nilai_cf', '=', 0.5)->get();
        // $penyakit3 =  $penyakit->gejala()->where('nilai_cf', '=', 0.8)->get();
        //get data penyakit with kode penyakit and nilai cf = 0.8

        // $penyakit4 = $penyakit->rule()->where('nilai_cf', '=', 1)->get();
        // dd($penyakit3[0]->pivot->nilai_cf);
        return view('pakar/skalar/sorting', [
            'title' => 'Sorting',
            'penyakit' => $penyakit,
            // 'penyakit1' => $penyakit1,
            // 'penyakit2' => $penyakit2,
            // 'penyakit3' => $penyakit3,
            // 'penyakit4' => $penyakit4,
        ]);
    }

    public function updateSkalar($penyakit)
    {
        $penyakit = Penyakit::where('kode_penyakit', $penyakit)->first();
        $penyakit->gejala()->update(['nilai_cf' => 0]);
        $penyakit->gejala3()->update(['nilai_cf' => 0]);
        $penyakit->rule()->update(['nilai_cf' => 0]);
        return redirect()->route('pakar.skalar')->withSuccess('Data berhasil diupdate');
    }

    //make api for update skalar
    public function updateSkalarApi($penyakit)
    {
        $penyakit = Penyakit::where('kode_penyakit', $penyakit)->first();
        $penyakit->gejala()->update(['nilai_cf' => 0]);
        $penyakit->gejala3()->update(['nilai_cf' => 0]);
        $penyakit->rule()->update(['nilai_cf' => 0]);
        return response()->json([
            'message' => 'Data berhasil diupdate'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function createPenyakit()
    {
        $gejala = Gejala::all();
        return view('pakar/penyakit/create', [
            'title' => 'Tambah Penyakit',
            'gejala' => $gejala
        ]);
    }

    public function createGejala()
    {
        return view('pakar/gejala/create', [
            'title' => 'Tambah Penyakit'
        ]);
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

    public function storeGejala(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'kode_gejala' => 'required|max:5|unique:gejala,kode_gejala',
            'nama' => 'required',
            'pertanyaan' => 'required',
        ]);

        $gejala = Gejala::create([
            'kode_gejala' => $request->kode_gejala,
            'nip_dokter' => Auth::guard('pakar')->user()->nip_dokter,
            'gejala' => $request->nama
        ]);

        $pertanyaan = Pertanyaan::create([
            'pertanyaan' => $request->pertanyaan,
            'nip_dokter' => Auth::guard('pakar')->user()->nip_dokter,
        ]);

        if (!$gejala || !$pertanyaan) {
            return redirect()->back()->withInput($request->all());
        }

        return redirect()->route('pakar.gejala')->withSuccess('Data berhasil ditambahkan');
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
        //
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
