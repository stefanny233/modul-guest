@extends('layouts.dashboard.app')
@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Data Warga</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item active" aria-current="page">Warga</li>
                    <li class="breadcrumb-item"><a href="#!">RT</a></li>
                    <li class="breadcrumb-item"><a href="#!">RW</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold text-success">Data Warga</h3>
            <a href="{{ route('warga.create') }}" class="btn btn-success">+ Tambah Warga</a>
        </div>

        <!-- SEARCH & FILTER -->
        <div class="row mb-4">
            <div class="col-lg-9">
                <form method="GET" action="{{ route('warga.index') }}" class="row g-2">
                    <div class="col-md-5">
                        <input type="text" name="q" value="{{ request('q') }}" class="form-control"
                            placeholder="Cari nama, no KTP atau email...">
                    </div>

                    <div class="col-md-3">
                        <select name="jenis_kelamin" class="form-select">
                            <option value="">Semua Gender</option>
                            <option value="Laki-laki" {{ request('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="Perempuan" {{ request('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>
                    </div>

                    <div class="col-md-1 d-grid">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-lg-3">
                <form method="GET" action="{{ route('warga.index') }}" class="d-flex">
                    <input type="hidden" name="q" value="{{ request('q') }}">
                    <input type="hidden" name="from" value="{{ request('from') }}">
                    <input type="hidden" name="to" value="{{ request('to') }}">

                    <div class="input-group">
                        <label class="input-group-text">Per halaman</label>
                        <select class="form-select" name="per_page" onchange="this.form.submit()">
                            @php $options = [6, 12, 24, 48]; @endphp
                            @foreach ($options as $opt)
                                <option value="{{ $opt }}"
                                    {{ request('per_page', 12) == $opt ? 'selected' : '' }}>
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

        @if ($warga->isEmpty())
            <div class="text-center text-muted py-5">Belum ada data warga.</div>
        @else
            <div class="mb-2 d-flex justify-content-between align-items-center">
                <small class="text-muted">
                    Menampilkan <strong>{{ $warga->firstItem() }} - {{ $warga->lastItem() }}</strong>
                    dari <strong>{{ $warga->total() }}</strong> warga
                </small>

                <small class="text-muted">
                    Halaman <strong>{{ $warga->currentPage() }}</strong> dari
                    <strong>{{ $warga->lastPage() }}</strong>
                </small>
            </div>

            <div class="row g-4">
                @foreach ($warga as $item)
                    <div class="col-md-4 col-lg-3">
                        <div class="card border-0 h-100"
                            style="border-radius: 15px; background: #ffffff; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);">

                            <div class="card-body text-center p-4">
                                <!-- AVATAR INISIAL -->
                                <div class="mb-3">
                                    <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center shadow-sm mx-auto"
                                        style="width: 100px; height: 100px; font-size: 36px; font-weight: bold;">
                                        {{ strtoupper(substr($item->nama, 0, 1)) }}
                                    </div>
                                </div>

                                <h5 class="fw-bold text-dark mb-1">{{ $item->nama }}</h5>
                                <p class="text-muted small mb-3">{{ $item->pekerjaan ?? 'Pekerjaan tidak diketahui' }}</p>

                                <div class="text-start small text-dark mx-auto"
                                    style="display: inline-block; text-align: left;">
                                    <p class="mb-1"><strong>No KTP:</strong> {{ $item->no_ktp }}</p>
                                    <p class="mb-1"><strong>Jenis Kelamin:</strong> {{ $item->jenis_kelamin }}</p>
                                    <p class="mb-1"><strong>Agama:</strong> {{ $item->agama }}</p>
                                    <p class="mb-1"><strong>Telp:</strong> {{ $item->telp }}</p>
                                    <p class="mb-0"><strong>Email:</strong> {{ $item->email }}</p>
                                </div>
                            </div>

                            <div class="card-footer bg-transparent border-0 text-center pb-4">
                                <a href="{{ route('warga.edit', $item->id) }}"
                                    class="btn btn-sm btn-outline-success me-2"><i class="fa fa-edit"></i></a>

                                <form action="{{ route('warga.destroy', $item->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Yakin ingin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

            <!-- PAGINATION -->
            <div class="mt-4 d-flex justify-content-center">
                {{ $warga->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>


@endsection
