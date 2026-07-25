@extends('layout')

@section('content')
<!-- ========== HERO SECTION ========== -->
@php
    // Data dummy service detail
    $service = [
        'id' => 1,
        'title' => 'Web Development Services',
        'subtitle' => 'Build amazing web applications with modern technologies',
        'category' => 'Web Development',
        'icon' => 'fa-code',
        'image' => 'https://via.placeholder.com/1200x500/667eea/FFFFFF?text=Web+Development',
        'description' => 'We create custom, responsive, and high-performance websites tailored to your business needs. Our team of expert developers uses the latest technologies to deliver solutions that drive results.',
        'long_description' => '
            <p>Our web development services are designed to help businesses establish a strong online presence. We combine creativity with technical expertise to build websites that not only look great but also perform exceptionally well.</p>
            <p>From simple landing pages to complex web applications, we have the skills and experience to bring your vision to life. We follow industry best practices and use modern frameworks to ensure your website is fast, secure, and scalable.</p>
            <p>We work closely with our clients throughout the development process, ensuring that the final product meets and exceeds expectations. Our agile approach allows us to adapt to changing requirements and deliver results on time.</p>
        ',
        'price' => 'Start from $999',
        'rating' => 4.9,
        'reviews' => 128,
        'delivery_time' => '4-6 weeks',
        'is_popular' => true,
        'is_new' => false,
        'features' => [
            'Custom Web Design',
            'E-commerce Solutions',
            'CMS Development',
            'API Integration',
            'Responsive Design',
            'Performance Optimization',
            'SEO Friendly',
            'Security Implementation'
        ],
        'technologies' => ['Laravel', 'React', 'Vue.js', 'PHP', 'JavaScript', 'HTML5', 'CSS3', 'Tailwind CSS', 'Bootstrap', 'MySQL', 'PostgreSQL', 'AWS'],
        'process' => [
            ['step' => '1. Discovery', 'description' => 'We analyze your requirements and goals to create a comprehensive project plan.'],
            ['step' => '2. Design', 'description' => 'Our designers create wireframes and visual designs that align with your brand.'],
            ['step' => '3. Development', 'description' => 'We build your website using modern frameworks and best practices.'],
            ['step' => '4. Testing', 'description' => 'Rigorous testing ensures your website works flawlessly across all devices.'],
            ['step' => '5. Launch', 'description' => 'We deploy your website and provide training for your team.'],
            ['step' => '6. Support', 'description' => 'Ongoing maintenance and support to keep your website running smoothly.']
        ],
        'benefits' => [
            'Increased online visibility and brand awareness',
            'Improved user experience and customer engagement',
            'Higher conversion rates and sales',
            'Scalable solutions that grow with your business',
            '24/7 technical support and maintenance'
        ],
        'portfolio' => [
            ['title' => 'E-commerce Platform', 'image' => 'https://via.placeholder.com/300x200/667eea/FFFFFF?text=E-commerce'],
            ['title' => 'Corporate Website', 'image' => 'https://via.placeholder.com/300x200/764ba2/FFFFFF?text=Corporate'],
            ['title' => 'SaaS Application', 'image' => 'https://via.placeholder.com/300x200/ff6b6b/FFFFFF?text=SaaS'],
            ['title' => 'Portfolio Website', 'image' => 'https://via.placeholder.com/300x200/ffa502/FFFFFF?text=Portfolio']
        ]
    ];
@endphp

<section class="service-detail-hero">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('service') }}">Services</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $service['title'] }}</li>
            </ol>
        </nav>
        
        <div class="row align-items-center">
            <div class="col-lg-8">
                <span class="badge bg-warning text-dark mb-3">
                    <i class="fas fa-star me-1"></i> {{ $service['category'] }}
                </span>
                <h1>{{ $service['title'] }}</h1>
                <p class="lead">{{ $service['subtitle'] }}</p>
                <div class="d-flex flex-wrap align-items-center gap-3 mt-3">
                    <div class="service-meta">
                        <i class="fas fa-tag text-warning"></i>
                        <span>{{ $service['price'] }}</span>
                    </div>
                    <div class="service-meta">
                        <i class="fas fa-clock text-warning"></i>
                        <span>{{ $service['delivery_time'] }}</span>
                    </div>
                    <div class="service-meta">
                        <i class="fas fa-star text-warning"></i>
                        <span>{{ $service['rating'] }} ({{ $service['reviews'] }} reviews)</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center d-none d-lg-block">
                <div class="service-hero-icon">
                    <i class="fas {{ $service['icon'] }}"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== SERVICE CONTENT ========== -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <!-- ===== MAIN CONTENT ===== -->
            <div class="col-lg-8">
                <!-- Featured Image -->
                <img src="{{ $service['image'] }}" 
                     alt="{{ $service['title'] }}" 
                     class="img-fluid rounded-4 mb-4 w-100" />

                <!-- Description -->
                <div class="service-description">
                    <h3 class="fw-bold mb-3">About This Service</h3>
                    <p>{{ $service['description'] }}</p>
                    {!! $service['long_description'] !!}
                </div>

                <!-- Features -->
                <div class="service-features-section mt-5">
                    <h3 class="fw-bold mb-3">What We Offer</h3>
                    <div class="row g-3">
                        @foreach($service['features'] as $feature)
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-check-circle text-primary"></i>
                                <span>{{ $feature }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Benefits -->
                <div class="service-benefits mt-5">
                    <h3 class="fw-bold mb-3">Why Choose This Service</h3>
                    <div class="benefits-grid">
                        @foreach($service['benefits'] as $benefit)
                        <div class="benefit-item">
                            <i class="fas fa-check-circle text-success"></i>
                            <span>{{ $benefit }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Technologies -->
                <div class="service-technologies mt-5">
                    <h3 class="fw-bold mb-3">Technologies We Use</h3>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($service['technologies'] as $tech)
                        <span class="tech-tag">
                            <i class="fas fa-code me-1"></i>
                            {{ $tech }}
                        </span>
                        @endforeach
                    </div>
                </div>

                <!-- Process -->
                <div class="service-process mt-5">
                    <h3 class="fw-bold mb-3">Our Process</h3>
                    <div class="process-timeline">
                        @foreach($service['process'] as $index => $step)
                        <div class="process-step">
                            <div class="process-number">{{ $index + 1 }}</div>
                            <div class="process-content">
                                <h6 class="fw-bold">{{ $step['step'] }}</h6>
                                <p class="text-muted mb-0">{{ $step['description'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Portfolio -->
                <div class="service-portfolio mt-5">
                    <h3 class="fw-bold mb-3">Recent Projects</h3>
                    <div class="row g-3">
                        @foreach($service['portfolio'] as $project)
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <img src="{{ $project['image'] }}" alt="{{ $project['title'] }}" />
                                <div class="portfolio-overlay">
                                    <h6>{{ $project['title'] }}</h6>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- FAQ -->
                <div class="service-faq mt-5">
                    <h3 class="fw-bold mb-3">Frequently Asked Questions</h3>
                    <div class="accordion" id="faqService">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqS1">
                                    How long does it take to complete a web development project?
                                </button>
                            </h2>
                            <div id="faqS1" class="accordion-collapse collapse show" data-bs-parent="#faqService">
                                <div class="accordion-body">
                                    The timeline depends on the complexity of the project. Typically, a standard website takes 4-6 weeks, while more complex web applications may take 8-12 weeks or more.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqS2">
                                    Do you provide ongoing maintenance and support?
                                </button>
                            </h2>
                            <div id="faqS2" class="accordion-collapse collapse" data-bs-parent="#faqService">
                                <div class="accordion-body">
                                    Yes! We offer ongoing maintenance and support packages to ensure your website stays updated, secure, and performing optimally.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqS3">
                                    Can you help with website migration?
                                </button>
                            </h2>
                            <div id="faqS3" class="accordion-collapse collapse" data-bs-parent="#faqService">
                                <div class="accordion-body">
                                    Absolutely! We can migrate your existing website to a new platform or hosting environment with minimal downtime and disruption.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ===== SIDEBAR ===== -->
            <div class="col-lg-4">
                <!-- CTA Card -->
                <div class="sidebar-cta">
                    <h5>Ready to Get Started?</h5>
                    <p class="text-muted small">Let's discuss your project and create something amazing together.</p>
                    <a href="#" class="btn btn-primary w-100">
                        <i class="fas fa-rocket me-2"></i> Get a Free Quote
                    </a>
                    <hr />
                    <div class="d-flex align-items-center gap-2 small">
                        <i class="fas fa-phone text-primary"></i>
                        <span>+62 812 3456 7890</span>
                    </div>
                    <div class="d-flex align-items-center gap-2 small">
                        <i class="fas fa-envelope text-primary"></i>
                        <span>info@dummycorp.com</span>
                    </div>
                </div>

                <!-- Service Overview -->
                <div class="sidebar-card">
                    <h6><i class="fas fa-info-circle text-primary me-2"></i>Service Overview</h6>
                    <ul class="overview-list">
                        <li>
                            <span class="label">Category</span>
                            <span class="value">{{ $service['category'] }}</span>
                        </li>
                        <li>
                            <span class="label">Price</span>
                            <span class="value">{{ $service['price'] }}</span>
                        </li>
                        <li>
                            <span class="label">Delivery Time</span>
                            <span class="value">{{ $service['delivery_time'] }}</span>
                        </li>
                        <li>
                            <span class="label">Rating</span>
                            <span class="value">
                                <i class="fas fa-star text-warning"></i>
                                {{ $service['rating'] }} ({{ $service['reviews'] }})
                            </span>
                        </li>
                    </ul>
                </div>

                <!-- Related Services -->
                <div class="sidebar-card">
                    <h6><i class="fas fa-link text-primary me-2"></i>Related Services</h6>
                    <div class="related-list">
                        <a href="#" class="related-item">
                            <i class="fas fa-mobile-alt"></i>
                            <span>Mobile App Development</span>
                        </a>
                        <a href="#" class="related-item">
                            <i class="fas fa-pencil-ruler"></i>
                            <span>UI/UX Design</span>
                        </a>
                        <a href="#" class="related-item">
                            <i class="fas fa-brain"></i>
                            <span>AI & Machine Learning</span>
                        </a>
                        <a href="#" class="related-item">
                            <i class="fas fa-cloud"></i>
                            <span>Cloud Services</span>
                        </a>
                    </div>
                </div>

                <!-- Testimonial -->
                <div class="sidebar-card testimonial-card">
                    <div class="d-flex align-items-center gap-3">
                        <img src="https://ui-avatars.com/api/?name=John+Doe&background=667eea&color=fff" 
                             alt="Client" class="rounded-circle" width="50" height="50" />
                        <div>
                            <h6 class="mb-0">John Doe</h6>
                            <small class="text-muted">CEO, TechCorp</small>
                        </div>
                    </div>
                    <p class="mt-2 mb-0 small">
                        <i class="fas fa-quote-left text-primary me-1"></i>
                        Excellent service! They delivered beyond our expectations.
                        <i class="fas fa-quote-right text-primary ms-1"></i>
                    </p>
                    <div class="text-warning mt-1">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== CTA SECTION ========== -->
<section class="cta-section">
    <div class="container text-center">
        <h2 class="fw-bold">Ready to Build Your <span style="color: #ffd700;">Website?</span></h2>
        <p class="lead mb-4">Let's create something amazing together. Contact us today!</p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="#" class="btn btn-light btn-lg">
                <i class="fas fa-envelope me-2"></i> Contact Us
            </a>
            <a href="#" class="btn btn-outline-light btn-lg">
                <i class="fas fa-phone me-2"></i> Call Now
            </a>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
/* ===== HERO ===== */
.service-detail-hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 60px 0 50px;
}

.service-detail-hero .breadcrumb {
    background: transparent;
    padding: 0;
}

.service-detail-hero .breadcrumb-item a {
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
}

.service-detail-hero .breadcrumb-item a:hover {
    color: #fff;
}

.service-detail-hero .breadcrumb-item.active {
    color: #fff;
}

.service-detail-hero .breadcrumb-item + .breadcrumb-item::before {
    color: rgba(255, 255, 255, 0.6);
}

.service-detail-hero h1 {
    font-size: 3rem;
    font-weight: 700;
}

.service-detail-hero .lead {
    font-size: 1.15rem;
    opacity: 0.9;
}

.service-meta {
    display: flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.15);
    padding: 6px 16px;
    border-radius: 20px;
    font-size: 0.9rem;
}

.service-hero-icon {
    width: 120px;
    height: 120px;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 4rem;
    margin: 0 auto;
}

/* ===== SERVICE DESCRIPTION ===== */
.service-description {
    font-size: 1.05rem;
    line-height: 1.8;
    color: #333;
}

.service-description p {
    margin-bottom: 1.25rem;
}

/* ===== FEATURES ===== */
.feature-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 14px;
    background: #f8f9fa;
    border-radius: 10px;
    transition: background 0.3s ease;
}

.feature-item:hover {
    background: #e8ecf1;
}

.feature-item i {
    font-size: 1.1rem;
}

/* ===== BENEFITS ===== */
.benefits-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
}

.benefit-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px 12px;
    background: #f8f9fa;
    border-radius: 8px;
    font-size: 0.95rem;
}

.benefit-item i {
    font-size: 1rem;
}

/* ===== TECHNOLOGIES ===== */
.tech-tag {
    display: inline-block;
    padding: 6px 16px;
    background: #f0f0f0;
    border-radius: 20px;
    font-size: 0.85rem;
    color: #333;
    transition: all 0.3s ease;
}

.tech-tag:hover {
    background: #667eea;
    color: white;
    transform: translateY(-2px);
}

/* ===== PROCESS TIMELINE ===== */
.process-timeline {
    position: relative;
    padding-left: 30px;
}

.process-timeline::before {
    content: '';
    position: absolute;
    left: 10px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: linear-gradient(to bottom, #667eea, #764ba2);
}

.process-step {
    position: relative;
    padding: 15px 0 15px 30px;
}

.process-step .process-number {
    position: absolute;
    left: -24px;
    top: 12px;
    width: 30px;
    height: 30px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 0.85rem;
}

.process-step .process-content {
    padding-left: 10px;
}

.process-step .process-content h6 {
    margin-bottom: 2px;
}

/* ===== PORTFOLIO ===== */
.portfolio-item {
    position: relative;
    overflow: hidden;
    border-radius: 12px;
    cursor: pointer;
}

.portfolio-item img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.portfolio-item:hover img {
    transform: scale(1.08);
}

.portfolio-item .portfolio-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 15px;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
    color: white;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.portfolio-item:hover .portfolio-overlay {
    opacity: 1;
}

/* ===== SIDEBAR ===== */
.sidebar-cta {
    background: white;
    border-radius: 16px;
    padding: 25px;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.06);
    margin-bottom: 25px;
}

.sidebar-card {
    background: white;
    border-radius: 16px;
    padding: 22px 25px;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.06);
    margin-bottom: 20px;
}

.sidebar-card h6 {
    font-weight: 700;
    margin-bottom: 15px;
}

.overview-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.overview-list li {
    display: flex;
    justify-content: space-between;
    padding: 10px 0;
    border-bottom: 1px solid #f0f0f0;
}

.overview-list li:last-child {
    border-bottom: none;
}

.overview-list .label {
    color: #6c757d;
    font-size: 0.9rem;
}

.overview-list .value {
    font-weight: 600;
    font-size: 0.9rem;
}

.related-list {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.related-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 14px;
    background: #f8f9fa;
    border-radius: 10px;
    color: #333;
    text-decoration: none;
    transition: all 0.3s ease;
}

.related-item:hover {
    background: #667eea;
    color: white;
}

.related-item i {
    width: 20px;
}

.testimonial-card {
    background: linear-gradient(135deg, #f8f9fa, #e8ecf1);
}

/* ===== CTA SECTION ===== */
.cta-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 70px 0;
}

.cta-section .btn-light {
    border-radius: 30px;
    padding: 12px 35px;
    font-weight: 600;
}

.cta-section .btn-outline-light:hover {
    background: white;
    color: #667eea;
}

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {
    .service-detail-hero h1 {
        font-size: 2.2rem;
    }
    
    .service-detail-hero {
        padding: 40px 0 30px;
    }
    
    .benefits-grid {
        grid-template-columns: 1fr;
    }
    
    .process-timeline {
        padding-left: 20px;
    }
    
    .process-step {
        padding-left: 20px;
    }
    
    .process-step .process-number {
        left: -20px;
        width: 26px;
        height: 26px;
        font-size: 0.7rem;
    }
    
    .sidebar-cta,
    .sidebar-card {
        padding: 18px;
    }
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // ===== SMOOTH SCROLL =====
    $('a[href^="#"]').on('click', function(e) {
        var target = $(this).attr('href');
        if (target && target.startsWith('#')) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: $(target).offset().top - 70
            }, 500);
        }
    });

    // ===== PORTFOLIO HOVER =====
    $('.portfolio-item').on('mouseenter', function() {
        $(this).find('.portfolio-overlay').fadeIn(300);
    }).on('mouseleave', function() {
        $(this).find('.portfolio-overlay').fadeOut(300);
    });

    console.log('✅ Service detail page loaded!');
});
</script>
@endpush