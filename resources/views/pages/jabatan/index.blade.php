@extends('layouts.dashboard.app')
@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Jabatan Lembaga</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#!">Data</a></li>
                    <li class="breadcrumb-item"><a href="#!">Data Penduduk</a></li>
                    <li class="breadcrumb-item"><a href="#!">Perangkat Desa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Jabatan Lembaga</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Jabatan List Start -->
    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-success">Data Jabatan</h3>
            <a href="{{ route('jabatan.create') }}" class="btn btn-success">
                <i class="fa fa-plus me-2"></i> Tambah Jabatan
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        @if ($jabatan->isEmpty())
            <div class="text-center text-muted py-5">
                <p>Belum ada data jabatan.</p>
            </div>
        @else
            <div class="row g-4">
                @foreach ($jabatan as $j)
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0 h-100"
                            style="border-radius: 15px; background: #ffffff; box-shadow: 0 4px 10px rgba(0,0,0,0.2);">

                            <div class="card-body text-dark p-4">

                                <h5 class="fw-bold text-success mb-2 text-center">
                                    {{ $j->nama_jabatan ?? '—' }}
                                </h5>

                                <p class="mb-2">
                                    <strong>Level:</strong> {{ $j->level ?? '-' }}
                                </p>

                                <p class="small text-secondary">
                                    {{ \Illuminate\Support\Str::limit($j->keterangan, 120) }}
                                </p>

                            </div>

                            <div class="card-footer bg-transparent border-0 text-center pb-3">

                                <!-- Tombol Edit -->
                                <a href="{{ route('jabatan.edit', $j->jabatan_id) }}"
                                    class="btn btn-sm btn-outline-success me-2" title="Edit Data">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <!-- Tombol Delete -->
                                <form action="{{ route('jabatan.destroy', $j->jabatan_id) }}" method="POST"
                                    class="d-inline" onsubmit="return confirm('Hapus jabatan ini?')">

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

            <div class="mt-4">
                {{ $jabatan->links() }}
            </div>
        @endif

    </div>
    <!-- Jabatan List End -->

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
                <!-- example cards -->
                <div class="col-md-6 col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="team-item text-center rounded-4 shadow-sm p-4 h-100"
                        style="background: linear-gradient(135deg, #e8f9f0 0%, #fffbe6 100%); border: 2px solid #198754;">
                        <div class="d-flex justify-content-center align-items-center mb-3"
                            style="width: 120px; height: 120px; border-radius: 50%; background-color: #198754; color: white; font-size: 48px; margin: 0 auto;">
                            <i class="fa fa-user"></i>
                        </div>
                        <h3 class="text-success mb-1">Stefanny Huang</h3>
                        <span class="text-muted mb-3 d-block">Koordinator Program Pemberdayaan</span>
                        <p class="text-secondary small">Memimpin inisiatif pemberdayaan masyarakat melalui pelatihan
                            kewirausahaan dan pendidikan keterampilan warga desa.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 wow fadeIn" data-wow-delay="0.3s">
                    <div class="team-item text-center rounded-4 shadow-sm p-4 h-100"
                        style="background: linear-gradient(135deg, #fffbe6 0%, #e8f9f0 100%); border: 2px solid #ffc107;">
                        <div class="d-flex justify-content-center align-items-center mb-3"
                            style="width: 120px; height: 120px; border-radius: 50%; background-color: #ffc107; color: white; font-size: 48px; margin: 0 auto;">
                            <i class="fa fa-user-tie"></i>
                        </div>
                        <h3 class="text-success mb-1">Febby Fahrezy</h3>
                        <span class="text-muted mb-3 d-block">Kepala Bidang Infrastruktur Desa</span>
                        <p class="text-secondary small">Mengawasi proyek pembangunan desa dan memastikan fasilitas publik
                            berjalan sesuai visi Desa Sejahtera yang berkelanjutan.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Team End -->

@endsection
