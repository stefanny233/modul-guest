@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <h3 class="text-center mb-4">Login ke Akun Anda</h3>
    <form>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Masukkan email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Masukkan password">
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
    <div class="register-link text-center">
        Belum punya akun? <a href="#">Regist di sini!</a>
    </div>
@endsection
