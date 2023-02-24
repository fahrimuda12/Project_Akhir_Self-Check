<?php

namespace App\Http\Controllers;

use App\Models\Pakar;
use Illuminate\Http\Request;

class DokterController extends Controller
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
        return view('admin/kelola-pengguna/dokter/create', [
            'title' => 'Tambah Dokter'
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
        $this->validate($request, [
            'nip_dokter' => 'required|min:3|max:18|unique:pakar',
            'nama' => 'required',
            'alamat' => 'required',
            'hp' => 'required|max:12',
            'email' => 'required|email|unique:pakar',
            'password' => 'required|min:6',
            'repeat_password' => 'required|same:password',
        ]);
        // dd($request->all());
        //save
        $pakar = Pakar::create([
            'nip_dokter' => $request->nip_dokter,
            'nama_dokter' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->hp,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        //handling error
        if (!$pakar) {
            return redirect()->back()->withInput($request->all());
        }

        return redirect()->route('admin.kelola-pengguna');
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
