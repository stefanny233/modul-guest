@extends('layouts.dashboard.app')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Tambah RT</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#!">Data</a></li>
                    <li class="breadcrumb-item"><a href="#!">Data Penduduk</a></li>
                    <li class="breadcrumb-item"><a href="#!">Perangkat Desa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah RT</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container mt-4">
        <h3>Tambah RT</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form action="{{ route('rt.store') }}" method="POST">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="rw_id" class="form-label">Pilih RW</label>
                            <select id="rw_id" name="rw_id" class="form-select @error('rw_id') is-invalid @enderror">
                                <option value="">-- Pilih RW --</option>
                                @foreach ($rws as $rw)
                                    <option value="{{ $rw->rw_id }}" {{ old('rw_id') == $rw->rw_id ? 'selected' : '' }}>
                                        {{ $rw->nomor_rw }}
                                    </option>
                                @endforeach
                            </select>
                            @error('rw_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="nomor_rt" class="form-label">Nomor RT</label>
                            <input id="nomor_rt" type="text" name="nomor_rt"
                                class="form-control @error('nomor_rt') is-invalid @enderror" value="{{ old('nomor_rt') }}"
                                required>
                            @error('nomor_rt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="ketua_rt_warga_id" class="form-label">Ketua RT (Warga)</label>
                            <select id="ketua_rt_warga_id" name="ketua_rt_warga_id"
                                class="form-select @error('ketua_rt_warga_id') is-invalid @enderror">
                                <option value="">-- Pilih --</option>
                                @foreach ($wargas as $w)
                                    <option value="{{ $w->id }}"
                                        {{ old('ketua_rt_warga_id') == $w->id ? 'selected' : '' }}>
                                        {{ $w->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('ketua_rt_warga_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea id="keterangan" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror"
                                rows="1">{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('rt.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="container my-5">
            <div class="text-center mb-4">
                <p class="section-title bg-white px-3" style="color:#215d50; border-left:4px solid #e3a83a;">FASILITAS
                    WILAYAH</p>
                <h2 class="fw-bold" style="color:#215d50;">Fasilitas Umum di Wilayah RW/RT</h2>
                <p class="text-muted">Berikut daftar fasilitas desa yang tersedia dan dapat dimanfaatkan oleh warga.</p>
            </div>

            <div class="row g-4">
                <!-- POS RONDA -->
                <div class="col-md-6 col-lg-4">
                    <div class="p-4 shadow-sm rounded-4 text-center h-100"
                        style="background: linear-gradient(135deg, #edf7f3 0%, #ffffff 100%); border: 1px solid #b8d9cd;">
                        <div class="mb-3" style="font-size: 45px; color:#215d50;">
                            <i class="fa fa-shield-alt"></i>
                        </div>
                        <h5 class="fw-bold mb-2" style="color:#215d50;">Pos Ronda</h5>
                        <p class="text-muted small">
                            Tempat penjagaan keamanan lingkungan yang aktif setiap malam oleh warga setempat.
                        </p>
                    </div>
                </div>

                <!-- POSYANDU -->
                <div class="col-md-6 col-lg-4">
                    <div class="p-4 shadow-sm rounded-4 text-center h-100"
                        style="background: linear-gradient(135deg, #fff7df 0%, #ffffff 100%); border: 1px solid #f4d79b;">
                        <div class="mb-3" style="font-size: 45px; color:#e3a83a;">
                            <i class="fa fa-baby"></i>
                        </div>
                        <h5 class="fw-bold mb-2" style="color:#e3a83a;">Posyandu</h5>
                        <p class="text-muted small">
                            Layanan kesehatan ibu & anak dengan kegiatan rutin seperti timbang balita dan imunisasi.
                        </p>
                    </div>
                </div>

                <!-- BALAI WARGA -->
                <div class="col-md-6 col-lg-4">
                    <div class="p-4 shadow-sm rounded-4 text-center h-100"
                        style="background: linear-gradient(135deg, #edf2ff 0%, #ffffff 100%); border: 1px solid #c2cff5;">
                        <div class="mb-3" style="font-size: 45px; color:#215d50;">
                            <i class="fa fa-users"></i>
                        </div>
                        <h5 class="fw-bold mb-2" style="color:#215d50;">Balai Warga</h5>
                        <p class="text-muted small">
                            Sarana pertemuan warga untuk musyawarah, kegiatan sosial, dan program pembinaan desa.
                        </p>
                    </div>
                </div>

                <!-- TEMPAT IBADAH -->
                <div class="col-md-6 col-lg-4">
                    <div class="p-4 shadow-sm rounded-4 text-center h-100"
                        style="background: linear-gradient(135deg, #ffeaea 0%, #ffffff 100%); border: 1px solid #ffc6c6;">
                        <div class="mb-3" style="font-size: 45px; color:#c44747;">
                            <i class="fa fa-church"></i>
                        </div>
                        <h5 class="fw-bold mb-2" style="color:#c44747;">Tempat Ibadah</h5>
                        <p class="text-muted small">
                            Fasilitas keagamaan untuk menunjang kegiatan spiritual warga dari berbagai golongan.
                        </p>
                    </div>
                </div>

                <!-- LAPANGAN -->
                <div class="col-md-6 col-lg-4">
                    <div class="p-4 shadow-sm rounded-4 text-center h-100"
                        style="background: linear-gradient(135deg, #eafff4 0%, #ffffff 100%); border: 1px solid #b3e6ce;">
                        <div class="mb-3" style="font-size: 45px; color:#215d50;">
                            <i class="fa fa-futbol"></i>
                        </div>
                        <h5 class="fw-bold mb-2" style="color:#215d50;">Lapangan Warga</h5>
                        <p class="text-muted small">
                            Area serbaguna untuk kegiatan olahraga, lomba 17-an, dan aktivitas pemuda desa.
                        </p>
                    </div>
                </div>

                <!-- TPS -->
                <div class="col-md-6 col-lg-4">
                    <div class="p-4 shadow-sm rounded-4 text-center h-100"
                        style="background: linear-gradient(135deg, #f4ffe7 0%, #ffffff 100%); border: 1px solid #d8e7b6;">
                        <div class="mb-3" style="font-size: 45px; color:#215d50;">
                            <i class="fa fa-trash-alt"></i>
                        </div>
                        <h5 class="fw-bold mb-2" style="color:#215d50;">TPS / Tempat Sampah</h5>
                        <p class="text-muted small">
                            Tempat pengumpulan sampah sementara sebelum diangkut oleh petugas kebersihan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
