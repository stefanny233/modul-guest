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

    @include('layouts.dashboard.team')
@endsection
