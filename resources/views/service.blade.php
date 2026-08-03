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
                <h1 class="display-3 fw-bold text-white">What We <span class="text-warning">Offer</span></h1>
                <p class="lead text-white-50 mb-4" style="max-width: 500px;">
                    We provide a wide range of digital solutions to help your business grow.
                    From web development to AI solutions, we've got you covered.
                </p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="#services-list" class="btn btn-light rounded-pill px-4 py-3 fw-semibold shadow-sm">
                        <i class="fas fa-arrow-down me-2"></i> Explore Services
                    </a>
                    <a href="#pricing" class="btn btn-outline-light rounded-pill px-4 py-3 fw-semibold border-2">
                        <i class="fas fa-tag me-2"></i> View Pricing
                    </a>
                </div>
            </div>
            <div class="col-lg-5 text-center d-none d-lg-block">
                <div class="hero-illustration bg-white bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" 
                     style="width: 300px; height: 300px; backdrop-filter: blur(10px); border: 2px solid rgba(255,255,255,0.1);">
                    <i class="fas fa-cubes text-white-50" style="font-size: 8rem;"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== SERVICES LIST ========== -->
<section class="services-section py-5" id="services-list">
    <div class="container">
        <!-- Services Grid -->
        <div class="row g-4" id="servicesGrid">
            @forelse($data as $index => $service)
            <div class="col-lg-4 col-md-6 service-item" 
                 data-title="{{ strtolower($service->title) }}">
                <div class="service-card card border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                    <!-- Badges -->
                    <div class="position-absolute top-0 start-0 m-3 z-3 d-flex gap-2">
                        @if($index == 0)
                        <span class="badge bg-danger rounded-pill px-3 py-2">
                            <i class="fas fa-fire me-1"></i> Popular
                        </span>
                        @endif
                        @if($index == count($data) - 1)
                        <span class="badge bg-success rounded-pill px-3 py-2">
                            <i class="fas fa-star me-1"></i> New
                        </span>
                        @endif
                    </div>

                    <!-- Image -->
                    <div class="service-image position-relative" style="height: 200px; overflow: hidden;">
                        <img src="{{ $service->image ?? 'https://placehold.co/600x400/667eea/FFFFFF?text=Service' }}" 
                             alt="{{ $service->title }}"
                             class="w-100 h-100 object-fit-cover" />
                    </div>

                    <!-- Body -->
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold mb-2">{{ $service->title }}</h5>
                        <p class="card-text text-muted flex-grow-1" style="font-size: 0.95rem;">
                            {{ Str::limit(strip_tags($service->content ?? ''), 150) }}
                        </p>

                        <!-- Meta Info -->
                        <div class="d-flex gap-3 mb-3 pb-3 border-bottom" style="font-size: 0.85rem;">
                            <span class="text-muted d-flex align-items-center gap-1">
                                <i class="far fa-calendar-alt text-primary"></i>
                                {{ \Carbon\Carbon::parse($service->created)->format('M d, Y') }}
                            </span>
                            <span class="text-muted d-flex align-items-center gap-1">
                                <i class="far fa-user text-primary"></i>
                                Admin
                            </span>
                        </div>

                        <!-- Footer -->
                        <div class="d-flex justify-content-end">
                            <a href="#" class="text-primary fw-semibold text-decoration-none d-inline-flex align-items-center gap-2 read-more">
                                Read More <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="fas fa-inbox fa-4x text-muted mb-3 d-block"></i>
                <h4 class="fw-light">No services available</h4>
                <p class="text-muted">Check back later for our services.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ========== WHY CHOOSE US ========== -->
<section class="why-section py-5">
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

<!-- ========== CTA SECTION ========== -->
<section class="cta-section py-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="display-5 fw-bold text-white">Ready to Get <span class="text-warning">Started?</span></h2>
                <p class="lead text-white-50 mb-4">Let's bring your ideas to life with our expert services.</p>
                <a href="#" class="btn btn-light btn-lg rounded-pill px-5 py-3 fw-semibold shadow-sm">
                    <i class="fas fa-rocket me-2"></i> Get a Free Quote
                </a>
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
    background: white !important;
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

.object-fit-cover {
    object-fit: cover;
}

.read-more {
    transition: all 0.3s ease;
}

.read-more:hover {
    gap: 12px !important;
}

/* ====================================================
   PRICING
==================================================== */
.pricing-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.pricing-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.1) !important;
}

.pricing-card .btn {
    transition: all 0.3s ease;
}

.pricing-card .btn:hover {
    transform: scale(1.02);
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
   ACCORDION
==================================================== */
.accordion-button:not(.collapsed) {
    background-color: transparent;
    color: #667eea;
    box-shadow: none;
}

.accordion-button:focus {
    box-shadow: none;
    border-color: transparent;
}

.accordion-button {
    padding: 1.25rem;
}

/* ====================================================
   RESPONSIVE
==================================================== */
@media (max-width: 768px) {
    .hero-illustration {
        width: 200px !important;
        height: 200px !important;
    }
    
    .hero-illustration i {
        font-size: 5rem !important;
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
    // SEARCH SERVICES
    // ====================================================
    const searchInput = document.getElementById('searchInput');
    const serviceItems = document.querySelectorAll('.service-item');
    const servicesGrid = document.getElementById('servicesGrid');

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
        if (visibleCount === 0) {
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

    searchInput.addEventListener('input', filterServices);

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