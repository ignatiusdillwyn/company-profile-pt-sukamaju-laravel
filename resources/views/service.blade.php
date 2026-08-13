@extends('layout')

@section('title', 'Services - DummyCorp')

@section('content')
<!-- ========== HERO SERVICES ========== -->
<section class="services-hero py-5">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <span class="badge bg-warning text-dark rounded-pill px-4 py-2 mb-3 d-inline-flex align-items-center">
                    <i class="fas fa-cogs me-2"></i> Our Services
                </span>
                <h1 class="display-3 fw-bold text-black">What We <span class="text-warning">Offer</span></h1>
                <p class="lead text-black-50 mb-4" style="max-width: 500px;">
                    We provide a wide range of digital solutions to help your business grow.
                    From web development to AI solutions, we've got you covered.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="#services-list" class="btn btn-light btn-lg rounded-pill px-5 py-3 fw-semibold shadow-sm">
                        <i class="fas fa-arrow-down me-2"></i> Explore Services
                    </a>
                    <a href="#contact" class="btn btn-outline-light btn-lg rounded-pill px-5 py-3 fw-semibold">
                        <i class="fas fa-headset me-2"></i> Contact Us
                    </a>
                </div>
            </div>
            <!-- <div class="col-lg-5 text-center d-none d-lg-block">
                <div class="hero-illustration bg-black bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center"
                    style="width: 300px; height: 300px; backdrop-filter: blur(10px); border: 2px solid rgba(255,255,255,0.1);">
                    <i class="fas fa-cubes text-black-50" style="font-size: 8rem;"></i>
                </div>
            </div> -->
        </div>
    </div>
</section>

<!-- ========== SERVICES LIST ========== -->
<section class="services-section py-5" id="services-list">
    <div class="container">
        <!-- Header -->
        <div class="row mb-5">
            <div class="col-lg-8">
                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-4 py-2 mb-3">
                    <i class="fas fa-th-list me-1"></i> Our Services
                </span>
                <h2 class="display-5 fw-bold">Explore Our <span class="text-primary">Services</span></h2>
                <p class="text-muted">Discover the perfect solution for your business needs</p>
            </div>
            <div class="col-lg-4 d-flex align-items-center justify-content-lg-end">
                <form action="{{ route('service') }}" method="GET" class="w-100" style="max-width: 300px;">
                    <div class="search-box bg-white rounded-pill px-3 py-2 border shadow-sm w-100 d-flex align-items-center">
                        <i class="fas fa-search text-muted me-2" style="font-size: 0.9rem;"></i>
                        <input type="text"
                            name="search"
                            id="searchInput"
                            class="search-input border-0 bg-transparent flex-grow-1"
                            placeholder="Search services..."
                            value="{{ request('search') }}"
                            style="outline: none; min-width: 0; font-size: 0.95rem;">
                        @if(request('search'))
                        <a href="{{ route('service') }}" class="text-muted text-decoration-none ms-2" style="font-size: 0.9rem;">
                            <i class="fas fa-times"></i>
                        </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <!-- Search Result Info -->
        @if(request('search'))
        <div class="alert alert-info rounded-4 d-flex justify-content-between align-items-center mb-4">
            <div>
                <i class="fas fa-search me-2"></i>
                Showing results for: <strong>"{{ request('search') }}"</strong>
                <span class="badge bg-primary ms-2">
                    @if(is_object($data) && method_exists($data, 'count'))
                    {{ $data->count() }}
                    @elseif(is_array($data))
                    {{ count($data) }}
                    @else
                    0
                    @endif
                    results found
                </span>
            </div>
            <a href="{{ route('service') }}" class="btn btn-sm btn-outline-primary rounded-pill">
                <i class="fas fa-times me-1"></i> Clear Search
            </a>
        </div>
        @endif

        <!-- Services Grid -->
        <div class="row g-4" id="servicesGrid">
            @php
            // Cek apakah $data adalah paginator atau array biasa
            $isPaginator = is_object($data) && method_exists($data, 'hasPages');
            $items = $isPaginator ? $data->items() : $data;
            @endphp

            @forelse($items as $index => $service)
            <div class="col-lg-4 col-md-6 service-item"
                data-title="{{ strtolower(is_object($service) ? $service->title : $service['title']) }}"
                data-category="{{ strtolower(is_object($service) ? ($service->category ?? 'general') : ($service['category'] ?? 'general')) }}">
                <div class="service-card card border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                    <!-- Badge Category -->
                    <div class="position-absolute top-0 end-0 m-3" style="z-index: 10;">
                        <span class="badge bg-primary bg-opacity-90 text-white rounded-pill px-3 py-2">
                            <i class="fas fa-tag me-1"></i>
                            {{ is_object($service) ? ($service->category ?? 'Service') : ($service['category'] ?? 'Service') }}
                        </span>
                    </div>

                    <!-- Image -->
                    <div class="service-image position-relative" style="height: 220px; overflow: hidden;">
                        <img src="{{ is_object($service) ? ($service->image ?? 'https://placehold.co/600x400/667eea/FFFFFF?text=Service') : ($service['image'] ?? 'https://placehold.co/600x400/667eea/FFFFFF?text=Service') }}"
                            alt="{{ is_object($service) ? $service->title : $service['title'] }}"
                            class="w-100 h-100 object-fit-cover" />
                        <div class="image-overlay position-absolute top-0 start-0 w-100 h-100 bg-gradient-dark"></div>
                    </div>

                    <!-- Body -->
                    <div class="card-body d-flex flex-column p-4">
                        <!-- Icon -->
                        <div class="service-icon rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center mb-3"
                            style="width: 50px; height: 50px; font-size: 1.5rem;">
                            <i class="fas fa-{{ is_object($service) ? ($service->icon ?? 'cube') : ($service['icon'] ?? 'cube') }}"></i>
                        </div>

                        <h5 class="card-title fw-bold mb-2">
                            @if(request('search'))
                            @php
                            $title = is_object($service) ? $service->title : $service['title'];
                            $search = request('search');
                            $highlighted = preg_replace('/(' . preg_quote($search, '/') . ')/i', '<span class="text-warning">$1</span>', $title);
                            @endphp
                            {!! $highlighted !!}
                            @else
                            {{ is_object($service) ? $service->title : $service['title'] }}
                            @endif
                        </h5>
                        <p class="card-text text-muted flex-grow-1" style="font-size: 0.95rem;">
                            {{ is_object($service) ? Str::limit(strip_tags($service->content ?? ''), 120) : Str::limit(strip_tags($service['content'] ?? ''), 120) }}
                        </p>

                        <!-- Features -->
                        @if(isset($service->features) && is_array($service->features))
                        <ul class="list-unstyled small mb-3">
                            @foreach(array_slice($service->features, 0, 3) as $feature)
                            <li class="mb-1">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                {{ $feature }}
                            </li>
                            @endforeach
                        </ul>
                        @endif

                        <!-- Footer -->
                        <div class="d-flex justify-content-between align-items-center mt-2 pt-2 border-top">
                            <a href="{{ route('service.detail', ['slug' => is_object($service) ? $service->slug : $service['slug']]) }}"
                                class="text-primary fw-semibold text-decoration-none d-inline-flex align-items-center gap-2 read-more">
                                Learn More <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="fas fa-search fa-4x text-muted mb-3 d-block"></i>
                <h4 class="fw-light">No services found</h4>
                <p class="text-muted">
                    @if(request('search'))
                    No results found for "<strong>{{ request('search') }}</strong>"
                    @else
                    Check back later for our services.
                    @endif
                </p>
                @if(request('search'))
                <a href="{{ route('service') }}" class="btn btn-primary rounded-pill px-4">
                    <i class="fas fa-arrow-left me-2"></i> Back to all services
                </a>
                @endif
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($isPaginator && $data->hasPages())
        <nav class="mt-5" aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                {{-- Previous Page Link --}}
                @if($data->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link rounded-3" href="#" tabindex="-1">
                        <i class="fas fa-chevron-left"></i> Previous
                    </a>
                </li>
                @else
                <li class="page-item">
                    <a class="page-link rounded-3" href="{{ $data->previousPageUrl() }}" rel="prev">
                        <i class="fas fa-chevron-left"></i> Previous
                    </a>
                </li>
                @endif

                {{-- Pagination Elements --}}
                @php
                $currentPage = $data->currentPage();
                $lastPage = $data->lastPage();
                $start = max(1, $currentPage - 2);
                $end = min($lastPage, $currentPage + 2);
                @endphp

                @if($start > 1)
                <li class="page-item">
                    <a class="page-link rounded-3" href="{{ $data->url(1) }}">1</a>
                </li>
                @if($start > 2)
                <li class="page-item disabled">
                    <span class="page-link rounded-3">...</span>
                </li>
                @endif
                @endif

                @for($i = $start; $i <= $end; $i++)
                    @if($i==$currentPage)
                    <li class="page-item active" aria-current="page">
                    <span class="page-link rounded-3">{{ $i }}</span>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link rounded-3" href="{{ $data->url($i) }}">{{ $i }}</a>
                    </li>
                    @endif
                    @endfor

                    @if($end < $lastPage)
                        @if($end < $lastPage - 1)
                        <li class="page-item disabled">
                        <span class="page-link rounded-3">...</span>
                        </li>
                        @endif
                        <li class="page-item">
                            <a class="page-link rounded-3" href="{{ $data->url($lastPage) }}">{{ $lastPage }}</a>
                        </li>
                        @endif

                        @if($data->hasMorePages())
                        <li class="page-item">
                            <a class="page-link rounded-3" href="{{ $data->nextPageUrl() }}" rel="next">
                                Next <i class="fas fa-chevron-right"></i>
                            </a>
                        </li>
                        @else
                        <li class="page-item disabled">
                            <a class="page-link rounded-3" href="#">
                                Next <i class="fas fa-chevron-right"></i>
                            </a>
                        </li>
                        @endif
            </ul>
        </nav>

        <div class="text-center text-muted small mt-3">
            Showing {{ $data->firstItem() ?? 0 }} - {{ $data->lastItem() ?? 0 }} of {{ $data->total() ?? count($data) }} services
        </div>
        @endif
    </div>
</section>

<!-- ========== WHY CHOOSE US ========== -->
<section class="why-section py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-4 py-2 mb-3">
                <i class="fas fa-medal me-1"></i> Why Choose Us
            </span>
            <h2 class="display-6 fw-bold">Why <span class="text-primary">Choose Us</span></h2>
            <p class="text-muted">We deliver excellence in every project</p>
        </div>

        <div class="row g-4">
            <div class="col-md-3 col-6">
                <div class="why-card card border-0 shadow-sm rounded-4 p-4 text-center h-100">
                    <div class="why-icon text-primary" style="font-size: 3rem;">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h6 class="fw-bold mt-2">Expert Team</h6>
                    <p class="text-muted small mb-0">15+ years experience</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="why-card card border-0 shadow-sm rounded-4 p-4 text-center h-100">
                    <div class="why-icon text-success" style="font-size: 3rem;">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h6 class="fw-bold mt-2">On-Time Delivery</h6>
                    <p class="text-muted small mb-0">99% on-time rate</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="why-card card border-0 shadow-sm rounded-4 p-4 text-center h-100">
                    <div class="why-icon text-warning" style="font-size: 3rem;">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h6 class="fw-bold mt-2">24/7 Support</h6>
                    <p class="text-muted small mb-0">Always here to help</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="why-card card border-0 shadow-sm rounded-4 p-4 text-center h-100">
                    <div class="why-icon text-danger" style="font-size: 3rem;">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h6 class="fw-bold mt-2">Satisfaction</h6>
                    <p class="text-muted small mb-0">100% client satisfaction</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== TESTIMONIALS ========== -->
<section class="testimonials-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-4 py-2 mb-3">
                <i class="fas fa-quote-left me-1"></i> Testimonials
            </span>
            <h2 class="display-6 fw-bold">What Our <span class="text-success">Clients Say</span></h2>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="testimonial-card card border-0 shadow-sm rounded-4 p-4 h-100">
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://placehold.co/50x50/667eea/FFFFFF?text=JD"
                            alt="Client"
                            class="rounded-circle me-3"
                            style="width: 50px; height: 50px; object-fit: cover;">
                        <div>
                            <h6 class="fw-bold mb-0">John Doe</h6>
                            <small class="text-muted">CEO, TechStart</small>
                        </div>
                    </div>
                    <p class="text-muted mb-0">"Amazing service! They delivered beyond our expectations. Highly recommended!"</p>
                    <div class="text-warning mt-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-card card border-0 shadow-sm rounded-4 p-4 h-100">
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://placehold.co/50x50/764ba2/FFFFFF?text=JS"
                            alt="Client"
                            class="rounded-circle me-3"
                            style="width: 50px; height: 50px; object-fit: cover;">
                        <div>
                            <h6 class="fw-bold mb-0">Jane Smith</h6>
                            <small class="text-muted">Founder, DesignHub</small>
                        </div>
                    </div>
                    <p class="text-muted mb-0">"Professional team with excellent communication. They truly understand our needs."</p>
                    <div class="text-warning mt-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-card card border-0 shadow-sm rounded-4 p-4 h-100">
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://placehold.co/50x50/ff6b6b/FFFFFF?text=MR"
                            alt="Client"
                            class="rounded-circle me-3"
                            style="width: 50px; height: 50px; object-fit: cover;">
                        <div>
                            <h6 class="fw-bold mb-0">Mike Johnson</h6>
                            <small class="text-muted">Director, GrowthLabs</small>
                        </div>
                    </div>
                    <p class="text-muted mb-0">"The best investment we've made for our business. Results speak for themselves!"</p>
                    <div class="text-warning mt-2">
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
<section class="cta-section py-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="display-5 fw-bold text-black">Ready to Get <span class="text-warning">Started?</span></h2>
                <p class="lead text-black-50 mb-4">Let's bring your ideas to life with our expert services.</p>
                <!-- <a href="#" class="btn btn-light btn-lg rounded-pill px-5 py-3 fw-semibold shadow-sm">
                    <i class="fas fa-rocket me-2"></i> Get a Free Quote
                </a> -->
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    /* ====================================================
   HERO
==================================================== */
    .services-hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .services-hero .btn-light {
        transition: all 0.3s ease;
    }

    .services-hero .btn-light:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2) !important;
    }

    .services-hero .btn-outline-light:hover {
        background: rgba(255, 255, 255, 0.1);
    }

    /* ====================================================
   SEARCH
==================================================== */
    .search-box {
        transition: all 0.3s ease;
    }

    .search-box:focus-within {
        border-color: #667eea !important;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2) !important;
    }

    .search-input:focus {
        box-shadow: none;
    }

    /* ====================================================
   SERVICE CARD
==================================================== */
    .service-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .service-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.15) !important;
    }

    .service-card .image-overlay {
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.3) 100%);
    }

    .service-card .service-icon {
        margin-top: -35px;
        border: 3px solid white;
    }

    .object-fit-cover {
        object-fit: cover;
    }

    .read-more {
        transition: all 0.3s ease;
    }

    .read-more:hover {
        gap: 12px !important;
        color: #764ba2 !important;
    }

    /* ====================================================
   CATEGORY FILTER
==================================================== */
    .filter-btn {
        transition: all 0.3s ease;
        font-size: 0.9rem;
    }

    .filter-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }

    .filter-btn.active {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        border-color: #667eea;
    }

    /* ====================================================
   WHY CARD
==================================================== */
    .why-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .why-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.1) !important;
    }

    .why-card .why-icon {
        transition: transform 0.3s ease;
    }

    .why-card:hover .why-icon {
        transform: scale(1.1);
    }

    /* ====================================================
   TESTIMONIALS
==================================================== */
    .testimonial-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .testimonial-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.1) !important;
    }

    /* ====================================================
   PAGINATION
==================================================== */
    .pagination .page-link {
        color: #1a1a2e;
        border: 1px solid #e9ecef;
        transition: all 0.3s ease;
        margin: 0 3px;
        min-width: 44px;
        text-align: center;
    }

    .pagination .page-link:hover {
        background: #667eea;
        color: white;
        border-color: #667eea;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    }

    .pagination .page-item.active .page-link {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        border-color: #667eea;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.5);
        font-weight: 600;
    }

    .pagination .page-item.disabled .page-link {
        opacity: 0.5;
        pointer-events: none;
        cursor: not-allowed;
    }

    /* ====================================================
   STATS
==================================================== */
    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
    }

    /* ====================================================
   RESPONSIVE
==================================================== */
    @media (max-width: 992px) {
        .services-hero h1 {
            font-size: 2.5rem;
        }
    }

    @media (max-width: 768px) {
        .services-hero h1 {
            font-size: 2rem;
        }

        .hero-illustration {
            width: 200px !important;
            height: 200px !important;
        }

        .hero-illustration i {
            font-size: 5rem !important;
        }

        .stat-number {
            font-size: 1.8rem;
        }

        .pagination .page-link {
            min-width: 36px;
            font-size: 0.9rem;
            padding: 0.375rem 0.5rem;
        }
    }

    @media (max-width: 576px) {
        .services-hero h1 {
            font-size: 1.75rem;
        }

        .stat-number {
            font-size: 1.5rem;
        }

        .filter-btn {
            font-size: 0.8rem;
            padding: 0.25rem 0.75rem;
        }

        .pagination .page-link {
            min-width: 32px;
            font-size: 0.8rem;
            padding: 0.25rem 0.4rem;
            margin: 0 1px;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // ====================================================
        // ANIMASI COUNTER
        // ====================================================
        const counters = document.querySelectorAll('.stat-number');

        counters.forEach(counter => {
            const target = parseInt(counter.dataset.target);
            let current = 0;
            const increment = Math.ceil(target / 50);

            const updateCounter = () => {
                current += increment;
                if (current >= target) {
                    counter.textContent = target;
                    return;
                }
                counter.textContent = current;
                requestAnimationFrame(updateCounter);
            };

            setTimeout(updateCounter, 300);
        });

        // ====================================================
        // SEARCH SERVICES (Client-side filter)
        // ====================================================
        const searchInput = document.getElementById('searchInput');
        const serviceItems = document.querySelectorAll('.service-item');
        const servicesGrid = document.getElementById('servicesGrid');
        let searchTimeout;

        function filterServices() {
            const searchQuery = searchInput.value.toLowerCase().trim();
            let visibleCount = 0;

            serviceItems.forEach(item => {
                const title = item.dataset.title || '';
                const matches = title.includes(searchQuery);

                if (matches) {
                    item.style.display = '';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            // Show/hide empty state
            let emptyState = document.querySelector('.empty-state');
            if (visibleCount === 0 && searchQuery !== '') {
                if (!emptyState) {
                    emptyState = document.createElement('div');
                    emptyState.className = 'col-12 text-center py-5 empty-state';
                    emptyState.innerHTML = `
                        <i class="fas fa-search fa-4x text-muted mb-3 d-block"></i>
                        <h4 class="fw-light">No services found</h4>
                        <p class="text-muted">Try adjusting your search criteria.</p>
                    `;
                    servicesGrid.appendChild(emptyState);
                }
                emptyState.style.display = '';
            } else if (emptyState) {
                emptyState.style.display = 'none';
            }
        }

        if (searchInput) {
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(filterServices, 300);
            });
        }

        // ====================================================
        // AUTO SUBMIT SEARCH (Server-side)
        // ====================================================
        // Comment out this section jika ingin menggunakan client-side filtering saja
        // Jika ingin menggunakan server-side search, uncomment code di bawah
        /*
        const searchForm = document.querySelector('form[action="{{ route('service') }}"]');
        if (searchInput && searchForm) {
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    const query = this.value.trim();
                    if (query.length >= 2 || query.length === 0) {
                        searchForm.submit();
                    }
                }, 500);
            });
        }
        */

        // ====================================================
        // CATEGORY FILTER
        // ====================================================
        const filterBtns = document.querySelectorAll('.filter-btn');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const filter = this.dataset.filter;

                // Update active button
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                // Filter services
                serviceItems.forEach(item => {
                    const category = item.dataset.category || 'general';
                    if (filter === 'all' || category === filter) {
                        item.style.display = '';
                    } else {
                        item.style.display = 'none';
                    }
                });

                // Clear search input
                if (searchInput) {
                    searchInput.value = '';
                }
            });
        });

        // ====================================================
        // SMOOTH SCROLL
        // ====================================================
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                if (targetId && targetId.startsWith('#')) {
                    e.preventDefault();
                    const target = document.querySelector(targetId);
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });

        console.log('✅ Services page loaded with ' + serviceItems.length + ' services!');
    });
</script>
@endpush