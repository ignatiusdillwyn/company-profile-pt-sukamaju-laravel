@extends('layout')
@section('content')
    <!-- ========== HERO SECTION ========== -->
    <section class="hero-section" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold">Delivering Digital <br /><span style="color:#ffd700;">Excellence</span>
                        Worldwide</h1>
                    <p class="lead mt-3">
                        PT Sukamaju is a trusted technology partner committed to delivering innovative,
                        scalable, and high-quality digital solutions that drive business growth and operational efficiency.
                    </p>
                    <!-- <div class="d-flex gap-3 mt-4 flex-wrap">
                        <a href="#" class="btn btn-primary btn-lg">
                            <i class="fas fa-rocket me-2"></i> Get Started
                        </a>
                        <a href="#" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-play-circle me-2"></i> Watch Demo
                        </a>
                    </div> -->
                </div>
                {{-- <div class="col-lg-6 text-center mt-5 mt-lg-0">
                    <img src="https://placehold.co/600x400" alt="Hero Image" class="img-fluid rounded-4 shadow-lg" />
                </div> --}}
            </div>
        </div>
    </section>

    <!-- ========== STATISTICS ========== -->
    <section class="py-5 bg-light" id="stats">
        <div class="container">
            <div class="row text-center">
                <div class="col-6 col-md-3 mb-3 mb-md-0">
                    <div class="counter-number" id="counter1">0</div>
                    <p class="text-muted">Clients Worldwide</p>
                </div>
                <div class="col-6 col-md-3 mb-3 mb-md-0">
                    <div class="counter-number" id="counter2">0</div>
                    <p class="text-muted">Projects Completed</p>
                </div>
                <div class="col-6 col-md-3 mb-3 mb-md-0">
                    <div class="counter-number" id="counter3">0</div>
                    <p class="text-muted">Industry Awards</p>
                </div>
                <div class="col-6 col-md-3">
                    <div class="counter-number" id="counter4">0</div>
                    <p class="text-muted">Expert Team</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== ABOUT / FEATURES ========== -->
    <section class="py-5" id="features">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Why Partner With <span style="color:#667eea;">PT Sukamaju?</span></h2>
                <p class="text-muted">We combine technical expertise with business acumen to deliver exceptional results</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card card-hover h-100 p-4 text-center border-0 shadow-sm">
                        <div class="feature-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <h5>Cutting-Edge Technology</h5>
                        <p class="text-muted">Leveraging the latest frameworks and tools to build high-performance,
                            future-ready solutions.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-hover h-100 p-4 text-center border-0 shadow-sm">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h5>Enterprise-Grade Security</h5>
                        <p class="text-muted">Implementing robust security protocols to safeguard your critical business
                            data and intellectual property.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-hover h-100 p-4 text-center border-0 shadow-sm">
                        <div class="feature-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h5>Dedicated Support Excellence</h5>
                        <p class="text-muted">Providing round-the-clock technical support and strategic guidance to ensure
                            your success.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== SERVICES ========== -->
    <section class="py-5 bg-light" id="services">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Our Core <span style="color:#667eea;">Services</span></h2>
                <p class="text-muted">Comprehensive digital solutions tailored to meet your unique business requirements</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card card-hover h-100 shadow-sm">
                        <div class="card-body text-center p-4">
                            <img width="300" height="300"
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeYiQaAak4RY_wCUNAnNQW50ibECVyte0c5PehQ8cO2136FbSrseU5RFB3&s=10"
                                alt="Web Development" class="mb-3 rounded-circle" />
                            <h5 class="card-title">Web Development</h5>
                            <p class="card-text text-muted">Enterprise-grade web applications built with Laravel, React, and
                                modern PHP frameworks.</p>
                            <a href="#" class="btn btn-outline-primary btn-sm">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card card-hover h-100 shadow-sm">
                        <div class="card-body text-center p-4">
                            <img width="300" height="300"
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSFi9cbjC5kQ8iW9pgKxAfNUyE-2fbW6ij55WpnroihpMj0LRG62qQZKllZ&s=10"
                                alt="Mobile App" class="mb-3 rounded-circle" />
                            <h5 class="card-title">Mobile App Development</h5>
                            <p class="card-text text-muted">Cross-platform mobile solutions using Flutter and React Native
                                for iOS and Android.</p>
                            <a href="#" class="btn btn-outline-primary btn-sm">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card card-hover h-100 shadow-sm">
                        <div class="card-body text-center p-4">
                            <img width="300" height="300"
                                src="https://t2conline.com/wp-content/uploads/2025/01/Screenshot-2025-01-19-205050.jpg"
                                alt="AI Solutions" class="mb-3 rounded-circle" />
                            <h5 class="card-title">AI &amp; Automation</h5>
                            <p class="card-text text-muted">Intelligent automation and machine learning solutions to
                                optimize business processes.</p>
                            <a href="#" class="btn btn-outline-primary btn-sm">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== TESTIMONIALS ========== -->
    <section class="py-5" id="testimonials">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">What Our <span style="color:#667eea;">Clients Say</span></h2>
                <p class="text-muted">Testimonials from business leaders who trust PT Sukamaju</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card card-hover h-100 p-4 shadow-sm border-0">
                        <div class="d-flex align-items-center mb-3">
                            <img width="600" height="400"
                                src="https://i.abcnewsfe.com/a/e36dcae9-e3c4-4824-9a99-79abcb25fd5c/mike-johnson-5-ap-gmh-251022_1761157696924_hpMain_square.jpg?w=384"
                                alt="John Doe" class="testimonial-img me-3" />
                            <div>
                                <h6 class="fw-bold mb-0">John Doe</h6>
                                <small class="text-muted">CEO, TechCorp</small>
                            </div>
                        </div>
                        <p class="text-muted">
                            <i class="fas fa-quote-left text-primary me-1"></i>
                            PT Sukamaju has been instrumental in our digital transformation journey.
                            Their technical expertise and commitment to quality are truly exceptional.
                            <i class="fas fa-quote-right text-primary ms-1"></i>
                        </p>
                        <div class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-hover h-100 p-4 shadow-sm border-0">
                        <div class="d-flex align-items-center mb-3">
                            <img width="600" height="400"
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSW06uuf6smo7sZfF7w-a92pjRF75RkUqQZalsdXO3TvVkGw6nQwm4ouxM&s=10"
                                alt="Jane Smith" class="testimonial-img me-3" />
                            <div>
                                <h6 class="fw-bold mb-0">Jane Smith</h6>
                                <small class="text-muted">CTO, StartupHub</small>
                            </div>
                        </div>
                        <p class="text-muted">
                            <i class="fas fa-quote-left text-primary me-1"></i>
                            A reliable and innovative partner. The team delivered our platform ahead of schedule
                            with zero critical issues. Highly recommended.
                            <i class="fas fa-quote-right text-primary ms-1"></i>
                        </p>
                        <div class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-hover h-100 p-4 shadow-sm border-0">
                        <div class="d-flex align-items-center mb-3">
                            <img width="600" height="400"
                                src="https://korika.id/wp-content/uploads/2017/10/speaker3-min.jpg" alt="Mike Johnson"
                                class="testimonial-img me-3" />
                            <div>
                                <h6 class="fw-bold mb-0">Mike Johnson</h6>
                                <small class="text-muted">Founder, DevStudio</small>
                            </div>
                        </div>
                        <p class="text-muted">
                            <i class="fas fa-quote-left text-primary me-1"></i>
                            Partnering with PT Sukamaju was one of the best business decisions we've made.
                            Their strategic insights and technical execution are outstanding.
                            <i class="fas fa-quote-right text-primary ms-1"></i>
                        </p>
                        <div class="text-warning">
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

    <!-- ========== CONTACT / CTA ========== -->
    <section class="py-5 bg-primary bg-gradient text-white" id="contact">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="fw-bold">Let's Build Your Future Together</h2>
                    <p class="lead">Partner with PT Sukamaju for innovative, results-driven solutions.</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="#" class="btn btn-light btn-lg">
                        <i class="fas fa-envelope me-2"></i> Contact Our Team
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection