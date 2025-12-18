@extends('layouts.dashboard.app')
@section('content')
<!-- Page Header -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Master RW</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#!">Warga</a></li>
                    <li class="breadcrumb-item"><a href="#!">RT</a></li>
                    <li class="breadcrumb-item active" aria-current="page">RW</li>
                </ol>
            </nav>
        </div>
    </div>
    
    <div class="container mt-4">

        <h3 class="mb-3 fw-bold">Edit RW</h3>

        <div class="card shadow-sm mb-4 rw-form-card">
            <div class="card-body p-4">

                <form action="{{ route('rw.update', $rw) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Nomor RW</label>
                            <input type="text" name="nomor_rw" class="form-control"
                                value="{{ old('nomor_rw', $rw->nomor_rw) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Keterangan</label>
                            <textarea name="keterangan" rows="3" class="form-control">{{ old('keterangan', $rw->keterangan) }}</textarea>
                        </div>

                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('rw.index') }}" class="btn btn-secondary px-4">Batal</a>
                        <button class="btn btn-success px-4">Update</button>
                    </div>

                </form>

            </div>
        </div>

        {{-- Section Fasilitas --}}
        @include('layouts.dashboard.facilities')

    </div>
@endsection
