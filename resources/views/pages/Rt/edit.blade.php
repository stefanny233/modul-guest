@extends('layouts.dashboard.app')
@section('content')

<div class="container mt-4">
    <h3 class="fw-bold">Edit RT</h3>

    <form action="{{ route('rt.update', $rt->rt_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Pilih RW</label>
            <select name="rw_id" class="form-control" required>
                <option value="">-- Pilih RW --</option>
                @foreach($rws as $rw)
                    <option value="{{ $rw->rw_id }}" @if($rw->rw_id == $rt->rw_id) selected @endif>{{ $rw->nomor_rw }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Nomor RT</label>
            <input type="text" name="nomor_rt" class="form-control" value="{{ old('nomor_rt', $rt->nomor_rt) }}" required>
        </div>

        <div class="mb-3">
            <label>Ketua RT (Warga)</label>
            <select name="ketua_rt_warga_id" class="form-control">
                <option value="">-- Pilih --</option>
                @foreach($wargas as $w)
                    <option value="{{ $w->id }}" @if($w->id == $rt->ketua_rt_warga_id) selected @endif>{{ $w->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ old('keterangan', $rt->keterangan) }}</textarea>
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('rt.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
