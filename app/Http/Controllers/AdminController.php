<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Pakar;
use App\Models\Penyakit;
use App\Models\Rule;
use App\Models\SkalarCF;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/dashboard', [
            'title' => 'Dashboard',
        ]);
    }

    public function indexKelola()
    {
        $disease = Penyakit::with('gejala')->get();
        $penyakit = Penyakit::all();
        // dd($disease);
        $query = Penyakit::select('*')
            ->join('rule', 'rule.kode_penyakit', '=', 'penyakit.kode_penyakit')
            ->join('gejala', 'gejala.kode_gejala', '=', 'rule.kode_gejala')->get();
        $gejala = Gejala::all();
        $rule = Rule::paginate(10);
        $skalar = SkalarCF::all();

        // dd($disease[0]['gejala'][0]['gejala']);
        return view('admin/index-data', [
            'title' => 'Kelola Data',
            'diseases' => $disease,
            'gejala' => $gejala,
            'rules' => $rule,
            'skalar' => $skalar
        ]);
    }

    public function indexPengguna()
    {
        $user = User::all();
        $dokter = Pakar::all();
        return view('admin/kelola-pengguna/index', [
            'title' => 'Kelola Pengguna',
            'users' => $user,
            'dokter' => $dokter
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


    public function createPengguna()
    {
        return view('admin/kelola-pengguna/create-user', [
            'title' => 'Tambah User'
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

    public function storePengguna(Request $request)
    {
        $this->validate($request, [
            'nrp' => 'required|min:3|max:15|unique:user',
            'nama' => 'required',
            'jenkel' => 'required',
            'umur' => 'required|integer|max:100',
            'alamat' => 'required',
            'hp' => 'required|max:12',
            'email' => 'required|email|unique:user',
            'password' => 'required|min:6',
            // 'password_confirmation' => 'required|same:password',
        ]);
        // dd($request->all());
        //save
        $user = User::create([
            'nrp' => $request->nrp,
            'nama' => $request->nama,
            'jenkel' => $request->jenkel,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
            'no_hp' => $request->hp,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        //handling error
        if (!$user) {
            return redirect()->back()->withInput($request->all());
        }

        return redirect()->route('admin.pengguna');
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

    public function editPengguna($id)
    {
        $users = User::find($id);
        $title = 'Edit User';
        // dd($users);
        return view('admin/kelola-pengguna/edit-user', compact('title', 'users'));
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

    public function updatePengguna(Request $request, $id)
    {
        // dd($request->all());
        //validation
        $this->validate($request, [
            'nama' => 'required',
            'jenkel' => 'required',
            'umur' => 'required|integer|max:100',
            'alamat' => 'required',
            'hp' => 'required|max:12',
        ]);
        // dd('berhasil validasi 1');
        $user = User::find($id);
        if ($request->nrp != $user->nrp) {
            // dd('berbeda');
            $this->validate($request, [
                'nrp' => 'required|min:3|max:15|unique:user',
            ]);
        }
        if ($request->email != $user->email) {
            // dd('berbeda');
            $this->validate($request, [
                'email' => 'required|email|unique:user',
            ]);
        }



        // dd('berhasil');
        $user->nrp = $request->nrp;
        $user->nama = $request->nama;
        $user->jenkel = $request->jenkel;
        $user->umur = $request->umur;
        $user->alamat = $request->alamat;
        $user->email = $request->email;
        if ($request->password !== null) {
            $user->password = bcrypt($request->password);
            $this->validate($request, [
                'password' => 'required|min:6',
                'repeat_password' => 'required|same:password',
            ]);
        }

        $user->save();

        if (!$user) {
            return redirect()->back()->withInput($request->all());
        }

        return redirect()->route('admin.kelola-pengguna.update-user', ['id' => $user->nrp])->withSuccess('Berhasil Diupdate');
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


    // api
    public function apiRule()
    {
        $query = Penyakit::select('*')
            ->join('rule', 'rule.kode_penyakit', '=', 'penyakit.kode_penyakit')
            ->join('gejala', 'gejala.kode_gejala', '=', 'rule.kode_gejala')->get();
        // dd(response()->json($query));
        return response()->json($query);
    }
}
