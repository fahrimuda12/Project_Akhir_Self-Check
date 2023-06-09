<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.home.index', [
            'title' => 'Home'
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
