<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Charitize - Charity Organization Website Template</title>
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
                        <a href="dashboard" class="nav-item nav-link">Tentang</a>
                        <a href="{{ route('users.index') }}" class="nav-item nav-link">Data User</a>
                        <a href="{{ route('warga.index') }}" class="nav-item nav-link">Data Penduduk</a>
                        <a href="{{ route('perangkat_desa.index') }}" class="nav-item nav-link">Perangkat Desa</a>
                        <div class="d-none d-lg-flex ms-auto">
                            <a class="btn btn-square btn-dark ms-2" href="#!"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-dark ms-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-dark ms-2" href="#!"><i class="fab fa-youtube"></i></a>
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
                        <div class="card shadow-sm border-0 h-100"
                            style="border-radius: 15px; background: linear-gradient(180deg, #d4ed91 0%, #b3e283 100%);">
                            <div class="card-body text-center p-4">
                                {{-- <!-- Foto -->
                                <div class="mb-3">
                                    <img src="{{ asset('images/default-avatar.png') }}" alt="Foto Warga"
                                        class="rounded-circle shadow" width="100" height="100"
                                        style="object-fit: cover;">
                                </div> --}}

                                <!-- Nama -->
                                <h5 class="fw-bold text-dark mb-1">{{ $item->nama }}</h5>
                                <p class="text-muted small mb-3">{{ $item->pekerjaan ?? 'Pekerjaan tidak diketahui' }}
                                </p>

                                <!-- Detail Info -->
                                <div class="text-start small text-dark">
                                    <p class="mb-1"><strong>No KTP:</strong> {{ $item->no_ktp }}</p>
                                    <p class="mb-1"><strong>Jenis Kelamin:</strong> {{ $item->jenis_kelamin }}</p>
                                    <p class="mb-1"><strong>Agama:</strong> {{ $item->agama }}</p>
                                    <p class="mb-1"><strong>Telp:</strong> {{ $item->telp }}</p>
                                    <p class="mb-1"><strong>Email:</strong> {{ $item->email }}</p>
                                </div>
                            </div>

                            <!-- Aksi -->
                            <div class="card-footer bg-transparent border-0 text-center pb-4">
                                <a href="{{ route('warga.edit', $item->id) }}"
                                    class="btn btn-sm btn-outline-success me-2" title="Edit Data">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('warga.destroy', $item->id) }}" method="POST"
                                    class="d-inline" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus Data">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>

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
