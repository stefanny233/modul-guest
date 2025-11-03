<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Login - Desa Sejahtera</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@600;700&family=Open+Sans&display=swap"
    rel="stylesheet">

  <style>
    body {
      font-family: 'Open Sans', sans-serif;
      background: linear-gradient(rgba(3, 93, 62, 0.85), rgba(3, 93, 62, 0.85)), url('img/bg-desa.jpg') center/cover no-repeat;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-card {
      background: #fff;
      border-radius: 18px;
      box-shadow: 0 6px 25px rgba(0, 0, 0, 0.25);
      max-width: 420px;
      width: 100%;
      padding: 40px 35px;
    }

    .login-card h3 {
      font-family: 'Josefin Sans', sans-serif;
      font-weight: 700;
      color: #035d3e;
      text-align: center;
      margin-bottom: 10px;
    }

    .login-card p {
      color: #666;
      text-align: center;
      margin-bottom: 25px;
    }

    .input-group {
      background: #f8f9fa;
      border-radius: 12px;
      border: 1px solid #ccc;
      overflow: hidden;
      transition: 0.3s;
    }

    .input-group:focus-within {
      border-color: #ffc107;
      box-shadow: 0 0 6px rgba(255, 193, 7, 0.5);
    }

    .input-group-text {
      background-color: #ffc107;
      border: none;
      color: #000;
    }

    .form-control {
      border: none;
      background: transparent;
      padding: 12px;
      font-size: 15px;
    }

    .form-control:focus {
      box-shadow: none;
    }

    .btn-login {
      background-color: #ffc107;
      color: #000;
      font-weight: 600;
      border-radius: 10px;
      width: 100%;
      padding: 10px;
      transition: 0.3s;
    }

    .btn-login:hover {
      background-color: #e0a800;
      color: white;
    }

    .register-link {
      margin-top: 15px;
      color: #035d3e;
      text-align: center;
    }

    .register-link a {
      color: #035d3e;
      font-weight: 600;
      text-decoration: none;
    }

    .register-link a:hover {
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
  </style>
</head>

<body>

  <div class="login-card wow fadeIn" data-wow-delay="0.2s">
    <div class="text-center mb-3">
      <h3 class="mt-3">Selamat Datang</h3>
      <p>Masuk untuk mengelola data Desa Sejahtera</p>
    </div>

    <form action="" method="POST">
      <div class="mb-3">
        <label for="email" class="form-label fw-semibold">Email</label>
        <div class="input-group">
          <span class="input-group-text"><i class="fa fa-envelope"></i></span>
          <input type="email" class="form-control" id="email" placeholder="Masukkan email Anda" required>
        </div>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label fw-semibold">Password</label>
        <div class="input-group">
          <span class="input-group-text"><i class="fa fa-lock"></i></span>
          <input type="password" class="form-control" id="password" placeholder="Masukkan password" required>
        </div>
      </div>

      <button type="submit" class="btn btn-login mt-3">Masuk</button>
    </form>

  <footer>
    &copy; 2025 <a href="">Desa Sejahtera</a>. All Rights Reserved.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
