<!DOCTYPE html>
<html>
<head>
    <title>Tambah Penduduk</title>
</head>
<body>
    <h1>Tambah Penduduk Baru</h1>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    {{-- Pesan error validasi --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('penduduk.store') }}" method="POST">
        @csrf
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>NIK:</label><br>
        <input type="text" name="nik" maxlength="16" required><br><br>

        <label>Alamat:</label><br>
        <input type="text" name="alamat" required><br><br>

        <label>Tanggal Lahir:</label><br>
        <input type="date" name="tanggal_lahir" required><br><br>

        <label>Jenis Kelamin:</label><br>
        <select name="jenis_kelamin" required>
            <option value="">-- Pilih --</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select><br><br>

        <label>Pekerjaan:</label><br>
        <input type="text" name="pekerjaan" required><br><br>

        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="{{ route('penduduk.index') }}">← Kembali ke Daftar Penduduk</a>
</body>
</html>
