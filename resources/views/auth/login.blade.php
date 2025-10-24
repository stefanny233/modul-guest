@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <h3 class="text-center mb-4">Login ke Akun Anda</h3>

    {{-- FORM LOGIN --}}
    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>

    {{-- LINK REGISTER --}}
    <div class="register-link text-center mt-3">
        Belum punya akun? <a href="{{ route('register') }}">Register</a>
    </div>
@endsection
