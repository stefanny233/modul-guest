@extends('layouts.dashboard.app')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Manajemen Data User</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data User</li>
                    <li class="breadcrumb-item"><a href="{{ route('warga.index') }}">Data Penduduk</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('perangkat_desa.index') }}">Perangkat Desa</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('lembaga.index') }}">Lembaga Desa</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('anggota-lembaga.index') }}">Anggota Lmebaga</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('jabatan.index') }}">Jabatan Desa</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Event Start -->
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-success">Data User</h3>
            <a href="{{ route('users.create') }}" class="btn btn-success">
                <i class="fa fa-plus me-2"></i> Tambah User
            </a>
        </div>

        {{-- SEARCH & FILTER --}}
        <div class="row mb-4">
            <div class="col-lg-9">
                <form method="GET" action="{{ route('users.index') }}" class="row g-2">
                    <div class="col-md-5">
                        <input type="text" name="q" value="{{ request('q') }}" class="form-control"
                            placeholder="Cari nama atau email...">
                    </div>

                    <div class="col-md-1 d-grid">
                        <button class="btn btn-primary" type="submit" title="Cari"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>

            <div class="col-lg-3">
                <form method="GET" action="{{ route('users.index') }}" class="d-flex">
                    {{-- preserve search/filter when changing per_page --}}
                    <input type="hidden" name="q" value="{{ request('q') }}">
                    <input type="hidden" name="from" value="{{ request('from') }}">
                    <input type="hidden" name="to" value="{{ request('to') }}">

                    <div class="input-group">
                        <label class="input-group-text" for="per_page">Per halaman</label>
                        <select class="form-select" id="per_page" name="per_page" onchange="this.form.submit()">
                            @php
                                $options = [6, 12, 24, 48];
                                $current = (int) request('per_page', 12);
                            @endphp
                            @foreach ($options as $opt)
                                <option value="{{ $opt }}" {{ $current === $opt ? 'selected' : '' }}>
                                    {{ $opt }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
        </div>

        {{-- flash message --}}
        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        {{-- empty state --}}
        @if ($users->isEmpty())
            <div class="text-center text-muted py-5">
                <p>Belum ada data pengguna.</p>
            </div>
        @else
            {{-- info --}}
            <div class="mb-2 d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">
                        Menampilkan <strong>{{ $users->firstItem() }} - {{ $users->lastItem() }}</strong> dari
                        <strong>{{ $users->total() }}</strong> pengguna
                        @if (request('q'))
                            untuk pencarian "<strong>{{ request('q') }}</strong>"
                        @endif
                    </small>
                </div>
                <div>
                    <small class="text-muted">Halaman <strong>{{ $users->currentPage() }}</strong> dari
                        <strong>{{ $users->lastPage() }}</strong></small>
                </div>
            </div>

            <div class="row g-4">
                @foreach ($users as $user)
                    @php
                        // nomor absolut berdasarkan page saat ini
                        $no = ($users->currentPage() - 1) * $users->perPage() + $loop->iteration;
                    @endphp

                    <div class="col-md-4 col-lg-3">
                        <div class="card border-0 h-100"
                            style="border-radius: 15px; background: #ffffff; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);">

                            <div class="card-body text-center p-4">
                                <!-- Foto Profil -->
                                <div class="mb-3">
                                    <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center shadow-sm mx-auto"
                                        style="width: 100px; height: 100px; font-size: 36px; font-weight: bold;">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                </div>
                                <!-- Nama -->
                                <h5 class="fw-bold text-dark mb-1">{{ $user->name }}</h5>
                                <p class="text-muted small mb-3">{{ $user->email }}</p>

                                <!-- Detail Info -->
                                <div class="text-start small text-dark">
                                    <p class="mb-1"><strong>No:</strong> {{ $no }}</p>
                                    <p class="mb-1"><strong>Tanggal Dibuat:</strong>
                                        {{ $user->created_at->format('d M Y') }}</p>
                                </div>
                            </div>

                            <!-- Aksi -->
                            <div class="card-footer bg-transparent border-0 text-center pb-4">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-outline-success me-2"
                                    title="Edit Data">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus user ini?')">
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

            {{-- pagination --}}
            <div class="mt-4 d-flex justify-content-center">
                {{ $users->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
    <!-- Event End -->

    <!-- Team Start -->
    <div class="container my-5">
        <div class="row justify-content-center g-4">

            <!-- REGULAR USER COUNT -->
            <div class="col-md-4 col-sm-6">
                <div class="p-4 text-center rounded-4 shadow-lg border-0 position-relative overflow-hidden"
                    style="background: linear-gradient(135deg, #fff9db 0%, #ffec99 100%); color:#5c3c00;">
                    <div class="position-absolute top-0 start-0 w-100 h-100 opacity-10"
                        style="background: radial-gradient(circle at 30% 30%, #ffd43b 0%, transparent 50%);"></div>
                    <i class="bi bi-people-fill fs-1 mb-3"></i>
                    <h6 class="fw-bold mb-1">Regular User</h6>
                    <p class="fs-2 fw-bold mb-0">{{ $userCount }}</p>
                    <div class="mt-3 small">Pengguna dengan akses terbatas</div>
                </div>
            </div>

            <!-- ADMIN COUNT -->
            <div class="col-md-4 col-sm-6">
                <div class="p-4 text-center rounded-4 shadow-lg border-0 position-relative overflow-hidden"
                    style="background: linear-gradient(135deg, #dbe4ff 0%, #a5b4fc 100%); color:#1e3a8a;">
                    <div class="position-absolute top-0 start-0 w-100 h-100 opacity-10"
                        style="background: radial-gradient(circle at 30% 30%, #3b82f6 0%, transparent 50%);"></div>
                    <i class="bi bi-shield-check fs-1 mb-3"></i>
                    <h6 class="fw-bold mb-1">Admin</h6>
                    <p class="fs-2 fw-bold mb-0">{{ $adminCount }}</p>
                    <div class="mt-3 small">Pengguna dengan hak akses penuh</div>
                </div>
            </div>

            <!-- TOTAL USER -->
            <div class="col-md-4 col-sm-6">
                <div class="p-4 text-center rounded-4 shadow-lg border-0 position-relative overflow-hidden"
                    style="background: linear-gradient(135deg, #d3f9d8 0%, #69db7c 100%); color:#0c6b1f;">
                    <div class="position-absolute top-0 start-0 w-100 h-100 opacity-10"
                        style="background: radial-gradient(circle at 30% 30%, #2b8a3e 0%, transparent 50%);"></div>
                    <i class="bi bi-person-badge fs-1 mb-3"></i>
                    <h6 class="fw-bold mb-1">Total User</h6>
                    <p class="fs-2 fw-bold mb-0">{{ $totalUsers }}</p>
                    <div class="mt-3 small">Semua pengguna terdaftar</div>
                </div>
            </div>

        </div>
    </div>
    <!-- Team End -->
@endsection
