@extends('guest.event')

@section('content')
<div class="container py-5">
    <h4>Tambah Perangkat Desa</h4>

    {{-- Alert sukses atau error --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('perangkat_desa.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Warga</label>
            <select name="warga_id" class="form-control @error('warga_id') is-invalid @enderror" required>
                <option value="">-- Pilih Warga --</option>
                @foreach($warga as $w)
                    <option value="{{ $w->warga_id }}" {{ old('warga_id') == $w->warga_id ? 'selected' : '' }}>
                        {{ $w->nama }}
                    </option>
                @endforeach
            </select>
            @error('warga_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror"
                   value="{{ old('jabatan') }}" required>
            @error('jabatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Kontak</label>
            <input type="text" name="kontak" class="form-control @error('kontak') is-invalid @enderror"
                   value="{{ old('kontak') }}" required>
            @error('kontak') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Periode Mulai</label>
            <input type="date" name="periode_mulai" class="form-control @error('periode_mulai') is-invalid @enderror"
                   value="{{ old('periode_mulai') }}" required>
            @error('periode_mulai') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Periode Selesai</label>
            <input type="date" name="periode_selesai" class="form-control @error('periode_selesai') is-invalid @enderror"
                   value="{{ old('periode_selesai') }}" required>
            @error('periode_selesai') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('perangkat_desa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
