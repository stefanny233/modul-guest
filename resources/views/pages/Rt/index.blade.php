@extends('layouts.dashboard.app')

@section('content')
    <!-- Page Header -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Master RT</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#!">Data</a></li>
                    <li class="breadcrumb-item"><a href="#!">Data Penduduk</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Master RT</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-success">Data Perangkat Desa</h3>
            <a href="{{ route('rt.create') }}" class="btn btn-success">
                <i class="fa fa-plus me-2"></i> + Master RT
            </a>
        </div>

        {{-- SEARCH & FILTER --}}
        <form method="GET" action="{{ route('rt.index') }}" class="row g-2 mb-4 align-items-center">
            <div class="col-md-5">
                <input type="text" name="q" value="{{ request('q') }}" class="form-control"
                    placeholder="Cari nomor RT, keterangan, atau nama ketua...">
            </div>

            <div class="col-md-3">
                <select name="rw_id" class="form-select">
                    <option value="">Semua RW</option>
                    @if (!empty($rws))
                        @foreach ($rws as $r)
                            <option value="{{ $r->rw_id }}" {{ request('rw_id') == $r->rw_id ? 'selected' : '' }}>
                                {{ $r->nomor_rw ?? ($r->keterangan ?? 'RW ' . $r->rw_id) }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="col-md-2">
                <select name="per_page" class="form-select" onchange="this.form.submit()">
                    @foreach ([6, 9, 12, 15, 24] as $opt)
                        <option value="{{ $opt }}" {{ (int) request('per_page', 15) === $opt ? 'selected' : '' }}>
                            {{ $opt }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <button class="btn btn-warning w-100">Cari</button>
            </div>
        </form>

        {{-- info --}}
        <div class="mb-3">
            @if (isset($rts) && $rts->total() > 0)
                <small class="text-muted">Menampilkan <strong>{{ $rts->firstItem() }} - {{ $rts->lastItem() }}</strong>
                    dari <strong>{{ $rts->total() }}</strong> RT</small>
            @else
                <small class="text-muted">Menampilkan 0 RT</small>
            @endif
        </div>

        {{-- GRID CARDS --}}
        <div class="row g-4">
            @forelse ($rts as $rt)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm" style="border-radius:12px;">
                        <div class="card-body text-center p-4">
                            {{-- icon circle --}}
                            <div class="rounded-circle shadow-sm d-flex justify-content-center align-items-center mb-3"
                                style="width:110px;height:110px;margin:0 auto;background:#2f7f57;color:#fff;font-size:42px;">
                                <i class="fa fa-map-marker-alt"></i>
                            </div>

                            {{-- title --}}
                            <h5 class="fw-bold text-success mb-2">RT {{ $rt->nomor_rt }}</h5>

                            {{-- details --}}
                            <div class="text-start small text-dark" style="min-height:110px;">
                                <p class="mb-1"><strong>RW:</strong>
                                    {{ optional($rt->rw)->nomor_rw ?? (optional($rt->rw)->keterangan ?? '-') }}</p>
                                <p class="mb-1"><strong>Ketua:</strong> {{ optional($rt->ketua)->nama ?? '-' }}</p>
                                <p class="mb-0"><strong>Keterangan:</strong> {{ $rt->keterangan ?? '-' }}</p>
                            </div>

                            {{-- action (centered) --}}
                            <div class="mt-3 d-flex justify-content-center gap-2">
                                <a href="{{ route('rt.edit', $rt->rt_id) }}" class="btn btn-sm btn-outline-success"
                                    title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('rt.destroy', $rt->rt_id) }}" method="POST"
                                    onsubmit="return confirm('Hapus RT ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" title="Hapus"><i
                                            class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-secondary text-center mb-0">Belum ada data RT.</div>
                </div>
            @endforelse
        </div>

        {{-- pagination (center) --}}
        <div class="mt-4 d-flex justify-content-center">
            @if (isset($rts))
                {{ $rts->appends(request()->query())->links('pagination::bootstrap-5') }}
            @endif
        </div>

        <div class="row g-4">

        <!-- POS RONDA -->
        <div class="col-md-6 col-lg-4">
            <div class="p-4 shadow-sm rounded-4 text-center h-100"
                style="background: linear-gradient(135deg, #edf7f3 0%, #ffffff 100%); border: 1px solid #b8d9cd;">
                <div class="mb-3" style="font-size: 45px; color:#215d50;">
                    <i class="fa fa-shield-alt"></i>
                </div>
                <h5 class="fw-bold mb-2" style="color:#215d50;">Pos Ronda</h5>
                <p class="text-muted small">
                    Tempat penjagaan keamanan lingkungan yang aktif setiap malam oleh warga setempat.
                </p>
            </div>
        </div>

        <!-- POSYANDU -->
        <div class="col-md-6 col-lg-4">
            <div class="p-4 shadow-sm rounded-4 text-center h-100"
                style="background: linear-gradient(135deg, #fff7df 0%, #ffffff 100%); border: 1px solid #f4d79b;">
                <div class="mb-3" style="font-size: 45px; color:#e3a83a;">
                    <i class="fa fa-baby"></i>
                </div>
                <h5 class="fw-bold mb-2" style="color:#e3a83a;">Posyandu</h5>
                <p class="text-muted small">
                    Layanan kesehatan ibu & anak dengan kegiatan rutin seperti timbang balita dan imunisasi.
                </p>
            </div>
        </div>

        <!-- BALAI WARGA -->
        <div class="col-md-6 col-lg-4">
            <div class="p-4 shadow-sm rounded-4 text-center h-100"
                style="background: linear-gradient(135deg, #edf2ff 0%, #ffffff 100%); border: 1px solid #c2cff5;">
                <div class="mb-3" style="font-size: 45px; color:#215d50;">
                    <i class="fa fa-users"></i>
                </div>
                <h5 class="fw-bold mb-2" style="color:#215d50;">Balai Warga</h5>
                <p class="text-muted small">
                    Sarana pertemuan warga untuk musyawarah, kegiatan sosial, dan program pembinaan desa.
                </p>
            </div>
        </div>

        <!-- TEMPAT IBADAH -->
        <div class="col-md-6 col-lg-4">
            <div class="p-4 shadow-sm rounded-4 text-center h-100"
                style="background: linear-gradient(135deg, #ffeaea 0%, #ffffff 100%); border: 1px solid #ffc6c6;">
                <div class="mb-3" style="font-size: 45px; color:#c44747;">
                    <i class="fa fa-church"></i>
                </div>
                <h5 class="fw-bold mb-2" style="color:#c44747;">Tempat Ibadah</h5>
                <p class="text-muted small">
                    Fasilitas keagamaan untuk menunjang kegiatan spiritual warga dari berbagai golongan.
                </p>
            </div>
        </div>

        <!-- LAPANGAN -->
        <div class="col-md-6 col-lg-4">
            <div class="p-4 shadow-sm rounded-4 text-center h-100"
                style="background: linear-gradient(135deg, #eafff4 0%, #ffffff 100%); border: 1px solid #b3e6ce;">
                <div class="mb-3" style="font-size: 45px; color:#215d50;">
                    <i class="fa fa-futbol"></i>
                </div>
                <h5 class="fw-bold mb-2" style="color:#215d50;">Lapangan Warga</h5>
                <p class="text-muted small">
                    Area serbaguna untuk kegiatan olahraga, lomba 17-an, dan aktivitas pemuda desa.
                </p>
            </div>
        </div>

        <!-- TPS -->
        <div class="col-md-6 col-lg-4">
            <div class="p-4 shadow-sm rounded-4 text-center h-100"
                style="background: linear-gradient(135deg, #f4ffe7 0%, #ffffff 100%); border: 1px solid #d8e7b6;">
                <div class="mb-3" style="font-size: 45px; color:#215d50;">
                    <i class="fa fa-trash-alt"></i>
                </div>
                <h5 class="fw-bold mb-2" style="color:#215d50;">TPS / Tempat Sampah</h5>
                <p class="text-muted small">
                    Tempat pengumpulan sampah sementara sebelum diangkut oleh petugas kebersihan.
                </p>
            </div>
        </div>

    </div>
    </div>
@endsection
