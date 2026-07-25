@extends('layout')

@section('title', 'Blog - DummyCorp')

@section('content')
<!-- ========== HERO BLOG ========== -->
<section class="blog-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <span class="badge bg-warning text-dark mb-3">
                    <i class="fas fa-newspaper me-1"></i> Latest Articles
                </span>
                <h1>Our <span style="color: #ffd700;">Blog</span></h1>
                <p class="lead">
                    Insights, tutorials, and stories from our team of experts.
                    Stay updated with the latest trends in tech and design.
                </p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="#" class="btn btn-light">
                        <i class="fas fa-arrow-down me-2"></i> Browse Articles
                    </a>
                    <a href="#" class="btn btn-outline-light">
                        <i class="fas fa-envelope me-2"></i> Subscribe
                    </a>
                </div>
            </div>
            <div class="col-lg-5 text-center d-none d-lg-block">
                <img src="https://via.placeholder.com/400x300/ffffff/667eea?text=Blog" 
                     alt="Blog" class="img-fluid" style="filter: drop-shadow(0 10px 40px rgba(0,0,0,0.2));" />
            </div>
        </div>
    </div>
</section>

<!-- ========== STATS ========== -->
<section class="py-4 bg-light">
    <div class="container">
        <div class="row text-center g-3">
            <div class="col-4 col-md-3">
                <div class="fw-bold display-6 text-primary" id="totalPosts">0</div>
                <small class="text-muted">Total Posts</small>
            </div>
            <div class="col-4 col-md-3">
                <div class="fw-bold display-6 text-primary" id="totalCategories">0</div>
                <small class="text-muted">Categories</small>
            </div>
            <div class="col-4 col-md-3">
                <div class="fw-bold display-6 text-primary" id="totalAuthors">0</div>
                <small class="text-muted">Authors</small>
            </div>
            <div class="col-12 col-md-3">
                <div class="fw-bold display-6 text-primary" id="totalComments">0</div>
                <small class="text-muted">Comments</small>
            </div>
        </div>
    </div>
</section>

<!-- ========== BLOG CONTENT ========== -->
<section class="py-5" id="posts">
    <div class="container">
        <!-- Filter & Search -->
        <div class="row g-3 mb-4">
            <div class="col-md-5">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="fas fa-search text-muted"></i>
                    </span>
                    <input type="text" class="form-control border-start-0" 
                           placeholder="Search articles..." id="searchInput" />
                </div>
            </div>
            <div class="col-md-4">
                <select class="form-select" id="categoryFilter">
                    <option value="">All Categories</option>
                    <option value="Laravel">Laravel</option>
                    <option value="PHP">PHP</option>
                    <option value="JavaScript">JavaScript</option>
                    <option value="Vue.js">Vue.js</option>
                    <option value="React">React</option>
                    <option value="Design">Design</option>
                    <option value="Database">Database</option>
                    <option value="DevOps">DevOps</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select" id="sortFilter">
                    <option value="newest">Latest First</option>
                    <option value="oldest">Oldest First</option>
                    <option value="popular">Most Popular</option>
                </select>
            </div>
        </div>

        <!-- ===== DATA DUMMY BLOG ===== -->
        @php
            $blogs = [
                [
                    'id' => 1,
                    'title' => 'Getting Started with Laravel 11: A Complete Guide',
                    'excerpt' => 'Learn everything you need to know about Laravel 11, from installation to advanced features. Perfect for beginners and experienced developers.',
                    'category' => 'Laravel',
                    'author' => 'John Doe',
                    'author_avatar' => 'https://ui-avatars.com/api/?name=John+Doe&background=667eea&color=fff',
                    'published_at' => '2024-01-15',
                    'image' => 'https://via.placeholder.com/800x500/667eea/FFFFFF?text=Laravel+11',
                    'reading_time' => 8,
                    'comments_count' => 24,
                    'tags' => ['Laravel', 'PHP', 'Web Development']
                ],
                [
                    'id' => 2,
                    'title' => 'Mastering JavaScript: 10 Essential Tips for Developers',
                    'excerpt' => 'Discover powerful JavaScript techniques that will make you a more productive developer. Includes ES6 features, async/await, and more.',
                    'category' => 'JavaScript',
                    'author' => 'Jane Smith',
                    'author_avatar' => 'https://ui-avatars.com/api/?name=Jane+Smith&background=764ba2&color=fff',
                    'published_at' => '2024-01-20',
                    'image' => 'https://via.placeholder.com/800x500/764ba2/FFFFFF?text=JavaScript',
                    'reading_time' => 10,
                    'comments_count' => 18,
                    'tags' => ['JavaScript', 'Frontend', 'ES6']
                ],
                [
                    'id' => 3,
                    'title' => '10 Essential UI/UX Design Principles Every Designer Should Know',
                    'excerpt' => 'Explore the fundamental principles of UI/UX design that will help you create better user experiences and improve your design skills.',
                    'category' => 'Design',
                    'author' => 'Mike Johnson',
                    'author_avatar' => 'https://ui-avatars.com/api/?name=Mike+Johnson&background=ff6b6b&color=fff',
                    'published_at' => '2024-01-25',
                    'image' => 'https://via.placeholder.com/800x500/ff6b6b/FFFFFF?text=UI+UX+Design',
                    'reading_time' => 7,
                    'comments_count' => 32,
                    'tags' => ['Design', 'UI/UX', 'Product']
                ],
                [
                    'id' => 4,
                    'title' => 'Vue.js vs React: Which Framework Should You Choose?',
                    'excerpt' => 'A comprehensive comparison between Vue.js and React to help you choose the right framework for your next project.',
                    'category' => 'Vue.js',
                    'author' => 'Sarah Lee',
                    'author_avatar' => 'https://ui-avatars.com/api/?name=Sarah+Lee&background=ffa502&color=fff',
                    'published_at' => '2024-02-01',
                    'image' => 'https://via.placeholder.com/800x500/ffa502/FFFFFF?text=Vue+vs+React',
                    'reading_time' => 12,
                    'comments_count' => 45,
                    'tags' => ['Vue.js', 'React', 'Frontend']
                ],
                [
                    'id' => 5,
                    'title' => 'Database Optimization: 7 Techniques for Better Performance',
                    'excerpt' => 'Learn proven techniques to optimize your database performance, including indexing, query optimization, and caching strategies.',
                    'category' => 'Database',
                    'author' => 'David Chen',
                    'author_avatar' => 'https://ui-avatars.com/api/?name=David+Chen&background=2ed573&color=fff',
                    'published_at' => '2024-02-10',
                    'image' => 'https://via.placeholder.com/800x500/2ed573/FFFFFF?text=Database',
                    'reading_time' => 9,
                    'comments_count' => 15,
                    'tags' => ['Database', 'SQL', 'Performance']
                ],
                [
                    'id' => 6,
                    'title' => 'DevOps Best Practices for Modern Web Applications',
                    'excerpt' => 'Discover essential DevOps practices that will streamline your development workflow and improve deployment efficiency.',
                    'category' => 'DevOps',
                    'author' => 'Emily Wilson',
                    'author_avatar' => 'https://ui-avatars.com/api/?name=Emily+Wilson&background=ff6b81&color=fff',
                    'published_at' => '2024-02-15',
                    'image' => 'https://via.placeholder.com/800x500/ff6b81/FFFFFF?text=DevOps',
                    'reading_time' => 11,
                    'comments_count' => 21,
                    'tags' => ['DevOps', 'CI/CD', 'Cloud']
                ],
                [
                    'id' => 7,
                    'title' => 'Building RESTful APIs with Laravel: Best Practices',
                    'excerpt' => 'Learn how to build robust and scalable RESTful APIs using Laravel. Includes authentication, validation, and response formatting.',
                    'category' => 'Laravel',
                    'author' => 'John Doe',
                    'author_avatar' => 'https://ui-avatars.com/api/?name=John+Doe&background=667eea&color=fff',
                    'published_at' => '2024-02-20',
                    'image' => 'https://via.placeholder.com/800x500/667eea/FFFFFF?text=Laravel+API',
                    'reading_time' => 10,
                    'comments_count' => 28,
                    'tags' => ['Laravel', 'API', 'REST']
                ],
                [
                    'id' => 8,
                    'title' => 'React Hooks: Complete Guide with Examples',
                    'excerpt' => 'Master React Hooks with this comprehensive guide. Learn useState, useEffect, useContext, and custom hooks with practical examples.',
                    'category' => 'React',
                    'author' => 'Jane Smith',
                    'author_avatar' => 'https://ui-avatars.com/api/?name=Jane+Smith&background=764ba2&color=fff',
                    'published_at' => '2024-02-25',
                    'image' => 'https://via.placeholder.com/800x500/764ba2/FFFFFF?text=React+Hooks',
                    'reading_time' => 9,
                    'comments_count' => 19,
                    'tags' => ['React', 'Hooks', 'Frontend']
                ],
                [
                    'id' => 9,
                    'title' => 'The Ultimate Guide to CSS Grid and Flexbox',
                    'excerpt' => 'Learn how to create modern, responsive layouts with CSS Grid and Flexbox. Includes practical examples and common design patterns.',
                    'category' => 'Design',
                    'author' => 'Mike Johnson',
                    'author_avatar' => 'https://ui-avatars.com/api/?name=Mike+Johnson&background=ff6b6b&color=fff',
                    'published_at' => '2024-03-01',
                    'image' => 'https://via.placeholder.com/800x500/ff6b6b/FFFFFF?text=CSS+Grid',
                    'reading_time' => 7,
                    'comments_count' => 14,
                    'tags' => ['CSS', 'Flexbox', 'Grid']
                ],
                [
                    'id' => 10,
                    'title' => 'PHP 8.3: New Features and Performance Improvements',
                    'excerpt' => 'Explore the new features and performance improvements in PHP 8.3. Learn about new functions, syntax improvements, and migration tips.',
                    'category' => 'PHP',
                    'author' => 'David Chen',
                    'author_avatar' => 'https://ui-avatars.com/api/?name=David+Chen&background=2ed573&color=fff',
                    'published_at' => '2024-03-05',
                    'image' => 'https://via.placeholder.com/800x500/2ed573/FFFFFF?text=PHP+8.3',
                    'reading_time' => 8,
                    'comments_count' => 13,
                    'tags' => ['PHP', 'Web Development']
                ],
                [
                    'id' => 11,
                    'title' => 'Tailwind CSS: Tips and Tricks for Developers',
                    'excerpt' => 'Discover useful tips and tricks for using Tailwind CSS effectively. Includes customization, responsive design, and performance optimization.',
                    'category' => 'Design',
                    'author' => 'Sarah Lee',
                    'author_avatar' => 'https://ui-avatars.com/api/?name=Sarah+Lee&background=ffa502&color=fff',
                    'published_at' => '2024-03-10',
                    'image' => 'https://via.placeholder.com/800x500/ffa502/FFFFFF?text=Tailwind+CSS',
                    'reading_time' => 6,
                    'comments_count' => 22,
                    'tags' => ['Tailwind', 'CSS', 'Frontend']
                ],
                [
                    'id' => 12,
                    'title' => 'Microservices Architecture: When and Why to Use It',
                    'excerpt' => 'Learn about microservices architecture, its benefits, challenges, and when it makes sense to adopt it for your applications.',
                    'category' => 'DevOps',
                    'author' => 'Emily Wilson',
                    'author_avatar' => 'https://ui-avatars.com/api/?name=Emily+Wilson&background=ff6b81&color=fff',
                    'published_at' => '2024-03-15',
                    'image' => 'https://via.placeholder.com/800x500/ff6b81/FFFFFF?text=Microservices',
                    'reading_time' => 13,
                    'comments_count' => 27,
                    'tags' => ['Microservices', 'Architecture', 'DevOps']
                ]
            ];
            
            // Featured post (ambil yang pertama)
            $featured = $blogs[0] ?? null;
        @endphp

        <!-- Featured Post -->
        @if($featured)
        <div class="featured-post mb-5">
            <div class="row g-0 align-items-center">
                <div class="col-lg-6">
                    <img src="{{ $featured['image'] }}" 
                         alt="{{ $featured['title'] }}" 
                         class="img-fluid rounded-start" style="height: 350px; width: 100%; object-fit: cover;" />
                </div>
                <div class="col-lg-6">
                    <div class="p-4 p-lg-5 bg-white rounded-end shadow-sm">
                        <span class="badge bg-danger mb-2">
                            <i class="fas fa-star me-1"></i> Featured
                        </span>
                        <span class="badge bg-primary mb-2">{{ $featured['category'] }}</span>
                        <h2 class="fw-bold text-dark">{{ $featured['title'] }}</h2>
                        <p class="text-muted">{{ $featured['excerpt'] }}</p>
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ $featured['author_avatar'] }}" 
                                 alt="{{ $featured['author'] }}" 
                                 class="rounded-circle" width="40" height="40" />
                            <div>
                                <div class="fw-semibold">{{ $featured['author'] }}</div>
                                <small class="text-muted">
                                    {{ \Carbon\Carbon::parse($featured['published_at'])->format('M d, Y') }}
                                    · {{ $featured['reading_time'] }} min read
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Blog Posts Grid -->
        <div class="row g-4" id="blogGrid">
            @foreach($blogs as $index => $blog)
            @if($index > 0)
            <div class="col-lg-4 col-md-6 blog-item" 
                 data-category="{{ $blog['category'] }}"
                 data-title="{{ strtolower($blog['title']) }}"
                 data-date="{{ $blog['published_at'] }}">
                <article class="blog-card">
                    <div class="blog-image">
                        <img src="{{ $blog['image'] }}" alt="{{ $blog['title'] }}" />
                        <span class="blog-category">{{ $blog['category'] }}</span>
                    </div>
                    <div class="blog-body">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <img src="{{ $blog['author_avatar'] }}" 
                                 alt="{{ $blog['author'] }}" 
                                 class="rounded-circle" width="28" height="28" />
                            <span class="small fw-semibold">{{ $blog['author'] }}</span>
                        </div>
                        <h5 class="blog-title">{{ $blog['title'] }}</h5>
                        <p class="blog-excerpt">{{ \Illuminate\Support\Str::limit($blog['excerpt'], 80) }}</p>
                        <div class="blog-footer">
                            <span class="blog-date">
                                <i class="far fa-calendar-alt me-1"></i>
                                {{ \Carbon\Carbon::parse($blog['published_at'])->format('M d, Y') }}
                            </span>
                            <span class="blog-stats">
                                <i class="far fa-clock me-1"></i>
                                {{ $blog['reading_time'] }} min
                            </span>
                            <span class="blog-stats">
                                <i class="far fa-comment me-1"></i>
                                {{ $blog['comments_count'] }}
                            </span>
                        </div>
                    </div>
                </article>
            </div>
            @endif
            @endforeach
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-5">
            <button class="btn btn-outline-primary btn-lg" id="loadMoreBtn">
                <i class="fas fa-sync me-2"></i> Load More Articles
            </button>
        </div>
    </div>
</section>

<!-- ========== NEWSLETTER SECTION ========== -->
<section class="newsletter-section" id="newsletter">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2>Subscribe to Our <span style="color: #ffd700;">Newsletter</span></h2>
                <p class="mb-4">
                    Get the latest articles and updates delivered to your inbox weekly.
                </p>
                <div class="row g-2 justify-content-center">
                    <div class="col-md-7">
                        <div class="input-group">
                            <input type="email" class="form-control form-control-lg" 
                                   placeholder="Enter your email" id="newsletterEmail" />
                            <button class="btn btn-primary btn-lg" id="newsletterSubscribe">
                                <i class="fas fa-paper-plane me-2"></i> Subscribe
                            </button>
                        </div>
                        <div id="newsletterMessage" class="mt-2 small"></div>
                    </div>
                </div>
                <div class="mt-3">
                    <small class="text-muted">
                        <i class="fas fa-lock me-1"></i> No spam, unsubscribe anytime.
                    </small>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
/* ===== HERO ===== */
.blog-hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 80px 0 70px;
}

.blog-hero h1 {
    font-size: 3.5rem;
    font-weight: 700;
}

.blog-hero .lead {
    font-size: 1.15rem;
    opacity: 0.9;
}

/* ===== FEATURED POST ===== */
.featured-post {
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s ease;
}

.featured-post:hover {
    transform: translateY(-5px);
}

/* ===== BLOG CARD ===== */
.blog-card {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.06);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.blog-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
}

.blog-card .blog-image {
    position: relative;
    overflow: hidden;
    height: 200px;
}

.blog-card .blog-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.blog-card:hover .blog-image img {
    transform: scale(1.08);
}

.blog-card .blog-category {
    position: absolute;
    top: 12px;
    right: 12px;
    padding: 4px 14px;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    font-size: 0.7rem;
    border-radius: 20px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.blog-card .blog-body {
    padding: 20px 22px 18px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.blog-card .blog-title {
    font-size: 1.05rem;
    font-weight: 700;
    margin-bottom: 8px;
    line-height: 1.4;
    color: #1a1a2e;
}

.blog-card .blog-excerpt {
    font-size: 0.9rem;
    color: #6c757d;
    flex: 1;
    margin-bottom: 12px;
}

.blog-card .blog-footer {
    display: flex;
    align-items: center;
    gap: 14px;
    font-size: 0.8rem;
    color: #6c757d;
    border-top: 1px solid #f0f0f0;
    padding-top: 12px;
}

.blog-card .blog-footer .blog-stats {
    display: flex;
    align-items: center;
    gap: 3px;
}

.blog-card .blog-footer .blog-date {
    margin-right: auto;
}

/* ===== NEWSLETTER ===== */
.newsletter-section {
    background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
    color: white;
    padding: 70px 0;
}

.newsletter-section .form-control {
    border-radius: 30px 0 0 30px;
    border: none;
    padding: 14px 20px;
}

.newsletter-section .btn {
    border-radius: 0 30px 30px 0;
    padding: 14px 30px;
}

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {
    .blog-hero h1 {
        font-size: 2.2rem;
    }
    
    .blog-hero {
        padding: 50px 0 40px;
    }
    
    .featured-post .rounded-start {
        border-radius: 16px 16px 0 0 !important;
    }
    
    .featured-post .rounded-end {
        border-radius: 0 0 16px 16px !important;
    }
    
    .blog-card .blog-image {
        height: 170px;
    }
    
    .blog-card .blog-body {
        padding: 16px;
    }
    
    .newsletter-section .form-control {
        border-radius: 30px;
    }
    
    .newsletter-section .btn {
        border-radius: 30px;
        margin-top: 8px;
        width: 100%;
    }
}

/* ===== ANIMATION ===== */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.blog-item {
    animation: fadeInUp 0.6s ease forwards;
}

.blog-item:nth-child(1) { animation-delay: 0.1s; }
.blog-item:nth-child(2) { animation-delay: 0.2s; }
.blog-item:nth-child(3) { animation-delay: 0.3s; }
.blog-item:nth-child(4) { animation-delay: 0.4s; }
.blog-item:nth-child(5) { animation-delay: 0.5s; }
.blog-item:nth-child(6) { animation-delay: 0.6s; }
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // ===== DATA STATS =====
    var totalPosts = 12;
    var totalCategories = 8;
    var totalAuthors = 6;
    var totalComments = 278;
    
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
        animateCounter('#totalPosts', totalPosts);
        animateCounter('#totalCategories', totalCategories);
        animateCounter('#totalAuthors', totalAuthors);
        animateCounter('#totalComments', totalComments);
    }, 300);

    // ===== SEARCH =====
    $('#searchInput').on('keyup', function() {
        var query = $(this).val().toLowerCase();
        $('.blog-item').each(function() {
            var title = $(this).data('title');
            $(this).toggle(title.includes(query));
        });
        checkEmptyResults();
    });

    // ===== CATEGORY FILTER =====
    $('#categoryFilter').on('change', function() {
        var category = $(this).val();
        $('.blog-item').each(function() {
            var itemCategory = $(this).data('category');
            $(this).toggle(category === '' || itemCategory === category);
        });
        checkEmptyResults();
    });

    // ===== SORT FILTER =====
    $('#sortFilter').on('change', function() {
        var sortType = $(this).val();
        var grid = $('#blogGrid');
        var items = $('.blog-item').get();
        
        items.sort(function(a, b) {
            var dateA = $(a).data('date');
            var dateB = $(b).data('date');
            
            if (sortType === 'newest') return dateA < dateB ? 1 : -1;
            if (sortType === 'oldest') return dateA > dateB ? 1 : -1;
            return 0;
        });
        
        $.each(items, function(i, item) {
            grid.append(item);
        });
    });

    // ===== CHECK EMPTY =====
    function checkEmptyResults() {
        var visible = $('.blog-item:visible').length;
        if (visible === 0) {
            if ($('#emptyMessage').length === 0) {
                $('#blogGrid').append(
                    '<div id="emptyMessage" class="col-12 text-center py-5">' +
                        '<i class="fas fa-search fa-3x text-muted mb-3"></i>' +
                        '<h4>No articles found</h4>' +
                        '<p class="text-muted">Try adjusting your search or filter.</p>' +
                    '</div>'
                );
            }
        } else {
            $('#emptyMessage').remove();
        }
    }

    // ===== LOAD MORE =====
    var hiddenItems = $('.blog-item:gt(5)');
    hiddenItems.hide();
    
    $('#loadMoreBtn').on('click', function() {
        var hidden = $('.blog-item:hidden');
        if (hidden.length > 0) {
            hidden.slice(0, 3).fadeIn(400);
        }
        if ($('.blog-item:hidden').length === 0) {
            $(this).fadeOut();
        }
    });

    // ===== NEWSLETTER =====
    $('#newsletterSubscribe').on('click', function() {
        var email = $('#newsletterEmail').val().trim();
        var msg = $('#newsletterMessage');
        
        if (email === '') {
            msg.html('<span class="text-warning">⚠️ Please enter your email</span>');
            return;
        }
        
        if (!isValidEmail(email)) {
            msg.html('<span class="text-warning">⚠️ Please enter a valid email</span>');
            return;
        }
        
        msg.html('<span class="text-info">⏳ Subscribing...</span>');
        
        setTimeout(function() {
            msg.html('<span class="text-success">✅ Subscribed successfully!</span>');
            $('#newsletterEmail').val('');
            setTimeout(function() { msg.html(''); }, 3000);
        }, 1000);
    });

    // ===== VALIDASI EMAIL =====
    function isValidEmail(email) {
        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
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

    console.log('✅ Blog page loaded with ' + $('.blog-item').length + ' articles!');
});
</script>
@endpush