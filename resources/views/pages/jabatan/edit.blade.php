@extends('layouts.dashboard.app')
@section('content')

    {{-- PAGE HEADER --}}
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Jabatan Lembaga</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('warga.index') }}">Data Penduduk</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('perangkat_desa.index') }}">Perangkat Desa</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('lembaga.index') }}">Lembaga Desa</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('anggota-lembaga.index') }}">Anggota Lembaga</a></li>
                    <li class="breadcrumb-item active">Jabatan Lembaga</li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- CONTENT --}}
    <div class="container py-5">

        {{-- JUDUL --}}
        <h3 class="fw-bold mb-4 text-dark">Edit Jabatan</h3>

        {{-- ERROR --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- CARD --}}
        <div class="card shadow-sm">
            <div class="card-body p-4">

                <form action="{{ route('jabatan.update', $jabatan->jabatan_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nama Jabatan</label>
                        <input type="text" name="nama_jabatan" class="form-control"
                            value="{{ old('nama_jabatan', $jabatan->nama_jabatan) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Level</label>
                        <input type="text" name="level" class="form-control"
                            value="{{ old('level', $jabatan->level) }}">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" rows="4" class="form-control">{{ old('keterangan', $jabatan->keterangan) }}</textarea>
                    </div>

                    {{-- BUTTON --}}
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('anggota-lembaga.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection
