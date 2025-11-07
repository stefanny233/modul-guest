@extends('layouts.dashboard.app')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Data Warga</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#!">Home</a></li>
                    <li class="breadcrumb-item"><a href="#!">Data User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Penduduk</li>
                    <li class="breadcrumb-item"><a href="#!">Perangkat Desa</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Features Start -->
    <div class="container mt-4">
        <h3 class="fw-bold text-success">Tambah Data Warga</h3>
        <form action="{{ route('warga.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>No KTP</label>
                <input type="text" name="no_ktp" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Agama</label>
                <input type="text" name="agama" class="form-control">
            </div>
            <div class="mb-3">
                <label>Pekerjaan</label>
                <input type="text" name="pekerjaan" class="form-control">
            </div>
            <div class="mb-3">
                <label>Telp</label>
                <input type="text" name="telp" class="form-control">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('warga.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
    <!-- Features End -->
@endsection
