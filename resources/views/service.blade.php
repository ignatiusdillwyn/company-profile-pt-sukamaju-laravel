@extends('layout')

@section('title', 'Services - DummyCorp')

@section('content')
<!-- ========== HERO SERVICES ========== -->
<section class="services-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <span class="badge bg-warning text-dark mb-3">
                    <i class="fas fa-cogs me-1"></i> Our Services
                </span>
                <h1>What We <span style="color: #ffd700;">Offer</span></h1>
                <p class="lead">
                    We provide a wide range of digital solutions to help your business grow.
                    From web development to AI solutions, we've got you covered.
                </p>
                <div class="d-flex gap-3 flex-wrap mt-3">
                    <a href="#services-list" class="btn btn-light">
                        <i class="fas fa-arrow-down me-2"></i> Explore Services
                    </a>
                    <a href="#pricing" class="btn btn-outline-light">
                        <i class="fas fa-tag me-2"></i> View Pricing
                    </a>
                </div>
            </div>
            <div class="col-lg-5 text-center d-none d-lg-block">
                <img src="https://via.placeholder.com/400x300/ffffff/667eea?text=Our+Services" 
                     alt="Services" class="img-fluid" style="filter: drop-shadow(0 10px 40px rgba(0,0,0,0.2));" />
            </div>
        </div>
    </div>
</section>

<!-- ========== STATS ========== -->
<section class="py-4 bg-light">
    <div class="container">
        <div class="row text-center g-3">
            <div class="col-4 col-md-3">
                <div class="fw-bold display-6 text-primary" id="totalServices">0</div>
                <small class="text-muted">Total Services</small>
            </div>
            <div class="col-4 col-md-3">
                <div class="fw-bold display-6 text-primary" id="totalClients">0</div>
                <small class="text-muted">Happy Clients</small>
            </div>
            <div class="col-4 col-md-3">
                <div class="fw-bold display-6 text-primary" id="totalProjects">0</div>
                <small class="text-muted">Projects Done</small>
            </div>
            <div class="col-12 col-md-3">
                <div class="fw-bold display-6 text-primary" id="totalAwards">0</div>
                <small class="text-muted">Awards Won</small>
            </div>
        </div>
    </div>
</section>

<!-- ========== SERVICES LIST ========== -->
<section class="py-5" id="services-list">
    <div class="container">
        <!-- Filter & Search -->
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="fas fa-search text-muted"></i>
                    </span>
                    <input type="text" class="form-control border-start-0" 
                           placeholder="Search services..." id="searchInput" />
                </div>
            </div>
            <div class="col-md-6">
                <select class="form-select" id="categoryFilter">
                    <option value="">All Categories</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Mobile Development">Mobile Development</option>
                    <option value="Design">Design</option>
                    <option value="AI & Machine Learning">AI & Machine Learning</option>
                    <option value="Cloud Services">Cloud Services</option>
                    <option value="DevOps">DevOps</option>
                    <option value="Consulting">Consulting</option>
                    <option value="Digital Marketing">Digital Marketing</option>
                </select>
            </div>
        </div>

        <!-- ===== DATA DUMMY SERVICES ===== -->
        @php
            $services = [
                [
                    'id' => 1,
                    'title' => 'Web Development',
                    'excerpt' => 'Build responsive, high-performance websites with modern technologies. We create custom web solutions tailored to your business needs.',
                    'category' => 'Web Development',
                    'icon' => 'fa-code',
                    'image' => 'https://via.placeholder.com/800x500/667eea/FFFFFF?text=Web+Development',
                    'features' => ['Custom Web Design', 'E-commerce Solutions', 'CMS Development', 'API Integration', 'Responsive Design'],
                    'price' => 'Start from $999',
                    'rating' => 4.9,
                    'reviews' => 128,
                    'delivery_time' => '4-6 weeks',
                    'is_popular' => true,
                    'is_new' => false,
                ],
                [
                    'id' => 2,
                    'title' => 'Mobile App Development',
                    'excerpt' => 'Create native and cross-platform mobile applications for iOS and Android with cutting-edge technology and user-centric design.',
                    'category' => 'Mobile Development',
                    'icon' => 'fa-mobile-alt',
                    'image' => 'https://via.placeholder.com/800x500/764ba2/FFFFFF?text=Mobile+App',
                    'features' => ['iOS & Android Apps', 'React Native', 'Flutter', 'UI/UX Design', 'App Store Optimization'],
                    'price' => 'Start from $2,999',
                    'rating' => 4.8,
                    'reviews' => 96,
                    'delivery_time' => '8-12 weeks',
                    'is_popular' => true,
                    'is_new' => false,
                ],
                [
                    'id' => 3,
                    'title' => 'UI/UX Design',
                    'excerpt' => 'Design intuitive, user-friendly interfaces that deliver exceptional user experiences and drive engagement for your digital products.',
                    'category' => 'Design',
                    'icon' => 'fa-pencil-ruler',
                    'image' => 'https://via.placeholder.com/800x500/ff6b6b/FFFFFF?text=UI+UX+Design',
                    'features' => ['User Research', 'Wireframing', 'Prototyping', 'Usability Testing', 'Design Systems'],
                    'price' => 'Start from $799',
                    'rating' => 4.9,
                    'reviews' => 156,
                    'delivery_time' => '3-5 weeks',
                    'is_popular' => true,
                    'is_new' => false,
                ],
                [
                    'id' => 4,
                    'title' => 'AI & Machine Learning Solutions',
                    'excerpt' => 'Leverage the power of artificial intelligence and machine learning to transform your business processes and gain competitive advantage.',
                    'category' => 'AI & Machine Learning',
                    'icon' => 'fa-brain',
                    'image' => 'https://via.placeholder.com/800x500/ffa502/FFFFFF?text=AI+Solutions',
                    'features' => ['Natural Language Processing', 'Computer Vision', 'Predictive Analytics', 'Chatbots', 'AI Automation'],
                    'price' => 'Custom Pricing',
                    'rating' => 4.7,
                    'reviews' => 67,
                    'delivery_time' => '8-16 weeks',
                    'is_popular' => false,
                    'is_new' => true,
                ],
                [
                    'id' => 5,
                    'title' => 'Cloud Services & Infrastructure',
                    'excerpt' => 'Migrate and manage your infrastructure on the cloud with scalable solutions for AWS, Google Cloud, and Azure platforms.',
                    'category' => 'Cloud Services',
                    'icon' => 'fa-cloud',
                    'image' => 'https://via.placeholder.com/800x500/2ed573/FFFFFF?text=Cloud+Services',
                    'features' => ['AWS Solutions', 'Google Cloud', 'Azure', 'Cloud Migration', 'Serverless Architecture'],
                    'price' => 'Start from $1,500',
                    'rating' => 4.8,
                    'reviews' => 84,
                    'delivery_time' => '4-8 weeks',
                    'is_popular' => false,
                    'is_new' => false,
                ],
                [
                    'id' => 6,
                    'title' => 'DevOps & CI/CD Solutions',
                    'excerpt' => 'Implement modern DevOps practices and continuous integration/deployment pipelines to streamline your development workflow.',
                    'category' => 'DevOps',
                    'icon' => 'fa-infinity',
                    'image' => 'https://via.placeholder.com/800x500/ff6b81/FFFFFF?text=DevOps',
                    'features' => ['CI/CD Pipelines', 'Docker & Kubernetes', 'Infrastructure as Code', 'Monitoring & Logging', 'Automation'],
                    'price' => 'Start from $1,200',
                    'rating' => 4.6,
                    'reviews' => 53,
                    'delivery_time' => '3-6 weeks',
                    'is_popular' => false,
                    'is_new' => false,
                ],
                [
                    'id' => 7,
                    'title' => 'IT Consulting & Strategy',
                    'excerpt' => 'Get expert guidance on technology strategy, digital transformation, and IT architecture to drive your business growth.',
                    'category' => 'Consulting',
                    'icon' => 'fa-handshake',
                    'image' => 'https://via.placeholder.com/800x500/667eea/FFFFFF?text=IT+Consulting',
                    'features' => ['Digital Strategy', 'Technology Assessment', 'Architecture Design', 'Digital Transformation', 'Risk Analysis'],
                    'price' => 'Hourly Rate',
                    'rating' => 4.9,
                    'reviews' => 92,
                    'delivery_time' => 'Ongoing',
                    'is_popular' => false,
                    'is_new' => false,
                ],
                [
                    'id' => 8,
                    'title' => 'Digital Marketing Services',
                    'excerpt' => 'Increase your online presence and reach your target audience with comprehensive digital marketing strategies and campaigns.',
                    'category' => 'Digital Marketing',
                    'icon' => 'fa-chart-line',
                    'image' => 'https://via.placeholder.com/800x500/ff6b6b/FFFFFF?text=Digital+Marketing',
                    'features' => ['SEO Optimization', 'Content Marketing', 'Social Media Management', 'PPC Advertising', 'Analytics & Reporting'],
                    'price' => 'Start from $599',
                    'rating' => 4.7,
                    'reviews' => 112,
                    'delivery_time' => 'Ongoing',
                    'is_popular' => false,
                    'is_new' => true,
                ],
                [
                    'id' => 9,
                    'title' => 'Database Design & Optimization',
                    'excerpt' => 'Design, optimize, and manage your databases for maximum performance, scalability, and reliability for your applications.',
                    'category' => 'Web Development',
                    'icon' => 'fa-database',
                    'image' => 'https://via.placeholder.com/800x500/2ed573/FFFFFF?text=Database',
                    'features' => ['Database Design', 'Performance Tuning', 'Data Migration', 'Backup & Recovery', 'Query Optimization'],
                    'price' => 'Start from $899',
                    'rating' => 4.5,
                    'reviews' => 45,
                    'delivery_time' => '2-4 weeks',
                    'is_popular' => false,
                    'is_new' => false,
                ],
                [
                    'id' => 10,
                    'title' => 'Security & Penetration Testing',
                    'excerpt' => 'Protect your applications and infrastructure with comprehensive security assessments, penetration testing, and vulnerability analysis.',
                    'category' => 'Consulting',
                    'icon' => 'fa-shield-alt',
                    'image' => 'https://via.placeholder.com/800x500/ff6b81/FFFFFF?text=Security',
                    'features' => ['Penetration Testing', 'Vulnerability Assessment', 'Security Audits', 'Compliance', 'Incident Response'],
                    'price' => 'Start from $1,800',
                    'rating' => 4.8,
                    'reviews' => 38,
                    'delivery_time' => '2-3 weeks',
                    'is_popular' => false,
                    'is_new' => true,
                ],
            ];
        @endphp

        <!-- Services Grid -->
        <div class="row g-4" id="servicesGrid">
            @foreach($services as $service)
            <div class="col-lg-4 col-md-6 service-item" 
                 data-category="{{ $service['category'] }}"
                 data-title="{{ strtolower($service['title']) }}">
                <div class="service-card">
                    <!-- Badge -->
                    <div class="service-badges">
                        @if($service['is_popular'])
                        <span class="badge bg-danger">
                            <i class="fas fa-fire me-1"></i> Popular
                        </span>
                        @endif
                        @if($service['is_new'])
                        <span class="badge bg-success">
                            <i class="fas fa-star me-1"></i> New
                        </span>
                        @endif
                    </div>

                    <!-- Image -->
                    <div class="service-image">
                        <img src="{{ $service['image'] }}" alt="{{ $service['title'] }}" />
                        <div class="service-overlay">
                            <span class="service-price">{{ $service['price'] }}</span>
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="service-body">
                        <div class="service-icon">
                            <i class="fas {{ $service['icon'] }}"></i>
                        </div>
                        <span class="service-category">{{ $service['category'] }}</span>
                        <h5 class="service-title">{{ $service['title'] }}</h5>
                        <p class="service-excerpt">{{ $service['excerpt'] }}</p>

                        <!-- Features -->
                        <div class="service-features">
                            @foreach($service['features'] as $feature)
                            <span class="feature-tag">
                                <i class="fas fa-check-circle text-primary"></i>
                                {{ $feature }}
                            </span>
                            @endforeach
                        </div>

                        <!-- Footer -->
                        <div class="service-footer">
                            <div class="service-rating">
                                <i class="fas fa-star text-warning"></i>
                                <span class="fw-semibold">{{ $service['rating'] }}</span>
                                <span class="text-muted">({{ $service['reviews'] }} reviews)</span>
                            </div>
                            <div class="service-time">
                                <i class="far fa-clock text-muted me-1"></i>
                                <span class="text-muted">{{ $service['delivery_time'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ========== PRICING SECTION ========== -->
<section class="py-5 bg-light" id="pricing">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary bg-opacity-10 text-primary py-2 px-3 mb-3 fw-normal">
                <i class="fas fa-tag me-1"></i> Pricing Plans
            </span>
            <h2 class="fw-bold">Choose Your <span style="color: #667eea;">Plan</span></h2>
            <p class="text-muted">Flexible pricing options to fit your business needs</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h6 class="text-uppercase text-muted">Basic</h6>
                        <div class="pricing-price">
                            <span class="currency">$</span>
                            <span class="amount">499</span>
                            <span class="period">/mo</span>
                        </div>
                        <p class="text-muted">Perfect for startups and small businesses</p>
                    </div>
                    <ul class="pricing-features">
                        <li><i class="fas fa-check-circle text-primary"></i> 1 Website Development</li>
                        <li><i class="fas fa-check-circle text-primary"></i> 5 Pages</li>
                        <li><i class="fas fa-check-circle text-primary"></i> Mobile Responsive</li>
                        <li><i class="fas fa-check-circle text-primary"></i> 1 Month Support</li>
                        <li><i class="fas fa-times-circle text-muted"></i> Custom Design</li>
                        <li><i class="fas fa-times-circle text-muted"></i> SEO Optimization</li>
                    </ul>
                    <a href="#" class="btn btn-outline-primary w-100">Get Started</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="pricing-card popular-plan">
                    <div class="popular-badge">Most Popular</div>
                    <div class="pricing-header">
                        <h6 class="text-uppercase text-muted">Professional</h6>
                        <div class="pricing-price">
                            <span class="currency">$</span>
                            <span class="amount">999</span>
                            <span class="period">/mo</span>
                        </div>
                        <p class="text-muted">Ideal for growing businesses</p>
                    </div>
                    <ul class="pricing-features">
                        <li><i class="fas fa-check-circle text-primary"></i> 3 Website Development</li>
                        <li><i class="fas fa-check-circle text-primary"></i> 15 Pages</li>
                        <li><i class="fas fa-check-circle text-primary"></i> Mobile Responsive</li>
                        <li><i class="fas fa-check-circle text-primary"></i> 3 Months Support</li>
                        <li><i class="fas fa-check-circle text-primary"></i> Custom Design</li>
                        <li><i class="fas fa-check-circle text-primary"></i> Basic SEO Optimization</li>
                    </ul>
                    <a href="#" class="btn btn-primary w-100">Get Started</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h6 class="text-uppercase text-muted">Enterprise</h6>
                        <div class="pricing-price">
                            <span class="currency">$</span>
                            <span class="amount">2,499</span>
                            <span class="period">/mo</span>
                        </div>
                        <p class="text-muted">For large organizations and enterprises</p>
                    </div>
                    <ul class="pricing-features">
                        <li><i class="fas fa-check-circle text-primary"></i> Unlimited Websites</li>
                        <li><i class="fas fa-check-circle text-primary"></i> Unlimited Pages</li>
                        <li><i class="fas fa-check-circle text-primary"></i> Mobile Responsive</li>
                        <li><i class="fas fa-check-circle text-primary"></i> 12 Months Support</li>
                        <li><i class="fas fa-check-circle text-primary"></i> Custom Design</li>
                        <li><i class="fas fa-check-circle text-primary"></i> Advanced SEO Optimization</li>
                    </ul>
                    <a href="#" class="btn btn-outline-primary w-100">Contact Sales</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== WHY CHOOSE US ========== -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary bg-opacity-10 text-primary py-2 px-3 mb-3 fw-normal">
                <i class="fas fa-medal me-1"></i> Why Choose Us
            </span>
            <h2 class="fw-bold">Why <span style="color: #667eea;">Choose Us</span></h2>
            <p class="text-muted">We deliver excellence in every project</p>
        </div>

        <div class="row g-4">
            <div class="col-md-3 col-6">
                <div class="why-card text-center">
                    <div class="why-icon" style="color: #667eea;">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h6>Expert Team</h6>
                    <p class="text-muted small">15+ years experience</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="why-card text-center">
                    <div class="why-icon" style="color: #2ed573;">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h6>On-Time Delivery</h6>
                    <p class="text-muted small">99% on-time rate</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="why-card text-center">
                    <div class="why-icon" style="color: #ffa502;">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h6>24/7 Support</h6>
                    <p class="text-muted small">Always here to help</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="why-card text-center">
                    <div class="why-icon" style="color: #ff6b6b;">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h6>Satisfaction</h6>
                    <p class="text-muted small">100% client satisfaction</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== FAQ SECTION ========== -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary bg-opacity-10 text-primary py-2 px-3 mb-3 fw-normal">
                <i class="fas fa-question-circle me-1"></i> FAQ
            </span>
            <h2 class="fw-bold">Frequently Asked <span style="color: #667eea;">Questions</span></h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                How long does it take to complete a project?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Project timelines vary depending on complexity. Typically, web development projects take 4-6 weeks, mobile apps take 8-12 weeks, and consulting projects are ongoing.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Do you offer maintenance and support?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes! We offer ongoing maintenance and support packages to keep your applications running smoothly. Our support team is available 24/7 for critical issues.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                What is your pricing model?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We offer flexible pricing options including fixed-price projects, hourly rates, and monthly retainer packages. Contact us for a custom quote tailored to your specific needs.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                Do you provide post-launch support?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Absolutely! We provide post-launch support to ensure your application runs smoothly. We offer bug fixes, performance optimization, and feature updates as needed.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== CTA SECTION ========== -->
<section class="cta-section">
    <div class="container text-center">
        <h2 class="fw-bold">Ready to Get <span style="color: #ffd700;">Started?</span></h2>
        <p class="lead mb-4">Let's bring your ideas to life with our expert services.</p>
        <a href="#" class="btn btn-light btn-lg">
            <i class="fas fa-rocket me-2"></i> Get a Free Quote
        </a>
    </div>
</section>
@endsection

@push('styles')
<style>
/* ===== HERO ===== */
.services-hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 80px 0 70px;
}

.services-hero h1 {
    font-size: 3.5rem;
    font-weight: 700;
}

.services-hero .lead {
    font-size: 1.15rem;
    opacity: 0.9;
}

/* ===== SERVICE CARD ===== */
.service-card {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.06);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
    position: relative;
}

.service-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
}

.service-card .service-image {
    position: relative;
    overflow: hidden;
    height: 200px;
}

.service-card .service-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.service-card:hover .service-image img {
    transform: scale(1.08);
}

.service-card .service-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 15px;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
}

.service-card .service-price {
    color: white;
    font-weight: 700;
    font-size: 1.1rem;
}

.service-card .service-badges {
    position: absolute;
    top: 12px;
    left: 12px;
    display: flex;
    gap: 6px;
    z-index: 2;
}

.service-card .service-body {
    padding: 20px 22px 18px;
    flex: 1;
    display: flex;
    flex-direction: column;
    position: relative;
}

.service-card .service-icon {
    position: absolute;
    top: -24px;
    right: 20px;
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.3rem;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
}

.service-card .service-category {
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: #667eea;
    font-weight: 600;
    margin-bottom: 4px;
}

.service-card .service-title {
    font-size: 1.15rem;
    font-weight: 700;
    margin-bottom: 8px;
    color: #1a1a2e;
}

.service-card .service-excerpt {
    font-size: 0.9rem;
    color: #6c757d;
    flex: 1;
    margin-bottom: 12px;
}

.service-card .service-features {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-bottom: 14px;
}

.service-card .feature-tag {
    font-size: 0.75rem;
    background: #f0f0f0;
    padding: 3px 10px;
    border-radius: 12px;
    color: #333;
}

.service-card .feature-tag i {
    font-size: 0.65rem;
    margin-right: 3px;
}

.service-card .service-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-top: 1px solid #f0f0f0;
    padding-top: 12px;
    font-size: 0.85rem;
}

.service-card .service-rating i {
    color: #ffa502;
}

/* ===== PRICING CARDS ===== */
.pricing-card {
    background: white;
    border-radius: 16px;
    padding: 30px 25px;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.06);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-align: center;
    height: 100%;
    position: relative;
}

.pricing-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
}

.pricing-card.popular-plan {
    border: 2px solid #667eea;
    position: relative;
}

.pricing-card .popular-badge {
    position: absolute;
    top: -12px;
    left: 50%;
    transform: translateX(-50%);
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 4px 20px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
}

.pricing-card .pricing-header {
    margin-bottom: 20px;
}

.pricing-card .pricing-price {
    margin: 15px 0;
}

.pricing-card .pricing-price .currency {
    font-size: 1.5rem;
    font-weight: 700;
    color: #667eea;
    vertical-align: top;
}

.pricing-card .pricing-price .amount {
    font-size: 3.5rem;
    font-weight: 700;
    color: #1a1a2e;
}

.pricing-card .pricing-price .period {
    font-size: 1rem;
    color: #6c757d;
}

.pricing-card .pricing-features {
    list-style: none;
    padding: 0;
    text-align: left;
    margin-bottom: 20px;
}

.pricing-card .pricing-features li {
    padding: 8px 0;
    border-bottom: 1px solid #f0f0f0;
    display: flex;
    align-items: center;
    gap: 10px;
}

.pricing-card .pricing-features li:last-child {
    border-bottom: none;
}

.pricing-card .pricing-features i {
    width: 20px;
}

/* ===== WHY CARDS ===== */
.why-card {
    padding: 20px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.04);
    transition: transform 0.3s ease;
}

.why-card:hover {
    transform: translateY(-4px);
}

.why-card .why-icon {
    font-size: 2.5rem;
    margin-bottom: 10px;
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

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {
    .services-hero h1 {
        font-size: 2.2rem;
    }
    
    .services-hero {
        padding: 50px 0 40px;
    }
    
    .service-card .service-image {
        height: 160px;
    }
    
    .pricing-card .pricing-price .amount {
        font-size: 2.8rem;
    }
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // ===== DATA STATS =====
    var totalServices = 10;
    var totalClients = 356;
    var totalProjects = 524;
    var totalAwards = 24;
    
    // ===== ANIMASI COUNTER =====
    function animateCounter(elementId, target) {
        var current = 0;
        var increment = Math.ceil(target / 50);
        var element = $(elementId);
        
        var interval = setInterval(function() {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(interval);
            }
            element.text(current);
        }, 30);
    }
    
    setTimeout(function() {
        animateCounter('#totalServices', totalServices);
        animateCounter('#totalClients', totalClients);
        animateCounter('#totalProjects', totalProjects);
        animateCounter('#totalAwards', totalAwards);
    }, 300);

    // ===== SEARCH =====
    $('#searchInput').on('keyup', function() {
        var query = $(this).val().toLowerCase();
        $('.service-item').each(function() {
            var title = $(this).data('title');
            $(this).toggle(title.includes(query));
        });
        checkEmptyResults();
    });

    // ===== CATEGORY FILTER =====
    $('#categoryFilter').on('change', function() {
        var category = $(this).val();
        $('.service-item').each(function() {
            var itemCategory = $(this).data('category');
            $(this).toggle(category === '' || itemCategory === category);
        });
        checkEmptyResults();
    });

    // ===== CHECK EMPTY =====
    function checkEmptyResults() {
        var visible = $('.service-item:visible').length;
        if (visible === 0) {
            if ($('#emptyMessage').length === 0) {
                $('#servicesGrid').append(
                    '<div id="emptyMessage" class="col-12 text-center py-5">' +
                        '<i class="fas fa-search fa-3x text-muted mb-3"></i>' +
                        '<h4>No services found</h4>' +
                        '<p class="text-muted">Try adjusting your search or filter.</p>' +
                    '</div>'
                );
            }
        } else {
            $('#emptyMessage').remove();
        }
    }

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

    console.log('✅ Services page loaded with ' + $('.service-item').length + ' services!');
});
</script>
@endpush