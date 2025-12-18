@extends('layouts.dashboard.app')
@section('content')

    <div class="container py-4">
        {{-- Kembali --}}
        <a href="{{ route('lembaga.index') }}" class="btn btn-outline-secondary mb-4">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>

        <div class="row">
            {{-- Logo & Info Dasar --}}
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        @php
                            // CARA SAMA SEPERTI PERANGKAT DESA
                            $logo = null;
                            if ($lembaga->media && $lembaga->media->isNotEmpty()) {
                                $m = $lembaga->media->where('mime_type', 'like', 'image%')->first();
                                if (!$m) {
                                    $m = $lembaga->media->first();
                                }
                                if ($m && !empty($m->file_name)) {
                                    $logo = ltrim($m->file_name, '/');
                                }
                            }
                            $lembagaSlug = \Illuminate\Support\Str::slug($lembaga->nama_lembaga ?? 'default');
                            $defaultLogoPath = 'storage/logos/lembaga/' . $lembagaSlug . '.png';
                        @endphp

                        <div class="mb-4">
                            @if ($logo)
                                <img src="{{ asset('storage/' . $logo) }}" alt="Logo {{ $lembaga->nama_lembaga }}"
                                    class="rounded-circle shadow-sm"
                                    style="width:180px; height:180px; object-fit:cover; display:block; margin:0 auto;">
                            @elseif(file_exists(public_path($defaultLogoPath)))
                                <img src="{{ asset($defaultLogoPath) }}" alt="{{ $lembaga->nama_lembaga }}"
                                    class="rounded-circle shadow-sm"
                                    style="width:180px; height:180px; object-fit:cover; display:block; margin:0 auto;">
                            @else
                                <div class="rounded-circle shadow-sm d-flex justify-content-center align-items-center bg-success text-white mx-auto"
                                    style="width:180px; height:180px; margin:0 auto; font-size:70px;">
                                    <i class="fa fa-building"></i>
                                </div>
                            @endif
                        </div>

                        <h4 class="fw-bold">{{ $lembaga->nama_lembaga }}</h4>
                        <p class="text-muted">Lembaga Desa</p>

                        <div class="mt-3">
                            <span class="badge bg-success fs-6">
                                {{ $lembaga->anggota()->whereNull('tgl_selesai')->count() }} Anggota Aktif
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Detail Lembaga --}}
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-4">Detail Informasi Lembaga</h5>

                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Nama Lembaga:</strong> {{ $lembaga->nama_lembaga }}</p>
                                <p><strong>Kontak:</strong> {{ $lembaga->kontak ?? '-' }}</p>
                                <p><strong>Dibuat:</strong> {{ $lembaga->created_at->format('d/m/Y') }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Total Anggota:</strong> {{ $lembaga->anggota->count() }}</p>
                                <p><strong>Total Jabatan:</strong> {{ $lembaga->jabatan->count() }}</p>
                                <p><strong>Terakhir Update:</strong> {{ $lembaga->updated_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>

                        {{-- Deskripsi --}}
                        <hr>
                        <h6 class="fw-bold">Deskripsi Lembaga</h6>
                        <p class="text-justify">{{ $lembaga->deskripsi }}</p>

                        {{-- Anggota Aktif --}}
                        @if ($lembaga->anggota->whereNull('tgl_selesai')->count() > 0)
                            <hr>
                            <h6 class="fw-bold">Anggota Aktif</h6>
                            <div class="table-responsive">
                                <table class="table table-sm table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Mulai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lembaga->anggota->whereNull('tgl_selesai')->take(5) as $anggota)
                                            <tr>
                                                <td>{{ $anggota->warga->nama ?? '-' }}</td>
                                                <td>{{ $anggota->jabatan->nama_jabatan ?? '-' }}</td>
                                                <td>{{ \Carbon\Carbon::parse($anggota->tgl_mulai)->format('d/m/Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if ($lembaga->anggota->whereNull('tgl_selesai')->count() > 5)
                                    <small class="text-muted">
                                        ...dan {{ $lembaga->anggota->whereNull('tgl_selesai')->count() - 5 }} anggota lainnya
                                    </small>
                                @endif
                            </div>
                        @endif

                        {{-- Tombol Action --}}
                        <div class="mt-4 pt-3 border-top">
                            <a href="{{ route('lembaga.edit', $lembaga->lembaga_id) }}"
                                class="btn btn-success me-2">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('lembaga.destroy', $lembaga->lembaga_id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus lembaga ini?')">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </form>
                            <a href="{{ route('anggota-lembaga.index', ['lembaga_id' => $lembaga->lembaga_id]) }}"
                                class="btn btn-info ms-2">
                                <i class="fa fa-users"></i> Lihat Semua Anggota
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
