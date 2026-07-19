<!-- ========== FOOTER ========== -->
    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <h5>
                        <i class="fas fa-cube me-2" style="color:#667eea;"></i>
                        DummyCorp
                    </h5>
                    <p class="text-muted small">
                        Creating amazing digital experiences since 2024.
                    </p>
                    <div class="mt-3">
                        <a href="#" class="me-2"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="me-2"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="me-2"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="me-2"><i class="fab fa-linkedin fa-lg"></i></a>
                        <a href="#"><i class="fab fa-github fa-lg"></i></a>
                    </div>
                </div>
                <div class="col-md-2">
                    <h6>Company</h6>
                    <ul class="list-unstyled">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Press</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h6>Products</h6>
                    <ul class="list-unstyled">
                        <li><a href="#">Features</a></li>
                        <li><a href="#">Pricing</a></li>
                        <li><a href="#">Docs</a></li>
                        <li><a href="#">Changelog</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6>Newsletter</h6>
                    <p class="text-muted small">Subscribe to get latest updates</p>
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Your email" id="newsletterInput" />
                        <button class="btn btn-primary" id="newsletterBtn" type="button">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                    <div id="newsletterMessage" class="mt-2 small"></div>
                </div>
            </div>
            <hr class="my-4 bg-secondary" />
            <div class="text-center text-muted small">
                &copy; 2024 DummyCorp. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- ========== JQUERY ========== -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <!-- ========== BOOTSTRAP 5 JS ========== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ========== CUSTOM JAVASCRIPT ========== -->
    <script>
        $(document).ready(function() {
            console.log('✅ jQuery loaded successfully!');

            // ===== SMOOTH SCROLL =====
            $('.navbar-nav a, .btn[href^="#"]').on('click', function(e) {
                var target = $(this).attr('href');
                if (target && target.startsWith('#')) {
                    e.preventDefault();
                    $('html, body').animate({
                        scrollTop: $(target).offset().top - 70
                    }, 600);
                }
            });

            // ===== NAVBAR ACTIVE LINK =====
            $('.navbar-nav .nav-link').on('click', function() {
                $('.navbar-nav .nav-link').removeClass('active');
                $(this).addClass('active');
            });

            // ===== COUNTER ANIMATION =====
            function animateCounter(elementId, target, suffix) {
                var current = 0;
                var increment = Math.ceil(target / 60);
                var element = $(elementId);
                
                var interval = setInterval(function() {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(interval);
                    }
                    element.text(current + (suffix || ''));
                }, 30);
            }

            // Jalankan counter saat element terlihat
            function startCounters() {
                if ($('#stats').is(':visible')) {
                    animateCounter('#counter1', 128, '+');
                    animateCounter('#counter2', 356, '+');
                    animateCounter('#counter3', 24, '+');
                    animateCounter('#counter4', 42, '+');
                    $(window).off('scroll', startCounters);
                }
            }

            // Cek saat scroll
            $(window).on('scroll', startCounters);
            
            // Cek langsung jika sudah terlihat
            if ($('#stats').is(':visible')) {
                startCounters();
            }

            // ===== NEWSLETTER =====
            $('#newsletterBtn').on('click', function() {
                var email = $('#newsletterInput').val().trim();
                var message = $('#newsletterMessage');
                
                if (email === '') {
                    message.html('<span class="text-warning">⚠️ Please enter your email</span>');
                    return;
                }
                
                if (!isValidEmail(email)) {
                    message.html('<span class="text-warning">⚠️ Please enter a valid email</span>');
                    return;
                }
                
                // Simulasi AJAX
                message.html('<span class="text-info">⏳ Subscribing...</span>');
                
                setTimeout(function() {
                    message.html('<span class="text-success">✅ Subscribed successfully!</span>');
                    $('#newsletterInput').val('');
                    
                    setTimeout(function() {
                        message.html('');
                    }, 3000);
                }, 1000);
            });

            // Enter key untuk newsletter
            $('#newsletterInput').on('keypress', function(e) {
                if (e.which === 13) {
                    $('#newsletterBtn').click();
                }
            });

            // ===== VALIDASI EMAIL =====
            function isValidEmail(email) {
                var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return regex.test(email);
            }

            // ===== CLICK COUNTER =====
            $('.btn-primary, .btn-outline-primary').on('click', function(e) {
                if (!$(this).hasClass('btn-light') && !$(this).hasClass('btn-sm')) {
                    var originalText = $(this).html();
                    $(this).html('<i class="fas fa-spinner fa-spin"></i> Loading...');
                    $(this).prop('disabled', true);
                    
                    setTimeout(function() {
                        $(this).html(originalText);
                        $(this).prop('disabled', false);
                    }.bind(this), 800);
                }
            });

            // ===== SCROLL TO TOP =====
            $(window).on('scroll', function() {
                var scrollTop = $(this).scrollTop();
                if (scrollTop > 300) {
                    if ($('#scrollTopBtn').length === 0) {
                        $('body').append(
                            '<button id="scrollTopBtn" class="btn btn-primary rounded-circle position-fixed" ' +
                            'style="bottom:30px;right:30px;width:50px;height:50px;z-index:999;">' +
                            '<i class="fas fa-arrow-up"></i></button>'
                        );
                        $('#scrollTopBtn').on('click', function() {
                            $('html, body').animate({ scrollTop: 0 }, 500);
                        });
                    }
                } else {
                    $('#scrollTopBtn').remove();
                }
            });

            // ===== TOOLTIP (Bootstrap 5) =====
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            console.log('✅ All scripts initialized!');
        });
    </script>

</body>
</html>