@extends('layout')

@section('content')
<!-- ========== PAGE HEADER ========== -->
<section class="page-header" id="about">
    <div class="container">
        <nav aria-label="breadcrumb" class="breadcrumb-custom">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
        </nav>
        <h1>About <span style="color:#ffd700;">Us</span></h1>
        <p class="lead">
            We are a passionate team dedicated to creating amazing digital experiences.
            Learn more about our story, values, and mission.
        </p>
    </div>
</section>

<!-- ========== WHO WE ARE ========== -->
<section class="py-5" id="who-we-are">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="badge bg-primary bg-opacity-10 text-primary py-2 px-3 mb-3 fw-normal">
                    <i class="fas fa-info-circle me-1"></i> Who We Are
                </span>
                <h2 class="section-title">
                    Building the Future <br /><span>With Passion</span>
                </h2>
                <p class="text-muted mb-4">
                    Founded in 2020, DummyCorp has grown from a small startup to a trusted 
                    digital partner for businesses worldwide. We combine creativity, technology, 
                    and strategy to deliver exceptional results.
                </p>
                
                <ul class="about-list ps-0">
                    <li><i class="fas fa-check-circle"></i> <strong>100+</strong> Projects Delivered</li>
                    <li><i class="fas fa-check-circle"></i> <strong>50+</strong> Happy Clients</li>
                    <li><i class="fas fa-check-circle"></i> <strong>4.9</strong> Average Rating</li>
                    <li><i class="fas fa-check-circle"></i> <strong>10+</strong> Team Members</li>
                </ul>
                
                <a href="{{ route('contact') }}" class="btn btn-primary mt-3">
                    <i class="fas fa-arrow-right me-2"></i> Contact Us
                </a>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('images/about-us.jpg') }}" 
                     alt="About Us" class="about-image img-fluid" 
                     onerror="this.src='https://via.placeholder.com/600x400/667eea/FFFFFF?text=Our+Team'" />
            </div>
        </div>
    </div>
</section>

<!-- ========== STATISTICS ========== -->
<section class="py-5 bg-light" id="stats">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-6 col-md-3">
                <div class="counter-number display-3 fw-bold text-primary" id="counter1">0</div>
                <p class="text-muted mb-0">Projects Completed</p>
            </div>
            <div class="col-6 col-md-3">
                <div class="counter-number display-3 fw-bold text-primary" id="counter2">0</div>
                <p class="text-muted mb-0">Happy Clients</p>
            </div>
            <div class="col-6 col-md-3">
                <div class="counter-number display-3 fw-bold text-primary" id="counter3">0</div>
                <p class="text-muted mb-0">Awards Won</p>
            </div>
            <div class="col-6 col-md-3">
                <div class="counter-number display-3 fw-bold text-primary" id="counter4">0</div>
                <p class="text-muted mb-0">Team Members</p>
            </div>
        </div>
    </div>
</section>

<!-- ========== MISSION & VISION ========== -->
<section class="py-5" id="mission-vision">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary bg-opacity-10 text-primary py-2 px-3 mb-3 fw-normal">
                <i class="fas fa-bullseye me-1"></i> Our Purpose
            </span>
            <h2 class="section-title">Mission &amp; <span>Vision</span></h2>
            <p class="section-subtitle">What drives us every day</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="value-card h-100">
                    <div class="value-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h4>Our Mission</h4>
                    <p class="text-muted">
                        To empower businesses with innovative digital solutions that drive growth, 
                        efficiency, and customer satisfaction. We believe in making technology 
                        accessible and impactful for everyone.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="value-card h-100">
                    <div class="value-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h4>Our Vision</h4>
                    <p class="text-muted">
                        To become a global leader in digital transformation, known for excellence, 
                        innovation, and a commitment to creating a better future through technology.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== CORE VALUES ========== -->
<section class="py-5 bg-light" id="values">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary bg-opacity-10 text-primary py-2 px-3 mb-3 fw-normal">
                <i class="fas fa-heart me-1"></i> Our Core Values
            </span>
            <h2 class="section-title">What We <span>Believe In</span></h2>
            <p class="section-subtitle">
                These values guide everything we do and define who we are as a company.
            </p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-3 col-6">
                <div class="value-card">
                    <div class="value-icon" style="background: rgba(255, 107, 107, 0.1); color: #ff6b6b;">
                        <i class="fas fa-star"></i>
                    </div>
                    <h6>Excellence</h6>
                    <p class="text-muted small">We strive for the highest quality in everything we do.</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="value-card">
                    <div class="value-icon" style="background: rgba(102, 126, 234, 0.1); color: #667eea;">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h6>Innovation</h6>
                    <p class="text-muted small">We embrace creativity and new ideas to solve problems.</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="value-card">
                    <div class="value-icon" style="background: rgba(46, 213, 115, 0.1); color: #2ed573;">
                        <i class="fas fa-users"></i>
                    </div>
                    <h6>Collaboration</h6>
                    <p class="text-muted small">We work together to achieve more than we can alone.</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="value-card">
                    <div class="value-icon" style="background: rgba(255, 165, 0, 0.1); color: #ffa502;">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h6>Integrity</h6>
                    <p class="text-muted small">We act with honesty, transparency, and accountability.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== TIMELINE / MILESTONE ========== -->
<section class="py-5" id="milestones">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary bg-opacity-10 text-primary py-2 px-3 mb-3 fw-normal">
                <i class="fas fa-clock me-1"></i> Our Journey
            </span>
            <h2 class="section-title">Our <span>Milestones</span></h2>
            <p class="section-subtitle">The journey of DummyCorp so far</p>
        </div>
        
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="timeline-year">2020</span>
                    <h6>Company Founded</h6>
                    <p class="text-muted small mb-0">DummyCorp was established with a vision to transform digital experiences.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="timeline-year">2021</span>
                    <h6>First 100 Clients</h6>
                    <p class="text-muted small mb-0">Reached 100+ happy clients across various industries.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="timeline-year">2022</span>
                    <h6>Expansion & Growth</h6>
                    <p class="text-muted small mb-0">Expanded team to 10+ members and opened new office.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="timeline-year">2023</span>
                    <h6>Industry Recognition</h6>
                    <p class="text-muted small mb-0">Won multiple awards for excellence in digital innovation.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="timeline-year">2024</span>
                    <h6>Global Reach</h6>
                    <p class="text-muted small mb-0">Serving clients globally with cutting-edge solutions.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== TEAM ========== -->
<section class="py-5 bg-light" id="team">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary bg-opacity-10 text-primary py-2 px-3 mb-3 fw-normal">
                <i class="fas fa-users me-1"></i> Our Team
            </span>
            <h2 class="section-title">Meet Our <span>Team</span></h2>
            <p class="section-subtitle">The talented people behind our success</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="team-card">
                    <div class="team-img-wrapper">
                        <img src="https://via.placeholder.com/400x400/667eea/FFFFFF?text=CEO" 
                             alt="John Doe" class="team-img" />
                        <div class="team-social">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                    <div class="p-3 text-center">
                        <h5 class="fw-bold mb-0">John Doe</h5>
                        <small class="text-muted">CEO &amp; Founder</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-card">
                    <div class="team-img-wrapper">
                        <img src="https://via.placeholder.com/400x400/764ba2/FFFFFF?text=CTO" 
                             alt="Jane Smith" class="team-img" />
                        <div class="team-social">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                    <div class="p-3 text-center">
                        <h5 class="fw-bold mb-0">Jane Smith</h5>
                        <small class="text-muted">CTO</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-card">
                    <div class="team-img-wrapper">
                        <img src="https://via.placeholder.com/400x400/ff6b6b/FFFFFF?text=PM" 
                             alt="Mike Johnson" class="team-img" />
                        <div class="team-social">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                    <div class="p-3 text-center">
                        <h5 class="fw-bold mb-0">Mike Johnson</h5>
                        <small class="text-muted">Product Manager</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-card">
                    <div class="team-img-wrapper">
                        <img src="https://via.placeholder.com/400x400/ffa502/FFFFFF?text=Dev" 
                             alt="Sarah Lee" class="team-img" />
                        <div class="team-social">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                    <div class="p-3 text-center">
                        <h5 class="fw-bold mb-0">Sarah Lee</h5>
                        <small class="text-muted">Lead Developer</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== CTA SECTION ========== -->
<section class="cta-section" id="contact">
    <div class="container text-center">
        <h2 class="fw-bold">Ready to Work <span style="color:#ffd700;">Together?</span></h2>
        <p class="lead mb-4">Let's create something amazing for your business.</p>
        <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
            <i class="fas fa-envelope me-2"></i> Get in Touch
        </a>
    </div>
</section>
@endsection

@push('styles')
<style>
    /* ===== PAGE HEADER ===== */
    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 80px 0 60px;
        position: relative;
        overflow: hidden;
    }
    
    .page-header h1 {
        font-size: 3.5rem;
        font-weight: 700;
        position: relative;
        z-index: 1;
    }
    
    .page-header .lead {
        font-size: 1.25rem;
        opacity: 0.9;
        position: relative;
        z-index: 1;
    }
    
    .breadcrumb-custom {
        background: transparent;
        padding: 0;
        position: relative;
        z-index: 1;
    }
    
    .breadcrumb-custom .breadcrumb-item a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
    }
    
    .breadcrumb-custom .breadcrumb-item a:hover {
        color: #fff;
    }
    
    .breadcrumb-custom .breadcrumb-item.active {
        color: #fff;
    }
    
    .breadcrumb-custom .breadcrumb-item + .breadcrumb-item::before {
        color: rgba(255, 255, 255, 0.6);
    }
    
    /* ===== SECTION TITLE ===== */
    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }
    
    .section-title span {
        color: #667eea;
    }
    
    .section-subtitle {
        color: #6c757d;
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
    }
    
    /* ===== ABOUT LIST ===== */
    .about-list li {
        padding: 10px 0;
        border-bottom: 1px solid #f0f0f0;
        list-style: none;
    }
    
    .about-list li:last-child {
        border-bottom: none;
    }
    
    .about-list li i {
        color: #667eea;
        margin-right: 12px;
        width: 20px;
    }
    
    /* ===== ABOUT IMAGE ===== */
    .about-image {
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }
    
    .about-image:hover {
        transform: scale(1.02);
    }
    
    /* ===== VALUE CARDS ===== */
    .value-card {
        border: none;
        border-radius: 20px;
        padding: 35px 25px;
        text-align: center;
        background: white;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.06);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
    }
    
    .value-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
    }
    
    .value-card .value-icon {
        width: 80px;
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
        border-radius: 50%;
        font-size: 32px;
        color: #667eea;
    }
    
    /* ===== TIMELINE ===== */
    .timeline {
        position: relative;
        padding: 20px 0;
    }
    
    .timeline::before {
        content: '';
        position: absolute;
        left: 50%;
        top: 0;
        bottom: 0;
        width: 3px;
        background: linear-gradient(to bottom, #667eea, #764ba2);
        transform: translateX(-50%);
    }
    
    .timeline-item {
        position: relative;
        margin-bottom: 40px;
        display: flex;
        justify-content: flex-end;
        padding-right: 30px;
    }
    
    .timeline-item:nth-child(even) {
        justify-content: flex-start;
        padding-right: 0;
        padding-left: 30px;
    }
    
    .timeline-item .timeline-content {
        background: white;
        padding: 20px 25px;
        border-radius: 15px;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
        width: 45%;
        transition: transform 0.3s ease;
    }
    
    .timeline-item .timeline-content:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.12);
    }
    
    .timeline-item .timeline-year {
        display: inline-block;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2px 14px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.85rem;
        margin-bottom: 5px;
    }
    
    .timeline-item .timeline-dot {
        position: absolute;
        left: 50%;
        top: 20px;
        width: 16px;
        height: 16px;
        background: #667eea;
        border-radius: 50%;
        border: 4px solid white;
        box-shadow: 0 0 0 4px #667eea;
        transform: translateX(-50%);
        z-index: 1;
    }
    
    .timeline-item:nth-child(even) .timeline-dot {
        background: #764ba2;
        box-shadow: 0 0 0 4px #764ba2;
    }
    
    /* ===== TEAM CARDS ===== */
    .team-card {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.06);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: white;
    }
    
    .team-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
    }
    
    .team-card .team-img {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }
    
    .team-card .team-img-wrapper {
        position: relative;
        overflow: hidden;
    }
    
    .team-card .team-social {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 15px;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
        display: flex;
        justify-content: center;
        gap: 15px;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .team-card:hover .team-social {
        opacity: 1;
    }
    
    .team-card .team-social a {
        color: white;
        font-size: 1.2rem;
        transition: transform 0.3s ease;
    }
    
    .team-card .team-social a:hover {
        transform: scale(1.2);
    }
    
    /* ===== CTA SECTION ===== */
    .cta-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 80px 0;
    }
    
    .cta-section .btn-light {
        border-radius: 30px;
        padding: 12px 35px;
        font-weight: 600;
    }
    
    .cta-section .btn-light:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }
    
    /* ===== COUNTER ===== */
    .counter-number {
        font-size: 3rem;
        font-weight: 700;
        color: #667eea;
    }
    
    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .page-header h1 {
            font-size: 2.2rem;
        }
        
        .section-title {
            font-size: 2rem;
        }
        
        .timeline::before {
            left: 20px;
        }
        
        .timeline-item {
            padding-right: 0;
            padding-left: 50px;
            justify-content: flex-start;
        }
        
        .timeline-item:nth-child(even) {
            padding-left: 50px;
            padding-right: 0;
        }
        
        .timeline-item .timeline-content {
            width: 100%;
        }
        
        .timeline-item .timeline-dot {
            left: 20px;
            transform: translateX(-50%);
        }
        
        .counter-number {
            font-size: 2.2rem;
        }
    }
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // ===== COUNTER ANIMATION =====
    function animateCounter(elementId, target, suffix) {
        var current = 0;
        var increment = Math.ceil(target / 60);
        var element = $(elementId);
        
        var interval = setInterval(function() {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(interval);
            }
            element.text(current + (suffix || ''));
        }, 30);
    }
    
    function startCounters() {
        if ($('#stats').is(':visible')) {
            animateCounter('#counter1', 128, '+');
            animateCounter('#counter2', 356, '+');
            animateCounter('#counter3', 24, '+');
            animateCounter('#counter4', 42, '+');
            $(window).off('scroll', startCounters);
        }
    }
    
    // Jalankan counter
    $(window).on('scroll', startCounters);
    if ($('#stats').is(':visible')) {
        startCounters();
    }
    
    // ===== SMOOTH SCROLL =====
    $('a[href^="#"]').on('click', function(e) {
        var target = $(this).attr('href');
        if (target && target.startsWith('#')) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: $(target).offset().top - 70
            }, 600);
        }
    });
    
    // ===== NAVBAR ACTIVE LINK =====
    $('.navbar-nav .nav-link').on('click', function() {
        $('.navbar-nav .nav-link').removeClass('active');
        $(this).addClass('active');
    });
});
</script>
@endpush