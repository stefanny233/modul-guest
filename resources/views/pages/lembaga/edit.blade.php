@extends('layouts.dashboard.app')
@section('content')

<div class="container">

    <h3 class="mb-4">Edit Lembaga Desa</h3>

    <form action="{{ route('lembaga.update', $lembaga->lembaga_id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Logo Lama</label> <br>

            @if ($lembaga->logo)
                <img src="{{ asset('storage/' . $lembaga->logo) }}"
                     width="80" height="80"
                     style="object-fit: cover; border-radius: 8px;">
            @else
                <span class="text-muted">Tidak ada</span>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Ganti Logo (opsional)</label>
            <input type="file" name="logo" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Lembaga</label>
            <input type="text" name="nama_lembaga" class="form-control"
                   value="{{ $lembaga->nama_lembaga }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4" required>{{ $lembaga->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Kontak</label>
            <input type="text" name="kontak" class="form-control"
                   value="{{ $lembaga->kontak }}">
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('lembaga.index') }}" class="btn btn-secondary">Kembali</a>

    </form>

</div>

@endsection
