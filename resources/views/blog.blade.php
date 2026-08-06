@extends('layout')

@section('title', 'Blog - DummyCorp')

@section('content')
<!-- ========== HERO BLOG ========== -->
<section class="blog-hero-list py-5">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <span class="badge bg-black bg-opacity-25 text-black rounded-pill px-4 py-2 mb-3 d-inline-flex align-items-center">
                    <i class="fas fa-newspaper me-2"></i> Latest Articles
                </span>
                <h1 class="display-3 fw-bold text-yellow">Our <span class="text-warning">Blog</span></h1>
                <p class="lead text-black-50 mb-4" style="max-width: 500px;">
                    Insights, tutorials, and stories from our team of experts.
                    Stay updated with the latest trends in tech and design.
                </p>
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
        @php
            // Cek apakah $data adalah paginator atau array biasa
            $isPaginator = is_object($data) && method_exists($data, 'hasPages');
            $items = $isPaginator ? $data->items() : $data;
        @endphp

        @forelse($items as $index => $blog)
        <div class="blog-list-item card border-0 shadow-sm rounded-4 mb-4 overflow-hidden hover-lift">
            <div class="row g-0">
                <!-- Image Column -->
                <div class="col-md-4 col-lg-3">
                    <div class="position-relative h-100 min-vh-25" style="min-height: 200px;">
                        <img src="{{ is_object($blog) ? ($blog->image ?? 'https://placehold.co/600x400/667eea/FFFFFF?text=No+Image') : ($blog['image'] ?? 'https://placehold.co/600x400/667eea/FFFFFF?text=No+Image') }}"
                            alt="{{ is_object($blog) ? $blog->title : $blog['title'] }}"
                            class="w-100 h-100 object-fit-cover"
                            style="object-fit: cover;" />
                    </div>
                </div>
                <!-- Content Column -->
                <div class="col-md-8 col-lg-9">
                    <div class="p-4 p-lg-5">
                        <div class="d-flex flex-wrap gap-3 mb-2 text-muted small">
                            <span class="d-flex align-items-center">
                                <i class="far fa-calendar-alt me-1"></i>
                                {{ is_object($blog) ? \Carbon\Carbon::parse($blog->created)->format('M d, Y') : \Carbon\Carbon::parse($blog['created'])->format('M d, Y') }}
                            </span>
                            <span class="d-flex align-items-center">
                                <i class="far fa-clock me-1"></i>
                                {{ is_object($blog) ? \Carbon\Carbon::parse($blog->created)->diffForHumans() : \Carbon\Carbon::parse($blog['created'])->diffForHumans() }}
                            </span>
                        </div>
                        <h3 class="h4 fw-bold mb-2">
                            <a href="{{ route('blog.detail', ['slug' => is_object($blog) ? $blog->slug : $blog['slug']]) }}" 
                               class="text-dark text-decoration-none hover-primary">
                                {{ is_object($blog) ? $blog->title : $blog['title'] }}
                            </a>
                        </h3>
                        <p class="text-muted mb-3">
                            {{ is_object($blog) ? Str::limit(strip_tags($blog->content ?? ''), 150) : Str::limit(strip_tags($blog['content'] ?? ''), 150) }}
                        </p>
                        <a href="{{ route('blog.detail', ['slug' => is_object($blog) ? $blog->slug : $blog['slug']]) }}" 
                           class="text-primary fw-semibold text-decoration-none d-inline-flex align-items-center gap-2">
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

        <!-- ========== PAGINATION ========== -->
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

                {{-- First page link --}}
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

                {{-- Page links --}}
                @for($i = $start; $i <= $end; $i++)
                    @if($i == $currentPage)
                    <li class="page-item active" aria-current="page">
                        <span class="page-link rounded-3">{{ $i }}</span>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link rounded-3" href="{{ $data->url($i) }}">{{ $i }}</a>
                    </li>
                    @endif
                @endfor

                {{-- Last page link --}}
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

                {{-- Next Page Link --}}
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

        {{-- Info showing current page --}}
        <div class="text-center text-muted small mt-3">
            Showing {{ $data->firstItem() ?? 0 }} - {{ $data->lastItem() ?? 0 }} of {{ $data->total() ?? count($data) }} articles
        </div>
        @endif
    </div>
</section>

<!-- ========== NEWSLETTER SECTION ========== -->
<section class="newsletter-list py-5 bg-dark" id="newsletter">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="bg-gradient-primary rounded-4 p-5 text-black">
                    <h2 class="display-6 fw-bold mb-2">Subscribe to Our <span class="text-warning">Newsletter</span></h2>
                    <p class="text-black-50 mb-4">Get the latest articles delivered to your inbox weekly.</p>
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
                    <div class="mt-3 text-black-50 small">
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

    .pagination .page-item:first-child .page-link,
    .pagination .page-item:last-child .page-link {
        padding: 0.5rem 1.2rem;
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

        .pagination .page-link {
            min-width: 36px;
            font-size: 0.9rem;
            padding: 0.375rem 0.5rem;
        }

        .pagination .page-item:first-child .page-link,
        .pagination .page-item:last-child .page-link {
            padding: 0.375rem 0.75rem;
            font-size: 0.85rem;
        }
    }

    @media (max-width: 576px) {
        .blog-hero-list h1 {
            font-size: 1.75rem;
        }

        .min-vh-25 {
            min-height: 140px;
        }

        .pagination .page-link {
            min-width: 32px;
            font-size: 0.8rem;
            padding: 0.25rem 0.4rem;
            margin: 0 1px;
        }

        .pagination .page-item:first-child .page-link,
        .pagination .page-item:last-child .page-link {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
        }
    }
</style>
@endpush