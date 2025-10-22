<!DOCTYPE html>
<html>
<head>
    <title>Data Modul (Guest)</title>
</head>
<body>
    <h1>Daftar Modul (Guest)</h1>
    <ul>
        @foreach($modules as $m)
            <li>{{ $m['nama'] }} - {{ $m['deskripsi'] }}</li>
        @endforeach
    </ul>
</body>
</html>
