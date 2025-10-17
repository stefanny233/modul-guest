<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard Desa Sejahtera</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('assets-guest/img/favicon.ico') }}" rel="icon">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets-guest/vendor/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/vendor/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets-guest/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets-guest/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid bg-secondary top-bar wow fadeIn" data-wow-delay="0.1s">
        <div class="row align-items-center h-100">
            <div class="col-lg-4 text-center text-lg-start">
                <a href="{{ route('dashboard') }}">
                    <h1 class="display-5 text-primary m-0">Desa Sejahtera</h1>
                </a>
            </div>
            <div class="col-lg-8 d-none d-lg-block">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="d-flex justify-content-end">
                            <div class="flex-shrink-0 btn-square bg-primary">
                                <i class="fa fa-phone-alt text-dark"></i>
                            </div>
                            <div class="ms-2">
                                <h6 class="text-primary mb-0">Hubungi Kami</h6>
                                <span class="text-white">+62 812 3456 7890</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex justify-content-end">
                            <div class="flex-shrink-0 btn-square bg-primary">
                                <i class="fa fa-envelope-open text-dark"></i>
                            </div>
                            <div class="ms-2">
                                <h6 class="text-primary mb-0">Email</h6>
                                <span class="text-white">desasejahtera@gmail.com</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex justify-content-end">
                            <div class="flex-shrink-0 btn-square bg-primary">
                                <i class="fa fa-map-marker-alt text-dark"></i>
                            </div>
                            <div class="ms-2">
                                <h6 class="text-primary mb-0">Alamat</h6>
                                <span class="text-white">Jl. Raya Desa Sejahtera No.12</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid bg-secondary px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="nav-bar">
            <nav class="navbar navbar-expand-lg bg-primary navbar-dark px-4 py-lg-0">
                <a href="{{ route('dashboard') }}" class="navbar-brand text-white fw-bold">Dashboard</a>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav me-auto">
                        <a href="{{ route('dashboard') }}" class="nav-item nav-link active">Beranda</a>
                        <a href="{{ route('penduduk.index') }}" class="nav-item nav-link">Data Penduduk</a>
                        <a href="{{ route('perangkat_desa.index') }}" class="nav-item nav-link">Perangkat Desa</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Content Start -->
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="display-5 text-primary">Selamat Datang di Desa Sejahtera</h1>
            <p class="fs-5">Kelola informasi desa dengan mudah dan cepat melalui sistem ini.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow p-4 text-center">
                    <i class="fa fa-users fa-3x text-primary mb-3"></i>
                    <h4>Data Penduduk</h4>
                    <p class="mb-3">Kelola dan pantau data penduduk desa secara real-time.</p>
                    <a href="{{ route('penduduk.index') }}" class="btn btn-primary">Lihat Data</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow p-4 text-center">
                    <i class="fa fa-user-tie fa-3x text-primary mb-3"></i>
                    <h4>Perangkat Desa</h4>
                    <p class="mb-3">Kelola struktur organisasi dan jabatan perangkat desa.</p>
                    <a href="{{ route('perangkat_desa.index') }}" class="btn btn-primary">Kelola</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow p-4 text-center">
                    <i class="fa fa-chart-line fa-3x text-primary mb-3"></i>
                    <h4>Laporan & Statistik</h4>
                    <p class="mb-3">Lihat laporan dan data statistik perkembangan desa.</p>
                    <a href="#!" class="btn btn-primary">Lihat</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Content End -->

    <!-- Footer Start -->
    <div class="container-fluid footer py-5 bg-secondary text-light">
        <div class="container text-center">
            <p class="mb-0">© 2025 Desa Sejahtera. All Rights Reserved.</p>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#!" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets-guest/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets-guest/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets-guest/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets-guest/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets-guest/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets-guest/js/main.js') }}"></script>
</body>

</html>
