@extends('layouts.dashboard.app')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Master RT</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#!">Data</a></li>
                    <li class="breadcrumb-item"><a href="#!">Data Penduduk</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Perangkat Desa</a></li>
                    <li class="breadcrumb-item"><a href="#!">Lembaga Desa</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-success">Data Perangkat Desa</h3>
            <a href="{{ route('lembaga.create') }}" class="btn btn-success">
                <i class="fa fa-plus me-2"></i> + Master RT
            </a>
        </div>


        {{-- SEARCH & FILTER --}}
        <form method="GET" action="{{ route('rt.index') }}" class="row g-2 mb-3">
            <div class="col-md-5">
                <input type="text" name="q" value="{{ request('q') }}" class="form-control"
                    placeholder="Cari nomor RT, keterangan, atau nama ketua...">
            </div>

            <div class="col-md-3">
                <select name="rw_id" class="form-select">
                    <option value="">Semua RW</option>
                    @if (!empty($rws) && $rws->count())
                        @foreach ($rws as $r)
                            <option value="{{ $r->rw_id }}" {{ request('rw_id') == $r->rw_id ? 'selected' : '' }}>
                                {{ $r->nomor_rw ?? ($r->keterangan ?? $r->rw_id) }}
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
                <button class="btn btn-primary w-100">Cari</button>
            </div>
        </form>

        {{-- TABLE --}}
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>RT ID</th>
                        <th>Nomor RT</th>
                        <th>RW</th>
                        <th>Ketua</th>
                        <th>Keterangan</th>
                        <th style="width:150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rt ?? collect() as $item)
                        <tr>
                            <td>{{ $item->rt_id }}</td>
                            <td>{{ $item->nomor_rt }}</td>
                            <td>{{ optional($item->rw)->nomor_rw ?? (optional($item->rw)->keterangan ?? '-') }}</td>
                            <td>{{ optional($item->ketua)->nama ?? '-' }}</td>
                            <td>{{ $item->keterangan ?? '-' }}</td>
                            <td>
                                <a href="{{ route('rt.edit', $item->rt_id) }}" class="btn btn-sm btn-primary">Edit</a>

                                <form action="{{ route('rt.destroy', $item->rt_id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Hapus RT?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada data RT.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- INFO + PAGINATION --}}
        <div class="d-flex justify-content-between align-items-center mt-3">
            <div>
                @if (isset($rt) && $rt->total() > 0)
                    <small class="text-muted">
                        Menampilkan <strong>{{ $rt->firstItem() ?? 0 }} - {{ $rt->lastItem() ?? 0 }}</strong>
                        dari <strong>{{ $rt->total() }}</strong> RT
                    </small>
                @else
                    <small class="text-muted">Menampilkan 0 RT</small>
                @endif
            </div>

            <div>
                @if (isset($rt))
                    {{ $rt->appends(request()->query())->links('pagination::bootstrap-5') }}
                @endif
            </div>
        </div>
    </div>
@endsection
