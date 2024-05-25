<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        // $request->session()->flush();
        return view('login');
    }
    public function regist()
    {
        return view('register');
    }
    public function authenticating(Request $request)
    {
        // dd('ini halaman authenticate');
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // cek validasi user
        // cek ke aktifan user
        if (Auth::attempt($credentials)) {
            if (Auth::user()->status != 'active') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                Session::flash('status', 'failed');
                Session::flash('message', 'your account is not active yet. please contact admin!');
                return redirect('/login');
            }
            // dd(Auth::user());
            $request->session()->regenerate();
            if (Auth::user()->RolesID == 1) {
                return redirect('dashboard');
            }

            if (Auth::user()->RolesID == 2) {
                return redirect('beranda');
            }
            return redirect()->intended('dashboard');
        }
        // apakah login valide ?
        Session::flash('status', 'failed');
        Session::flash('message', 'login invalid');
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function registerProsess(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required',
            'email' => 'required|unique:users|max:255',
            'namaLengkap' => 'required|max:255',
            'alamat' => 'required',
        ]);
        $request['password'] = Hash::make($request->password);
        $user = User::create($request->all());

        Session::flash('status', 'success');
        Session::flash('message', 'Register success. wait admin for approval');
        return redirect('register');
    }
}