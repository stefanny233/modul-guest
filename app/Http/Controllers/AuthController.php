<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user){
            return back()->withErrors(['email' => 'Email tidak terdaftar!'])->withInput();
        }

        if(!Hash::check($request->password, $user->password)){
            return back()->withErrors(['password' => 'Password salah!'])->withInput();
        }

        Auth::login($user);
        return redirect()->route('guest.dashboard')->with('success', 'Login berhasil!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('guest.login');
    }
}
