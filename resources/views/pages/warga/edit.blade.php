@extends('layouts.dashboard.app')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Edit Data Warga</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#!">Home</a></li>
                    <li class="breadcrumb-item"><a href="#!">Data User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Penduduk</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container mt-4 mb-5">
        <div class="card shadow-sm border border-success-subtle" style="border-radius:14px;">
            <div class="card-body p-4">

                <h4 class="fw-bold text-success mb-4">Form Edit Warga</h4>

                <form action="{{ route('warga.update', $warga->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">No KTP</label>
                            <input type="text" name="no_ktp" value="{{ $warga->no_ktp }}" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" value="{{ $warga->nama }}" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select" required>
                                <option value="Laki-laki" {{ $warga->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>
                                <option value="Perempuan" {{ $warga->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Agama</label>
                            <input type="text" name="agama" value="{{ $warga->agama }}" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Pekerjaan</label>
                            <input type="text" name="pekerjaan" value="{{ $warga->pekerjaan }}" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">No. Telp</label>
                            <input type="text" name="telp" value="{{ $warga->telp }}" class="form-control">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="{{ $warga->email }}" class="form-control">
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('warga.index') }}" class="btn btn-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
