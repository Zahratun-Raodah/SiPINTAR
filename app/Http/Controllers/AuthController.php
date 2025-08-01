<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');

        //  guard lain di-logout dulu
        Auth::guard('admin')->logout();
        Auth::guard('guru')->logout();
    
        //  login sebagai admin dulu
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
    
        // coba login sebagai guru
        if (Auth::guard('guru')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
    
        
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput($request->only('email'));
    }
    
    


    public function logout(Request $request)
{
    if (Auth::guard('admin')->check()) {
        Auth::guard('admin')->logout();
    }

    if (Auth::guard('guru')->check()) {
        Auth::guard('guru')->logout();
    }

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/page');
}

}