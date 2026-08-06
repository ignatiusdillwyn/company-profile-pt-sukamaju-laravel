@extends('layout')

@section('title', $data['title'] . ' - DummyCorp')

@section('content')
<!-- ========== HERO SECTION ========== -->
<section class="bg-primary bg-gradient py-5">
    <div class="container py-4">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}" class="text-white-50 text-decoration-none">
                                <i class="fas fa-home me-1"></i>Home
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('service') }}" class="text-white-50 text-decoration-none">
                                Services
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">
                            {{ $data['title'] }}
                        </li>
                    </ol>
                </nav>

                <!-- Back Button -->
                <a href="{{ route('service') }}" class="btn btn-outline-light rounded-pill px-4 py-2 mb-4">
                    <i class="fas fa-arrow-left me-2"></i> Back to Services
                </a>

                <!-- Title -->
                <h1 class="display-3 fw-bold text-white mb-3">{{ $data['title'] }}</h1>
            </div>

            <!-- Hero Icon -->
            <!-- <div class="col-lg-5 text-center d-none d-lg-block">
                <div class="bg-white bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center p-5"
                    style="width: 300px; height: 300px; backdrop-filter: blur(10px); border: 2px solid rgba(255,255,255,0.1);">
                    <i class="fas fa-cogs text-white-50" style="font-size: 8rem;"></i>
                </div>
            </div> -->
        </div>
    </div>
</section>

<!-- ========== CONTENT SECTION ========== -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <!-- Main Content -->
            <div class="col-lg-8">
                @if(!empty($data['image']))
                    <div class="mb-4 overflow-hidden rounded-4 shadow-sm">
                        <img src="{{ $data['image'] }}" 
                             alt="{{ $data['title'] }}" 
                             class="img-fluid w-100" 
                             style="max-height: 400px; object-fit: cover;" />
                    </div>
                @endif

                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-lg-5">
                        <div class="text-dark" style="font-size: 1.05rem; line-height: 1.8;">
                            {!! $data['content'] !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="position-sticky" style="top: 20px;">
                    <!-- Contact Card -->
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold text-dark mb-3">
                                <i class="fas fa-headset text-primary me-2"></i>Get in Touch
                            </h5>
                            <p class="text-muted small">Interested with this service? Contact us now!</p>
                            <a href="{{ route('contact') }}" class="btn btn-primary w-100 rounded-pill py-2 fw-semibold">
                                <i class="fas fa-paper-plane me-2"></i> Contact Us
                            </a>
                            <hr class="my-3">
                            <div class="d-flex flex-column gap-2">
                                <small class="text-dark">
                                    <i class="fas fa-envelope me-2 text-primary"></i>
                                    info@dummycorp.com
                                </small>
                                <small class="text-dark">
                                    <i class="fas fa-phone me-2 text-primary"></i>
                                    +62 812 3456 7890
                                </small>
                            </div>
                        </div>
                    </div>

                    <!-- Share Card -->
                    <div class="card border-0 shadow-sm rounded-4 mt-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold text-dark mb-3">
                                <i class="fas fa-share-alt text-primary me-2"></i>Share This
                            </h5>
                            <div class="d-flex gap-2">
                                <a href="#" class="btn btn-primary rounded-circle p-0" style="width: 40px; height: 40px; line-height: 40px;">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="btn btn-info rounded-circle p-0 text-white" style="width: 40px; height: 40px; line-height: 40px;">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="btn btn-primary rounded-circle p-0" style="width: 40px; height: 40px; line-height: 40px; background: #0077b5; border-color: #0077b5;">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="btn btn-success rounded-circle p-0" style="width: 40px; height: 40px; line-height: 40px;">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== CTA SECTION ========== -->
<section class="bg-primary bg-gradient py-5">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2 class="display-5 fw-bold text-white">Ready to Get <span class="text-warning">Started?</span></h2>
                <p class="lead text-white-50 mb-4">Let's bring your ideas to life with our expert services.</p>
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg rounded-pill px-5 py-3 fw-semibold shadow-sm">
                    <i class="fas fa-rocket me-2"></i> Get a Free Quote
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    /* Additional styles for Bootstrap components */
    .bg-primary.bg-gradient {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    }

    /* Card hover effect */
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.08) !important;
    }

    /* Breadcrumb styling */
    .breadcrumb-item + .breadcrumb-item::before {
        color: rgba(255, 255, 255, 0.5);
    }

    .breadcrumb-item a:hover {
        color: white !important;
    }

    /* Button hover effects */
    .btn-outline-light {
        border-color: rgba(255, 255, 255, 0.3) !important;
    }

    .btn-outline-light:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: white !important;
    }

    /* Social buttons */
    .btn-social {
        transition: all 0.3s ease;
    }

    .btn-social:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    /* Content styling */
    .text-dark p,
    .text-dark h1,
    .text-dark h2,
    .text-dark h3,
    .text-dark h4,
    .text-dark h5,
    .text-dark h6,
    .text-dark ul,
    .text-dark ol,
    .text-dark li {
        color: #1a1a2e !important;
    }

    .text-dark ul,
    .text-dark ol {
        padding-left: 1.5rem;
    }

    .text-dark li {
        margin-bottom: 0.5rem;
    }

    .text-dark blockquote {
        border-left: 4px solid #667eea;
        padding-left: 1rem;
        margin: 1.5rem 0;
        background: #f8f9fa;
        padding: 15px 20px;
        border-radius: 8px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .display-3 {
            font-size: 2.5rem;
        }

        .display-5 {
            font-size: 2rem;
        }

        .rounded-circle {
            width: 200px !important;
            height: 200px !important;
        }

        .rounded-circle i {
            font-size: 5rem !important;
        }
    }

    @media (max-width: 576px) {
        .display-3 {
            font-size: 2rem;
        }

        .display-5 {
            font-size: 1.75rem;
        }

        .card-body {
            padding: 1.5rem !important;
        }
    }
</style>
@endpush