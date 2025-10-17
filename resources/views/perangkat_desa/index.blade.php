<!DOCTYPE html>
<html>
<head>
    <title>Data Perangkat Desa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h3>Data Perangkat Desa</h3>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('perangkat_desa.create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Warga</th>
                <th>Jabatan</th>
                <th>Kontak</th>
                <th>Periode</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->warga->nama ?? '-' }}</td>
                    <td>{{ $p->jabatan }}</td>
                    <td>{{ $p->kontak }}</td>
                    <td>{{ $p->periode_mulai }} - {{ $p->periode_selesai }}</td>
                    <td>
                        <a href="{{ route('perangkat_desa.edit', $p->perangkat_id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('perangkat_desa.destroy', $p->perangkat_id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
