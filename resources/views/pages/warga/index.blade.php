@extends('layouts.dashboard.app')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Data Warga</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#!">Home</a></li>
                    <li class="breadcrumb-item"><a href="#!">Data User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Penduduk</li>
                    <li class="breadcrumb-item"><a href="#!">Perangkat Desa</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Features Start -->
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold text-success">Data Warga</h3>
            <a href="{{ route('warga.create') }}" class="btn btn-success">+ Tambah Warga</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        @if ($warga->isEmpty())
            <div class="text-center text-muted py-5">
                <p>Belum ada data warga.</p>
            </div>
        @else
            <div class="row g-4">
                @foreach ($warga as $index => $item)
                    <div class="col-md-4 col-lg-3">
                        <div class="card border-0 h-100"
                            style="border-radius: 15px; background: #ffffff; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);">
                            <div class="card-body text-center p-4">
                                <!-- Foto Profil -->
                                <div class="mb-3">
                                    <img src="{{ asset('assets-guest/img/team-2.jpg') }}" alt="Foto User"
                                        class="rounded-circle shadow-sm" width="100" height="100"
                                        style="object-fit: cover;">
                                </div>
                                <!-- Nama -->
                                <h5 class="fw-bold text-dark mb-1">{{ $item->nama }}</h5>
                                <p class="text-muted small mb-3">
                                    {{ $item->pekerjaan ?? 'Pekerjaan tidak diketahui' }}
                                </p>

                                <!-- Detail Info -->
                                <div class="text-start small text-dark mx-auto"
                                    style="display: inline-block; text-align: left; line-height: 1.7;">
                                    <p class="mb-1"><strong>No KTP:</strong> {{ $item->no_ktp }}</p>
                                    <p class="mb-1"><strong>Jenis Kelamin:</strong> {{ $item->jenis_kelamin }}</p>
                                    <p class="mb-1"><strong>Agama:</strong> {{ $item->agama }}</p>
                                    <p class="mb-1"><strong>Telp:</strong> {{ $item->telp }}</p>
                                    <p class="mb-0"><strong>Email:</strong> {{ $item->email }}</p>
                                </div>
                            </div>

                            <!-- Aksi -->
                            <div class="card-footer bg-transparent border-0 text-center pb-4">
                                <a href="{{ route('warga.edit', $item->id) }}" class="btn btn-sm btn-outline-success me-2"
                                    title="Edit Data">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('warga.destroy', $item->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Yakin ingin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus Data">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Features End -->

    <!-- Keunggulan Program Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="rounded overflow-hidden">
                        <div class="row g-0">
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                                <div class="text-center bg-success py-5 px-4 h-100">
                                    <i class="fa fa-users fa-3x text-warning mb-3"></i>
                                    <h1 class="display-5 mb-0" data-toggle="counter-up">2</h1>
                                    <span class="text-light">Perangkat & Relawan</span>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                                <div class="text-center bg-secondary py-5 px-4 h-100">
                                    <i class="fa fa-award fa-3x text-success mb-3"></i>
                                    <h1 class="display-5 text-white mb-0" data-toggle="counter-up">0</h1>
                                    <span class="text-white">Penghargaan Desa</span>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                                <div class="text-center bg-secondary py-5 px-4 h-100">
                                    <i class="fa fa-list-check fa-3x text-success mb-3"></i>
                                    <h1 class="display-5 text-white mb-0" data-toggle="counter-up">2</h1>
                                    <span class="text-white">Program Terlaksana</span>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.7s">
                                <div class="text-center bg-success py-5 px-4 h-100">
                                    <i class="fa fa-comments fa-3x text-warning mb-3"></i>
                                    <h1 class="display-5 mb-0" data-toggle="counter-up">500+</h1>
                                    <span class="text-light">Aspirasi Warga</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <p class="section-title bg-white text-start text-success pe-3">Mengapa Kami!</p>
                    <h1 class="display-6 mb-4 wow fadeIn" data-wow-delay="0.2s">
                        Alasan Mengapa Warga Memilih Program Bina Desa
                    </h1>
                    <p class="mb-4 wow fadeIn" data-wow-delay="0.3s">
                        Program <b>Bina Desa</b> hadir untuk meningkatkan kualitas hidup masyarakat melalui
                        pemberdayaan, pelayanan publik, dan pembangunan berkelanjutan. Kami percaya kemajuan desa
                        berawal dari kolaborasi dan kepedulian bersama.
                    </p>

                    <p class="text-dark wow fadeIn" data-wow-delay="0.4s">
                        <i class="fa fa-check text-success me-2"></i>Pelayanan publik transparan dan cepat
                    </p>
                    <p class="text-dark wow fadeIn" data-wow-delay="0.5s">
                        <i class="fa fa-check text-success me-2"></i>Program pemberdayaan berbasis masyarakat
                    </p>
                    <p class="text-dark wow fadeIn" data-wow-delay="0.6s">
                        <i class="fa fa-check text-success me-2"></i>Kolaborasi pemerintah dan warga secara aktif
                    </p>

                    <div class="d-flex mt-4 wow fadeIn" data-wow-delay="0.7s">
                        <a class="btn btn-success py-3 px-4 me-3" href="#!">Lihat Program</a>
                        <a class="btn btn-warning py-3 px-4 text-dark" href="#!">Hubungi Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Keunggulan Program End -->
@endsection
