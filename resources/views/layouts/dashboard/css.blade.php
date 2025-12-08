<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="{{ asset('assets-guest/lib/animate/animate.min.css" rel="stylesheet') }}">
<link href="{{ asset('assets-guest/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="{{ asset('assets-guest/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="{{ asset('assets-guest/css/style.css') }}" rel="stylesheet">

<style>
    .whatsapp-float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 20px;
        right: 20px;
        background-color: #25D366;
        color: white;
        border-radius: 50%;
        text-align: center;
        font-size: 30px;
        line-height: 60px;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        z-index: 1000;
        transition: all 0.3s ease;
    }

    .whatsapp-float:hover {
        background-color: #20b358;
        color: white;
        transform: scale(1.05);
    }
</style>


<!-- Data & Statistik -->
<style>
    .achievement-timeline {
        position: relative;
        max-width: 800px;
        margin: 0 auto;
    }

    .achievement-timeline::before {
        content: '';
        position: absolute;
        left: 50px;
        top: 0;
        bottom: 0;
        width: 4px;
        background: linear-gradient(to bottom, #fbbf24, #22c55e);
        border-radius: 2px;
    }

    .timeline-item {
        display: flex;
        margin-bottom: 40px;
        position: relative;
    }

    .timeline-year {
        width: 100px;
        text-align: center;
        position: relative;
    }

    .year-badge {
        background: linear-gradient(135deg, #fbbf24 0%, #d97706 100%);
        color: white;
        padding: 10px 20px;
        border-radius: 25px;
        font-weight: bold;
        font-size: 1.1rem;
        display: inline-block;
        box-shadow: 0 5px 15px rgba(251, 191, 36, 0.3);
    }

    .timeline-content {
        flex: 1;
        padding-left: 30px;
    }

    .achievement-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        display: flex;
        align-items: center;
        gap: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        border: 1px solid #f1f5f9;
        transition: transform 0.3s ease;
    }

    .achievement-card:hover {
        transform: translateX(10px);
        box-shadow: 0 15px 35px rgba(251, 191, 36, 0.15);
    }

    .achievement-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #d97706;
    }

    .achievement-stat {
        padding: 20px;
    }

    .stat-circle {
        width: 100px;
        height: 100px;
        border: 3px solid;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        background: white;
    }

    .testimonial-card {
        background: white;
        border-radius: 20px;
        padding: 40px;
        text-align: center;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        border: 2px solid #fef3c7;
    }

    .testimonial-header {
        margin-bottom: 30px;
    }

    .testimonial-body {
        max-width: 600px;
        margin: 0 auto;
    }

    .testimonial-author {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
        margin-top: 25px;
    }

    .author-info {
        text-align: left;
    }
</style>

{{-- button dashboard --}}
<style>
    .bg-gradient {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .card-hover:hover {
        transform: translateY(-5px);
        transition: transform 0.3s ease;
    }
</style>

<style>
.btn-about-village {
    display: inline-flex;
    align-items: center;
    background: linear-gradient(135deg, #efdd78, #ffed4e);
    color: #8b5a00;
    font-weight: bold;
    font-size: 1.2rem;
    padding: 1rem 2rem;
    border-radius: 50px;
    text-decoration: none;
    box-shadow:
        0 10px 20px rgba(255, 215, 0, 0.3),
        0 4px 8px rgba(0,0,0,0.1),
        inset 0 2px 0 rgba(255,255,255,0.4);
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 3px solid #ffc107;
    transform-style: preserve-3d;
    perspective: 500px;
}

.btn-about-village:hover {
    transform: translateY(-5px) scale(1.05) rotate(1deg);
    box-shadow:
        0 15px 30px rgba(255, 215, 0, 0.4),
        0 6px 12px rgba(0,0,0,0.15),
        inset 0 2px 0 rgba(255,255,255,0.6);
    color: #5d3c00;
}

.btn-about-village:active {
    transform: translateY(-2px) scale(1.02);
}

.btn-about-village::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    transition: left 0.6s ease;
}

.btn-about-village:hover::before {
    left: 100%;
}

.btn-content {
    display: flex;
    align-items: center;
    position: relative;
    z-index: 2;
}

.btn-hover-effect {
    margin-left: 10px;
    opacity: 0;
    transform: translateX(-10px);
    transition: all 0.3s ease;
}

.btn-about-village:hover .btn-hover-effect {
    opacity: 1;
    transform: translateX(0);
}
</style>
