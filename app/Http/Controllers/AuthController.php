<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ===== TAMPILKAN HALAMAN LOGIN =====
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // ===== PROSES LOGIN =====
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); 
            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        }

        return back()->with('error', 'Email atau password salah!');
    }

    // ===== TAMPILKAN HALAMAN REGISTER =====
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // ===== PROSES REGISTER =====
    public function register(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'birth_date' => 'required|date',
            'email'      => 'required|email|unique:users',
            'password'   => 'required|min:6|confirmed',
        ]);

        User::create([
            'name'       => $request->name,
            'birth_date' => $request->birth_date,
            'email'      => $request->email,
            'password'   => bcrypt($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // ===== LOGOUT =====
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
