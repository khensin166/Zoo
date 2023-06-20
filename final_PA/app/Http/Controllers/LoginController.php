<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            return redirect()->intended($this->redirectTo());
        }
    
        return redirect()->back()->withErrors(['email' => 'Email atau password salah'])->withInput();
    }
    
    protected function redirectTo()
    {
        $role = Auth::user()->role;
    
        if ($role === 'admin') {
            return '/homeAdmin';
        } elseif ($role === 'wisatawan') {
            return '/';
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}