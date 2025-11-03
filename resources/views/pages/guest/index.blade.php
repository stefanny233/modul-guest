@extends('layouts.dashboard.app')
@section('content')
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
@endsection
