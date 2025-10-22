@extends('layouts.guest')

@section('content')

    <div class="card shadow-sm">
        <div class="card-header">
            <h5 class="mb-0">Edit Data Perangkat Desa</h5>
        </div>

        <div class="card-body">
            {{-- Form ini akan mengirim data ke PerangkatDesaController@update --}}
            {{-- Kita kirim juga data $perangkat->id untuk tahu data mana yg di-update --}}
            <form action="{{ route('perangkat_desa.update', $perangkat->id) }}" method="POST">
                @csrf
                @method('PUT') {{-- Method PUT/PATCH wajib untuk update --}}

                <div class="mb-3">
                    <label for="warga_id" class="form-label">Pilih Warga</label>
                    <select name="warga_id" id="warga_id" class="form-select @error('warga_id') is-invalid @enderror">
                        <option value="">-- Pilih Nama Warga --</option>

                        {{-- Loop data $warga dari PerangkatDesaController@edit --}}
                        @foreach ($warga as $w)
                            {{-- Cek data lama ($perangkat->warga_id) untuk 'selected' --}}
                            <option value="{{ $w->id }}"
                                {{ old('warga_id', $perangkat->warga_id) == $w->id ? 'selected' : '' }}>
                                {{ $w->nama }} (NIK: {{ $w->nik }})
                            </option>
                        @endforeach
                    </select>

                    @error('warga_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    {{-- Tampilkan data lama ($perangkat->jabatan) di 'value' --}}
                    <input type="text" name="jabatan" id="jabatan"
                           class="form-control @error('jabatan') is-invalid @enderror"
                           value="{{ old('jabatan', $perangkat->jabatan) }}">
                    @error('jabatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kontak" class="form-label">Kontak (No. HP)</label>
                    {{-- Tampilkan data lama ($perangkat->kontak) di 'value' --}}
                    <input type="text" name="kontak" id="kontak"
                           class="form-control @error('kontak') is-invalid @enderror"
                           value="{{ old('kontak', $perangkat->kontak) }}">
                    @error('kontak')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="periode_mulai" class="form-label">Periode Mulai</label>
                            {{-- Tampilkan data lama ($perangkat->periode_mulai) di 'value' --}}
                            <input type="date" name="periode_mulai" id="periode_mulai"
                                   class="form-control @error('periode_mulai') is-invalid @enderror"
                                   value="{{ old('periode_mulai', $perangkat->periode_mulai) }}">
                            @error('periode_mulai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="periode_selesai" class="form-label">Periode Selesai</label>
                            {{-- Tampilkan data lama ($perangkat->periode_selesai) di 'value' --}}
                            <input type="date" name="periode_selesai" id="periode_selesai"
                                   class="form-control @error('periode_selesai') is-invalid @enderror"
                                   value="{{ old('periode_selesai', $perangkat->periode_selesai) }}">
                            @error('periode_selesai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @endSelesaior
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Update Data</button>
                    <a href="{{ route('perangkat_desa.index') }}" class="btn btn-secondary">Batal</a>
                </div>

            </form>
        </div>
    </div>

@endsection

