<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view('admin.login');
    }

    
    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($request->only(['email', 'password']), $request->remember)){
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return redirect()->back()->withInput()->withErrors([
            'email' => 'Email atau password salah'
        ]);


    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

