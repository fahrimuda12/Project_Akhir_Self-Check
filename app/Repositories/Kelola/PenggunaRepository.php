<?php

namespace App\Repositories\Kelola;

use App\Models\Admin;
use App\Models\Gejala;
use App\Models\Pakar;
use App\Models\Pertanyaan;
use App\Models\SkalarCF;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenggunaRepository
{

    public function getPengguna($id)
    {
        return User::findOr($id, function () use ($id) {
            return Pakar::findOr($id, function () use ($id) {
                return Admin::findOrFail($id);
            });
        });
    }

    public function storePengguna($request)
    {
        try {
            if ($request->role == 1) {
                User::create([
                    'nrp' => $request->kode,
                    'nama' => $request->nama,
                    'jenkel' => $request->jenkel,
                    'umur' => $request->umur,
                    'alamat' => $request->address ?? '',
                    'no_hp' => $request->hp ?? 0,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                ]);
            } else if ($request->role == 2) {
                Pakar::create([
                    'nip_dokter' => $request->kode,
                    'nama_dokter' => $request->nama,
                    'alamat' => $request->address ?? '',
                    'no_hp' => $request->hp ?? 0,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                ]);
            } else if ($request->role == 3) {
                Admin::create([
                    'nip' => $request->kode,
                    'nama_pegawai' => $request->nama,
                    'alamat' => $request->address ?? '',
                    'no_hp' => $request->hp ?? 0,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                ]);
            } else {
                return redirect()->back()->withErrors(['role' => 'Role tidak ditemukan!']);
            }
            return true;
        } catch (\Exception $e) {
            dd($e->getMessage());
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }
}
