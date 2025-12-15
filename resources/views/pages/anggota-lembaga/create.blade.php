@extends('layouts.dashboard.app')

@section('content')
    <!-- Page Header -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s" style="background-position:center;">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Tambah Anggota Lembaga</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('warga.index') }}">Data Penduduk</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('perangkat_desa.index') }}">Perangkat Desa</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('lembaga.index') }}">Lembaga Desa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Anggota Lembaga</li>
                    <li class="breadcrumb-item"><a href="{{ route('jabatan.index') }}">Jabatan Lembaga</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Main content -->
    <div class="container py-5">
        <h1 class="mb-4">Tambah Anggota Lembaga</h1>

                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <form action="{{ route('anggota-lembaga.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Pilih Lembaga</label>
                                    <select name="lembaga_id" class="form-select dropdown-scroll" required>
                                        <option value="">-- Pilih Lembaga --</option>
                                        @foreach ($lembagaList as $lembaga)
                                            <option value="{{ $lembaga->lembaga_id }}"
                                                {{ old('lembaga_id') == $lembaga->lembaga_id ? 'selected' : '' }}>
                                                {{ $lembaga->nama_lembaga }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Pilih Warga</label>
                                    <select name="warga_id" class="form-select" required>
                                        <option value="">-- Pilih Warga --</option>
                                        @foreach ($wargaList as $warga)
                                            <option value="{{ $warga->id }}"
                                                {{ old('warga_id') == $warga->id ? 'selected' : '' }}>
                                                {{ $warga->nama_lengkap }} (NIK: {{ $warga->nik }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Pilih Jabatan</label>
                                    <select name="jabatan_id" class="form-select" required>
                                        <option value="">-- Pilih Jabatan --</option>
                                        @foreach ($jabatanList as $jabatan)
                                            <option value="{{ $jabatan->jabatan_id }}"
                                                {{ old('jabatan_id') == $jabatan->jabatan_id ? 'selected' : '' }}>
                                                {{ $jabatan->nama_jabatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select" id="statusSelect" required>
                                        <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Masih
                                            Menjabat</option>
                                        <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai
                                            Menjabat</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tanggal Mulai</label>
                                    <input type="date" name="tgl_mulai" class="form-control"
                                        value="{{ old('tgl_mulai', date('Y-m-d')) }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tanggal Selesai</label>
                                    <input type="date" name="tgl_selesai" class="form-control" id="tglSelesaiInput"
                                        value="{{ old('tgl_selesai') }}" {{ old('status') == 'aktif' ? 'disabled' : '' }}>
                                    <small class="text-muted">Hanya diisi jika status "Selesai Menjabat"</small>
                                </div>
                            </div>

                            <div class="d-flex gap-2 mt-4">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ route('anggota-lembaga.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>

                @include('layouts.dashboard.team')
            </div>
        </div>
    </div>

    <script>
        document.getElementById('statusSelect').addEventListener('change', function() {
            const tglSelesaiInput = document.getElementById('tglSelesaiInput');
            if (this.value === 'selesai') {
                tglSelesaiInput.removeAttribute('disabled');
                tglSelesaiInput.setAttribute('required', 'required');
            } else {
                tglSelesaiInput.setAttribute('disabled', 'disabled');
                tglSelesaiInput.removeAttribute('required');
                tglSelesaiInput.value = '';
            }
        });
    </script>
@endsection
