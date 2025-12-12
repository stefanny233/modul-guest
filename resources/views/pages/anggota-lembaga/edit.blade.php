@extends('layouts.dashboard.app')
@section('content')
    <!-- Page Header -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Edit Anggota Lembaga</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#!">Data</a></li>
                    <li class="breadcrumb-item"><a href="#!">Data Penduduk</a></li>
                    <li class="breadcrumb-item"><a href="#!">Perangkat Desa</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('lembaga.index') }}">Lembaga Desa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Anggota Lembaga</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Main content -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h3 class="mb-4">Edit Data Anggota Lembaga</h3>

                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <form action="{{ route('anggota-lembaga.update', $anggota) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Lembaga</label>
                                    <select name="lembaga_id" class="form-select" required>
                                        @foreach ($lembagaList as $lembaga)
                                            <option value="{{ $lembaga->lembaga_id }}"
                                                {{ $anggota->lembaga_id == $lembaga->lembaga_id ? 'selected' : '' }}>
                                                {{ $lembaga->nama_lembaga }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Warga</label>
                                    <select name="warga_id" class="form-select" required>
                                        @foreach ($wargaList as $warga)
                                            <option value="{{ $warga->id }}"
                                                {{ $anggota->warga_id == $warga->id ? 'selected' : '' }}>
                                                {{ $warga->nama_lengkap }} (NIK: {{ $warga->nik }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Jabatan</label>
                                    <select name="jabatan_id" class="form-select" required>
                                        @foreach ($jabatanList as $jabatan)
                                            <option value="{{ $jabatan->jabatan_id }}"
                                                {{ $anggota->jabatan_id == $jabatan->jabatan_id ? 'selected' : '' }}>
                                                {{ $jabatan->nama_jabatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select" id="statusSelect" required>
                                        <option value="aktif" {{ !$anggota->tgl_selesai ? 'selected' : '' }}>Masih
                                            Menjabat</option>
                                        <option value="selesai" {{ $anggota->tgl_selesai ? 'selected' : '' }}>Selesai
                                            Menjabat</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tanggal Mulai</label>
                                    <input type="date" name="tgl_mulai" class="form-control"
                                        value="{{ \Carbon\Carbon::parse($anggota->tgl_mulai)->format('Y-m-d') }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tanggal Selesai</label>
                                    <input type="date" name="tgl_selesai" class="form-control" id="tglSelesaiInput"
                                        value="{{ $anggota->tgl_selesai ? \Carbon\Carbon::parse($anggota->tgl_selesai)->format('Y-m-d') : '' }}"
                                        {{ !$anggota->tgl_selesai ? 'disabled' : '' }}>
                                    <small class="text-muted">Hanya diisi jika status "Selesai Menjabat"</small>
                                </div>
                            </div>

                            <div class="d-flex gap-2 mt-4">
                                <button type="submit" class="btn btn-success">Update</button>
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
