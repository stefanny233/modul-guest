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

    {{-- start CSS --}}
    @include('layouts.dashboard.css')
    {{-- end css --}}
</head>

<body>
    <!-- Spinner Start -->
    @include('layouts.dashboard.spiner')
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
    @include('layouts.dashboard.navbar')
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="owl-carousel header-carousel py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="carousel-text">
                            <h1 class="display-1 text-uppercase mb-3">Bersama Membangun Desa yang Mandiri</h1>
                            <p class="fs-5 mb-5">Melalui semangat gotong royong dan inovasi, kita wujudkan desa yang
                                maju, sejahtera, dan berkelanjutan.</p>
                            <div class="d-flex">
                                <a class="btn btn-primary py-3 px-4 me-3" href="#!">Mulai Berkontribusi</a>
                                <a class="btn btn-secondary py-3 px-4" href="#!">Lihat Program</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="carousel-img">
                            <img class="w-100" src="{{ asset('assets-guest/img/carousel-2.jpg') }}" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Program Unggulan Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-12 col-lg-4 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="service-title">
                        <h1 class="display-6 mb-4">Program Unggulan Bina Desa</h1>
                        <p class="fs-5 mb-0">
                            Bersama membangun desa yang mandiri, berdaya, dan sejahtera melalui berbagai bidang
                            kehidupan masyarakat.
                        </p>
                    </div>
                </div>

                <div class="col-md-12 col-lg-8 col-xl-9">
                    <div class="row g-5">

                        <div class="col-sm-6 col-md-4 wow fadeIn" data-wow-delay="0.1s">
                            <div class="service-item h-100">
                                <div class="btn-square bg-light mb-4">
                                    <i class="fa fa-hand-holding-droplet fa-2x text-success"></i>
                                </div>
                                <h3>Air Bersih</h3>
                                <p class="mb-2">
                                    Penyediaan dan perawatan fasilitas air bersih untuk mendukung kesehatan dan
                                    kesejahteraan warga desa.
                                </p>
                                <a href="#!">Selengkapnya</a>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4 wow fadeIn" data-wow-delay="0.3s">
                            <div class="service-item h-100">
                                <div class="btn-square bg-light mb-4">
                                    <i class="fa fa-heart-pulse fa-2x text-success"></i>
                                </div>
                                <h3>Kesehatan Desa</h3>
                                <p class="mb-2">
                                    Program layanan kesehatan dasar dan penyuluhan bagi masyarakat demi meningkatkan
                                    kualitas hidup.
                                </p>
                                <a href="#!">Selengkapnya</a>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4 wow fadeIn" data-wow-delay="0.5s">
                            <div class="service-item h-100">
                                <div class="btn-square bg-light mb-4">
                                    <i class="fa fa-people-carry-box fa-2x text-success"></i>
                                </div>
                                <h3>Kegiatan Sosial</h3>
                                <p class="mb-2">
                                    Menggalang partisipasi warga dalam kegiatan gotong royong, bantuan sosial, dan
                                    pemberdayaan masyarakat.
                                </p>
                                <a href="#!">Selengkapnya</a>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4 wow fadeIn" data-wow-delay="0.1s">
                            <div class="service-item h-100">
                                <div class="btn-square bg-light mb-4">
                                    <i class="fa fa-seedling fa-2x text-success"></i>
                                </div>
                                <h3>Pertanian & Pangan</h3>
                                <p class="mb-2">
                                    Mendorong pertanian berkelanjutan dan ketahanan pangan melalui inovasi serta
                                    pelatihan petani desa.
                                </p>
                                <a href="#!">Selengkapnya</a>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4 wow fadeIn" data-wow-delay="0.3s">
                            <div class="service-item h-100">
                                <div class="btn-square bg-light mb-4">
                                    <i class="fa fa-school fa-2x text-success"></i>
                                </div>
                                <h3>Pendidikan Desa</h3>
                                <p class="mb-2">
                                    Memberikan akses pendidikan dasar dan pelatihan keterampilan bagi anak-anak dan
                                    remaja desa.
                                </p>
                                <a href="#!">Selengkapnya</a>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4 wow fadeIn" data-wow-delay="0.5s">
                            <div class="service-item h-100">
                                <div class="btn-square bg-light mb-4">
                                    <i class="fa fa-house fa-2x text-success"></i>
                                </div>
                                <h3>Pembangunan Infrastruktur</h3>
                                <p class="mb-2">
                                    Pembangunan jalan, jembatan, dan fasilitas umum untuk menunjang aktivitas dan
                                    pertumbuhan ekonomi desa.
                                </p>
                                <a href="#!">Selengkapnya</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Program Unggulan End -->


    {{-- <!-- Testimonial Start -->
    <div class="container py-5">
        <div class="text-center mb-4">
            <h3 class="text-success fw-bold">Data Penduduk Desa Sejahtera</h3>
            <p class="text-muted">Kelola informasi warga desa dengan mudah</p>
            <a href="{{ url('guest/create') }}" class="btn btn-warning fw-semibold text-dark">
                <i class="fa fa-plus me-2"></i>Tambah Penduduk
            </a>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-success">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Pekerjaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Siti Rahmawati</td>
                            <td>siti@gmail.com</td>
                            <td>Perempuan</td>
                            <td>Islam</td>
                            <td>Guru</td>
                            <td>
                                <a href="{{ url('guest/edit/1') }}" class="btn btn-sm btn-outline-success"><i
                                        class="fa fa-edit"></i></a>
                                <a href="#!" onclick="return confirm('Yakin ingin hapus data ini?')"
                                    class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Agus Setiawan</td>
                            <td>agus@gmail.com</td>
                            <td>Laki-laki</td>
                            <td>Islam</td>
                            <td>Petani</td>
                            <td>
                                <a href="{{ url('guest/edit/2') }}" class="btn btn-sm btn-outline-success"><i
                                        class="fa fa-edit"></i></a>
                                <a href="#!" onclick="return confirm('Yakin ingin hapus data ini?')"
                                    class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Testimonial End --> --}}

    <!-- Footer Start -->
    @include('layouts.dashboard.footer')
    <!-- Footer End -->





    <!-- JavaScript Libraries -->
    @include('layouts.dashboard.js')
</body>

</html>
