<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
// use Symfony\Component\HttpFoundation\Session\Session;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
        // $this->middleware('guest:admin')->except('logout');
        // $this->middleware('guest:writer')->except('logout');
    }

    public function index()
    {
        // if (Auth::user()) {
        //     return redirect()->route('home');
        // }
        $this->middleware('guest:admin')->except('logout');
        return view('auth/index', [
            'title' => 'login'
        ]);
    }

    public function login(Request $request)
    {
        // dd($request->all());
        //login
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if ($request->role == 1) {
            if (Auth::guard('admin')->attempt($credentials)) {
                // dd('berhasil');
                $request->session()->regenerate();
                // dd('berhasil');
                return redirect()->route('admin.dashboard');
            }
        } else if ($request->role == 2 && Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // dd("berhasil");
            return redirect()->intended('/')->withSuccess('Signed in');
        } else if ($request->role == 3) {
            // dd('berhasil');
            if (Auth::guard('pakar')->attempt($credentials)) {
                // dd('berhasil');
                $request->session()->regenerate();
                // dd('berhasil');
                return redirect()->route('pakar.dashboard');
            }
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // public function dashboard()
    // {
    //     if (Auth::check()) {
    //         return  view('home/index', [
    //             'title' => 'Home'
    //         ]);
    //     }

    //     return redirect("login")->withSuccess('are not allowed to access');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth/register', [
            'title' => 'register'
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

        return redirect()->route('auth.login');

        // $user = new User();
        // $user->email = $request->email;
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
    public function destroy(Request $request)
    {
        // dd('logout');
        //delete session
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } else if (Auth::guard('pakar')->check()) {
            Auth::guard('pakar')->logout();
        } else {
            Auth::logout();
        }
        // $request()->session()->invalidate();
        // $request()->session()->regenerateToken();

        return redirect()->route('home')->withSuccess('Berhasil Logout');
    }
}
