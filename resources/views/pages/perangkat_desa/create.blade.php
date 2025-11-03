@extends('layouts.dashboard.app')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Pendaftaran
            </h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#!">Home</a></li>
                    <li class="breadcrumb-item"><a href="#!">Data User</a></li>
                    <li class="breadcrumb-item"><a href="#!">Data Penduduk</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Perangkat Desa</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Tambah $perangkatDesa Desa Start -->
    <div class="container-fluid donate py-5">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-7 donate-text bg-light py-5">
                    <div class="h-100 p-5">
                        <h1 class="display-6 mb-4">Tambah Data Perangkat Desa</h1>
                        <form action="{{ route('perangkat_desa.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <label>Warga ID</label>
                                    <input type="text" name="warga_id" class="form-control" required>
                                </div>

                                <div class="col-12">
                                    <label>Jabatan</label>
                                    <input type="text" name="jabatan" class="form-control" required>
                                </div>

                                <div class="col-12">
                                    <label>NIP</label>
                                    <input type="text" name="nip" class="form-control">
                                </div>

                                <div class="col-12">
                                    <label>Kontak</label>
                                    <input type="text" name="kontak" class="form-control" required>
                                </div>

                                <div class="col-6">
                                    <label>Periode Mulai</label>
                                    <input type="date" name="periode_mulai" class="form-control" required>
                                </div>

                                <div class="col-6">
                                    <label>Periode Selesai</label>
                                    <input type="date" name="periode_selesai" class="form-control">
                                </div>

                                <div class="col-12">
                                    <label>Foto</label>
                                    <input type="file" name="foto" class="form-control">
                                </div>

                                <div class="col-12 d-flex gap-2">
                                    <button type="submit" class="btn btn-primary w-100 py-3">
                                        Simpan Data
                                    </button>

                                    <a href="{{ route('perangkat_desa.index') }}" class="btn btn-secondary w-100 py-3">
                                        Batal
                                    </a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-5 bg-primary text-center text-white py-5">
                    <div class="h-100 p-5">
                        <h2 class="display-6 mb-4">Pastikan Data Terisi Lengkap</h2>
                        <p>Isi semua kolom dengan benar dan upload foto perangkat desa jika tersedia.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tambah $perangkatDesa Desa End -->

    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="section-title bg-white text-center text-success px-3">TIM KAMI</p>
                <h1 class="display-6 mb-4 fw-bold text-dark">
                    Kenali Sosok di Balik Program Bina Desa
                </h1>
            </div>

            <div class="row g-4 justify-content-center">

                <!-- Stefanny Huang -->
                <div class="col-md-6 col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="team-item text-center rounded-4 shadow-sm p-4 h-100"
                        style="background: linear-gradient(135deg, #e8f9f0 0%, #fffbe6 100%); border: 2px solid #198754;">
                        <div class="d-flex justify-content-center align-items-center mb-3"
                            style="width: 120px; height: 120px; border-radius: 50%; background-color: #198754; color: white; font-size: 48px; margin: 0 auto;">
                            <i class="fa fa-user"></i>
                        </div>
                        <h3 class="text-success mb-1">Stefanny Huang</h3>
                        <span class="text-muted mb-3 d-block">Koordinator Program Pemberdayaan</span>
                        <p class="text-secondary small">
                            Memimpin inisiatif pemberdayaan masyarakat melalui pelatihan kewirausahaan dan pendidikan
                            keterampilan warga desa.
                        </p>
                        <div class="d-flex justify-content-center mt-3">
                            <a class="btn btn-square btn-outline-success mx-1" href="#!"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-outline-success mx-1" href="#!"><i
                                    class="fab fa-instagram"></i></a>
                            <a class="btn btn-square btn-outline-success mx-1" href="#!"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Febby Fahrezy -->
                <div class="col-md-6 col-lg-5 wow fadeIn" data-wow-delay="0.3s">
                    <div class="team-item text-center rounded-4 shadow-sm p-4 h-100"
                        style="background: linear-gradient(135deg, #fffbe6 0%, #e8f9f0 100%); border: 2px solid #ffc107;">
                        <div class="d-flex justify-content-center align-items-center mb-3"
                            style="width: 120px; height: 120px; border-radius: 50%; background-color: #ffc107; color: white; font-size: 48px; margin: 0 auto;">
                            <i class="fa fa-user-tie"></i>
                        </div>
                        <h3 class="text-success mb-1">Febby Fahrezy</h3>
                        <span class="text-muted mb-3 d-block">Kepala Bidang Infrastruktur Desa</span>
                        <p class="text-secondary small">
                            Mengawasi proyek pembangunan desa dan memastikan fasilitas publik berjalan sesuai visi Desa
                            Sejahtera yang berkelanjutan.
                        </p>
                        <div class="d-flex justify-content-center mt-3">
                            <a class="btn btn-square btn-outline-warning mx-1" href="#!"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-outline-warning mx-1" href="#!"><i
                                    class="fab fa-instagram"></i></a>
                            <a class="btn btn-square btn-outline-warning mx-1" href="#!"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Team End -->
@endsection
