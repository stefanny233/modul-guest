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
                <select name="warga_id" id="warga_id" class="form-control" required>
                    <option value="">-- Pilih Warga --</option>
                    @foreach ($warga as $w)
                        <option value="{{ $w->id }}"
                            {{ old('warga_id', $perangkat->warga_id) == $w->id ? 'selected' : '' }}>
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
                <input type="text" name="nip" class="form-control" value="{{ $perangkat->nip }}">
            </div>

            <div class="mb-3">
                <label>Kontak</label>
                <input type="text" name="kontak" class="form-control" value="{{ $perangkat->kontak }}" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Periode Mulai</label>
                    <input type="date" name="periode_mulai" class="form-control"
                        value="{{ optional($perangkat->periode_mulai)->format('Y-m-d') }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Periode Selesai</label>
                    <input type="date" name="periode_selesai" class="form-control"
                        value="{{ optional($perangkat->periode_selesai)->format('Y-m-d') }}">
                </div>
            </div>

            <!-- EXISTING MEDIA -->
            <div class="mb-3">
                <label class="form-label">File / Foto Terlampir</label>
                <div class="d-flex flex-wrap gap-2">

                    @forelse($perangkat->media as $m)
                        @php
                            // normalize filename (some rows mungkin sudah simpan leading slash)
                            $fn = ltrim($m->file_name ?? '', '/');

                            // apakah file ada di public/storage ?
                            $publicPath = public_path('storage/' . $fn);
                            $publicUrl = $fn && file_exists($publicPath) ? asset('storage/' . $fn) : null;

                            // deteksi image: prefer mime_type, fallback ke ekstensi
                            $isImage = false;
                            if (!empty($m->mime_type) && str_starts_with($m->mime_type, 'image')) {
                                $isImage = true;
                            } else {
                                $ext = strtolower(pathinfo($fn, PATHINFO_EXTENSION));
                                $imageExts = ['jpg', 'jpeg', 'png', 'webp', 'gif', 'svg'];
                                if (in_array($ext, $imageExts)) {
                                    $isImage = true;
                                }
                            }
                        @endphp

                        <div class="border p-2 rounded text-center" style="width:160px;">
                            @if ($isImage && $publicUrl)
                                <a href="{{ $publicUrl }}" target="_blank">
                                    <img src="{{ $publicUrl }}" style="width:100%; height:100px; object-fit:cover;">
                                </a>
                            @elseif ($isImage)
                                {{-- file gambar tercatat tapi tidak ditemukan di public/storage --}}
                                <div
                                    style="width:100%;height:100px;display:flex;align-items:center;justify-content:center;background:#f8f9fa;">
                                    <small class="text-muted">Image (file missing)</small>
                                </div>
                            @else
                                {{-- non-image file --}}
                                @if ($publicUrl)
                                    <a href="{{ $publicUrl }}" target="_blank"
                                        style="height:100px;display:flex;align-items:center;justify-content:center;">
                                        <small>{{ basename($fn) }}</small>
                                    </a>
                                @else
                                    <div style="height:100px;display:flex;align-items:center;justify-content:center;">
                                        <small>{{ basename($fn) }}</small>
                                    </div>
                                @endif
                            @endif

                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" name="delete_media[]"
                                    value="{{ $m->media_id }}" id="del_{{ $m->media_id }}">
                                <label for="del_{{ $m->media_id }}">Hapus</label>
                            </div>
                        </div>

                    @empty
                        <div class="text-muted">Tidak ada file terlampir.</div>
                    @endforelse

                </div>
            </div>


            <!-- Upload baru -->
            <div class="mb-3">
                <label>Upload File / Foto Baru</label>
                <input type="file" name="files[]" id="filesInput" class="form-control" multiple>
                <div id="previewList" class="d-flex flex-wrap gap-2 mt-3"></div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('perangkat_desa.index') }}" class="btn btn-secondary">Kembali</a>
            </div>

        </form>
    </div>

    <script>
        document.getElementById('filesInput').addEventListener('change', function(e) {
            const preview = document.getElementById('previewList');
            preview.innerHTML = '';
            const files = [...e.target.files];
            files.forEach(file => {
                const wrapper = document.createElement('div');
                wrapper.style.width = '120px';
                wrapper.className = 'border p-1 rounded text-center';

                if (file.type.startsWith('image/')) {
                    const img = document.createElement('img');
                    img.style.width = '100%';
                    img.style.height = '80px';
                    img.style.objectFit = 'cover';
                    wrapper.appendChild(img);

                    const reader = new FileReader();
                    reader.onload = ev => img.src = ev.target.result;
                    reader.readAsDataURL(file);
                } else {
                    wrapper.textContent = file.name;
                }

                preview.appendChild(wrapper);
            });
        });
    </script>

@endsection
