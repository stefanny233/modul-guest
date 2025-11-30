@extends('layouts.dashboard.app')
@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-success">Master RW</h3>
            <a href="{{ route('rw.create') }}" class="btn btn-success">
                <i class="fa fa-plus me-2"></i> Tambah RW
            </a>
        </div>

        <form method="GET" action="{{ route('rw.index') }}" class="row g-2 mb-3">
            <div class="col-md-8">
                <input type="text" name="q" value="{{ request('q') }}" class="form-control"
                    placeholder="Cari nomor atau keterangan...">
            </div>
            <div class="col-md-2">
                <select name="per_page" class="form-select" onchange="this.form.submit()">
                    @foreach ([6, 9, 12, 15, 24] as $opt)
                        <option value="{{ $opt }}" {{ (int) request('per_page', 15) === $opt ? 'selected' : '' }}>
                            {{ $opt }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2"><button class="btn btn-primary w-100">Cari</button></div>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>RW ID</th>
                    <th>Nomor RW</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rws as $rw)
                    <tr>
                        <td>{{ $rw->rw_id }}</td>
                        <td>{{ $rw->nomor_rw }}</td>
                        <td>{{ $rw->keterangan }}</td>
                        <td>
                            <a href="{{ route('rw.edit', $rw) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('rw.destroy', $rw) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Hapus RW?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada data RW.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- pagination (center) --}}
        <div class="d-flex justify-content-center mt-3">
            {{ $rws->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <div class="container my-5">

        <div class="text-center mb-4">
            <p class="section-title bg-white px-3" style="color:#215d50; border-left:4px solid #e3a83a;">FASILITAS WILAYAH
            </p>
            <h2 class="fw-bold" style="color:#215d50;">Fasilitas Umum di Wilayah RW/RT</h2>
            <p class="text-muted">Berikut daftar fasilitas desa yang tersedia dan dapat dimanfaatkan oleh warga.</p>
        </div>

        <div class="row g-4">

            <!-- POS RONDA -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 shadow-sm rounded-4 text-center h-100"
                    style="background: linear-gradient(135deg, #edf7f3 0%, #ffffff 100%); border: 1px solid #b8d9cd;">
                    <div class="mb-3" style="font-size: 45px; color:#215d50;">
                        <i class="fa fa-shield-alt"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color:#215d50;">Pos Ronda</h5>
                    <p class="text-muted small">
                        Tempat penjagaan keamanan lingkungan yang aktif setiap malam oleh warga setempat.
                    </p>
                </div>
            </div>

            <!-- POSYANDU -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 shadow-sm rounded-4 text-center h-100"
                    style="background: linear-gradient(135deg, #fff7df 0%, #ffffff 100%); border: 1px solid #f4d79b;">
                    <div class="mb-3" style="font-size: 45px; color:#e3a83a;">
                        <i class="fa fa-baby"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color:#e3a83a;">Posyandu</h5>
                    <p class="text-muted small">
                        Layanan kesehatan ibu & anak dengan kegiatan rutin seperti timbang balita dan imunisasi.
                    </p>
                </div>
            </div>

            <!-- BALAI WARGA -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 shadow-sm rounded-4 text-center h-100"
                    style="background: linear-gradient(135deg, #edf2ff 0%, #ffffff 100%); border: 1px solid #c2cff5;">
                    <div class="mb-3" style="font-size: 45px; color:#215d50;">
                        <i class="fa fa-users"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color:#215d50;">Balai Warga</h5>
                    <p class="text-muted small">
                        Sarana pertemuan warga untuk musyawarah, kegiatan sosial, dan program pembinaan desa.
                    </p>
                </div>
            </div>

            <!-- TEMPAT IBADAH -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 shadow-sm rounded-4 text-center h-100"
                    style="background: linear-gradient(135deg, #ffeaea 0%, #ffffff 100%); border: 1px solid #ffc6c6;">
                    <div class="mb-3" style="font-size: 45px; color:#c44747;">
                        <i class="fa fa-church"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color:#c44747;">Tempat Ibadah</h5>
                    <p class="text-muted small">
                        Fasilitas keagamaan untuk menunjang kegiatan spiritual warga dari berbagai golongan.
                    </p>
                </div>
            </div>

            <!-- LAPANGAN -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 shadow-sm rounded-4 text-center h-100"
                    style="background: linear-gradient(135deg, #eafff4 0%, #ffffff 100%); border: 1px solid #b3e6ce;">
                    <div class="mb-3" style="font-size: 45px; color:#215d50;">
                        <i class="fa fa-futbol"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color:#215d50;">Lapangan Warga</h5>
                    <p class="text-muted small">
                        Area serbaguna untuk kegiatan olahraga, lomba 17-an, dan aktivitas pemuda desa.
                    </p>
                </div>
            </div>

            <!-- TPS -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 shadow-sm rounded-4 text-center h-100"
                    style="background: linear-gradient(135deg, #f4ffe7 0%, #ffffff 100%); border: 1px solid #d8e7b6;">
                    <div class="mb-3" style="font-size: 45px; color:#215d50;">
                        <i class="fa fa-trash-alt"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color:#215d50;">TPS / Tempat Sampah</h5>
                    <p class="text-muted small">
                        Tempat pengumpulan sampah sementara sebelum diangkut oleh petugas kebersihan.
                    </p>
                </div>
            </div>

        </div>
    </div>
@endsection
