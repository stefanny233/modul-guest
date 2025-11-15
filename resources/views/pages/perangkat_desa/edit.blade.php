@extends('layouts.dashboard.app')
@section('content')

    <div class="container py-5">
        <h1 class="mb-4">Edit Perangkat Desa</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ htmlentities($error) }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('perangkat_desa.update', $perangkat) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="warga_id" class="form-label">Nama Warga</label>
                <select name="warga_id" class="form-control" required>
                    @foreach ($warga as $w)
                        <option value="{{ $w->id }}" {{ $perangkat->warga_id == $w->id ? 'selected' : '' }}>
                            {{ $w->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Jabatan</label>
                <input type="text" name="jabatan" class="form-control" value="{{ $perangkat->jabatan }}" required>
            </div>

            <div class="mb-3">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control" value="{{ $perangkat->nip }}" required>
            </div>

            <div class="mb-3">
                <label>Kontak</label>
                <input type="text" name="kontak" class="form-control" value="{{ $perangkat->kontak }}" required>
            </div>

            <div class="mb-3">
                <label>Periode Mulai</label>
                <input type="date" name="periode_mulai" class="form-control" value="{{ $perangkat->periode_mulai }}"
                    required>
            </div>

            <div class="mb-3">
                <label>Periode Selesai</label>
                <input type="date" name="periode_selesai" class="form-control" value="{{ $perangkat->periode_selesai }}"
                    required>
            </div>

            <!-- FOTO + PREVIEW -->
            <div class="mb-3">
                <label class="form-label">Foto</label>

                <!-- Preview foto lama / baru -->
                <div class="text-center mb-2">
                    <img id="previewFoto"
                        src="{{ $perangkat->foto ? asset('storage/' . $perangkat->foto) : asset('assets-guest/img/team-2.jpg') }}"
                        class="rounded-circle shadow-sm" width="120" height="120" style="object-fit: cover;">
                </div>

                <input type="file" name="foto" class="form-control" onchange="previewImage(event)">
            </div>

            <script>
                function previewImage(event) {
                    const reader = new FileReader();
                    reader.onload = function() {
                        document.getElementById('previewFoto').src = reader.result;
                    };
                    reader.readAsDataURL(event.target.files[0]);
                }
            </script>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

@endsection
