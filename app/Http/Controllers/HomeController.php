<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard()->check())
            $riwayat = User::find(Auth::guard()->user()->nrp)->riwayatPenyakit->count() ?? null;
        // dd($riwayat);
        return view('user.home.index', [
            'title' => 'Home',
            'total_penyakit' => $riwayat ?? 0,
        ]);
    }

    public function edit($user)
    {
        $user = User::find($user);
        // dd($user);
        return view('user.home.edit-user', [
            'title' => 'Edit Profile',
            'users' => $user,
            'kode' => $user->nrp,
            'role' => 1
        ]);
    }

    public function update(User $user)
    {
        return view('user.home.edit-user', [
            'title' => 'Edit Profile',
            'user' => $user,
            'kode' => $user->nrp,
            'role' => 1
        ]);
    }
}
