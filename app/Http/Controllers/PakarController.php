<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PakarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pakar/dashboard', [
            'title' => 'Dashboard',
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
