@extends('layouts.dashboard.app')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-3 animated slideInDown">Tambah Perangkat Desa</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('warga.index') }}">Data Penduduk</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Perangkat Desa</li>
                    <li class="breadcrumb-item"><a href="{{ route('lembaga.index') }}">Lembaga Desa</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('anggota-lembaga.index') }}">Anggota Lmebaga</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('jabatan.index') }}">Jabatan Desa</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    {{-- Tambah Perangkat Desa --}}
    <div class="container py-5">
        <h1 class="mb-4">Tambah Perangkat Desa</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-sm mb-4" style="border:1px solid #ececec; border-radius:6px;">
            <div class="card-body">
                <form action="{{ route('perangkat_desa.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="jabatan" class="form-label">Jabatan <span class="text-danger">*</span></label>
                            <select id="jabatan" name="jabatan" class="form-select @error('jabatan') is-invalid @enderror"
                                required>
                                <option value="">Pilih Jabatan</option>
                                @foreach ($daftarJabatan as $j)
                                    <option value="{{ $j }}" {{ old('jabatan') == $j ? 'selected' : '' }}>
                                        {{ $j }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jabatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="warga_id" class="form-label">Nama Warga <span class="text-danger">*</span></label>
                            <select id="warga_id" name="warga_id"
                                class="form-select @error('warga_id') is-invalid @enderror" required>
                                <option value="">Pilih Warga</option>
                                @foreach ($warga as $w)
                                    <option value="{{ $w->id }}" {{ old('warga_id') == $w->id ? 'selected' : '' }}>
                                        {{ $w->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('warga_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="nip" class="form-label">NIP</label>
                            <input id="nip" type="text" name="nip"
                                class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip') }}"
                                placeholder="NIP (opsional)">
                            @error('nip')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="kontak" class="form-label">Kontak <span class="text-danger">*</span></label>
                            <input id="kontak" type="text" name="kontak"
                                class="form-control @error('kontak') is-invalid @enderror" value="{{ old('kontak') }}"
                                placeholder="Nomor / Email" required>
                            @error('kontak')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="periode_selesai" class="form-label">Periode Selesai</label>
                            <input id="periode_selesai" type="date" name="periode_selesai"
                                class="form-control @error('periode_selesai') is-invalid @enderror"
                                value="{{ old('periode_selesai') }}">
                            @error('periode_selesai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="periode_mulai" class="form-label">Periode Mulai <span
                                    class="text-danger">*</span></label>
                            <input id="periode_mulai" type="date" name="periode_mulai"
                                class="form-control @error('periode_mulai') is-invalid @enderror"
                                value="{{ old('periode_mulai') }}" required>
                            @error('periode_mulai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Upload files --}}
                        <div class="col-12">
                            <label for="filesInput" class="form-label">Upload File / Foto (opsional)</label>
                            <input id="filesInput" type="file" name="files[]" class="form-control" multiple
                                accept=".jpg,.jpeg,.png,.webp,.pdf,.doc,.docx,.xlsx">
                            <div class="form-text">Bisa upload beberapa file sekaligus (gambar / dokumen).</div>

                            <div id="previewList" class="d-flex flex-wrap gap-2 mt-3"></div>

                            @error('files')
                                <div class="text-danger small mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4 d-flex justify-content-end gap-2">
                        <a href="{{ route('perangkat_desa.index') }}" class="btn btn-outline-secondary">Batal</a>
                        <button type="submit" class="btn btn-success">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- preview JS: taruh langsung di bawah (atau pindah ke layout jika pakai @stack('scripts')) --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('filesInput');
            const preview = document.getElementById('previewList');

            function clearPreview() {
                preview.innerHTML = '';
            }

            function makeThumb(file) {
                const wrapper = document.createElement('div');
                wrapper.style.width = '120px';
                wrapper.style.padding = '6px';
                wrapper.style.borderRadius = '6px';
                wrapper.style.textAlign = 'center';
                wrapper.style.background = '#fff';
                wrapper.style.boxShadow = '0 1px 3px rgba(0,0,0,0.06)';
                wrapper.style.border = '1px solid #f0f0f0';

                if (file.type.startsWith('image/')) {
                    const img = document.createElement('img');
                    img.style.width = '100%';
                    img.style.height = '80px';
                    img.style.objectFit = 'cover';
                    img.style.borderRadius = '4px';
                    wrapper.appendChild(img);

                    const reader = new FileReader();
                    reader.onload = (e) => img.src = e.target.result;
                    reader.readAsDataURL(file);
                } else {
                    const name = document.createElement('div');
                    name.style.height = '80px';
                    name.style.display = 'flex';
                    name.style.alignItems = 'center';
                    name.style.justifyContent = 'center';
                    name.innerHTML = '<small class="text-muted">' + file.name + '</small>';
                    wrapper.appendChild(name);
                }

                const caption = document.createElement('div');
                caption.style.fontSize = '12px';
                caption.style.marginTop = '6px';
                caption.textContent = file.name.length > 18 ? file.name.slice(0, 18) + '...' : file.name;
                wrapper.appendChild(caption);

                return wrapper;
            }

            input?.addEventListener('change', function(e) {
                clearPreview();
                const files = Array.from(e.target.files || []);
                files.forEach(f => preview.appendChild(makeThumb(f)));
            });
        });
    </script>


    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="section-title bg-white text-center text-success px-3">TIM KAMI</p>
                <h1 class="display-6 mb-4 fw-bold text-dark"> Kenali Sosok di Balik Program Bina Desa </h1>
            </div>
            <div class="row g-4 justify-content-center"> <!-- Stefanny Huang -->
                <div class="col-md-6 col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="team-item text-center rounded-4 shadow-sm p-4 h-100"
                        style="background: linear-gradient(135deg, #e8f9f0 0%, #fffbe6 100%); border: 2px solid #198754;">
                        <div class="d-flex justify-content-center align-items-center mb-3"
                            style="width: 120px; height: 120px; border-radius: 50%; background-color: #198754; color: white; font-size: 48px; margin: 0 auto;">
                            <i class="fa fa-user"></i>
                        </div>
                        <h3 class="text-success mb-1">Stefanny Huang</h3> <span
                            class="text-muted mb-3 d-block">Koordinator
                            Program Pemberdayaan</span>
                        <p class="text-secondary small"> Memimpin inisiatif pemberdayaan masyarakat melalui pelatihan
                            kewirausahaan dan pendidikan keterampilan warga desa. </p>
                        <div class="d-flex justify-content-center mt-3"> <a
                                class="btn btn-square btn-outline-success mx-1" href="#!"><i
                                    class="fab fa-facebook-f"></i></a> <a class="btn btn-square btn-outline-success mx-1"
                                href="#!"><i class="fab fa-instagram"></i></a> <a
                                class="btn btn-square btn-outline-success mx-1" href="#!"><i
                                    class="fab fa-linkedin-in"></i></a> </div>
                    </div>
                </div> <!-- Febby Fahrezy -->
                <div class="col-md-6 col-lg-5 wow fadeIn" data-wow-delay="0.3s">
                    <div class="team-item text-center rounded-4 shadow-sm p-4 h-100"
                        style="background: linear-gradient(135deg, #fffbe6 0%, #e8f9f0 100%); border: 2px solid #ffc107;">
                        <div class="d-flex justify-content-center align-items-center mb-3"
                            style="width: 120px; height: 120px; border-radius: 50%; background-color: #ffc107; color: white; font-size: 48px; margin: 0 auto;">
                            <i class="fa fa-user-tie"></i>
                        </div>
                        <h3 class="text-success mb-1">Febby Fahrezy</h3> <span class="text-muted mb-3 d-block">Kepala
                            Bidang Infrastruktur Desa</span>
                        <p class="text-secondary small"> Mengawasi proyek pembangunan desa dan memastikan fasilitas
                            publik berjalan sesuai visi Desa Sejahtera yang berkelanjutan. </p>
                        <div class="d-flex justify-content-center mt-3"> <a
                                class="btn btn-square btn-outline-warning mx-1" href="#!"><i
                                    class="fab fa-facebook-f"></i></a> <a class="btn btn-square btn-outline-warning mx-1"
                                href="#!"><i class="fab fa-instagram"></i></a> <a
                                class="btn btn-square btn-outline-warning mx-1" href="#!"><i
                                    class="fab fa-linkedin-in"></i></a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->
@endsection
