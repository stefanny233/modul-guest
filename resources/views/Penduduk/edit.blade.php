<!DOCTYPE html>
<html>
<head>
    <title>Edit Penduduk</title>
</head>
<body>
    <h1>Edit Data Penduduk</h1>

    <form action="{{ route('penduduk.update', $penduduk->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nama:</label><br>
        <input type="text" name="nama" value="{{ $penduduk->nama }}"><br><br>

        <label>NIK:</label><br>
        <input type="text" name="nik" value="{{ $penduduk->nik }}"><br><br>

        <label>Alamat:</label><br>
        <textarea name="alamat">{{ $penduduk->alamat }}</textarea><br><br>

        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
