<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Register - Desa Sejahtera</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@600;700&family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Bootstrap & Icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(rgba(3, 93, 62, 0.9), rgba(3, 93, 62, 0.9)), url('{{ asset('img/bg-desa.jpg') }}') center/cover no-repeat;
            font-family: 'Open Sans', sans-serif;
            min-height: 100vh;
            color: #fff;
        }

        .register-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0px 6px 25px rgba(0, 0, 0, 0.25);
            padding: 40px;
            max-width: 460px;
            width: 100%;
            color: #333;
            animation: fadeInUp 0.8s;
        }

        .register-card h3 {
            color: #035d3e;
            font-weight: 700;
            margin-bottom: 10px;
            font-family: 'Josefin Sans', sans-serif;
        }

        .register-card p {
            color: #666;
            margin-bottom: 25px;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 1px solid #ccc;
            transition: 0.3s;
        }

        .form-control:focus {
            border-color: #ffc107;
            box-shadow: 0 0 5px rgba(255, 193, 7, 0.5);
        }

        .btn-register {
            background-color: #ffc107;
            color: #000;
            font-weight: 600;
            border-radius: 10px;
            width: 100%;
            padding: 10px;
            transition: 0.3s;
        }

        .btn-register:hover {
            background-color: #e0a800;
            color: white;
        }

        .login-link {
            margin-top: 15px;
            color: #035d3e;
        }

        .login-link a {
            color: #035d3e;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        footer {
            position: absolute;
            bottom: 10px;
            width: 100%;
            text-align: center;
            font-size: 0.9rem;
            color: #ddd;
        }

        footer a {
            color: #ffc107;
            text-decoration: none;
        }

        @keyframes fadeInUp {
            from {
                transform: translateY(30px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Alert styling */
        .alert {
            border-radius: 10px;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-transparent position-absolute top-0 start-0 w-100 p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand fw-bold text-warning fs-4" href="#">Desa Sejahtera</a>
            <a href="{{ route('login') }}" class="btn btn-sm btn-outline-light rounded-pill px-3">Kembali</a>
        </div>
    </nav>

    <!-- Register Form -->
    <div class="register-container">
        <div class="register-card wow fadeInUp" data-wow-delay="0.1s">
            <div class="text-center mb-3">
                <h3 class="mt-3">Buat Akun Baru</h3>
                <p>Daftarkan diri Anda untuk mengakses sistem Desa Sejahtera</p>
            </div>

            <!-- Alert sukses/gagal -->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="birth_date" class="form-label fw-semibold">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date') }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email aktif" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password" required>
                </div>

                <button type="submit" class="btn btn-register mt-2">Daftar</button>
            </form>

            <div class="login-link text-center">
                <p>Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a></p>
            </div>
        </div>
    </div>

    <footer>
        &copy; 2025 <a href="#">Desa Sejahtera</a>. All Rights Reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
