<!DOCTYPE html>
<html>

<head>
    <title>Data Penduduk</title>
</head>

<body>
    <h1>Data Penduduk</h1>
    <a href="{{ route('penduduk.create') }}">+ Tambah Penduduk</a>
    <br><br>
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="8">
        <tr>
            <th>Nama</th>
            <th>NIK</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Pekerjaan</th>
            <th>Aksi</th>
        </tr>
        @foreach ($penduduk as $p)
            <tr>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->nik }}</td>
                <td>{{ $p->alamat }}</td>
                <td>{{ $p->tanggal_lahir }}</td>
                <td>{{ $p->jenis_kelamin }}</td>
                <td>{{ $p->pekerjaan }}</td>
                <td>
                    <a href="{{ route('penduduk.edit', $p) }}">Edit</a>
                    <form action="{{ route('penduduk.destroy', $p) }}" method="POST" ...>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </table>
