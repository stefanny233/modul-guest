@extends('layouts.dashboard.app')
@section('content')
    <!-- Features Start -->
    <div class="container">

        <div class="d-flex justify-content-between mb-3">
            <h3>Data Lembaga Desa</h3>
            <a href="{{ route('lembaga.create') }}" class="btn btn-primary">+ Tambah Lembaga</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Logo</th>
                    <th>Nama Lembaga</th>
                    <th>Deskripsi</th>
                    <th>Kontak</th>
                    <th width="200px">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($lembaga as $l)
                    <tr>
                        <td>
                            @if ($l->logo)
                                <img src="{{ asset('storage/' . $l->logo) }}" alt="Logo" width="60" height="60"
                                    style="object-fit: cover; border-radius: 8px;">
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>

                        <td>{{ $l->nama_lembaga }}</td>

                        <td>{{ Str::limit($l->deskripsi, 60) }}</td>

                        <td>{{ $l->kontak ?? '-' }}</td>

                        <td>
                            <a href="{{ route('lembaga.edit', $l->lembaga_id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('lembaga.destroy', $l->lembaga_id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Hapus lembaga ini?')">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada data lembaga.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- Features End -->


    <!-- Newsletter Start -->
    <div class="container-fluid bg-primary py-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-6 mb-4">Subscribe the Newsletter</h1>
                    <div class="position-relative w-100 mb-2">
                        <input class="form-control border-0 w-100 ps-4 pe-5" type="text" placeholder="Enter Your Email"
                            style="height: 60px;">
                        <button type="button"
                            class="btn btn-lg-square shadow-none position-absolute top-0 end-0 mt-2 me-2"><i
                                class="fa fa-paper-plane text-primary fs-4"></i></button>
                    </div>
                    <p class="mb-0">Don't worry, we won't spam you with emails.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter End -->
@endsection
