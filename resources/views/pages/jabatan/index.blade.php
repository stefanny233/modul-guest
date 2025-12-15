@extends('layouts.dashboard.app')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Jabatan Lembaga</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('warga.index') }}">Data Penduduk</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('perangkat_desa.index') }}">Perangkat Desa</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('lembaga.index') }}">Lembaga Desa</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('anggota-lembaga.index') }}">Anggota Lembaga</a></li>
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

        <!-- SEARCH & FILTER -->
        <div class="row mb-4">
            <div class="col-lg-8">
                <form method="GET" action="{{ route('jabatan.index') }}" class="row g-2">
                    <div class="col-md-6">
                        <input type="text" name="q" value="{{ request('q') }}" class="form-control"
                            placeholder="Cari jabatan, level, keterangan atau lembaga...">
                    </div>

                    <div class="col-md-4">
                        <select name="lembaga_id" class="form-select">
                            <option value="">Semua Jabatan</option>
                            @foreach ($lembagaList as $l)
                                <option value="{{ $l->lembaga_id }}"
                                    {{ request('lembaga_id') == $l->lembaga_id ? 'selected' : '' }}>
                                    {{ $l->nama_lembaga }}
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
                <form method="GET" action="{{ route('jabatan.index') }}" class="d-flex justify-content-end">
                    <input type="hidden" name="q" value="{{ request('q') }}">
                    <input type="hidden" name="lembaga_id" value="{{ request('lembaga_id') }}">

                    <div class="input-group w-auto">
                        <label class="input-group-text">Per halaman</label>
                        <select class="form-select" name="per_page" onchange="this.form.submit()">
                            @php
                                $opts = [6, 12, 24, 48];
                                $current = (int) request('per_page', 12);
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

        @if ($jabatan->isEmpty())
            <div class="text-center text-muted py-5">
                <p>Belum ada data jabatan.</p>
            </div>
        @else
            <div class="mb-2 d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">
                        Menampilkan <strong>{{ $jabatan->firstItem() }} - {{ $jabatan->lastItem() }}</strong>
                        dari <strong>{{ $jabatan->total() }}</strong> jabatan
                        @if (request('q'))
                            untuk pencarian "<strong>{{ request('q') }}</strong>"
                        @endif
                    </small>
                </div>
                <div>
                    <small class="text-muted">Halaman <strong>{{ $jabatan->currentPage() }}</strong> dari
                        <strong>{{ $jabatan->lastPage() }}</strong></small>
                </div>
            </div>

            <div class="row g-4">
                @foreach ($jabatan as $j)
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0 h-100"
                            style="border-radius: 15px; background: #ffffff; box-shadow: 0 4px 10px rgba(0,0,0,0.2);">

                            <div class="card-body text-dark p-4">

                                {{-- ICON JABATAN (simple & konsisten) --}}
                                <div class="text-center mb-3">
                                    @php
                                        // mapping icon berdasarkan kata dalam nama jabatan (lowercase)
                                        $map = [
                                            'ketua' => 'fa-crown',
                                            'wakil' => 'fa-user-tie',
                                            'sekretaris' => 'fa-file-contract',
                                            'bendahara' => 'fa-wallet',
                                            'anggota' => 'fa-users',
                                            'koordinator' => 'fa-user-gear',
                                            'pembina' => 'fa-user-shield',
                                            'penasehat' => 'fa-comments',
                                            'staf' => 'fa-id-badge',
                                        ];

                                        $namaLower = strtolower($j->nama_jabatan ?? '');
                                        $icon = 'fa-briefcase'; // default
                                        foreach ($map as $key => $ic) {
                                            if (str_contains($namaLower, $key)) {
                                                $icon = $ic;
                                                break;
                                            }
                                        }
                                    @endphp

                                    <div class="rounded-circle shadow-sm d-flex justify-content-center align-items-center"
                                        style="width:100px;height:100px;margin:auto;background:#198754;color:#fff;font-size:34px;">
                                        <i class="fa {{ $icon }}"></i>
                                    </div>
                                </div>

                                <h5 class="fw-bold text-success mb-2 text-center">
                                    {{ $j->nama_jabatan ?? '—' }}
                                </h5>

                                <p class="mb-2">
                                    <strong>Level:</strong> {{ $j->level ?? '-' }}
                                </p>

                                <p class="small text-secondary">
                                    {{ \Illuminate\Support\Str::limit($j->keterangan, 120) }}
                                </p>

                                @if ($j->lembaga)
                                    <p class="mt-2 small"><strong>Lembaga:</strong> {{ $j->lembaga->nama_lembaga }}</p>
                                @endif

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

            {{-- pagination links --}}
            <div class="mt-4 d-flex justify-content-center">
                {{ $jabatan->links('pagination::bootstrap-5') }}
            </div>
        @endif

    </div>
    <!-- Jabatan List End -->
    @include('layouts.dashboard.team')
@endsection
