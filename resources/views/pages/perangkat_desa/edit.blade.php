@extends('layouts.dashboard.app')
@section('content')

    <!-- Page Header -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Edit Perangkat Desa</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#!">Home</a></li>
                    <li class="breadcrumb-item"><a href="#!">Perangkat Desa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container mt-4">

        <h3 class="mb-3 fw-bold">Form Edit Perangkat Desa</h3>

        <div class="card shadow-sm mb-4 rw-form-card">
            <div class="card-body p-4">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ htmlentities($error) }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('perangkat_desa.update', $perangkat) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Warga</label>
                            <select name="warga_id" class="form-select" required>
                                <option value="">-- Pilih Warga --</option>
                                @foreach ($warga as $w)
                                    <option value="{{ $w->id }}"
                                        {{ old('warga_id', $perangkat->warga_id) == $w->id ? 'selected' : '' }}>
                                        {{ $w->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" value="{{ $perangkat->jabatan }}"
                                required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">NIP</label>
                            <input type="text" name="nip" class="form-control" value="{{ $perangkat->nip }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kontak</label>
                            <input type="text" name="kontak" class="form-control" value="{{ $perangkat->kontak }}"
                                required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Periode Mulai</label>
                            <input type="date" name="periode_mulai" class="form-control"
                                value="{{ optional($perangkat->periode_mulai)->format('Y-m-d') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Periode Selesai</label>
                            <input type="date" name="periode_selesai" class="form-control"
                                value="{{ optional($perangkat->periode_selesai)->format('Y-m-d') }}">
                        </div>
                    </div>

                    {{-- FILE LAMA --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold">File / Foto Terlampir</label>
                        <div class="d-flex flex-wrap gap-3">
                            @forelse($perangkat->media as $m)
                                @php
                                    $fn = ltrim($m->file_name ?? '', '/');
                                    $publicPath = public_path('storage/' . $fn);
                                    $publicUrl = $fn && file_exists($publicPath) ? asset('storage/' . $fn) : null;
                                    $isImage = !empty($m->mime_type) && str_starts_with($m->mime_type, 'image');
                                @endphp

                                <div class="border rounded p-2 text-center" style="width:160px;">
                                    @if ($isImage && $publicUrl)
                                        <img src="{{ $publicUrl }}" style="width:100%;height:100px;object-fit:cover;">
                                    @else
                                        <div style="height:100px;display:flex;align-items:center;justify-content:center;">
                                            <small>{{ basename($fn) }}</small>
                                        </div>
                                    @endif

                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" name="delete_media[]"
                                            value="{{ $m->media_id }}" id="del_{{ $m->media_id }}">
                                        <label class="form-check-label" for="del_{{ $m->media_id }}">
                                            Hapus
                                        </label>
                                    </div>
                                </div>
                            @empty
                                <span class="text-muted">Tidak ada file terlampir.</span>
                            @endforelse
                        </div>
                    </div>

                    {{-- UPLOAD BARU --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Upload File / Foto Baru</label>
                        <input type="file" name="files[]" id="filesInput" class="form-control" multiple>
                        <div id="previewList" class="d-flex flex-wrap gap-2 mt-3"></div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('perangkat_desa.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    {{-- Preview Upload --}}
    <script>
        document.getElementById('filesInput').addEventListener('change', function(e) {
            const preview = document.getElementById('previewList');
            preview.innerHTML = '';
            [...e.target.files].forEach(file => {
                const box = document.createElement('div');
                box.className = 'border rounded p-1 text-center';
                box.style.width = '120px';

                if (file.type.startsWith('image/')) {
                    const img = document.createElement('img');
                    img.style.width = '100%';
                    img.style.height = '80px';
                    img.style.objectFit = 'cover';
                    box.appendChild(img);

                    const reader = new FileReader();
                    reader.onload = e => img.src = e.target.result;
                    reader.readAsDataURL(file);
                } else {
                    box.innerHTML = `<small>${file.name}</small>`;
                }
                preview.appendChild(box);
            });
        });
    </script>

@endsection
