<div class="container-fluid bg-secondary px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="nav-bar">
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark px-4 py-lg-0">
            <h4 class="d-lg-none m-0">Menu</h4>
            <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav me-auto">
                    <a href="{{route('dashboard.index')}}" class="nav-item nav-link">Home</a>
                    <a href="{{ route('users.index') }}" class="nav-item nav-link">Data User</a>
                    <a href="{{ route('warga.index') }}" class="nav-item nav-link">Data Penduduk</a>
                    <a href="{{ route('perangkat_desa.index') }}" class="nav-item nav-link">Perangkat Desa</a>
                    <a href="{{ route('lembaga.index') }}" class="nav-item nav-link">Lembaga Desa</a>
                    <a href="{{ route('jabatan.index') }}" class="nav-item nav-link">Jabatan Desa</a>
                </div>
                <div class="d-none d-lg-flex ms-auto">
                    <a class="btn btn-square btn-dark ms-2" href="https://x.com/"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-dark ms-2" href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-dark ms-2" href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </nav>
    </div>
</div>
