<!DOCTYPE html>
<html>
<head>
    <title>Data Lembaga Desa</title>
</head>
<body>
    <h1>Daftar Lembaga Desa</h1>
    <ul>
        @foreach($lembaga as $item)
            <li>{{ $item['nama'] }} - Ketua: {{ $item['ketua'] }}</li>
        @endforeach
    </ul>
</body>
</html>
