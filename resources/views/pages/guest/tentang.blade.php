@extends('layouts.dashboard.app')
@section('content')
    <!-- Hero Section -->
    <div class="container-fluid py-5 mb-5" style="background: linear-gradient(135deg, #ddfded, #e9deb3);">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="display-4 text-dark fw-bold mb-3" style="text-shadow: 0 2px 4px rgba(0,0,0,0.1);">Tentang Desa
                        Kita</h1>
                    <p class="lead text-dark mb-4 fw-medium">
                        Mengenal lebih dalam sejarah, visi, dan kehidupan masyarakat di desa sejahtera
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-light text-primary fs-6 py-2 px-3">Berdiri sejak 1980</span>
                        <span class="badge bg-light text-primary fs-6 py-2 px-3">Dusun II RT 04 RW 02</span>
                        <span class="badge bg-light text-primary fs-6 py-2 px-3">150+ Penduduk</span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <img src="{{ asset('assets-guest/img/village-icon.jpg') }}" class="img-fluid rounded-3 shadow-lg"
                        alt="Desa Illustration">
                </div>
            </div>
        </div>
    </div>

    <!-- Sejarah Desa -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="position-relative">
                        <img src="{{ asset('assets-guest/img/about-1.jpg') }}" class="img-fluid rounded-3 shadow"
                            alt="Sejarah Desa">
                        <div class="position-absolute bottom-0 start-0 bg-white p-3 m-3 rounded-2 shadow">
                            <h5 class="mb-0">📜 Sejarah Panjang</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="display-6 mb-4">Sejarah & Asal Usul</h2>
                    <p class="fs-5 mb-4">
                        Desa kita berdiri sejak tahun 1980 dengan semangat gotong royong yang kuat.
                        Awalnya merupakan pemukiman kecil yang berkembang menjadi desa mandiri dengan
                        berbagai potensi alam dan sumber daya manusia.
                    </p>
                    <div class="row g-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="bg-light p-3 rounded me-3">
                                    <i class="fas fa-mountain fa-2x text-success"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1">Potensi Alam</h5>
                                    <p class="mb-0 text-muted">Pertanian & Perkebunan</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="bg-light p-3 rounded me-3">
                                    <i class="fas fa-hands-helping fa-2x text-primary"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1">Budaya</h5>
                                    <p class="mb-0 text-muted">Gotong Royong</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Visi Misi -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Visi & Misi Desa</h2>
                <p class="fs-5 text-muted">Arah pembangunan dan tujuan jangka panjang</p>
            </div>

            <div class="row g-4">

                <!-- Visi -->
                <div class="col-lg-6">
                    <div class="card border-0 shadow h-100">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <div class="d-inline-flex rounded-circle"
                                    style="background-color:#3f7d6c; width:110px; height:110px; align-items:center; justify-content:center;">
                                    <i class="fas fa-seedling fa-3x text-white"></i>
                                </div>
                            </div>

                            <h3 class="text-center mb-4">Visi Desa</h3>
                            <p class="text-center fs-5">
                                "Terwujudnya Desa yang Mandiri, Sejahtera, dan Berbudaya melalui Pembangunan Berkelanjutan"
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Misi -->
                <div class="col-lg-6">
                    <div class="card border-0 shadow h-100">
                        <div class="card-body p-4">

                            <div class="text-center mb-4">
                                <div class="d-inline-flex rounded-circle"
                                    style="background-color:#3b7a61; width:110px; height:110px; align-items:center; justify-content:center;">
                                    <i class="fas fa-route fa-3x text-white"></i>
                                </div>
                            </div>

                            <h3 class="text-center mb-4">Misi Desa</h3>

                            <div class="d-flex justify-content-center">
                                <ul class="list-unstyled fs-5" style="width: 90%;">

                                    <li class="d-flex align-items-center mb-3">
                                        <i class="fas fa-graduation-cap me-3" style="color:#d9a300; font-size:1.4rem;"></i>
                                        <span>Meningkatkan kualitas pendidikan</span>
                                    </li>

                                    <li class="d-flex align-items-center mb-3">
                                        <i class="fas fa-store me-3" style="color:#e8b255; font-size:1.4rem;"></i>
                                        <span>Mengembangkan ekonomi kreatif</span>
                                    </li>

                                    <li class="d-flex align-items-center mb-3">
                                        <i class="fas fa-leaf me-3" style="color:#2f7d59; font-size:1.4rem;"></i>
                                        <span>Melestarikan lingkungan hidup</span>
                                    </li>

                                    <li class="d-flex align-items-center mb-3">
                                        <i class="fas fa-road me-3" style="color:#275b64; font-size:1.4rem;"></i>
                                        <span>Memperkuat infrastruktur dasar</span>
                                    </li>

                                    <li class="d-flex align-items-center mb-3">
                                        <i class="fas fa-hand-holding-heart me-3"
                                            style="color:#c94b4b; font-size:1.4rem;"></i>
                                        <span>Meningkatkan pelayanan publik</span>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Data & Statistik -->
    <div class="container-fluid py-5">
        <div class="container">
            <h2 class="display-6 text-center mb-5">Data & Demografi Desa</h2>

            <div class="row g-4">

                <!-- Total Penduduk -->
                <div class="col-md-3 col-6">
                    <div class="text-center">
                        <div class="icon-circle mb-3" style="background-color:#3f7d6c;">
                            <i class="fas fa-users fa-3x text-white"></i>
                        </div>
                        <h3 class="text-dark">2,500+</h3>
                        <p class="fw-medium text-muted">Total Penduduk</p>
                    </div>
                </div>

                <!-- Kepala Keluarga -->
                <div class="col-md-3 col-6">
                    <div class="text-center">
                        <div class="icon-circle mb-3" style="background-color:#3b7a61;">
                            <i class="fas fa-home fa-3x text-white"></i>
                        </div>
                        <h3 class="text-dark">650</h3>
                        <p class="fw-medium text-muted">Kepala Keluarga</p>
                    </div>
                </div>

                <!-- Melek Huruf -->
                <div class="col-md-3 col-6">
                    <div class="text-center">
                        <div class="icon-circle mb-3" style="background-color:#d9a300;">
                            <i class="fas fa-graduation-cap fa-3x text-white"></i>
                        </div>
                        <h3 class="text-dark">85%</h3>
                        <p class="fw-medium text-muted">Angka Melek Huruf</p>
                    </div>
                </div>

                <!-- Fasilitas Umum -->
                <div class="col-md-3 col-6">
                    <div class="text-center">
                        <div class="icon-circle mb-3" style="background-color:#c94b4b;">
                            <i class="fas fa-warehouse fa-3x text-white"></i>
                        </div>
                        <h3 class="text-dark">15</h3>
                        <p class="fw-medium text-muted">Fasilitas Umum</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Prestasi & Pencapaian Desa -->
    <div class="container-fluid bg-light-green py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3 text-dark">🏆 Prestasi Desa</h2>
                <p class="fs-5 text-secondary">Pencapaian dan penghargaan yang membanggakan</p>
            </div>

            <!-- Timeline Prestasi -->
            <div class="achievement-timeline">
                @foreach ([['year' => '2024', 'title' => 'Desa Mandiri', 'desc' => 'Penghargaan tingkat provinsi'], ['year' => '2023', 'title' => 'Adipura Kecil', 'desc' => 'Penghargaan kebersihan lingkungan'], ['year' => '2022', 'title' => 'Desa Digital', 'desc' => 'Implementasi sistem informasi desa'], ['year' => '2021', 'title' => 'Lomba Perpustakaan', 'desc' => 'Juara 1 tingkat kabupaten'], ['year' => '2020', 'title' => 'Pangan Mandiri', 'desc' => 'Swadaya pangan berkelanjutan']] as $achievement)
                    <div class="timeline-item">
                        <div class="timeline-year">
                            <div class="year-badge">{{ $achievement['year'] }}</div>
                        </div>
                        <div class="timeline-content">
                            <div class="achievement-card">
                                <div class="achievement-icon">
                                    <i class="fas fa-trophy fa-2x"></i>
                                </div>
                                <div class="achievement-info">
                                    <h4 class="mb-2">{{ $achievement['title'] }}</h4>
                                    <p class="text-muted mb-0">{{ $achievement['desc'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Statistik Prestasi -->
            <div class="row g-4 mt-5">
                <div class="col-md-3 col-6">
                    <div class="achievement-stat text-center">
                        <div class="stat-circle" style="border-color: #fbbf24;">
                            <i class="fas fa-award fa-2x text-warning"></i>
                        </div>
                        <h3 class="mt-3 mb-1">15+</h3>
                        <p class="text-muted mb-0">Penghargaan</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="achievement-stat text-center">
                        <div class="stat-circle" style="border-color: #22c55e;">
                            <i class="fas fa-star fa-2x text-success"></i>
                        </div>
                        <h3 class="mt-3 mb-1">8</h3>
                        <p class="text-muted mb-0">Program Unggulan</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="achievement-stat text-center">
                        <div class="stat-circle" style="border-color: #facc15;">
                            <i class="fas fa-handshake fa-2x text-amber-600"></i>
                        </div>
                        <h3 class="mt-3 mb-1">12</h3>
                        <p class="text-muted mb-0">Kemitraan</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="achievement-stat text-center">
                        <div class="stat-circle" style="border-color: #a3e635;">
                            <i class="fas fa-chart-line fa-2x text-lime-600"></i>
                        </div>
                        <h3 class="mt-3 mb-1">95%</h3>
                        <p class="text-muted mb-0">Kepuasan Masyarakat</p>
                    </div>
                </div>
            </div>

            <!-- Testimoni -->
            <div class="row mt-5">
                <div class="col-lg-8 mx-auto">
                    <div class="testimonial-card">
                        <div class="testimonial-header">
                            <i class="fas fa-quote-left fa-3x text-warning opacity-50"></i>
                            <h4 class="mt-3">Testimoni Masyarakat</h4>
                        </div>
                        <div class="testimonial-body">
                            <p class="fs-5 fst-italic">
                                "Desa kami telah mengalami transformasi luar biasa dalam 5 tahun terakhir.
                                Dari infrastruktur hingga pelayanan publik, semuanya semakin baik."
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
