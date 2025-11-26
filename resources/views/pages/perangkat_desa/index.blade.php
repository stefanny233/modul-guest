@extends('layouts.dashboard.app')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Perangkat Desa</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#!">Data</a></li>
                    <li class="breadcrumb-item"><a href="#!">Data Penduduk</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Perangkat Desa</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-success">Data Perangkat Desa</h3>
            <a href="{{ route('perangkat_desa.create') }}" class="btn btn-success">
                <i class="fa fa-plus me-2"></i> Tambah Perangkat
            </a>
        </div>

        <!-- SEARCH & FILTER -->
        <div class="row mb-4">
            <div class="col-lg-8">
                <form method="GET" action="{{ route('perangkat_desa.index') }}" class="row g-2">
                    <div class="col-md-6">
                        <input type="text" name="q" value="{{ request('q') }}" class="form-control"
                            placeholder="Cari jabatan, NIP, kontak atau nama warga...">
                    </div>

                    <div class="col-md-4">
                        <select name="jabatan" class="form-select">
                            <option value="">Semua Jabatan</option>
                            @php
                                $jabatanOptions = [
                                    'Kepala Desa',
                                    'Sekretaris Desa',
                                    'Kaur Keuangan',
                                    'Kaur Umum',
                                    'Kasi Pemerintahan',
                                    'Kasi Kesejahteraan',
                                    'Kasi Pelayanan',
                                    'Kepala Dusun',
                                    'Staff Desa',
                                ];
                            @endphp
                            @foreach ($jabatanOptions as $j)
                                <option value="{{ $j }}" {{ request('jabatan') == $j ? 'selected' : '' }}>
                                    {{ $j }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2 d-grid">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>

            <div class="col-lg-4">
                <form method="GET" action="{{ route('perangkat_desa.index') }}" class="d-flex justify-content-end">
                    {{-- preserve filters when changing per_page --}}
                    <input type="hidden" name="q" value="{{ request('q') }}">
                    <input type="hidden" name="jabatan" value="{{ request('jabatan') }}">

                    <div class="input-group w-auto">
                        <label class="input-group-text">Per halaman</label>
                        <select class="form-select" name="per_page" onchange="this.form.submit()">
                            @php
                                $opts = [6, 9, 12, 24];
                                $current = (int) request('per_page', 9);
                            @endphp
                            @foreach ($opts as $opt)
                                <option value="{{ $opt }}" {{ $current === (int) $opt ? 'selected' : '' }}>
                                    {{ $opt }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        @if ($perangkat->isEmpty())
            <div class="text-center text-muted py-5">
                <p>Belum ada data perangkat desa.</p>
            </div>
        @else
            <div class="mb-2 d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">
                        Menampilkan <strong>{{ $perangkat->firstItem() }} - {{ $perangkat->lastItem() }}</strong>
                        dari <strong>{{ $perangkat->total() }}</strong> perangkat
                        @if (request('q'))
                            untuk pencarian "<strong>{{ request('q') }}</strong>"
                        @endif
                    </small>
                </div>
                <div>
                    <small class="text-muted">Halaman <strong>{{ $perangkat->currentPage() }}</strong> dari
                        <strong>{{ $perangkat->lastPage() }}</strong></small>
                </div>
            </div>

            <div class="row g-4">
                @foreach ($perangkat as $p)
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0 h-100"
                            style="border-radius: 15px; background: #ffffff; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);">

                            <div class="card-body text-dark p-4 text-center">

                                <!-- FOTO / ICON -->
                                <div class="mb-3">
                                    @php
                                        $jabatanSlug = \Illuminate\Support\Str::slug($p->jabatan ?? 'default');
                                        $logoPath = 'storage/logos/' . $jabatanSlug . '.png';
                                        $icons = [
                                            'kepala-desa' => 'fa-user-tie',
                                            'sekretaris-desa' => 'fa-user-edit',
                                            'kaur-keuangan' => 'fa-wallet',
                                            'kaur-umum' => 'fa-clipboard',
                                            'kasi-pemerintahan' => 'fa-landmark',
                                            'kasi-pelayanan' => 'fa-handshake',
                                        ];
                                        $icon = $icons[$jabatanSlug] ?? 'fa-user';
                                    @endphp

                                    @if (!empty($p->foto) && file_exists(public_path('storage/' . $p->foto)))
                                        <img src="{{ asset('storage/' . $p->foto) }}"
                                            alt="Foto {{ $p->nama ?? $p->jabatan }}" class="rounded-circle shadow-sm"
                                            width="100" height="100" style="object-fit: cover;">
                                    @elseif (file_exists(public_path($logoPath)))
                                        <img src="{{ asset($logoPath) }}" alt="Logo {{ $p->jabatan }}"
                                            class="rounded-circle shadow-sm" width="100" height="100"
                                            style="object-fit: cover;">
                                    @else
                                        <div class="rounded-circle shadow-sm d-flex justify-content-center align-items-center bg-success text-white"
                                            style="width:100px;height:100px;margin:auto;font-size:40px;">
                                            <i class="fa {{ $icon }}"></i>
                                        </div>
                                    @endif
                                </div>

                                <h5 class="fw-bold text-success mb-2">{{ $p->jabatan }}</h5>

                                <div class="small text-start">
                                    <p class="mb-1"><strong>NIP:</strong> {{ $p->nip ?? '-' }}</p>
                                    <p class="mb-1"><strong>Kontak:</strong> {{ $p->kontak ?? '-' }}</p>
                                    <p class="mb-0"><strong>Periode:</strong>
                                        {{ $p->periode_mulai ?? '-' }} - {{ $p->periode_selesai ?? 'Sekarang' }}
                                    </p>
                                </div>
                            </div>

                            <div class="card-footer bg-transparent border-0 text-center pb-4">
                                <a href="{{ route('perangkat_desa.edit', $p->id) }}"
                                    class="btn btn-sm btn-outline-success me-2" title="Edit Data">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('perangkat_desa.destroy', $p->id) }}" method="POST"
                                    class="d-inline" onsubmit="return confirm('Yakin ingin hapus data ini?')">
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

            {{-- pagination links --}}
            <div class="mt-4 d-flex justify-content-center">
                {{ $perangkat->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>

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
                            <a class="btn btn-square btn-outline-success mx-1" href="https://www.facebook.com/"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-outline-success mx-1" href="https://www.instagram.com/"><i
                                    class="fab fa-instagram"></i></a>
                            <a class="btn btn-square btn-outline-success mx-1" href="https://www.linkedin.com/"><i
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
                            <a class="btn btn-square btn-outline-warning mx-1" href="https://www.facebook.com/"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-outline-warning mx-1" href="https://www.instagram.com/"><i
                                    class="fab fa-instagram"></i></a>
                            <a class="btn btn-square btn-outline-warning mx-1" href="https://www.linkedin.com/"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Team End -->
@endsection
