@extends('layout')

@section('title', 'Blog Detail - DummyCorp')

@section('content')
<!-- ========== HERO SECTION ========== -->
@php
    // Data dummy blog detail
    $blog = [
        'id' => 1,
        'title' => 'Getting Started with Laravel 11: A Complete Guide for Beginners',
        'category' => 'Laravel',
        'author' => 'John Doe',
        'author_avatar' => 'https://ui-avatars.com/api/?name=John+Doe&background=667eea&color=fff&size=100',
        'author_bio' => 'John is a senior full-stack developer with over 10 years of experience in web development. He specializes in Laravel, PHP, and modern JavaScript frameworks.',
        'author_position' => 'Senior Developer',
        'published_at' => '2024-01-15',
        'reading_time' => 8,
        'comments_count' => 24,
        'image' => 'https://via.placeholder.com/1200x500/667eea/FFFFFF?text=Laravel+11',
        'excerpt' => 'Learn everything you need to know about Laravel 11, from installation to advanced features. Perfect for beginners and experienced developers.',
        'content' => '
            <p>Laravel 11 has arrived with exciting new features and improvements that make web development faster and more enjoyable than ever before. In this comprehensive guide, we\'ll explore everything you need to know to get started with Laravel 11.</p>
            
            <h3>What\'s New in Laravel 11?</h3>
            <p>Laravel 11 introduces several groundbreaking features that streamline the development process. The framework has been optimized for performance, with faster routing and improved query builder capabilities.</p>
            
            <ul>
                <li><strong>Simplified Application Structure:</strong> Laravel 11 comes with a cleaner, more streamlined application structure that reduces boilerplate code.</li>
                <li><strong>Enhanced Security Features:</strong> New security enhancements including improved authentication and authorization mechanisms.</li>
                <li><strong>Better Performance:</strong> Optimized routing and caching mechanisms for faster response times.</li>
                <li><strong>Improved Testing Tools:</strong> Enhanced testing capabilities with better mocking and assertion libraries.</li>
            </ul>
            
            <h3>Getting Started with Laravel 11</h3>
            <p>To start a new Laravel 11 project, you\'ll need to have PHP 8.2 or higher installed on your system. Once you\'ve confirmed your PHP version, you can create a new project using Composer.</p>
            
            <pre class="code-block">composer create-project laravel/laravel my-app</pre>
            
            <p>After installation, navigate to your project directory and start the development server:</p>
            
            <pre class="code-block">cd my-app
php artisan serve</pre>
            
            <p>Your application will be available at <code>http://localhost:8000</code>.</p>
            
            <h3>Key Features to Explore</h3>
            <p>Laravel 11 comes packed with features that every developer should know:</p>
            
            <h4>1. Routing</h4>
            <p>Laravel\'s routing system is powerful and intuitive. You can define routes for your application in the <code>routes/web.php</code> file. Here\'s a simple example:</p>
            
            <pre class="code-block">Route::get(\'/\', function () {
    return view(\'welcome\');
});</pre>
            
            <h4>2. Blade Templating</h4>
            <p>Blade is Laravel\'s powerful templating engine that allows you to create dynamic views with ease. It provides features like template inheritance, components, and directives.</p>
            
            <h4>3. Eloquent ORM</h4>
            <p>Eloquent is Laravel\'s ORM that provides a simple and elegant way to interact with your database. It supports relationships, eager loading, and more.</p>
            
            <h3>Conclusion</h3>
            <p>Laravel 11 is a powerful framework that offers everything you need to build modern web applications. With its elegant syntax, robust features, and active community, it\'s the perfect choice for developers of all skill levels.</p>
            
            <p>Start your journey with Laravel 11 today and experience the joy of building amazing web applications!</p>
        ',
        'tags' => ['Laravel', 'PHP', 'Web Development', 'Framework', 'Backend'],
        'related_posts' => [
            ['title' => 'Mastering JavaScript: 10 Essential Tips', 'slug' => 'mastering-javascript-tips', 'image' => 'https://via.placeholder.com/100x100/764ba2/FFFFFF?text=JS'],
            ['title' => 'UI/UX Design Principles for Developers', 'slug' => 'ui-ux-design-principles', 'image' => 'https://via.placeholder.com/100x100/ff6b6b/FFFFFF?text=UI'],
            ['title' => 'Database Optimization Techniques', 'slug' => 'database-optimization-techniques', 'image' => 'https://via.placeholder.com/100x100/2ed573/FFFFFF?text=DB'],
        ],
        'comments' => [
            [
                'name' => 'Sarah Johnson',
                'avatar' => 'https://ui-avatars.com/api/?name=Sarah+Johnson&background=764ba2&color=fff',
                'date' => '2024-01-16 10:30:00',
                'content' => 'This is exactly what I was looking for! The guide is very comprehensive and easy to follow. Thank you for sharing!',
                'replies' => [
                    [
                        'name' => 'John Doe',
                        'avatar' => 'https://ui-avatars.com/api/?name=John+Doe&background=667eea&color=fff',
                        'date' => '2024-01-16 11:15:00',
                        'content' => 'Glad you found it helpful, Sarah! Let me know if you have any questions.'
                    ]
                ]
            ],
            [
                'name' => 'Mike Wilson',
                'avatar' => 'https://ui-avatars.com/api/?name=Mike+Wilson&background=ff6b6b&color=fff',
                'date' => '2024-01-17 14:20:00',
                'content' => 'Great article! I\'ve been using Laravel for years and this still taught me a few new things.',
                'replies' => []
            ],
            [
                'name' => 'Emily Chen',
                'avatar' => 'https://ui-avatars.com/api/?name=Emily+Chen&background=ffa502&color=fff',
                'date' => '2024-01-18 09:45:00',
                'content' => 'Perfect timing! I was just about to start a new Laravel project. This guide will be my go-to reference.',
                'replies' => []
            ]
        ]
    ];
@endphp

<section class="blog-detail-hero">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $blog['title'] }}</li>
            </ol>
        </nav>
        
        <div class="row">
            <div class="col-lg-10 mx-auto text-center">
                <span class="badge bg-primary mb-3">{{ $blog['category'] }}</span>
                <h1>{{ $blog['title'] }}</h1>
                <div class="blog-meta">
                    <div class="d-flex align-items-center justify-content-center gap-3 flex-wrap">
                        <div class="d-flex align-items-center gap-2">
                            <img src="{{ $blog['author_avatar'] }}" 
                                 alt="{{ $blog['author'] }}" 
                                 class="rounded-circle" width="40" height="40" />
                            <span class="fw-semibold">{{ $blog['author'] }}</span>
                        </div>
                        <span>
                            <i class="far fa-calendar-alt me-1"></i>
                            {{ \Carbon\Carbon::parse($blog['published_at'])->format('M d, Y') }}
                        </span>
                        <span>
                            <i class="far fa-clock me-1"></i>
                            {{ $blog['reading_time'] }} min read
                        </span>
                        <span>
                            <i class="far fa-comment me-1"></i>
                            {{ $blog['comments_count'] }} comments
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== BLOG CONTENT ========== -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <!-- ===== MAIN CONTENT ===== -->
            <div class="col-lg-8">
                <!-- Featured Image -->
                <img src="{{ $blog['image'] }}" 
                     alt="{{ $blog['title'] }}" 
                     class="img-fluid rounded-4 mb-4 w-100" />

                <!-- Content -->
                <article class="blog-content">
                    <p class="lead">{{ $blog['excerpt'] }}</p>
                    {!! $blog['content'] !!}
                </article>

                <!-- Tags -->
                <div class="blog-tags mt-4 pt-3 border-top">
                    <span class="fw-bold me-2">Tags:</span>
                    @foreach($blog['tags'] as $tag)
                    <span class="tag-item">#{{ $tag }}</span>
                    @endforeach
                </div>

                <!-- Author Bio -->
                <div class="author-bio mt-4">
                    <div class="d-flex align-items-center gap-3">
                        <img src="{{ $blog['author_avatar'] }}" 
                             alt="{{ $blog['author'] }}" 
                             class="rounded-circle" width="70" height="70" />
                        <div>
                            <h6 class="fw-bold mb-0">{{ $blog['author'] }}</h6>
                            <small class="text-muted">{{ $blog['author_position'] }}</small>
                            <p class="mb-0 small mt-1">{{ $blog['author_bio'] }}</p>
                        </div>
                    </div>
                </div>

                <!-- Share -->
                <div class="share-section mt-4 pt-3 border-top">
                    <span class="fw-bold me-3">Share this article:</span>
                    <div class="d-inline-flex gap-2">
                        <a href="#" class="share-btn twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="share-btn facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="share-btn linkedin"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="share-btn whatsapp"><i class="fab fa-whatsapp"></i></a>
                        <a href="#" class="share-btn email"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>

                <!-- Comments Section -->
                <section class="comments-section mt-5 pt-4 border-top">
                    <h4 class="fw-bold mb-4">
                        <i class="far fa-comment me-2"></i>
                        Comments ({{ count($blog['comments']) }})
                    </h4>

                    <!-- Comment Form -->
                    <div class="comment-form mb-4">
                        <h6 class="fw-bold mb-3">Leave a Comment</h6>
                        <form id="commentForm">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Your Name" id="commentName" required />
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="Your Email" id="commentEmail" required />
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" rows="4" placeholder="Write your comment..." id="commentContent" required></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary" id="submitCommentBtn">
                                        <i class="fas fa-paper-plane me-2"></i> Post Comment
                                    </button>
                                    <div id="commentMessage" class="mt-2"></div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Comments List -->
                    <div id="commentsList">
                        @foreach($blog['comments'] as $comment)
                        <div class="comment-item">
                            <div class="d-flex gap-3">
                                <img src="{{ $comment['avatar'] }}" 
                                     alt="{{ $comment['name'] }}" 
                                     class="rounded-circle" width="45" height="45" />
                                <div class="flex-1">
                                    <div>
                                        <h6 class="fw-bold mb-0">{{ $comment['name'] }}</h6>
                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse($comment['date'])->diffForHumans() }}
                                        </small>
                                    </div>
                                    <p class="mt-1 mb-2">{{ $comment['content'] }}</p>
                                    
                                    @if(!empty($comment['replies']))
                                        @foreach($comment['replies'] as $reply)
                                        <div class="comment-reply mt-2">
                                            <div class="d-flex gap-3">
                                                <img src="{{ $reply['avatar'] }}" 
                                                     alt="{{ $reply['name'] }}" 
                                                     class="rounded-circle" width="35" height="35" />
                                                <div>
                                                    <div>
                                                        <h6 class="fw-bold mb-0">{{ $reply['name'] }}</h6>
                                                        <small class="text-muted">
                                                            {{ \Carbon\Carbon::parse($reply['date'])->diffForHumans() }}
                                                        </small>
                                                    </div>
                                                    <p class="mt-1 mb-0">{{ $reply['content'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif
                                    
                                    <a href="#" class="reply-link small">Reply</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>
            </div>

            <!-- ===== SIDEBAR ===== -->
            <div class="col-lg-4">
                <!-- Search -->
                <div class="sidebar-card">
                    <h6><i class="fas fa-search text-primary me-2"></i>Search</h6>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search articles..." id="sidebarSearch" />
                        <button class="btn btn-primary" id="sidebarSearchBtn">
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- About Author -->
                <div class="sidebar-card text-center">
                    <img src="{{ $blog['author_avatar'] }}" 
                         alt="{{ $blog['author'] }}" 
                         class="rounded-circle mb-3" width="90" height="90" />
                    <h6>{{ $blog['author'] }}</h6>
                    <small class="text-muted">{{ $blog['author_position'] }}</small>
                    <p class="small mt-2">{{ $blog['author_bio'] }}</p>
                </div>

                <!-- Related Posts -->
                <div class="sidebar-card">
                    <h6><i class="fas fa-link text-primary me-2"></i>Related Posts</h6>
                    @foreach($blog['related_posts'] as $post)
                    <a href="#" class="related-post d-flex align-items-center">
                        <img src="{{ $post['image'] }}" 
                             alt="{{ $post['title'] }}" 
                             width="60" height="60" class="rounded me-3" />
                        <div>
                            <h6 class="mb-0">{{ $post['title'] }}</h6>
                            <small class="text-muted">Read more →</small>
                        </div>
                    </a>
                    @endforeach
                </div>

                <!-- Categories -->
                <div class="sidebar-card">
                    <h6><i class="fas fa-tags text-primary me-2"></i>Categories</h6>
                    <div class="d-flex flex-wrap gap-2">
                        @php
                            $categories = ['Laravel' => 12, 'PHP' => 8, 'JavaScript' => 10, 'Vue.js' => 6, 'React' => 7, 'Design' => 5];
                        @endphp
                        @foreach($categories as $category => $count)
                        <a href="#" class="category-tag">
                            {{ $category }} <span class="badge bg-light text-dark ms-1">{{ $count }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>

                <!-- Newsletter -->
                <div class="sidebar-card bg-primary text-white">
                    <h6><i class="fas fa-envelope me-2"></i>Newsletter</h6>
                    <p class="small">Get the latest articles delivered to your inbox.</p>
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Your email" id="sidebarNewsletter" />
                        <button class="btn btn-light" id="sidebarNewsletterBtn">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                    <div id="sidebarNewsletterMsg" class="mt-2 small"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== CTA SECTION ========== -->
<section class="cta-section">
    <div class="container text-center">
        <h2 class="fw-bold">Enjoyed This <span style="color: #ffd700;">Article?</span></h2>
        <p class="lead mb-4">Subscribe to our newsletter for more insights and updates.</p>
        <a href="#" class="btn btn-light btn-lg">
            <i class="fas fa-envelope me-2"></i> Subscribe Now
        </a>
    </div>
</section>
@endsection

@push('styles')
<style>
/* ===== HERO ===== */
.blog-detail-hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 60px 0 50px;
}

.blog-detail-hero .breadcrumb {
    background: transparent;
    padding: 0;
}

.blog-detail-hero .breadcrumb-item a {
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
}

.blog-detail-hero .breadcrumb-item a:hover {
    color: #fff;
}

.blog-detail-hero .breadcrumb-item.active {
    color: #fff;
}

.blog-detail-hero .breadcrumb-item + .breadcrumb-item::before {
    color: rgba(255, 255, 255, 0.6);
}

.blog-detail-hero h1 {
    font-size: 2.8rem;
    font-weight: 700;
}

.blog-meta {
    margin-top: 20px;
    font-size: 0.95rem;
    opacity: 0.9;
}

/* ===== BLOG CONTENT ===== */
.blog-content {
    font-size: 1.1rem;
    line-height: 1.9;
    color: #333;
}

.blog-content p {
    margin-bottom: 1.25rem;
}

.blog-content h3 {
    font-weight: 700;
    margin-top: 2rem;
    margin-bottom: 1rem;
    color: #1a1a2e;
}

.blog-content h4 {
    font-weight: 600;
    margin-top: 1.5rem;
    margin-bottom: 0.8rem;
    color: #1a1a2e;
}

.blog-content ul {
    margin-bottom: 1.25rem;
    padding-left: 1.5rem;
}

.blog-content ul li {
    margin-bottom: 0.5rem;
}

.blog-content .code-block {
    background: #f0f0f0;
    padding: 15px 20px;
    border-radius: 8px;
    font-family: 'Courier New', monospace;
    font-size: 0.9rem;
    overflow-x: auto;
    margin: 1.25rem 0;
}

.blog-content code {
    background: #f0f0f0;
    padding: 2px 8px;
    border-radius: 4px;
    font-size: 0.9rem;
}

/* ===== TAGS ===== */
.tag-item {
    display: inline-block;
    padding: 4px 14px;
    background: #f0f0f0;
    border-radius: 20px;
    font-size: 0.85rem;
    color: #333;
    margin-right: 5px;
    transition: all 0.3s ease;
}

.tag-item:hover {
    background: #667eea;
    color: white;
}

/* ===== AUTHOR BIO ===== */
.author-bio {
    background: #f8f9fa;
    padding: 20px 25px;
    border-radius: 12px;
}

/* ===== SHARE BUTTONS ===== */
.share-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    color: white;
    font-size: 0.9rem;
    transition: transform 0.3s ease;
    text-decoration: none;
}

.share-btn:hover {
    transform: translateY(-3px);
    color: white;
}

.share-btn.twitter {
    background: #1da1f2;
}

.share-btn.facebook {
    background: #1877f2;
}

.share-btn.linkedin {
    background: #0077b5;
}

.share-btn.whatsapp {
    background: #25d366;
}

.share-btn.email {
    background: #ea4335;
}

/* ===== COMMENTS ===== */
.comment-item {
    padding: 20px 0;
    border-bottom: 1px solid #f0f0f0;
}

.comment-item:last-child {
    border-bottom: none;
}

.comment-reply {
    padding-left: 20px;
    border-left: 3px solid #667eea;
    margin-left: 20px;
}

.reply-link {
    color: #667eea;
    text-decoration: none;
    font-size: 0.85rem;
}

.reply-link:hover {
    text-decoration: underline;
}

/* ===== SIDEBAR ===== */
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

.related-post {
    padding: 10px 0;
    border-bottom: 1px solid #f0f0f0;
    text-decoration: none;
    color: #1a1a2e;
    transition: color 0.3s ease;
}

.related-post:last-child {
    border-bottom: none;
}

.related-post:hover {
    color: #667eea;
}

.related-post h6 {
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 2px;
}

.category-tag {
    display: inline-block;
    padding: 4px 14px;
    background: #f0f0f0;
    border-radius: 20px;
    font-size: 0.85rem;
    color: #333;
    text-decoration: none;
    transition: all 0.3s ease;
}

.category-tag:hover {
    background: #667eea;
    color: white;
}

.category-tag .badge {
    font-size: 0.7rem;
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
    .blog-detail-hero h1 {
        font-size: 2rem;
    }
    
    .blog-detail-hero {
        padding: 40px 0 30px;
    }
    
    .blog-content {
        font-size: 1rem;
    }
    
    .blog-content .code-block {
        font-size: 0.8rem;
        padding: 12px 15px;
    }
    
    .comment-reply {
        margin-left: 10px;
        padding-left: 12px;
    }
    
    .sidebar-card {
        padding: 18px;
    }
    
    .author-bio {
        padding: 15px 18px;
    }
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // ===== SEARCH =====


    $('#sidebarSearch').on('keypress', function(e) {
        if (e.which === 13) {
            $('#sidebarSearchBtn').click();
        }
    });

    // ===== COMMENT FORM =====
    $('#commentForm').on('submit', function(e) {
        e.preventDefault();
        
        var name = $('#commentName').val().trim();
        var email = $('#commentEmail').val().trim();
        var content = $('#commentContent').val().trim();
        
        if (name === '' || email === '' || content === '') {
            $('#commentMessage').html(
                '<div class="alert alert-danger">Please fill in all fields.</div>'
            );
            return;
        }
        
        if (!isValidEmail(email)) {
            $('#commentMessage').html(
                '<div class="alert alert-danger">Please enter a valid email address.</div>'
            );
            return;
        }
        
        var btn = $('#submitCommentBtn');
        var originalText = btn.html();
        btn.html('<span class="spinner-border spinner-border-sm me-2"></span> Posting...');
        btn.prop('disabled', true);
        
        setTimeout(function() {
            var newComment = 
                '<div class="comment-item">' +
                    '<div class="d-flex gap-3">' +
                        '<img src="https://ui-avatars.com/api/?name=' + encodeURIComponent(name) + '&background=667eea&color=fff" class="rounded-circle" width="45" height="45" />' +
                        '<div class="flex-1">' +
                            '<div>' +
                                '<h6 class="fw-bold mb-0">' + name + '</h6>' +
                                '<small class="text-muted">Just now</small>' +
                            '</div>' +
                            '<p class="mt-1 mb-0">' + content + '</p>' +
                            '<a href="#" class="reply-link small">Reply</a>' +
                        '</div>' +
                    '</div>' +
                '</div>';
            
            $('#commentsList').prepend(newComment);
            
            // Update comment count
            var currentCount = parseInt($('.fw-bold i.fa-comment').parent().text().match(/\d+/)[0]) || 0;
            $('.fw-bold i.fa-comment').parent().text(' Comments (' + (currentCount + 1) + ')');
            
            btn.html(originalText);
            btn.prop('disabled', false);
            
            $('#commentMessage').html(
                '<div class="alert alert-success">✅ Comment posted successfully!</div>'
            );
            
            $('#commentForm')[0].reset();
            
            setTimeout(function() {
                $('#commentMessage').html('');
            }, 3000);
        }, 1000);
    });

    // ===== VALIDASI EMAIL =====
    function isValidEmail(email) {
        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    // ===== NEWSLETTER =====
    $('#sidebarNewsletterBtn').on('click', function() {
        var email = $('#sidebarNewsletter').val().trim();
        var msg = $('#sidebarNewsletterMsg');
        
        if (email === '') {
            msg.html('<span class="text-warning">⚠️ Please enter your email</span>');
            return;
        }
        
        if (!isValidEmail(email)) {
            msg.html('<span class="text-warning">⚠️ Please enter a valid email</span>');
            return;
        }
        
        msg.html('<span class="text-light">⏳ Subscribing...</span>');
        
        setTimeout(function() {
            msg.html('<span class="text-success">✅ Subscribed successfully!</span>');
            $('#sidebarNewsletter').val('');
            setTimeout(function() { msg.html(''); }, 3000);
        }, 1000);
    });

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

    console.log('✅ Blog detail page loaded!');
});
</script>
@endpush