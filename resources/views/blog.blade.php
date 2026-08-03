@extends('layout')

@section('title', 'Blog - DummyCorp')

@section('content')
<!-- ========== HERO BLOG ========== -->
<section class="blog-hero-list py-5">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <span class="badge bg-white bg-opacity-25 text-white rounded-pill px-4 py-2 mb-3 d-inline-flex align-items-center">
                    <i class="fas fa-newspaper me-2"></i> Latest Articles
                </span>
                <h1 class="display-3 fw-bold text-white">Our <span class="text-warning">Blog</span></h1>
                <p class="lead text-white-50 mb-4" style="max-width: 500px;">
                    Insights, tutorials, and stories from our team of experts.
                    Stay updated with the latest trends in tech and design.
                </p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="#posts" class="btn btn-light rounded-pill px-4 py-3 fw-semibold shadow-sm">
                        <i class="fas fa-arrow-down me-2"></i> Browse Articles
                    </a>
                    <a href="#newsletter" class="btn btn-outline-light rounded-pill px-4 py-3 fw-semibold border-2">
                        <i class="fas fa-envelope me-2"></i> Subscribe
                    </a>
                </div>
            </div>
            <div class="col-lg-5 text-center d-none d-lg-block">
                <img src="https://placehold.co/400x300/667eea/FFFFFF?text=Blog" 
                     alt="Blog" class="img-fluid rounded-4 shadow-lg" />
            </div>
        </div>
    </div>
</section>

<!-- ========== BLOG CONTENT ========== -->
<section class="blog-content-list py-5" id="posts">
    <div class="container">
        <!-- Blog List -->
        @forelse($data as $index => $blog)
        <div class="blog-list-item card border-0 shadow-sm rounded-4 mb-4 overflow-hidden hover-lift">
            <div class="row g-0">
                <!-- Image Column -->
                <div class="col-md-4 col-lg-3">
                    <div class="position-relative h-100 min-vh-25" style="min-height: 200px;">
                        <img src="{{ $blog->image ?? 'https://placehold.co/600x400/667eea/FFFFFF?text=No+Image' }}" 
                             alt="{{ $blog->title }}" 
                             class="w-100 h-100 object-fit-cover" 
                             style="object-fit: cover;" />
                        @if($index == 0)
                        <span class="badge bg-danger position-absolute top-0 start-0 m-3 rounded-pill px-3 py-2">
                            Featured
                        </span>
                        @endif
                    </div>
                </div>
                <!-- Content Column -->
                <div class="col-md-8 col-lg-9">
                    <div class="p-4 p-lg-5">
                        <div class="d-flex flex-wrap gap-3 mb-2 text-muted small">
                            <span class="d-flex align-items-center">
                                <i class="fas fa-user-circle me-1"></i> Admin
                            </span>
                            <span class="d-flex align-items-center">
                                <i class="far fa-calendar-alt me-1"></i> 
                                {{ \Carbon\Carbon::parse($blog->created)->format('M d, Y') }}
                            </span>
                            <span class="d-flex align-items-center">
                                <i class="far fa-clock me-1"></i> 
                                {{ \Carbon\Carbon::parse($blog->created)->diffForHumans() }}
                            </span>
                        </div>
                        <h3 class="h4 fw-bold mb-2">
                            <a href="#" class="text-dark text-decoration-none hover-primary">
                                {{ $blog->title }}
                            </a>
                        </h3>
                        <p class="text-muted mb-3">
                            {{ Str::limit(strip_tags($blog->content ?? ''), 150) }}
                        </p>
                        <a href="#" class="text-primary fw-semibold text-decoration-none d-inline-flex align-items-center gap-2">
                            Read More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="text-center py-5">
            <i class="fas fa-inbox fa-4x text-muted mb-3"></i>
            <h4 class="fw-light">No articles found</h4>
            <p class="text-muted">Check back later for new articles.</p>
        </div>
        @endforelse

        <!-- Pagination -->
        @if(count($data) > 10)
        <nav class="mt-5" aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link rounded-3" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link rounded-3" href="#">1</a></li>
                <li class="page-item"><a class="page-link rounded-3" href="#">2</a></li>
                <li class="page-item"><a class="page-link rounded-3" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link rounded-3" href="#">Next</a>
                </li>
            </ul>
        </nav>
        @endif
    </div>
</section>

<!-- ========== NEWSLETTER SECTION ========== -->
<section class="newsletter-list py-5 bg-dark" id="newsletter">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="bg-gradient-primary rounded-4 p-5 text-white">
                    <h2 class="display-6 fw-bold mb-2">Subscribe to Our <span class="text-warning">Newsletter</span></h2>
                    <p class="text-white-50 mb-4">Get the latest articles delivered to your inbox weekly.</p>
                    <div class="d-flex flex-column flex-sm-row gap-2 justify-content-center">
                        <input type="email" 
                               class="form-control form-control-lg rounded-pill border-0" 
                               placeholder="Enter your email address" 
                               disabled 
                               style="max-width: 300px;" />
                        <button class="btn btn-warning btn-lg rounded-pill px-4 fw-semibold" disabled>
                            Subscribe <i class="fas fa-arrow-right ms-1"></i>
                        </button>
                    </div>
                    <div class="mt-3 text-white-50 small">
                        <i class="fas fa-lock me-1"></i> No spam, unsubscribe anytime.
                    </div>
                </div>
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
.blog-hero-list {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.blog-hero-list .btn-light {
    transition: all 0.3s ease;
}

.blog-hero-list .btn-light:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2) !important;
}

.blog-hero-list .btn-outline-light:hover {
    background: rgba(255, 255, 255, 0.1);
}

/* ====================================================
   BLOG LIST ITEM
==================================================== */
.hover-lift {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.hover-lift:hover {
    transform: translateY(-5px);
    box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.15) !important;
}

.hover-primary {
    transition: color 0.3s ease;
}

.hover-primary:hover {
    color: #667eea !important;
}

.object-fit-cover {
    object-fit: cover;
}

.min-vh-25 {
    min-height: 200px;
}

/* ====================================================
   NEWSLETTER
==================================================== */
.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

/* ====================================================
   PAGINATION
==================================================== */
.pagination .page-link {
    color: #1a1a2e;
    border: 1px solid #e9ecef;
    transition: all 0.3s ease;
}

.pagination .page-link:hover {
    background: #667eea;
    color: white;
    border-color: #667eea;
}

.pagination .page-item.active .page-link {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    border-color: #667eea;
}

.pagination .page-item.disabled .page-link {
    opacity: 0.5;
    pointer-events: none;
}

/* ====================================================
   RESPONSIVE
==================================================== */
@media (max-width: 992px) {
    .blog-hero-list h1 {
        font-size: 2.5rem;
    }
}

@media (max-width: 768px) {
    .blog-hero-list h1 {
        font-size: 2rem;
    }
    
    .min-vh-25 {
        min-height: 160px;
    }
}

@media (max-width: 576px) {
    .blog-hero-list h1 {
        font-size: 1.75rem;
    }
    
    .min-vh-25 {
        min-height: 140px;
    }
}
</style>
@endpush