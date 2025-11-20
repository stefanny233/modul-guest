@extends('layouts.dashboard.app')
@section('content')

<div class="container mt-4">
    <h3 class="fw-bold">Tambah RW</h3>

    <form action="{{ route('rw.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nomor RW</label>
            <input type="text" name="nomor_rw" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Ketua RW (Warga)</label>
            <select name="ketua_rw_warga_id" class="form-control">
                <option value="">-- Pilih --</option>
                @foreach($wargas as $w)
                    <option value="{{ $w->id }}">{{ $w->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('rw.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
