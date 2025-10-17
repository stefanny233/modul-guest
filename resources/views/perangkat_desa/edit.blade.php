@extends('guest.event')

@section('content')
<div class="container py-5">
    <h4>Edit Perangkat Desa</h4>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('perangkat_desa.update', $data->perangkat_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Warga</label>
            <select name="warga_id" class="form-control @error('warga_id') is-invalid @enderror" required>
                <option value="">-- Pilih Warga --</option>
                @foreach($warga as $w)
                    <option value="{{ $w->warga_id }}"
                        {{ old('warga_id', $data->warga_id) == $w->warga_id ? 'selected' : '' }}>
                        {{ $w->nama }}
                    </option>
                @endforeach
            </select>
            @error('warga_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror"
                   value="{{ old('jabatan', $data->jabatan) }}" required>
            @error('jabatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Kontak</label>
            <input type="text" name="kontak" class="form-control @error('kontak') is-invalid @enderror"
                   value="{{ old('kontak', $data->kontak) }}" required>
            @error('kontak') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Periode Mulai</label>
            <input type="date" name="periode_mulai" class="form-control @error('periode_mulai') is-invalid @enderror"
                   value="{{ old('periode_mulai', $data->periode_mulai) }}" required>
            @error('periode_mulai') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Periode Selesai</label>
            <input type="date" name="periode_selesai" class="form-control @error('periode_selesai') is-invalid @enderror"
                   value="{{ old('periode_selesai', $data->periode_selesai) }}" required>
            @error('periode_selesai') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('perangkat_desa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
