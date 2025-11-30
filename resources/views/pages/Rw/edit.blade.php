@extends('layouts.dashboard.app')
@section('content')
    <div class="container mt-4">
        <h3>Edit RW</h3>
        <form action="{{ route('rw.update', $rw) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3"><label>Nomor RW</label><input name="nomor_rw" class="form-control"
                    value="{{ old('nomor_rw', $rw->nomor_rw) }}"></div>
            <div class="mb-3"><label>Keterangan</label>
                <textarea name="keterangan" class="form-control">{{ old('keterangan', $rw->keterangan) }}</textarea>
            </div>
            <button class="btn btn-success">Update</button>
            <a href="{{ route('rw.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
