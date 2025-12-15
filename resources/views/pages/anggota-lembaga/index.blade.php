@extends('layouts.dashboard.app')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Anggota Lembaga Desa</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('warga.index') }}">Data Penduduk</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('perangkat_desa.index') }}">Perangkat Desa</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('lembaga.index') }}">Lembaga Desa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Anggota Lembaga</li>
                    <li class="breadcrumb-item"><a href="{{ route('jabatan.index') }}">Jabatan Lembaga</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Anggota Lembaga List Start -->
    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-success">Data Anggota Lembaga</h3>
            <a href="{{ route('anggota-lembaga.create') }}" class="btn btn-success">
                <i class="fa fa-plus me-2"></i> Tambah Anggota
            </a>
        </div>

        <!-- SEARCH & FILTER -->
        <div class="row mb-4">
            <div class="col-lg-8">
                <form method="GET" action="{{ route('anggota-lembaga.index') }}" class="row g-2">
                    <div class="col-md-6">
                        <input type="text" name="q" value="{{ request('q') }}"
                            class="form-control border border-2" placeholder="Cari nama anggota">
                    </div>

                    <div class="col-md-3">
                        <select name="lembaga_id" class="form-select border border-2">
                            <option value="">Semua Lembaga</option>
                            @foreach ($lembagaList as $lembaga)
                                <option value="{{ $lembaga->lembaga_id }}"
                                    {{ request('lembaga_id') == $lembaga->lembaga_id ? 'selected' : '' }}>
                                    {{ $lembaga->nama_lembaga }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        <select name="status" class="form-select border border-2">
                            <option value="">Semua Status</option>
                            <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Masih Menjabat
                            </option>
                            <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai Menjabat
                            </option>
                        </select>
                    </div>

                    <div class="col-md-1 d-grid">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>

            <div class="col-lg-4">
                <form method="GET" action="{{ route('anggota-lembaga.index') }}" class="d-flex justify-content-end">
                    <input type="hidden" name="q" value="{{ request('q') }}">
                    <input type="hidden" name="lembaga_id" value="{{ request('lembaga_id') }}">
                    <input type="hidden" name="status" value="{{ request('status') }}">

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

        @if ($anggota->isEmpty())
            <div class="text-center text-muted py-5">
                <p>Belum ada data anggota lembaga.</p>
            </div>
        @else
            <div class="mb-2 d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">
                        Menampilkan <strong>{{ $anggota->firstItem() }} - {{ $anggota->lastItem() }}</strong>
                        dari <strong>{{ $anggota->total() }}</strong> anggota
                        @if (request('q'))
                            untuk pencarian "<strong>{{ request('q') }}</strong>"
                        @endif
                    </small>
                </div>
                <div>
                    <small class="text-muted">Halaman <strong>{{ $anggota->currentPage() }}</strong> dari
                        <strong>{{ $anggota->lastPage() }}</strong></small>
                </div>
            </div>

            <!-- CARD LAYOUT - SAMA DENGAN LEMBAGA DESA -->
            <div class="row g-4">
                @foreach ($anggota as $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0 h-100"
                            style="border-radius: 15px; background: #ffffff; box-shadow: 0 4px 10px rgba(0,0,0,0.2);">

                            <div class="card-body text-dark p-4">

                                {{-- STATUS BADGE --}}
                                <div class="text-end mb-2">
                                    @if ($item->tgl_selesai)
                                        <span class="badge bg-secondary">Selesai</span>
                                    @else
                                        <span class="badge bg-success">Aktif</span>
                                    @endif
                                </div>

                                {{-- FOTO ANGGOTA --}}
                                <div class="text-center mb-3">
                                    @if ($item->warga->foto)
                                        <img src="{{ asset('storage/' . $item->warga->foto) }}" alt="Foto"
                                            class="rounded-circle shadow-sm" width="100" height="100"
                                            style="object-fit: cover;">
                                    @else
                                        <div class="rounded-circle shadow-sm d-flex justify-content-center align-items-center bg-success text-white"
                                            style="width:100px;height:100px;margin:auto;font-size:40px;">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    @endif
                                </div>

                                <h5 class="fw-bold text-success mb-2 text-center">
                                    {{ $item->warga->nama_lengkap }}
                                </h5>

                                <div class="text-center mb-3">
                                    <span class="badge bg-success-subtle text-success mb-1">
                                        <i class="fas fa-building me-1"></i>{{ $item->lembaga->nama_lembaga }}
                                    </span>
                                    <span class="badge bg-success-subtle text-success">
                                        <i class="fas fa-id-badge me-1"></i>{{ $item->jabatan->nama_jabatan ?? '-' }}
                                    </span>
                                </div>

                                <div class="mb-3">
                                    <p class="small mb-1">
                                        <i class="fa fa-id-card text-success me-1"></i>
                                        <strong>NIK:</strong> {{ $item->warga->nik }}
                                    </p>
                                    <p class="small mb-1">
                                        <i class="fa fa-calendar text-success me-1"></i>
                                        <strong>Mulai:</strong>
                                        {{ \Carbon\Carbon::parse($item->tgl_mulai)->format('d-m-Y') }}
                                    </p>
                                    @if ($item->tgl_selesai)
                                        <p class="small mb-1">
                                            <i class="fa fa-calendar-times text-success me-1"></i>
                                            <strong>Selesai:</strong>
                                            {{ \Carbon\Carbon::parse($item->tgl_selesai)->format('d-m-Y') }}
                                        </p>
                                    @endif
                                </div>

                                <div class="card-footer bg-transparent border-0 text-center pb-3 pt-3">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('anggota-lembaga.edit', $item) }}"
                                        class="btn btn-sm btn-outline-success me-2" title="Edit Data">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <!-- Tombol Delete -->
                                    <form action="{{ route('anggota-lembaga.destroy', $item) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Hapus anggota ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus Data">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

            {{-- pagination links --}}
            <div class="mt-4 d-flex justify-content-center">
                {{ $anggota->links('pagination::bootstrap-5') }}
            </div>
        @endif

    </div>
    <!-- Anggota Lembaga List End -->

    @include('layouts.dashboard.team')
@endsection
