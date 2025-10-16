@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Data Perangkat Desa</h2>
    <a href="{{ route('perangkat_desa.create') }}" class="btn btn-success mb-3">Tambah Data</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Warga</th>
                <th>Jabatan</th>
                <th>Kontak</th>
                <th>Periode</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->warga->nama ?? '-' }}</td>
                    <td>{{ $item->jabatan }}</td>
                    <td>{{ $item->kontak }}</td>
                    <td>{{ $item->periode_mulai }} - {{ $item->periode_selesai }}</td>
                    <td>
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" width="60">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('perangkat_desa.edit', $item->perangkat_id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('perangkat_desa.destroy', $item->perangkat_id) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
