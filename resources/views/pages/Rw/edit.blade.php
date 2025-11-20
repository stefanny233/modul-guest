@extends('layouts.dashboard.app')
@section('content')

<div class="container mt-4">
    <h3 class="fw-bold">Edit RW</h3>

    <form action="{{ route('rw.update', $rw->rw_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nomor RW</label>
            <input type="text" name="nomor_rw" class="form-control" value="{{ old('nomor_rw', $rw->nomor_rw) }}" required>
        </div>

        <div class="mb-3">
            <label>Ketua RW (Warga)</label>
            <select name="ketua_rw_warga_id" class="form-control">
                <option value="">-- Pilih --</option>
                @foreach($wargas as $w)
                    <option value="{{ $w->id }}" @if($w->id == $rw->ketua_rw_warga_id) selected @endif>{{ $w->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ old('keterangan', $rw->keterangan) }}</textarea>
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('rw.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
