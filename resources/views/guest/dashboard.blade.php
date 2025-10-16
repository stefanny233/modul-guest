<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Charitize - Green Hope Foundation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@600;700&family=Open+Sans&display=swap"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- 🌿 Custom Green-Yellow-White Theme -->
    <style>
        body {
            font-family: "Open Sans", sans-serif;
            color: #333;
            background-color: #ffffff;
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Topbar */
        .top-bar {
            background-color: #b3e283;
            color: #1b3c1e;
            font-size: 14px;
            padding: 8px 0;
        }

        .top-bar h1 {
            font-family: "Josefin Sans", sans-serif;
            color: #1b5e20;
        }

        /* Navbar */
        .navbar {
            background-color: #1b5e20 !important;
        }

        .navbar .nav-link {
            color: #fff !important;
            font-weight: 500;
            margin: 0 10px;
        }

        .navbar .nav-link:hover,
        .navbar .nav-link.active {
            color: #fdd835 !important;
            transition: 0.3s;
        }

        /* Buttons */
        .btn-primary {
            background-color: #2e7d32;
            border-color: #2e7d32;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #388e3c;
            border-color: #388e3c;
        }

        .btn-secondary {
            background-color: #fdd835;
            border-color: #fdd835;
            color: #1b5e20;
        }

        .btn-secondary:hover {
            background-color: #ffeb3b;
        }

        /* Header Section */
        .header-carousel {
            background: linear-gradient(120deg, #c8e6c9, #fffde7);
            padding: 60px 0;
        }

        .header-carousel h1 {
            color: #1b5e20;
            font-weight: 700;
        }

        .header-carousel p {
            color: #2e7d32;
            font-size: 18px;
        }

        .header-carousel img {
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        /* Section Titles */
        .section-title {
            color: #1b5e20;
            font-weight: 700;
            font-size: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* About Section */
        .bg-primary {
            background-color: #c5e1a5 !important;
        }

        .text-primary {
            color: #1b5e20 !important;
        }

        /* Services */
        .service-item {
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .service-item:hover {
            background-color: #f1f8e9;
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(76, 175, 80, 0.3);
        }

        .service-item i {
            color: #388e3c;
        }

        .service-item h4 {
            color: #1b5e20;
            font-weight: 600;
        }

        /* Footer */
        footer {
            background-color: #1b5e20;
            color: #e8f5e9;
        }

        footer h4 {
            color: #fdd835;
        }

        footer a {
            color: #c8e6c9;
            text-decoration: none;
        }

        footer a:hover {
            color: #ffeb3b;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- 🌿 Topbar -->
    <div class="container-fluid top-bar">
        <div class="row align-items-center">
            <div class="col-lg-4 text-center text-lg-start">
                <h1 class="display-6 fw-bold m-0">GreenHope</h1>
            </div>
            <div class="col-lg-8 text-end d-none d-lg-block">
                <small><i class="fa fa-phone me-2 text-success"></i> +012 345 6789</small>
                <small class="ms-3"><i class="fa fa-envelope me-2 text-success"></i> info@greenhope.org</small>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark py-3">
        <div class="container">
            <a href="#" class="navbar-brand fw-bold text-warning">GreenHope</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Programs</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Events</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Donate</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                </ul>
                <a href="#" class="btn btn-secondary btn-sm">Join Us</a>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <div class="header-carousel text-center">
        <div class="container">
            <h1 class="display-4 mb-3">Together for a Greener Tomorrow</h1>
            <p class="lead mb-4">We believe in empowering communities through sustainable living, education, and kindness.</p>
            <a href="#" class="btn btn-primary me-3">Donate Now</a>
            <a href="#" class="btn btn-secondary">Learn More</a>
        </div>
    </div>

    <!-- About -->
    <div class="container py-5">
        <div class="row align-items-center g-4">
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee" class="img-fluid rounded shadow"
                    alt="">
            </div>
            <div class="col-lg-6">
                <h2 class="text-primary mb-3">Our Mission</h2>
                <p>GreenHope is a community-driven organization focused on promoting eco-friendly lifestyles,
                    providing education, and supporting sustainable projects across the globe.</p>
                <a href="#" class="btn btn-primary">Get Involved</a>
            </div>
        </div>
    </div>

    <!-- Services -->
    <div class="container-fluid py-5 bg-light">
        <div class="container text-center">
            <p class="section-title mb-2">Our Focus</p>
            <h1 class="mb-5 text-success">What We Do</h1>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="service-item p-4 bg-white shadow-sm">
                        <i class="fa fa-seedling fa-2x mb-3"></i>
                        <h4>Environmental Projects</h4>
                        <p>We plant trees, clean rivers, and promote green energy in local communities.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item p-4 bg-white shadow-sm">
                        <i class="fa fa-graduation-cap fa-2x mb-3"></i>
                        <h4>Education & Awareness</h4>
                        <p>We provide training and education on sustainable practices and eco-awareness.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item p-4 bg-white shadow-sm">
                        <i class="fa fa-hand-holding-heart fa-2x mb-3"></i>
                        <h4>Community Support</h4>
                        <p>Helping families, children, and local communities thrive with clean and healthy environments.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-5 mt-5">
        <div class="container text-center">
            <h4 class="mb-3">Stay Connected</h4>
            <div class="mb-3">
                <a href="#" class="text-warning me-3"><i class="fab fa-facebook fa-lg"></i></a>
                <a href="#" class="text-warning me-3"><i class="fab fa-instagram fa-lg"></i></a>
                <a href="#" class="text-warning"><i class="fab fa-twitter fa-lg"></i></a>
            </div>
            <p class="small mb-0">&copy; 2025 GreenHope Foundation | Designed with 💚</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple scroll animation effect
        $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $(".navbar").addClass("shadow-sm");
            } else {
                $(".navbar").removeClass("shadow-sm");
            }
        });
    </script>
</body>

</html>
