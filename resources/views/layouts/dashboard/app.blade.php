<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Charitize - Charity Organization Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@600;700&family=Open+Sans&display=swap"
        rel="stylesheet">

    {{-- start CSS --}}
    @include('layouts.dashboard.css')
    {{-- end css --}}
</head>

<body>
    <!-- Spinner Start -->
    @include('layouts.dashboard.spiner')
    <!-- Spinner End -->


    <!-- Topbar Start -->
    @include('layouts.dashboard.topbar')
    <!-- Topbar End -->


    <!-- Navbar Start -->
    @include('layouts.dashboard.navbar')
    <!-- Navbar End -->

    @yield('content')

    <!-- Footer Start -->
    @include('layouts.dashboard.footer')
    <!-- Footer End -->
    <!-- JavaScript Libraries -->
    @include('layouts.dashboard.js')
</body>

</html>
