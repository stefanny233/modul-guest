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
                    <li class="breadcrumb-item"><a href="#!">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Feature</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Features Start -->
    <div class="container mt-4">
        <h3 class="fw-bold text-success">Edit Data Warga</h3>
        <form action="{{ route('warga.update', $warga->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>No KTP</label>
                <input type="text" name="no_ktp" value="{{ $warga->no_ktp }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" value="{{ $warga->nama }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" required>
                    <option value="Laki-laki" {{ $warga->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                    </option>
                    <option value="Perempuan" {{ $warga->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan
                    </option>
                </select>
            </div>
            <div class="mb-3">
                <label>Agama</label>
                <input type="text" name="agama" value="{{ $warga->agama }}" class="form-control">
            </div>
            <div class="mb-3">
                <label>Pekerjaan</label>
                <input type="text" name="pekerjaan" value="{{ $warga->pekerjaan }}" class="form-control">
            </div>
            <div class="mb-3">
                <label>Telp</label>
                <input type="text" name="telp" value="{{ $warga->telp }}" class="form-control">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" value="{{ $warga->email }}" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('warga.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
    <!-- Features End -->

    <!-- Footer Start -->
    <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5 py-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Our Office</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Dusun II RT 04 RW 02</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+628 122 3562</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>DesaSejahtera@domain.com</p>
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
