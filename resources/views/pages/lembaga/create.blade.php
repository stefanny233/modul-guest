@extends('layouts.dashboard.app')

@section('content')
    <!-- Page Header -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s" style="background-position:center;">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Lembaga Desa</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#!">Data</a></li>
                    <li class="breadcrumb-item"><a href="#!">Data Penduduk</a></li>
                    <li class="breadcrumb-item"><a href="#!">Perangkat Desa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lembaga Desa</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Main content -->
    <div class="container my-5"> 
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <h3 class="mb-4">Tambah Lembaga Desa</h3>

                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <form action="{{ route('lembaga.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nama_lembaga" class="form-label">Nama Lembaga</label>
                                    <select name="nama_lembaga" id="nama_lembaga" class="form-select" required>
                                        <option value="">-- Pilih Lembaga --</option>
                                        @foreach ($daftarLembaga as $item)
                                            <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Kontak</label>
                                    <input type="text" name="kontak" class="form-control" placeholder="Nomor / Email / IG">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Logo (optional)</label>
                                <input type="file" name="logo" class="form-control">
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ route('lembaga.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Team block (ke bawah) --}}
                <div class="py-4">
                    <div class="text-center mx-auto" style="max-width:600px;">
                        <p class="section-title bg-white text-center text-success px-3">TIM KAMI</p>
                        <h2 class="display-6 mb-4 fw-bold text-dark">Kenali Sosok di Balik Program Bina Desa</h2>
                    </div>

                    <div class="row g-4 justify-content-center">
                        <div class="col-md-6 col-lg-5">
                            <div class="team-item text-center rounded-4 shadow-sm p-4 h-100"
                                 style="background: linear-gradient(135deg,#e8f9f0 0%,#fffbe6 100%); border:2px solid #198754;">
                                <div class="mb-3 mx-auto" style="width:120px; height:120px; border-radius:50%; background:#198754; color:#fff; display:flex; align-items:center; justify-content:center; font-size:48px;">
                                    <i class="fa fa-user"></i>
                                </div>
                                <h5 class="text-success mb-1">Stefanny Huang</h5>
                                <small class="text-muted d-block mb-3">Koordinator Program Pemberdayaan</small>
                                <p class="text-secondary small">Memimpin inisiatif pemberdayaan masyarakat melalui pelatihan kewirausahaan dan pendidikan keterampilan warga desa.</p>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-5">
                            <div class="team-item text-center rounded-4 shadow-sm p-4 h-100"
                                 style="background: linear-gradient(135deg,#fffbe6 0%,#e8f9f0 100%); border:2px solid #ffc107;">
                                <div class="mb-3 mx-auto" style="width:120px; height:120px; border-radius:50%; background:#ffc107; color:#fff; display:flex; align-items:center; justify-content:center; font-size:48px;">
                                    <i class="fa fa-user-tie"></i>
                                </div>
                                <h5 class="text-success mb-1">Febby Fahrezy</h5>
                                <small class="text-muted d-block mb-3">Kepala Bidang Infrastruktur Desa</small>
                                <p class="text-secondary small">Mengawasi proyek pembangunan desa dan memastikan fasilitas publik berjalan sesuai visi Desa Sejahtera yang berkelanjutan.</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end team block --}}

            </div>
        </div>
    </div>
@endsection
