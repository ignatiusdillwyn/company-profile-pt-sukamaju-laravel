<!-- ========== NAVBAR ========== -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <div class="brand-wrapper">
                <div class="brand-icon">
                    <i class="fas fa-cube"></i>
                </div>
                <div class="brand-text">
                    <span class="brand-name">Dummy<span>Corp</span></span>
                    <span class="brand-tagline">Digital Solutions</span>
                </div>
            </div>
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="fas fa-home nav-icon"></i>
                        <span>Home</span>
                        <span class="nav-indicator"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('service*') ? 'active' : '' }}" href="{{ route('service') }}">
                        <i class="fas fa-cogs nav-icon"></i>
                        <span>Services</span>
                        <span class="nav-indicator"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('blog*') ? 'active' : '' }}" href="{{ route('blog') }}">
                        <i class="fas fa-blog nav-icon"></i>
                        <span>Blog</span>
                        <span class="nav-indicator"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                        <i class="fas fa-info-circle nav-icon"></i>
                        <span>About</span>
                        <span class="nav-indicator"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                        <i class="fas fa-envelope nav-icon"></i>
                        <span>Contact</span>
                        <span class="nav-indicator"></span>
                    </a>
                </li>
                <li class="nav-item ms-lg-2">
                    <a class="btn btn-primary btn-nav-cta" href="{{ route('contact') }}">
                        <i class="fas fa-rocket me-2"></i> Get Started
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@push('styles')
<style>
/* ===== NAVBAR STYLING ===== */
.navbar {
    background: rgba(255, 255, 255, 0.97) !important;
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    box-shadow: 0 2px 30px rgba(0, 0, 0, 0.06);
    padding: 12px 0;
    transition: all 0.3s ease;
    border-bottom: 1px solid rgba(102, 126, 234, 0.08);
}

.navbar.scrolled {
    box-shadow: 0 4px 40px rgba(0, 0, 0, 0.08);
    padding: 8px 0;
}

/* ===== BRAND / LOGO ===== */
.brand-wrapper {
    display: flex;
    align-items: center;
    gap: 12px;
}

.brand-icon {
    width: 42px;
    height: 42px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.3rem;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    transition: transform 0.3s ease;
}

.brand-wrapper:hover .brand-icon {
    transform: rotate(-8deg) scale(1.05);
}

.brand-text {
    display: flex;
    flex-direction: column;
    line-height: 1.2;
}

.brand-name {
    font-size: 1.3rem;
    font-weight: 800;
    color: #1a1a2e;
    letter-spacing: -0.5px;
}

.brand-name span {
    color: #667eea;
    background: linear-gradient(135deg, #667eea, #764ba2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.brand-tagline {
    font-size: 0.6rem;
    color: #6c757d;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    font-weight: 600;
}

/* ===== NAV LINKS ===== */
.navbar-nav .nav-item {
    position: relative;
    margin: 0 2px;
}

.navbar-nav .nav-link {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 18px;
    color: #4a4a5a;
    font-weight: 500;
    font-size: 0.95rem;
    border-radius: 12px;
    transition: all 0.3s ease;
    position: relative;
}

.navbar-nav .nav-link .nav-icon {
    font-size: 0.85rem;
    opacity: 0.5;
    transition: all 0.3s ease;
}

.navbar-nav .nav-link .nav-indicator {
    position: absolute;
    bottom: 4px;
    left: 50%;
    transform: translateX(-50%);
    width: 0;
    height: 3px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 3px;
    transition: all 0.3s ease;
}

.navbar-nav .nav-link:hover {
    color: #667eea;
    background: rgba(102, 126, 234, 0.06);
}

.navbar-nav .nav-link:hover .nav-icon {
    opacity: 1;
}

.navbar-nav .nav-link:hover .nav-indicator {
    width: 50%;
}

/* ===== ACTIVE LINK ===== */
.navbar-nav .nav-link.active {
    color: #667eea;
    background: rgba(102, 126, 234, 0.08);
}

.navbar-nav .nav-link.active .nav-icon {
    opacity: 1;
    color: #667eea;
}

.navbar-nav .nav-link.active .nav-indicator {
    width: 70%;
}

/* ===== CTA BUTTON ===== */
.btn-nav-cta {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    padding: 10px 28px;
    border-radius: 30px;
    font-weight: 600;
    font-size: 0.9rem;
    color: white;
    box-shadow: 0 4px 20px rgba(102, 126, 234, 0.35);
    transition: all 0.3s ease;
}

.btn-nav-cta:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 30px rgba(102, 126, 234, 0.45);
    color: white;
}

.btn-nav-cta:active {
    transform: translateY(0);
}

/* ===== NAVBAR TOGGLER ===== */
.navbar-toggler {
    border: none;
    padding: 8px 10px;
    border-radius: 10px;
    background: rgba(102, 126, 234, 0.06);
}

.navbar-toggler:focus {
    box-shadow: none;
}

.navbar-toggler .navbar-toggler-icon {
    background-image: none;
    position: relative;
    width: 28px;
    height: 2px;
    background: #1a1a2e;
    transition: all 0.3s ease;
}

.navbar-toggler .navbar-toggler-icon::before,
.navbar-toggler .navbar-toggler-icon::after {
    content: '';
    position: absolute;
    left: 0;
    width: 28px;
    height: 2px;
    background: #1a1a2e;
    transition: all 0.3s ease;
}

.navbar-toggler .navbar-toggler-icon::before {
    top: -8px;
}

.navbar-toggler .navbar-toggler-icon::after {
    bottom: -8px;
}

.navbar-toggler[aria-expanded="true"] .navbar-toggler-icon {
    background: transparent;
}

.navbar-toggler[aria-expanded="true"] .navbar-toggler-icon::before {
    transform: rotate(45deg);
    top: 0;
}

.navbar-toggler[aria-expanded="true"] .navbar-toggler-icon::after {
    transform: rotate(-45deg);
    bottom: 0;
}

/* ===== RESPONSIVE ===== */
@media (max-width: 992px) {
    .navbar {
        padding: 10px 0;
    }
    
    .navbar-nav .nav-item {
        margin: 2px 0;
    }
    
    .navbar-nav .nav-link {
        padding: 12px 16px;
        border-radius: 10px;
    }
    
    .navbar-nav .nav-link .nav-indicator {
        display: none;
    }
    
    .navbar-nav .nav-link.active {
        background: rgba(102, 126, 234, 0.1);
    }
    
    .btn-nav-cta {
        margin-top: 8px;
        width: 100%;
        justify-content: center;
    }
    
    .brand-tagline {
        display: none;
    }
}

@media (max-width: 576px) {
    .brand-name {
        font-size: 1.1rem;
    }
    
    .brand-icon {
        width: 36px;
        height: 36px;
        font-size: 1rem;
    }
    
    .navbar-nav .nav-link {
        padding: 10px 14px;
        font-size: 0.9rem;
    }
}

/* ===== DROPDOWN HOVER EFFECT ===== */
.nav-item.dropdown:hover .dropdown-menu {
    display: block;
    animation: fadeInDown 0.3s ease;
}

@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ===== SCROLL INDICATOR ===== */
.navbar.scrolled .brand-icon {
    width: 36px;
    height: 36px;
    font-size: 1rem;
}

.navbar.scrolled .brand-name {
    font-size: 1.1rem;
}

.navbar.scrolled .btn-nav-cta {
    padding: 8px 22px;
    font-size: 0.85rem;
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // ===== NAVBAR SCROLL EFFECT =====
    $(window).on('scroll', function() {
        var scrollTop = $(this).scrollTop();
        if (scrollTop > 50) {
            $('.navbar').addClass('scrolled');
        } else {
            $('.navbar').removeClass('scrolled');
        }
    });

    // ===== ACTIVE LINK DETECTION (FALLBACK) =====
    var currentUrl = window.location.pathname;
    
    $('.navbar-nav .nav-link').each(function() {
        var linkUrl = $(this).attr('href');
        if (linkUrl && linkUrl !== '#') {
            // Cek apakah link match dengan URL saat ini
            if (currentUrl === linkUrl || 
                (linkUrl !== '/' && currentUrl.startsWith(linkUrl))) {
                $('.navbar-nav .nav-link').removeClass('active');
                $(this).addClass('active');
            }
            
            // Untuk homepage
            if (linkUrl === '/' && currentUrl === '/') {
                $('.navbar-nav .nav-link').removeClass('active');
                $(this).addClass('active');
            }
        }
    });

    // ===== CLOSE MOBILE MENU ON LINK CLICK =====
    $('.navbar-nav .nav-link, .btn-nav-cta').on('click', function() {
        var navbarToggler = $('.navbar-toggler');
        if (navbarToggler.is(':visible') && !navbarToggler.hasClass('collapsed')) {
            navbarToggler.click();
        }
    });

    console.log('✅ Navbar loaded successfully!');
});
</script>
@endpush