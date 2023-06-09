<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Admin;
use App\Models\Gejala;
use App\Models\Pakar;
use App\Models\Penyakit;
use App\Models\Rule;
use App\Models\SkalarCF;
use App\Models\User;
use App\Repositories\Kelola\PenggunaRepository;
use Illuminate\Http\Request;

class AdminController extends BaseController
{

    private $penggunaRepository;
    public function __construct()
    {
        $this->penggunaRepository = new PenggunaRepository();
    }

    public function dashboard()
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

        // dd($penyakit->pluck('total_terjangkit'));
        return view('admin/dashboard', [
            'title' => 'Dashboard',
            'user' => $user,
            'pakar' => $pakar,
            'penyakit' => $penyakit,
            'penyakitJson' =>  $penyakitJson,
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

    public function createPengguna()
    {
        return view('admin.kelola-pengguna.create-user', [
            'title' => 'Tambah User'
        ]);
    }

    public function storePengguna(Request $request)
    {
        $this->validate($request, [
            'role' => 'required',
            'kode' => 'required|min:1|max:20|unique:user,nrp|unique:admin,nip|unique:pakar,nip_dokter',
            'nama' => 'required',
            'jenkel' => 'required_if:role,1',
            'umur' => 'required_if:role,1|max:100',
            // 'alamat' => 'required',
            'hp' => 'max:12',
            'email' => 'required|email|unique:user|unique:admin|unique:pakar',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'address' => 'required_if:role,1'
        ], [
            'email.unique' => 'Email sudah terdaftar!',
            'kode.required' => 'The NIP/NRP field is required.',
            'kode.unique' => 'The NIP/NRP has already been taken.'
        ]);


        $result = $this->penggunaRepository->storePengguna($request);
        //handling error
        if ($result) {
            return redirect()->route('admin.kelola-pengguna.index')->withSuccess('Berhasil menambahkan data pengguna!');
        }
        return redirect()->back()->withErrors('Gagal menambahkan data pengguna!');
    }

    public function editPengguna($id)
    {
        $id = decrypt($id);
        $users = $this->penggunaRepository->getPengguna($id);
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
        return view('admin.kelola-pengguna.edit-user', compact('title', 'users', 'kode', 'role'));
    }

    public function updatePengguna(Request $request, $id)
    {
        $this->validate($request, [
            'role' => 'required',
            'nama' => 'required',
            'jenkel' => 'required_if:role,1',
            'umur' => 'required_if:role,1|max:100',
            'hp' => 'max:12',
            'alamat' => 'required_if:role,1'
        ]);

        $user = $this->penggunaRepository->getPengguna($id);

        if ($request->nrp != $user->nrp && $request->nrp != $user->nip && $request->nrp != $user->nip_dokter) {
            // dd($request->nrp, $user->nip_dokter);
            dd('berbeda');
            $this->validate(
                $request,
                [
                    'kode' => 'required|min:1|max:20|unique:user,nrp|unique:admin,nip|unique:pakar,nip_dokter',
                ],
                [
                    'kode.required' => 'The NIP/NRP field is required.',
                    'kode.unique' => 'The NIP/NRP has already been taken.'
                ]
            );
            // dd("berhasil validai nrp");
        }
        if ($request->email != $user->email) {
            dd('berbeda');
            $this->validate(
                $request,
                [
                    'email' => 'required|email|unique:user|unique:admin|unique:pakar',
                ],
                [
                    'email.unique' => 'Email sudah terdaftar!',
                ]
            );
        }

        if ($request->password > 0) {
            $this->validate(
                $request,
                [
                    'password_confirmation' => 'required|same:password',
                ],
                [
                    'password_confirmation.required' => 'Password Konfirmasi dibutuhkan',
                    'password_confirmation.same' => 'Password konfirmasi tidak sama'
                ]
            );

            $user->password = bcrypt($request->password);
        }

        $kode = $request->nrp;
        $role = $request->role;
        $userRole = $this->ubahKodeRole($user->getTable());
        // dd($userRole, $role);
        if ($role != $userRole) {
            $this->validate(
                $request,
                [
                    'password' => 'required',
                    'password_confirmation' => 'required|same:password',
                ],
                [
                    'password_confirmation.required' => 'Password Konfirmasi dibutuhkan',
                    'password_confirmation.same' => 'Password konfirmasi tidak sama'
                ]
            );

            if ($role == 1) {
                User::create([
                    'nrp' => $kode,
                    'nama' => $request->nama,
                    'jenkel' => $request->jenkel,
                    'umur' => $request->umur,
                    'alamat' => $request->address ?? '',
                    'no_hp' => $request->hp ?? 0,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                ]);
            } else if ($role == 2) {
                Pakar::create([
                    'nip_dokter' => $kode,
                    'nama_dokter' => $request->nama,
                    'alamat' => $request->address ?? '',
                    'no_hp' => $request->hp ?? '',
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                ]);
            } else if ($role == 3) {
                Admin::create([
                    'nip' => $kode,
                    'nama_pegawai' => $request->nama,
                    'alamat' => $request->alamat ?? '',
                    'no_hp' => $request->hp ?? '',
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                ]);
            } else {
                return redirect()->back()->withErrors(['role' => 'Role tidak ditemukan!']);
            }
            $user->delete();
        } else {
            if ($user->getTable() == 'user') {
                $user->nrp = $request->nrp;
                $user->nama = $request->nama;
                $user->jenkel = $request->jenkel;
                $user->umur = $request->umur ?? '';
                $user->alamat = $request->alamat ?? '';
                $user->no_hp = $request->hp ?? '';
            } else if ($user->getTable() == 'admin') {
                $user->nip = $request->nrp;
                $user->nama_pegawai = $request->nama;
            } else if ($user->getTable() == 'pakar') {
                $user->nip_dokter = $request->nrp;
                $user->nama_dokter = $request->nama;
            }
            $user->alamat = $request->alamat;
            $user->email = $request->email;
            $user->save();

            if (!$user) {
                return redirect()->back()->withInput($request->all());
            }
        }
        return redirect()->route('admin.kelola-pengguna.index')->withSuccess('Berhasil Diupdate');
    }

    private function ubahKodeRole($string)
    {
        if ($string == "user")
            return 1;
        else if ($string == "pakar")
            return 2;
        else if ($string == "admin")
            return 3;
        else
            dd("role tidak ditemukan");
    }

    public function destroy($id)
    {
        $id = decrypt($id);
        $user = $this->penggunaRepository->getPengguna($id);

        $user->delete();
        return redirect()->route('admin.kelola-pengguna.index')->withSuccess('Berhasil Dihapus');
    }


    // api
    // public function apiRule()
    // {
    //     $query = Penyakit::select('*')
    //         ->join('rule', 'rule.kode_penyakit', '=', 'penyakit.kode_penyakit')
    //         ->join('gejala', 'gejala.kode_gejala', '=', 'rule.kode_gejala')->get();
    //     // dd(response()->json($query));
    //     return response()->json($query);
    // }
}
