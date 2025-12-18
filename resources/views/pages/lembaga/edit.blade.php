@extends('layouts.dashboard.app')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Lembaga Desa</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('warga.index') }}">Data Penduduk</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('perangkat_desa.index') }}">Perangkat Desa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lembaga Desa</li>
                    <li class="breadcrumb-item"><a href="{{ route('anggota-lembaga.index') }}">Anggota Lmebaga</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('jabatan.index') }}">Jabatan Desa</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white py-3 border-bottom">
                        <h4 class="mb-0">Edit Lembaga Desa</h4>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('lembaga.update', $lembaga) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- Logo di edit --}}
                            <!-- Logo Section -->
                            <div class="mb-4">
                                <label class="form-label fw-medium mb-2">Logo Saat Ini</label>
                                <div class="d-flex align-items-center gap-3">
                                    @php
                                        $logo = null;
                                        if ($lembaga->media && $lembaga->media->isNotEmpty()) {
                                            $m = $lembaga->media->where('mime_type', 'like', 'image%')->first();
                                            if (!$m) {
                                                $m = $lembaga->media->first();
                                            }
                                            if ($m && !empty($m->file_name)) {
                                                $logo = ltrim($m->file_name, '/');
                                            }
                                        }
                                    @endphp

                                    @if ($logo)
                                        <img src="{{ asset('storage/' . $logo) }}" width="100" height="100"
                                            class="rounded border" style="object-fit: cover;">
                                        <div>
                                            <p class="mb-1"><strong>Logo saat ini:</strong></p>
                                            <p class="text-muted mb-0">Format: {{ pathinfo($logo, PATHINFO_EXTENSION) }}</p>
                                            <div class="form-check mt-2">
                                                <input class="form-check-input" type="checkbox" name="delete_logo"
                                                    value="1" id="deleteLogo">
                                                <label class="form-check-label" for="deleteLogo">
                                                    Hapus logo
                                                </label>
                                            </div>
                                        </div>
                                    @else
                                        <div class="text-center py-4 px-4 border rounded bg-light w-100">
                                            <i class="fas fa-image fa-2x text-muted mb-2"></i>
                                            <p class="text-muted mb-0">Belum ada logo</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!-- New Logo Input -->
                            <div class="mb-4">
                                <label class="form-label fw-medium mb-2">Ganti Logo (opsional)</label>
                                <input type="file" name="logo" id="logoInput" class="form-control" accept="image/*">
                                <small class="text-muted">Format: JPG, PNG, SVG. Maks: 2MB</small>

                                <div id="logoPreview" class="mt-3"></div>
                            </div>

                            <hr class="my-4">

                            <!-- Form Fields -->
                            <div class="mb-3">
                                <label class="form-label fw-medium">Nama Lembaga <span class="text-danger">*</span></label>
                                <input type="text" name="nama_lembaga"
                                    class="form-control @error('nama_lembaga') is-invalid @enderror"
                                    value="{{ old('nama_lembaga', $lembaga->nama_lembaga) }}" required>
                                @error('nama_lembaga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-medium">Deskripsi <span class="text-danger">*</span></label>
                                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4" required>{{ old('deskripsi', $lembaga->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-medium">Kontak</label>
                                <input type="text" name="kontak"
                                    class="form-control @error('kontak') is-invalid @enderror"
                                    value="{{ old('kontak', $lembaga->kontak) }}">
                                @error('kontak')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Action Buttons -->
                            {{-- UPLOAD BARU --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Upload File / Foto Baru</label>
                                <input type="file" name="files[]" id="filesInput" class="form-control" multiple>
                                <div id="previewList" class="d-flex flex-wrap gap-2 mt-3"></div>
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('lembaga.index') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Preview logo baru
        document.getElementById('logoInput')?.addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('logoPreview');

            if (!file) {
                preview.innerHTML = '';
                return;
            }

            if (!file.type.startsWith('image/')) {
                preview.innerHTML = '<div class="alert alert-warning mt-2">File harus berupa gambar</div>';
                return;
            }

            if (file.size > 2 * 1024 * 1024) { // 2MB
                preview.innerHTML = '<div class="alert alert-warning mt-2">Ukuran file maksimal 2MB</div>';
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `
                    <div class="border rounded p-3 bg-light">
                        <label class="form-label fw-bold">Preview Logo Baru:</label>
                        <div class="d-flex align-items-center gap-3">
                            <img src="${e.target.result}"
                                 style="width: 120px; height: 120px; object-fit: contain; border: 2px solid #28a745; border-radius: 8px;">
                            <div>
                                <p class="mb-1"><strong>Nama file:</strong> ${file.name}</p>
                                <p class="mb-1"><strong>Ukuran:</strong> ${(file.size / 1024).toFixed(2)} KB</p>
                                <p class="mb-0"><strong>Tipe:</strong> ${file.type}</p>
                            </div>
                        </div>
                    </div>
                `;
            };
            reader.readAsDataURL(file);
        });
    </script>
@endsection
