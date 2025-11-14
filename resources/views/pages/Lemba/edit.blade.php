@extends('layouts.dashboard.app')
@section('content')

<div class="container">
    <h3>Edit Data Lembaga Desa</h3>

    <form action="{{ route('lembaga.update', $lembaga->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Lembaga</label>
            <input type="text" name="nama_lembaga" class="form-control"
                value="{{ $lembaga->nama_lembaga }}" required>
        </div>

        <div class="mb-3">
            <label>Ketua</label>
            <input type="text" name="ketua" class="form-control"
                value="{{ $lembaga->ketua }}">
        </div>

        <div class="mb-3">
            <label>Kontak</label>
            <input type="text" name="kontak" class="form-control"
                value="{{ $lembaga->kontak }}">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $lembaga->deskripsi }}</textarea>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('lembaga.index') }}" class="btn btn-secondary">Batal</a>

    </form>
</div>
@endsection
