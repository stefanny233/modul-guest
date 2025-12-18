@extends('layouts.dashboard.app')

@section('content')
    <!-- Page Header -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Master RT</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#!">Warga</a></li>
                    <li class="breadcrumb-item"><a href="#!">RT</a></li>
                    <li class="breadcrumb-item active" aria-current="page">RW</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-success">Data Perangkat Desa</h3>
            <a href="{{ route('rt.create') }}" class="btn btn-success">
                <i class="fa fa-plus me-2"></i> Master RT
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
                    <option value="">Semua RT</option>
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
    </div>

    @include('layouts.dashboard.facilities')
@endsection
