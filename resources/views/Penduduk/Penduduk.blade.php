<!DOCTYPE html>
<html>
<head>
    <title>Data Penduduk</title>
</head>
<body>
    <h1>Daftar Penduduk</h1>
    <table border="1" cellpadding="5">
        <tr>
            <th>Nama</th>
            <th>NIK</th>
            <th>Alamat</th>
        </tr>
        @foreach($penduduk as $p)
        <tr>
            <td>{{ $p['nama'] }}</td>
            <td>{{ $p['nik'] }}</td>
            <td>{{ $p['alamat'] }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
