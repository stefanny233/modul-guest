<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard.index');
        }
        return view('layouts.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {

            Auth::login($user);

            session(['last_login' => now()]);

            return redirect()->route('dashboard.index');
        }

        return back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
    }

    public function store(Request $request)
    {
        return $this->login($request);
    }
    public function logout(Request $request)
    {
        Auth::logout();                         // keluarkan user dari auth
        $request->session()->invalidate();      // hapus semua session
        $request->session()->regenerateToken(); // regenerasi CSRF token

        return redirect()->route('login.form'); // arahkan ke halaman login
    }
}
