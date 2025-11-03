<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Desa Sejahtera</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@600;700&family=Open+Sans&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets-guest/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

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
                <a href="index.html">
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
                                <h6 class="text-primary mb-0">Kontak</h6>
                                <span class="text-white">+628 122 3562</span>
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
                                <span class="text-white">DesaSejahtera@domain.com</span>
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
                                <span class="text-white">Dusun II RT 04 RW 02</span>
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
                <h4 class="d-lg-none m-0">Menu</h4>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav me-auto">
                        <div class="navbar-nav me-auto">
                            <a href="dashboard" class="nav-item nav-link">Tentang</a>
                            <a href="{{ route('users.index') }}" class="nav-item nav-link">Data User</a>
                            <a href="{{ route('warga.index') }}" class="nav-item nav-link">Data Penduduk</a>
                            <a href="{{ route('perangkat_desa.index') }}" class="nav-item nav-link">Perangkat Desa</a>
                        </div>
                        <div class="d-none d-lg-flex ms-auto">
                            <a class="btn btn-square btn-dark ms-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-dark ms-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-dark ms-2" href="#!"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Manajemen Data User</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#!">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data User</a></li>
                    <li class="breadcrumb-item"><a href="#!">Data Penduduk</a></li>
                    <li class="breadcrumb-item"><a href="#!">Perangkat Desa</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Event Start -->
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-success">Data User</h3>
            <a href="{{ route('users.create') }}" class="btn btn-success">
                <i class="fa fa-plus me-2"></i> Tambah User
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        @if ($users->isEmpty())
            <div class="text-center text-muted py-5">
                <p>Belum ada data pengguna.</p>
            </div>
        @else
            <div class="row g-4">
                @foreach ($users as $index => $user)
                    <div class="col-md-4 col-lg-3">
                        <div class="card shadow-sm border-0 h-100"
                            style="border-radius: 15px; background: linear-gradient(180deg, #d4ed91 0%, #b3e283 100%);">
                            <div class="card-body text-center p-4">

                                {{-- <!-- Avatar Default -->
                                <div class="mb-3">
                                    <img src="{{ asset('images/default-avatar.png') }}" alt="Foto User"
                                        class="rounded-circle shadow" width="100" height="100"
                                        style="object-fit: cover;">
                                </div> --}}

                                <!-- Nama -->
                                <h5 class="fw-bold text-dark mb-1">{{ $user->name }}</h5>
                                <p class="text-muted small mb-3">{{ $user->email }}</p>

                                <!-- Detail Info -->
                                <div class="text-start small text-dark">
                                    <p class="mb-1"><strong>No:</strong> {{ $index + 1 }}</p>
                                    <p class="mb-1"><strong>Tanggal Dibuat:</strong>
                                        {{ $user->created_at->format('d M Y') }}</p>
                                </div>
                            </div>

                            <!-- Aksi -->
                            <div class="card-footer bg-transparent border-0 text-center pb-4">
                                <a href="{{ route('users.edit', $user->id) }}"
                                    class="btn btn-sm btn-outline-success me-2" title="Edit Data">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                    class="d-inline" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
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
    <!-- Event End -->


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

    <!-- Footer Start -->
    <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5 py-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Our Office</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Dusun II RT 04 RW 02</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+628 122 3562</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>DesaSejahtera@edomain.com</p>
                    <div class="d-flex pt-3">
                        <a class="btn btn-square btn-primary me-2" href="#!"><i
                                class="fab fa-x-twitter"></i></a>
                        <a class="btn btn-square btn-primary me-2" href="#!"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-primary me-2" href="#!"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-primary me-2" href="#!"><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="#!">About Us</a>
                    <a class="btn btn-link" href="#!">Contact Us</a>
                    <a class="btn btn-link" href="#!">Our Services</a>
                    <a class="btn btn-link" href="#!">Terms & Condition</a>
                    <a class="btn btn-link" href="#!">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Business Hours</h4>
                    <p class="mb-1">Monday - Friday</p>
                    <h6 class="text-light">09:00 am - 07:00 pm</h6>
                    <p class="mb-1">Saturday</p>
                    <h6 class="text-light">09:00 am - 12:00 pm</h6>
                    <p class="mb-1">Sunday</p>
                    <h6 class="text-light">Closed</h6>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Gallery</h4>
                    <div class="row g-2">
                        <div class="col-4">
                            <img class="img-fluid w-100" src="{{ asset('assets-guest/img/gallery-1.jpg') }}"
                                alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid w-100" src="{{ asset('assets-guest/img/gallery-2.jpg') }}"
                                alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid w-100" src="{{ asset('assets-guest/img/gallery-3.jpg') }}"
                                alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid w-100" src="{{ asset('assets-guest/img/gallery-4.jpg') }}"
                                alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid w-100" src="{{ asset('assets-guest/img/gallery-5.jpg') }}"
                                alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid w-100" src="{{ asset('assets-guest/img/gallery-6.jpg') }}"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright pt-5">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="fw-semi-bold" href="#!">Your Site Name</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Designed By <a class="fw-semi-bold" href="https://htmlcodex.com">HTML Codex</a>. Distributed
                        by
                        <a class="fw-semi-bold" href="https://themewagon.com">ThemeWagon</a>
                    </div>
                </div>
            </div>
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

    <!-- Template Javascript -->
    <script src="{{ asset('assets-guest/js/main.js') }}"></script>
</body>

</html>
