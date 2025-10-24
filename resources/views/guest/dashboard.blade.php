<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard Desa Sejahtera</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{ asset('assets-guest/img/favicon.ico') }}" rel="icon">
    <link href="{{ asset('assets-guest/vendor/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/vendor/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>

    <!-- Flash Message -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show m-0 text-center" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Topbar Start -->
    <div class="container-fluid bg-secondary top-bar wow fadeIn" data-wow-delay="0.1s">
        <div class="row align-items-center h-100">
            <div class="col-lg-4 text-center text-lg-start">
                <a href="">
                    <h1 class="display-5 text-primary m-0">Desa Sejahtera</h1>
                </a>
            </div>
            @auth
                <small class="text-white me-3">
                    <i class="bi bi-person-circle"></i> {{ auth()->user()->nama ?? 'Pengguna' }}
                </small>
            @endauth
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid bg-secondary px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="nav-bar">
            <nav class="navbar navbar-expand-lg bg-primary navbar-dark px-4 py-lg-0">
                <a href="{{ route('guest.dashboard') }}" class="navbar-brand text-white fw-bold">Home</a>
                <button class="navbar-toggler me-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav me-auto">
                        <a href="{{ route('users.index') }}" class="nav-item nav-link">Data User</a>
                        <a href="{{ route('penduduk.index') }}" class="nav-item nav-link">Data Penduduk</a>
                        <a href="{{ route('perangkat_desa.index') }}" class="nav-item nav-link">Perangkat Desa</a>
                    </div>

                    {{-- Button Logout hanya jika login --}}
                    @auth
                        <a href="{{ route('guest.logout') }}" class="btn btn-danger btn-sm">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a>
                    @endauth
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Welcome Section -->
    <div class="container py-5 text-center">
        <h1 class="mb-3">
            Selamat Datang, {{ auth()->user()->nama ?? 'Pengunjung' }} 👋
        </h1>
        <p class="text-muted">Kelola informasi desa dengan mudah dan cepat melalui sistem ini.</p>
    </div>

    <!-- Dashboard Statistik -->
    <div class="container py-4">
        <div class="row g-4">
            <div class="col-md-4 wow zoomIn" data-wow-delay="0.1s">
                <div class="card border-0 shadow p-4 text-center">
                    <i class="fa fa-users fa-3x text-primary mb-3"></i>
                    <h3>{{ $totalPenduduk ?? 0 }}</h3>
                    <p>Total Penduduk</p>
                    <a href="{{ route('penduduk.index') }}" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                </div>
            </div>

            <div class="col-md-4 wow zoomIn" data-wow-delay="0.2s">
                <div class="card border-0 shadow p-4 text-center">
                    <i class="fa fa-user-tie fa-3x text-primary mb-3"></i>
                    <h3>{{ $totalPerangkat ?? 0 }}</h3>
                    <p>Perangkat Desa</p>
                    <a href="{{ route('perangkat_desa.index') }}" class="btn btn-outline-primary btn-sm">Kelola</a>
                </div>
            </div>

            <div class="col-md-4 wow zoomIn" data-wow-delay="0.3s">
                <div class="card border-0 shadow p-4 text-center">
                    <i class="fa fa-chart-line fa-3x text-primary mb-3"></i>
                    <h3>{{ now()->year }}</h3>
                    <p>Tahun Berjalan</p>
                    <a href="#!" class="btn btn-outline-primary btn-sm">Lihat Grafik</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="container-fluid footer py-4 bg-secondary text-light text-center">
        <p class="mb-0">© 2025 Desa Sejahtera. All Rights Reserved.</p>
    </div>

    <!-- Back to Top -->
    <a href="#!" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets-guest/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets-guest/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets-guest/js/main.js') }}"></script>

    <script>
        new WOW().init();
    </script>

</body>

</html>
