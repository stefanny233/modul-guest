@extends('layouts.dashboard.app')

@section('content')
<!-- Page Header -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Master RT</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#!">Warga</a></li>
                    <li class="breadcrumb-item active" aria-current="page">RT</li>
                    <li class="breadcrumb-item"><a href="#!">RW</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container mt-4">

        <h3 class="mb-3 fw-bold">Edit RT</h3>

        <div class="card shadow-sm mb-4 rw-form-card">
            <div class="card-body p-4">

                <form action="{{ route('rt.update', $rt) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-4">

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Pilih RW</label>
                            <select name="rw_id" class="form-control form-control-lg">
                                <option value="">-- Pilih RW --</option>
                                @foreach ($rws as $rw)
                                    <option value="{{ $rw->rw_id }}" {{ $rw->rw_id == $rt->rw_id ? 'selected' : '' }}>
                                        {{ $rw->nomor_rw }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Nomor RT</label>
                            <input type="text" name="nomor_rt" class="form-control form-control-lg"
                                value="{{ old('nomor_rt', $rt->nomor_rt) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Ketua RT (Warga)</label>
                            <select name="ketua_rt_warga_id" class="form-control form-control-lg">
                                <option value="">-- Pilih --</option>
                                @foreach ($wargas as $w)
                                    <option value="{{ $w->id }}"
                                        {{ $w->id == $rt->ketua_rt_warga_id ? 'selected' : '' }}>
                                        {{ $w->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Keterangan</label>
                            <textarea name="keterangan" rows="4" class="form-control form-control-lg">{{ old('keterangan', $rt->keterangan) }}</textarea>
                        </div>

                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('rt.index') }}" class="btn btn-secondary px-4">Batal</a>
                        <button class="btn btn-success px-4">Update</button>
                    </div>

                </form>

            </div>
        </div>

        @include('layouts.dashboard.facilities')

    </div>
@endsection
