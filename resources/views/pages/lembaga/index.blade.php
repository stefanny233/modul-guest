@extends('layouts.dashboard.app')
@section('content')
    {{-- PAGE HEADER --}}
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Lembaga Desa</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('warga.index') }}">Data Penduduk</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('perangkat_desa.index') }}">Perangkat Desa</a></li>
                    <li class="breadcrumb-item active">Lembaga Desa</li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- CONTENT --}}
    <div class="container py-5">

        {{-- HEADER + ACTION --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-success">Data Lembaga Desa</h3>
            <a href="{{ route('lembaga.create') }}" class="btn btn-success">
                <i class="fa fa-plus me-2"></i> Tambah Lembaga
            </a>
        </div>

        {{-- FILTER --}}
        <form method="GET" action="{{ route('lembaga.index') }}" class="row g-2 mb-4">
            <div class="col-md-5">
                <input type="text" name="q" value="{{ request('q') }}" class="form-control"
                    placeholder="Cari nama lembaga, deskripsi, kontak...">
            </div>

            <div class="col-md-4">
                <select name="nama_lembaga" class="form-select">
                    <option value="">Semua Lembaga</option>
                    @foreach (['Karang Taruna', 'PKK Desa', 'Badan Permusyawaratan Desa (BPD)', 'LPM Desa', 'Posyandu', 'RT/RW', 'BUMDes'] as $d)
                        <option value="{{ $d }}" {{ request('nama_lembaga') == $d ? 'selected' : '' }}>
                            {{ $d }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <button class="btn btn-success w-100">
                    <i class="fa fa-search"></i> Cari
                </button>
            </div>
        </form>

        {{-- ALERT --}}
        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        {{-- INFO --}}
        @if ($lembaga->count())
            <small class="text-muted d-block mb-3">
                Menampilkan <strong>{{ $lembaga->firstItem() }} - {{ $lembaga->lastItem() }}</strong>
                dari <strong>{{ $lembaga->total() }}</strong> lembaga
            </small>
        @endif

        {{-- GRID --}}
        <div class="row g-4">
            @forelse ($lembaga as $l)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0" style="border-radius:16px;">
                        <div class="card-body p-4 text-center">

                            {{-- LOGO --}}
                            @php
                                $logo = optional($l->media->where('mime_type', 'like', 'image%')->first())->file_name;
                            @endphp

                            <div class="mb-3">
                                @if ($logo)
                                    <img src="{{ asset('storage/' . ltrim($logo, '/')) }}" class="rounded-circle shadow"
                                        style="width:100px;height:100px;object-fit:cover;">
                                @else
                                    <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center mx-auto"
                                        style="width:100px;height:100px;font-size:40px;">
                                        <i class="fa fa-building"></i>
                                    </div>
                                @endif
                            </div>

                            {{-- TITLE --}}
                            <h5 class="fw-bold text-success">{{ $l->nama_lembaga }}</h5>

                            <p class="small text-muted">
                                {{ Str::limit($l->deskripsi, 100) }}
                            </p>

                            <p class="mb-1"><strong>Kontak:</strong> {{ $l->kontak ?? '-' }}</p>
                            <p class="mb-3"><strong>Anggota:</strong> {{ $l->anggota->count() }}</p>

                            {{-- ACTION --}}
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('lembaga.show', $l->lembaga_id) }}"
                                        class="btn btn-sm btn-outline-info me-1" title="Lihat Detail">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <a href="{{ route('lembaga.edit', $l->lembaga_id) }}"
                                        class="btn btn-sm btn-outline-success">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form action="{{ route('lembaga.destroy', $l->lembaga_id) }}" method="POST"
                                        onsubmit="return confirm('Hapus lembaga ini?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-secondary text-center">
                            Belum ada data lembaga desa.
                        </div>
                    </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        <div class="mt-4 d-flex justify-content-center">
            {{ $lembaga->links('pagination::bootstrap-5') }}
        </div>

    </div>

    @include('layouts.dashboard.team')
@endsection
