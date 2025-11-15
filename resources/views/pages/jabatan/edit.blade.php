@extends('layouts.dashboard.app')
@section('content')
    <div class="container py-5">
        <h3 class="mb-4">Edit Jabatan</h3>

        {{-- tampilkan error validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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
                <input type="text" name="level" class="form-control" value="{{ old('level', $jabatan->level) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="4">{{ old('keterangan', $jabatan->keterangan) }}</textarea>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('jabatan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
