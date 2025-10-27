{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login Guest</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Icon Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- INTERNAL CSS -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background: #0d6b57;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Kotak putih tetap besar */
        .login-card {
            background: #ffffff;
            width: 600px;
            padding: 40px 50px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.12);
        }

        /* Form tetap ditengah */
        .form-wrapper {
            max-width: 380px;
            margin: auto;
            width: 100%;
        }

        .login-card i {
            font-size: 75px;
            color: #ffb300;
        }

        h2 {
            font-weight: 700;
            margin: 18px 0 25px;
            font-family: 'Josefin Sans', sans-serif;
            color: #0d3e33;
        }

        .form-control,
        .btn-login {
            width: 100%;
            border-radius: 8px;
            font-size: 14px;
        }

        .form-control {
            padding: 13px;
            border: 1.8px solid #cacaca;
            margin-bottom: 15px;
        }

        .form-control:focus {
            border-color: #ffb300;
            outline: none;
            box-shadow: 0 0 6px rgba(255, 179, 0, 0.4);
        }

        .btn-login {
            background: #ffb300;
            border: none;
            padding: 12px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 5px;
        }

        .btn-login:hover {
            background: #cc8f00;
        }
    </style>

</head>

<body>

    <div class="login-card">

        <i class="bi bi-person-circle"></i>
        <h2>Login Guest</h2>

        {{-- Notifikasi Error --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <div class="form-wrapper">
            <form action="{{ route('login.store') }}" method="POST">
                @csrf

                <input type="email" name="email" class="form-control" placeholder="Email" required>

                <input type="password" name="password" class="form-control" placeholder="Password" required>

                <button type="submit" class="btn-login">Masuk</button>
            </form>
        </div>

    </div>

</body>

</html> --}}
