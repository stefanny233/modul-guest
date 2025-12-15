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

<style>
/* ========== BUBBLE NAVBAR STYLE ========== */

.bubble-nav {
    display: flex;
    gap: 10px;
    padding: 15px 0;
    align-items: center;
}

/* Bubble Container */
.nav-bubble {
    position: relative;
    background: linear-gradient(145deg, #ffc107, #ffb300);
    border-radius: 50px 20px 50px 20px;
    padding: 8px 20px;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    box-shadow:
        inset 0 2px 4px rgba(255, 255, 255, 0.3),
        0 4px 15px rgba(255, 193, 7, 0.2);
    border: 2px solid rgba(255, 255, 255, 0.1);
    min-height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Efek lengkungan khusus */
.nav-bubble::before {
    content: '';
    position: absolute;
    top: -5px;
    left: -5px;
    right: -5px;
    bottom: -5px;
    background: linear-gradient(145deg, #ffc107, #ffb300);
    border-radius: 55px 25px 55px 25px;
    opacity: 0;
    z-index: -1;
    transition: opacity 0.3s ease;
    filter: blur(5px);
}

.nav-bubble:hover::before {
    opacity: 0.3;
}

/* Hover Effects */
.nav-bubble:hover {
    transform: translateY(-5px) scale(1.05);
    border-radius: 20px 50px 20px 50px;
    background: linear-gradient(145deg, #ffb300, #ffc107);
    box-shadow:
        0 8px 25px rgba(255, 193, 7, 0.4),
        inset 0 1px 2px rgba(255, 255, 255, 0.5);
    border-color: rgba(255, 255, 255, 0.3);
}

/* Active State */
.nav-bubble.active {
    background: linear-gradient(145deg, #ffa000, #ff8c00);
    border-radius: 30px 30px 30px 30px;
    transform: translateY(-2px);
    box-shadow:
        0 5px 20px rgba(255, 160, 0, 0.5),
        inset 0 2px 4px rgba(255, 255, 255, 0.4);
}

/* Link styling */
.nav-bubble .nav-link {
    color: #000 !important;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 0;
    text-decoration: none !important;
    position: relative;
    z-index: 2;
}

.nav-bubble .nav-link i {
    font-size: 1.1em;
    transition: transform 0.3s ease;
}

.nav-bubble:hover .nav-link i {
    transform: scale(1.2) rotate(5deg);
}

/* Dropdown Bubble */
.bubble-dropdown {
    border-radius: 20px !important;
    border: none;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    padding: 10px;
    margin-top: 15px !important;
    min-width: 180px;
}

.bubble-dropdown-item {
    margin: 5px 0;
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.bubble-dropdown-item:hover {
    transform: translateX(5px);
}

.bubble-dropdown-item .dropdown-item {
    border-radius: 15px;
    padding: 12px 20px;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: all 0.3s ease;
    color: #333;
}

.bubble-dropdown-item:hover .dropdown-item {
    background: linear-gradient(145deg, #ffc107, #ffb300);
    color: #000;
    font-weight: 500;
}

/* Animation */
@keyframes bubbleFloat {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

.nav-bubble:hover {
    animation: bubbleFloat 2s ease-in-out infinite;
}

/* ========== VERSI 2: SOFTER BUBBLES ========== */
/* Jika mau yang lebih soft/lengkungan halus */

.nav-bubble.soft {
    border-radius: 30px;
    background: linear-gradient(145deg, rgba(255, 193, 7, 0.9), rgba(255, 179, 0, 0.9));
    backdrop-filter: blur(10px);
}

.nav-bubble.soft:hover {
    border-radius: 30px;
    transform: translateY(-3px) scale(1.03);
}

/* ========== RESPONSIVE ========== */
@media (max-width: 992px) {
    .bubble-nav {
        flex-direction: column;
        gap: 8px;
        padding: 10px 0;
    }

    .nav-bubble {
        width: 100%;
        justify-content: flex-start;
        padding-left: 25px;
        border-radius: 15px !important;
    }

    .nav-bubble:hover {
        transform: translateY(-3px);
        border-radius: 15px !important;
    }

    .bubble-dropdown {
        position: static !important;
        transform: none !important;
        width: 100%;
        margin-top: 8px !important;
        box-shadow: none;
        background: rgba(0, 0, 0, 0.05);
    }
}
</style>
