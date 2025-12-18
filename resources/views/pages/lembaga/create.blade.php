@extends('layouts.dashboard.app')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Tambah Lembaga Desa</h1>
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

    <div class="container py-5">
        <h1 class="mb-4">Tambah Lembaga Desa</h1>

        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form action="{{ route('lembaga.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama_lembaga" class="form-label">Nama Lembaga <span
                                    class="text-danger">*</span></label>
                            <select name="nama_lembaga" id="nama_lembaga"
                                class="form-select @error('nama_lembaga') is-invalid @enderror" required>
                                <option value="">-- Pilih Lembaga --</option>
                                @foreach ($daftarLembaga as $item)
                                    <option value="{{ $item }}"
                                        {{ old('nama_lembaga') == $item ? 'selected' : '' }}>
                                        {{ $item }}
                                    </option>
                                @endforeach
                            </select>
                            @error('nama_lembaga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kontak</label>
                            <input type="text" name="kontak" class="form-control @error('kontak') is-invalid @enderror"
                                value="{{ old('kontak') }}" placeholder="Nomor / Email / IG">
                            @error('kontak')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4" required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Logo (optional)</label>
                        <input type="file" name="logo" id="logoInput"
                            class="form-control @error('logo') is-invalid @enderror" accept="image/*">
                        <small class="text-muted">Format: JPG, PNG, SVG. Maks: 2MB</small>
                        @error('logo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <div id="logoPreview" class="mt-3"></div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save me-1"></i> Simpan
                        </button>
                        <a href="{{ route('lembaga.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Team block -->
        <div class="py-4">
            <div class="text-center mx-auto" style="max-width:600px;">
                <p class="section-title bg-white text-center text-success px-3">TIM KAMI</p>
                <h2 class="display-6 mb-4 fw-bold text-dark">Kenali Sosok di Balik Program Bina Desa</h2>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- Stefanny Huang -->
                <div class="col-md-6 col-lg-5">
                    <div class="team-item text-center rounded-4 shadow-sm p-4 h-100"
                        style="background: linear-gradient(135deg,#e8f9f0 0%,#fffbe6 100%); border:2px solid #198754;">
                        <div class="mb-3 mx-auto"
                            style="width:120px; height:120px; border-radius:50%; background:#198754; color:#fff; display:flex; align-items:center; justify-content:center; font-size:48px;">
                            <i class="fa fa-user"></i>
                        </div>
                        <h5 class="text-success mb-1">Stefanny Huang</h5>
                        <small class="text-muted d-block mb-3">Koordinator Program Pemberdayaan</small>
                        <p class="text-secondary small">Memimpin inisiatif pemberdayaan masyarakat melalui pelatihan
                            kewirausahaan dan pendidikan keterampilan warga desa.</p>
                    </div>
                </div>

                <!-- Febby Fahrezy -->
                <div class="col-md-6 col-lg-5">
                    <div class="team-item text-center rounded-4 shadow-sm p-4 h-100"
                        style="background: linear-gradient(135deg,#fffbe6 0%,#e8f9f0 100%); border:2px solid #ffc107;">
                        <div class="mb-3 mx-auto"
                            style="width:120px; height:120px; border-radius:50%; background:#ffc107; color:#fff; display:flex; align-items:center; justify-content:center; font-size:48px;">
                            <i class="fa fa-user-tie"></i>
                        </div>
                        <h5 class="text-success mb-1">Febby Fahrezy</h5>
                        <small class="text-muted d-block mb-3">Kepala Bidang Infrastruktur Desa</small>
                        <p class="text-secondary small">Mengawasi proyek pembangunan desa dan memastikan fasilitas publik
                            berjalan sesuai visi Desa Sejahtera yang berkelanjutan.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Team block -->
    </div>

    <script>
        // Preview logo untuk create
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

            if (file.size > 2 * 1024 * 1024) {
                preview.innerHTML = '<div class="alert alert-warning mt-2">Ukuran file maksimal 2MB</div>';
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `
                    <div class="border rounded p-3 bg-light">
                        <label class="form-label fw-bold">Preview Logo:</label>
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
