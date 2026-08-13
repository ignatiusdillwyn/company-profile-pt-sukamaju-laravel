@extends('layout')

@section('title', 'Blog - DummyCorp')

@section('content')
<!-- ========== HERO BLOG ========== -->
<section class="blog-hero-list py-5 position-relative overflow-hidden">
    <!-- Background Decoration -->
    <div class="position-absolute top-0 start-0 w-100 h-100">
        <div class="position-absolute top-0 start-0 w-50 h-100 bg-white opacity-10" style="clip-path: polygon(0 0, 100% 0, 80% 100%, 0 100%);"></div>
        <div class="position-absolute bottom-0 end-0 w-25 h-25 bg-white opacity-5 rounded-circle" style="transform: translate(30%, 30%);"></div>
        <div class="position-absolute top-50 start-50 w-50 h-50 bg-white opacity-5 rounded-circle" style="transform: translate(-50%, -50%);"></div>
    </div>
    
    <div class="container position-relative">
        <div class="row align-items-center g-4">
            <div class="col-lg-8 mx-auto text-center">
                <span class="badge bg-white bg-opacity-20 text-black rounded-pill px-4 py-2 mb-4 d-inline-flex align-items-center backdrop-blur">
                    <i class="fas fa-newspaper me-2"></i> Latest Articles
                </span>
                <h1 class="display-2 fw-bold text-black mb-3">
                    Explore Our <span class="text-warning">Blog</span>
                </h1>
                <p class="lead text-black-50 mb-0" style="max-width: 600px; margin: 0 auto;">
                    Discover insights, tutorials, and stories from our team of experts.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ========== BLOG CONTENT ========== -->
<section class="blog-content-list py-5 bg-light" id="posts">
    <div class="container">
        <!-- ========== SEARCH SECTION ========== -->
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="card-body p-4 p-md-5">
                        <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center gap-3">
                            <div class="flex-grow-1 w-100">
                                <form action="{{ route('blog') }}" method="GET" class="w-100">
                                    <div class="search-box bg-light rounded-pill px-3 py-2 border shadow-sm w-100 d-flex align-items-center">
                                        <i class="fas fa-search text-muted me-2" style="font-size: 0.9rem;"></i>
                                        <input type="text"
                                            name="search"
                                            id="searchInput"
                                            class="search-input border-0 bg-transparent flex-grow-1"
                                            placeholder="Search articles by title or keyword..."
                                            value="{{ request('search') }}"
                                            autofocus
                                            style="outline: none; min-width: 0; font-size: 0.95rem;">
                                        @if(request('search'))
                                        <a href="{{ route('blog') }}" class="text-muted text-decoration-none ms-2" style="font-size: 0.9rem;">
                                            <i class="fas fa-times"></i>
                                        </a>
                                        @endif
                                    </div>
                                </form>
                            </div>
                            {{-- <div class="w-100 w-md-auto">
                                <button type="submit" form="searchForm" class="btn btn-primary rounded-pill px-4 w-100 w-md-auto">
                                    <i class="fas fa-search me-2"></i> Search
                                </button>
                            </div> --}}
                        </div>
                        
                        <!-- Search Results Info -->
                        {{-- @if(request('search'))
                        <div class="mt-4 pt-3 border-top d-flex flex-wrap justify-content-between align-items-center">
                            <div>
                                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2">
                                    <i class="fas fa-search me-1"></i> Results for: "{{ request('search') }}"
                                </span>
                            </div>
                            <div>
                                <span class="text-muted small">
                                    <i class="far fa-file-alt me-1"></i> 
                                    {{ is_object($data) && method_exists($data, 'total') ? $data->total() : count($data) }} article(s) found
                                </span>
                            </div>
                        </div>
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>

        <!-- Blog Vertical List -->
        @php
            $isPaginator = is_object($data) && method_exists($data, 'hasPages');
            $items = $isPaginator ? $data->items() : $data;
        @endphp

        @if(count($items) > 0)
        <div class="row">
            <div class="col-lg-10 mx-auto">
                @foreach($items as $index => $blog)
                <div class="blog-list-item card border-0 shadow-sm rounded-4 mb-4 overflow-hidden hover-lift">
                    <div class="row g-0">
                        <!-- Image Column -->
                        <div class="col-md-4 col-lg-3">
                            <div class="position-relative h-100" style="min-height: 220px;">
                                <img src="{{ is_object($blog) ? ($blog->image ?? 'https://placehold.co/600x400/667eea/FFFFFF?text=No+Image') : ($blog['image'] ?? 'https://placehold.co/600x400/667eea/FFFFFF?text=No+Image') }}"
                                    alt="{{ is_object($blog) ? $blog->title : $blog['title'] }}"
                                    class="w-100 h-100 object-fit-cover blog-image"
                                    style="object-fit: cover;" />
                                
                                <!-- Category Badge on Image -->
                                <div class="position-absolute top-0 start-0 m-3">
                                    <span class="badge bg-primary bg-opacity-90 text-black rounded-pill px-3 py-2 backdrop-blur">
                                        <i class="fas fa-tag me-1"></i> Article
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Content Column -->
                        <div class="col-md-8 col-lg-9">
                            <div class="p-4 p-lg-5">
                                <!-- Meta Info -->
                                <div class="d-flex flex-wrap gap-3 mb-3 text-muted small">
                                    <span class="d-flex align-items-center">
                                        <i class="far fa-calendar-alt me-2 text-primary"></i>
                                        {{ is_object($blog) ? \Carbon\Carbon::parse($blog->created)->format('M d, Y') : \Carbon\Carbon::parse($blog['created'])->format('M d, Y') }}
                                    </span>
                                    <span class="d-flex align-items-center">
                                        <i class="far fa-clock me-2 text-primary"></i>
                                        {{ is_object($blog) ? \Carbon\Carbon::parse($blog->created)->diffForHumans() : \Carbon\Carbon::parse($blog['created'])->diffForHumans() }}
                                    </span>
                                </div>
                                
                                <!-- Title -->
                                <h3 class="h4 fw-bold mb-3">
                                    <a href="{{ route('blog.detail', ['slug' => is_object($blog) ? $blog->slug : $blog['slug']]) }}" 
                                       class="text-dark text-decoration-none hover-primary">
                                        {{ is_object($blog) ? $blog->title : $blog['title'] }}
                                    </a>
                                </h3>
                                
                                <!-- Excerpt -->
                                <p class="text-muted mb-4" style="line-height: 1.8;">
                                    {{ is_object($blog) ? Str::limit(strip_tags($blog->content ?? ''), 180) : Str::limit(strip_tags($blog['content'] ?? ''), 180) }}
                                </p>
                                
                                <!-- Read More & Stats -->
                                <div class="d-flex flex-wrap align-items-center justify-content-between">
                                    <a href="{{ route('blog.detail', ['slug' => is_object($blog) ? $blog->slug : $blog['slug']]) }}" 
                                       class="btn btn-primary rounded-pill px-4">
                                        Read Article <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <!-- Empty State -->
        <div class="text-center py-5">
            <div class="empty-state-icon mb-4">
                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 120px; height: 120px;">
                    <i class="fas fa-search fa-3x text-muted"></i>
                </div>
            </div>
            <h4 class="fw-bold mb-3">No Articles Found</h4>
            <p class="text-muted mb-4">
                @if(request('search'))
                    We couldn't find any articles matching "<strong>{{ request('search') }}</strong>". 
                    Try adjusting your search terms or browse all articles.
                @else
                    No articles available at the moment. Check back later for new content.
                @endif
            </p>
            @if(request('search'))
            <a href="{{ route('blog') }}" class="btn btn-primary rounded-pill px-5">
                <i class="fas fa-arrow-left me-2"></i> Browse All Articles
            </a>
            @endif
        </div>
        @endif

        <!-- ========== PAGINATION ========== -->
        @if($isPaginator && $data->hasPages())
        <nav class="mt-5 pt-3" aria-label="Page navigation">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center gap-3">
                <div class="text-muted small">
                    <i class="far fa-file-alt me-1"></i>
                    Showing {{ $data->firstItem() ?? 0 }} - {{ $data->lastItem() ?? 0 }} of {{ $data->total() ?? count($data) }} articles
                </div>
                
                <ul class="pagination mb-0">
                    {{-- Previous Page Link --}}
                    @if($data->onFirstPage())
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $data->previousPageUrl() . (request('search') ? '&search=' . request('search') : '') }}">
                            <i class="fas fa-chevron-left"></i>
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
                    <li class="page-item d-none d-sm-block">
                        <a class="page-link" href="{{ $data->url(1) . (request('search') ? '&search=' . request('search') : '') }}">1</a>
                    </li>
                    @if($start > 2)
                    <li class="page-item disabled d-none d-sm-block">
                        <span class="page-link">...</span>
                    </li>
                    @endif
                    @endif

                    {{-- Page links --}}
                    @for($i = $start; $i <= $end; $i++)
                        @if($i == $currentPage)
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">{{ $i }}</span>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $data->url($i) . (request('search') ? '&search=' . request('search') : '') }}">{{ $i }}</a>
                        </li>
                        @endif
                    @endfor

                    {{-- Last page link --}}
                    @if($end < $lastPage)
                        @if($end < $lastPage - 1)
                        <li class="page-item disabled d-none d-sm-block">
                            <span class="page-link">...</span>
                        </li>
                        @endif
                        <li class="page-item d-none d-sm-block">
                            <a class="page-link" href="{{ $data->url($lastPage) . (request('search') ? '&search=' . request('search') : '') }}">{{ $lastPage }}</a>
                        </li>
                    @endif

                    {{-- Next Page Link --}}
                    @if($data->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $data->nextPageUrl() . (request('search') ? '&search=' . request('search') : '') }}">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                    @else
                    <li class="page-item disabled">
                        <a class="page-link" href="#">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
        @endif
    </div>
</section>

<!-- ========== NEWSLETTER SECTION ========== -->
<section class="newsletter-list py-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <!-- Decorative Elements -->
    <div class="position-absolute top-0 end-0 w-50 h-100 bg-white opacity-5" style="clip-path: polygon(30% 0, 100% 0, 100% 100%, 0% 100%);"></div>
    <div class="position-absolute bottom-0 start-0 w-25 h-25 bg-white opacity-5 rounded-circle" style="transform: translate(-30%, 30%);"></div>
    
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="p-5">
                    <span class="badge bg-white bg-opacity-20 text-black rounded-pill px-4 py-2 mb-4 backdrop-blur">
                        <i class="fas fa-envelope me-2"></i> Stay Updated
                    </span>
                    <h2 class="display-5 fw-bold text-black mb-3">
                        Subscribe to Our <span class="text-warning">Newsletter</span>
                    </h2>
                    <p class="text-black-50 mb-4" style="max-width: 500px; margin: 0 auto;">
                        Get the latest articles, insights, and updates delivered straight to your inbox.
                    </p>
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center align-items-center">
                        <div class="position-relative w-100" style="max-width: 350px;">
                            <i class="fas fa-envelope position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                            <input type="email"
                                class="form-control form-control-lg ps-5 rounded-pill border-0"
                                placeholder="Enter your email address"
                                disabled
                                style="background: rgba(255,255,255,0.9);" />
                        </div>
                        <button class="btn btn-warning btn-lg rounded-pill px-5 fw-semibold" disabled>
                            Subscribe <i class="fas fa-arrow-right ms-2"></i>
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
        min-height: 350px;
        display: flex;
        align-items: center;
    }

    .backdrop-blur {
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }

    /* ====================================================
   SEARCH BOX
==================================================== */
    .search-box {
        transition: all 0.3s ease;
        background: #f8f9fa;
    }

    .search-box:focus-within {
        border-color: #667eea !important;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.15) !important;
        background: white;
    }

    .search-box .search-input {
        font-size: 0.95rem;
    }

    .search-box .search-input::placeholder {
        color: #adb5bd;
        font-size: 0.95rem;
    }

    .search-box .search-input:focus {
        outline: none;
    }

    .search-box .fa-times {
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .search-box .fa-times:hover {
        color: #dc3545 !important;
        transform: rotate(90deg);
    }

    /* ====================================================
   BLOG LIST ITEM (Vertical)
==================================================== */
    .blog-list-item {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        background: white;
        border: 1px solid rgba(0,0,0,0.05);
    }

    .blog-list-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1) !important;
        border-color: rgba(102, 126, 234, 0.2);
    }

    .blog-list-item:hover .blog-image {
        transform: scale(1.05);
    }

    .blog-image {
        transition: transform 0.5s ease;
    }

    .hover-primary {
        transition: color 0.3s ease;
        position: relative;
    }

    .hover-primary::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, #667eea, #764ba2);
        transition: width 0.3s ease;
    }

    .hover-primary:hover::after {
        width: 100%;
    }

    .hover-primary:hover {
        color: #667eea !important;
    }

    .object-fit-cover {
        object-fit: cover;
    }

    .blog-list-item .btn-primary {
        background: linear-gradient(135deg, #667eea, #764ba2);
        border: none;
        transition: all 0.3s ease;
    }

    .blog-list-item .btn-primary:hover {
        transform: translateX(5px);
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    }

    /* ====================================================
   EMPTY STATE
==================================================== */
    .empty-state-icon {
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    /* ====================================================
   PAGINATION
==================================================== */
    .pagination .page-link {
        color: #1a1a2e;
        border: none;
        border-radius: 10px !important;
        transition: all 0.3s ease;
        margin: 0 3px;
        min-width: 40px;
        text-align: center;
        background: transparent;
        font-weight: 500;
    }

    .pagination .page-link:hover {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    }

    .pagination .page-item.active .page-link {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.5);
        font-weight: 600;
        transform: scale(1.05);
    }

    .pagination .page-item.disabled .page-link {
        opacity: 0.3;
        pointer-events: none;
        cursor: not-allowed;
    }

    .pagination .page-item:first-child .page-link,
    .pagination .page-item:last-child .page-link {
        background: rgba(102, 126, 234, 0.1);
        border-radius: 50% !important;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .pagination .page-item:first-child .page-link:hover,
    .pagination .page-item:last-child .page-link:hover {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
    }

    /* ====================================================
   NEWSLETTER
==================================================== */
    .newsletter-list .form-control {
        background: rgba(255, 255, 255, 0.9);
        transition: all 0.3s ease;
    }

    .newsletter-list .form-control:focus {
        background: white;
        box-shadow: 0 0 0 3px rgba(255, 193, 7, 0.3);
    }

    .newsletter-list .btn-warning {
        transition: all 0.3s ease;
    }

    .newsletter-list .btn-warning:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(255, 193, 7, 0.4);
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
        .blog-hero-list {
            min-height: 280px;
        }
        
        .blog-hero-list h1 {
            font-size: 2rem;
        }

        .blog-list-item .row {
            flex-direction: column;
        }

        .blog-list-item .col-md-4 {
            min-height: 200px !important;
        }

        .blog-list-item .p-4 {
            padding: 1.5rem !important;
        }

        .pagination .page-link {
            min-width: 36px;
            font-size: 0.9rem;
        }

        .pagination .page-item:first-child .page-link,
        .pagination .page-item:last-child .page-link {
            width: 36px;
            height: 36px;
        }

        .search-box {
            width: 100%;
        }
    }

    @media (max-width: 576px) {
        .blog-hero-list h1 {
            font-size: 1.75rem;
        }

        .blog-list-item .col-md-4 {
            min-height: 180px !important;
        }

        .blog-list-item .p-4 {
            padding: 1.25rem !important;
        }

        .pagination .page-link {
            min-width: 32px;
            font-size: 0.8rem;
            padding: 0.25rem 0.4rem;
        }

        .pagination .page-item:first-child .page-link,
        .pagination .page-item:last-child .page-link {
            width: 32px;
            height: 32px;
        }

        .blog-list-item .d-flex.flex-wrap.align-items-center {
            flex-direction: column;
            align-items: flex-start !important;
            gap: 10px;
        }

        .search-box .search-input {
            font-size: 0.9rem;
        }

        .search-box .search-input::placeholder {
            font-size: 0.9rem;
        }
    }
</style>
@endpush