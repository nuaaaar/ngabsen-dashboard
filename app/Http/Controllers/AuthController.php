<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('authentication.login.index');
    }

    public function authenticate(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        if($user == null)
        {
            return redirect()->back()->with('ERR', 'Username tidak terdaftar');
        }else
        {
            if($user->app == 'mobile')
            {
                return redirect()->back()->with('ERR', 'Tidak memiliki hak akses');
            }
            $credentials = $request->only('username', 'password');
            if (!Auth::attempt($credentials))
            {
                return redirect()->back()->with('ERR', 'Password tidak cocok');
            }
            return redirect()->route('dashboard.index');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('OK', 'Berhasil Logout');
    }
}
