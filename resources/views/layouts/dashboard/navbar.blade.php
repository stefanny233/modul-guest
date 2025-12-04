<div class="container-fluid bg-secondary px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="nav-bar">
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark px-4 py-lg-0">
            <h4 class="d-lg-none m-0">Menu</h4>
            <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav me-auto">

                    <a href="{{ route('dashboard.index') }}" class="nav-item nav-link">Home</a>
                    <a href="{{ route('users.index') }}" class="nav-item nav-link">Data User</a>
                    <div class="nav-item dropdown">
                        <a href="{{ route('warga.index') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            Data Penduduk
                        </a>
                        <div class="dropdown-menu bg-light m-0">
                            <a href="{{ route('warga.index') }}" class="dropdown-item">Warga</a>
                            <a href="{{ route('rt.index') }}" class="dropdown-item">RT</a>
                            <a href="{{ route('rw.index') }}" class="dropdown-item">RW</a>
                        </div>
                    </div>

                    <a href="{{ route('perangkat_desa.index') }}" class="nav-item nav-link">Perangkat Desa</a>
                    <a href="{{ route('lembaga.index') }}" class="nav-item nav-link">Lembaga Desa</a>
                    <a href="{{ route('jabatan.index') }}" class="nav-item nav-link">Jabatan Desa</a>
                </div>

                {{-- small avatar (fallback to icon) --}}
                @php
                    $user = Auth::user();
                @endphp
                <div class="dropdown d-none d-lg-flex ms-auto">
                    <button class="btn dropdown-toggle d-flex align-items-center px-3 py-2" id="userDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false"
                        style="background:none; border:none; box-shadow:none;">

                        {{-- Avatar / icon --}}
                        @if ($user && !empty($user->profile_picture))
                            <img src="{{ filter_var($user->profile_picture, FILTER_VALIDATE_URL)
                                ? $user->profile_picture
                                : asset('storage/' . ltrim($user->profile_picture, '/')) }}"
                                alt="Profile"
                                style="width:30px;height:30px;object-fit:cover;border-radius:50%;margin-right:8px;">
                        @else
                            <span
                                style="width:30px;height:30px;display:inline-flex;align-items:center;
                        justify-content:center;border-radius:50%;background:#e6e6e6;
                        color:#1f5136;margin-right:8px;">
                                <i class="fa fa-user" style="font-size:14px;"></i>
                            </span>
                        @endif

                        {{ $user ? $user->name : 'User' }}
                    </button>

                    {{-- Dropdown menu --}}
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="userDropdown"
                        style="min-width:180px; border-radius:10px;">

                        <li class="px-3 py-2 text-muted" style="font-size:13px;">
                            Logged in as: <strong>{{ $user ? 'User' : 'Guest' }}</strong>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item" href="{{ Route::has('profile') ? route('profile') : '#' }}">
                                Profile
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="{{ Route::has('settings') ? route('settings') : '#' }}">
                                Settings
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            @if ($user && Route::has('logout'))
                                <form action="{{ route('logout') }}" method="POST" class="m-0">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">Logout</button>
                                </form>
                            @endif
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </div>
</div>
