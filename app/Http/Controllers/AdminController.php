<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Gejala;
use App\Models\Pakar;
use App\Models\Penyakit;
use App\Models\Rule;
use App\Models\SkalarCF;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
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
        $admin = Admin::all();
        return view('admin/kelola-pengguna/index', [
            'title' => 'Kelola Pengguna',
            'users' => $user,
            'dokter' => $dokter,
            'admin' => $admin
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
            'role' => 'required',
            'kode' => 'required|min:1|max:20|unique:user,nrp|unique:admin,nip|unique:pakar,nip_dokter',
            'nama' => 'required',
            'jenkel' => 'required',
            // 'umur' => 'required|integer|max:100',
            // 'alamat' => 'required',
            'hp' => 'max:12',
            'email' => 'required|email|unique:user|unique:admin|unique:pakar',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            // 'address' => 'required'
        ], [
            'email.unique' => 'Email sudah terdaftar!',
            'kode.required' => 'The NIP/NRP field is required.',
            'kode.unique' => 'The NIP/NRP has already been taken.'
        ]);
        // dd($request->all());
        //save
        if ($request->role == 1) {
            $result = User::create([
                'nrp' => $request->kode,
                'nama' => $request->nama,
                'jenkel' => $request->address,
                'umur' => $request->umur,
                'alamat' => $request->alamat,
                'no_hp' => $request->hp,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
        } else if ($request->role == 2) {
            // dd("masuk");
            $result = Pakar::create([
                'nip_dokter' => $request->kode,
                'nama_dokter' => $request->nama,
                'alamat' => $request->address,
                'no_hp' => $request->hp,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
        } else if ($request->role == 3) {
            $result = Admin::create([
                'nip' => $request->kode,
                'nama_pegawai' => $request->nama,
                'alamat' => $request->address,
                'no_hp' => $request->hp,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
        } else {
            return redirect()->back()->withErrors(['role' => 'Role tidak ditemukan!']);
        }

        //handling error
        if (!$result) {
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

    public function editPengguna($id)
    {
        $id = decrypt($id);
        $users = User::findOr($id, function () use ($id) {
            return Pakar::findOr($id, function () use ($id) {
                return Admin::findOrFail($id);
            });
        });
        $kode = 0;
        if ($users->getTable() == 'user') {
            $kode = $users->nrp;
            $role = 1;
        } else if ($users->getTable() == 'pakar') {
            $kode = $users->nip_dokter;
            $users->nama = $users->nama_dokter;
            $role = 2;
        } else {
            $kode = $users->nip;
            $users->nama = $users->nama_pegawai;
            $role = 3;
        }


        // dd(isset($users->nip_dokter));
        // dd($users->getTable());
        $title = 'Edit User';
        // dd($users);
        return view('admin/kelola-pengguna/user/edit-user', compact('title', 'users', 'kode', 'role'));
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
        // dd($model);
        //validation
        $this->validate($request, [
            'nama' => 'required',
            // 'jenkel' => 'required',
            // 'umur' => 'required|integer|max:100',
            'alamat' => 'required',
            'hp' => 'required|max:13',
        ]);
        // dd('berhasil validasi 1');
        $user = User::findOr($id, function () use ($id) {
            return Pakar::findOr($id, function () use ($id) {
                return Admin::findOrFail($id);
            });
        });
        if ($request->nrp != $user->nrp && $request->nrp != $user->nip && $request->nrp != $user->nip_dokter) {
            dd($request->nrp, $user->nip_dokter);
            dd('berbeda');
            $this->validate($request, [
                'kode' => 'required|min:1|max:20|unique:user,nrp|unique:admin,nip|unique:pakar,nip_dokter',
            ]);
        }
        if ($request->email != $user->email) {
            // dd('berbeda');
            $this->validate($request, [
                'email' => 'required|email|unique:user|unique:admin|unique:pakar',
            ]);
        }

        $kode = $request->nrp;

        // dd(is_null($user->nrp));
        if ($user->getTable() == 'user') {
            $user->nrp = $request->nrp;
            $user->nama = $request->nama;
            $user->jenkel = $request->jenkel;
            $user->umur = $request->umur;
        } else if ($user->getTable() == 'admin') {
            $user->nip = $request->nrp;
            $user->nama_pegawai = $request->nama;
        } else if ($user->getTable() == 'pakar') {
            $user->nip_dokter = $request->nrp;
            $user->nama_dokter = $request->nama;
        }
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

        return redirect()->route('admin.kelola-pengguna.edit-user', ['id' => encrypt($kode)])->withSuccess('Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = decrypt($id);
        $user = User::findOr($id, function () use ($id) {
            return Pakar::findOr($id, function () use ($id) {
                return Admin::findOrFail($id);
            });
        });

        $user->delete();
        return redirect()->route('admin.kelola-pengguna')->withSuccess('Berhasil Dihapus');
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
