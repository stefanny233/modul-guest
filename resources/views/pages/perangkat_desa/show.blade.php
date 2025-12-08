@extends('layouts.dashboard.app')

@section('content')
    <div class="container py-4">
        {{-- Kembali --}}
        <a href="{{ route('perangkat_desa.index') }}" class="btn btn-outline-secondary mb-4">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>

        <div class="row">
            {{-- Foto --}}
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        @php
                            // PAKAI CARA YANG SAMA SEPERTI DI INDEX
                            $photo = null;
                            if ($perangkat->media && $perangkat->media->isNotEmpty()) {
                                $m = $perangkat->media->where('mime_type', 'like', 'image%')->first();
                                if (!$m) {
                                    $m = $perangkat->media->first();
                                }
                                if ($m && !empty($m->file_name)) {
                                    $photo = ltrim($m->file_name, '/'); // contoh: "media/perangkat_desa/xxx.jpg"
                                }
                            }
                            $jabatanSlug = \Illuminate\Support\Str::slug($perangkat->jabatan ?? 'default');
                            $logoPath = 'storage/logos/' . $jabatanSlug . '.png';
                        @endphp

                        <div class="mb-4">
                            @if ($photo)
                                <img src="{{ asset('storage/' . $photo) }}" alt="Foto {{ $perangkat->jabatan }}"
                                    class="rounded-circle shadow-sm"
                                    style="width:180px; height:180px; object-fit:cover; display:block; margin:0 auto;">
                            @elseif(file_exists(public_path($logoPath)))
                                <img src="{{ asset($logoPath) }}" alt="{{ $perangkat->jabatan }}"
                                    class="rounded-circle shadow-sm"
                                    style="width:180px; height:180px; object-fit:cover; display:block; margin:0 auto;">
                            @else
                                <div class="rounded-circle shadow-sm d-flex justify-content-center align-items-center bg-success text-white mx-auto"
                                    style="width:180px; height:180px; margin:0 auto; font-size:70px;">
                                    <i class="fa fa-user"></i>
                                </div>
                            @endif
                        </div>

                        <h4 class="fw-bold">{{ $perangkat->jabatan }}</h4>
                        <p class="text-muted">{{ $perangkat->warga->nama ?? '-' }}</p>

                        <span class="badge bg-{{ $perangkat->status == 'Aktif' ? 'success' : 'secondary' }}">
                            {{ $perangkat->status }}
                        </span>
                    </div>
                </div>
            </div>

            {{-- Detail --}}
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-4">Detail Informasi</h5>

                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>NIP:</strong> {{ $perangkat->nip ?? '-' }}</p>
                                <p><strong>Kontak:</strong> {{ $perangkat->kontak }}</p>
                                <p><strong>Mulai:</strong> {{ $perangkat->periode_mulai->format('d/m/Y') }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Status:</strong>
                                    <span class="badge bg-{{ $perangkat->status == 'Aktif' ? 'success' : 'secondary' }}">
                                        {{ $perangkat->status }}
                                    </span>
                                </p>
                                <p><strong>Selesai:</strong>
                                    {{ $perangkat->periode_selesai ? $perangkat->periode_selesai->format('d/m/Y') : 'Masih Menjabat' }}
                                </p>
                                <p><strong>Diperbarui:</strong> {{ $perangkat->updated_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>

                        {{-- Data Warga --}}
                        @if ($perangkat->warga)
                            <hr>
                            <h6 class="fw-bold">Data Warga</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>NIK:</strong> {{ $perangkat->warga->no_ktp ?? '-' }}</p>
                                    <p><strong>TTL:</strong> {{ $perangkat->warga->tempat_lahir ?? '-' }},
                                        {{ $perangkat->warga->tanggal_lahir ? \Carbon\Carbon::parse($perangkat->warga->tanggal_lahir)->format('d/m/Y') : '-' }}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Alamat:</strong> {{ $perangkat->warga->alamat ?? '-' }}</p>
                                    <p><strong>Email:</strong> {{ $perangkat->warga->email ?? '-' }}</p>
                                </div>
                            </div>
                        @endif

                        {{-- Tombol --}}
                        <div class="mt-4 pt-3 border-top">
                            <a href="{{ route('perangkat_desa.edit', $perangkat->perangkat_id) }}"
                                class="btn btn-success me-2">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('perangkat_desa.destroy', $perangkat->perangkat_id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus?')">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
