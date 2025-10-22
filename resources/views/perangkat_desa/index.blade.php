@extends('layouts.guest')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Perangkat Desa</h5>
        <a href="{{ route('perangkat_desa.create') }}" class="btn btn-primary btn-sm">
            + Tambah Perangkat
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success m-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Warga</th>
                    <th>NIK</th>
                    <th>Jabatan</th>
                    <th>Kontak</th>
                    <th>Periode</th>
                    <th style="width: 25%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        {{-- Mengambil data relasi dengan aman --}}
                        <td>{{ optional($d->warga)->nama ?? 'N/A' }}</td>
                        <td>{{ optional($d->warga)->nik ?? 'N/A' }}</td>

                        <td>{{ $d->jabatan }}</td>
                        <td>{{ $d->kontak }}</td>
                        <td>{{ $d->periode_mulai }} s/d {{ $d->periode_selesai }}</td>
                        <td>
                            {{-- Tombol "Edit Warga" (Permintaanmu) --}}
                            {{-- Cek dulu jika data warganya ada --}}
                            @if ($d->warga)
                                {{-- Jika ada, arahkan ke route penduduk.edit --}}
                                <a href="{{ route('penduduk.edit', $d->warga) }}" class="btn btn-info btn-sm" title="Edit Data Warga">
                                    Edit Warga
                                </a>
                            @else
                                {{-- Jika data warga terhapus/kosong, tombol di-disable --}}
                                <button class="btn btn-info btn-sm" disabled title="Data warga tidak ditemukan">
                                    Edit Warga
                                </button>
                            @endif

                            {{-- Tombol "Edit Jabatan" (Data Perangkat) --}}
                            <a href="{{ route('perangkat_desa.edit', $d->id) }}" class="btn btn-warning btn-sm" title="Edit Jabatan/Periode">
                                Edit Jabatan
                            </a>

                            {{-- Tombol "Hapus" --}}
                            <form action="{{ route('perangkat_desa.destroy', $d->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                {{-- INI TYPO-NYA, SUDAH SAYA PERBAIKI --}}
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            Belum ada data perangkat desa.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

