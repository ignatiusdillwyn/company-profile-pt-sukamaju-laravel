@extends('layout')

@section('title', 'Contact Us - DummyCorp')

@section('content')
<!-- ========== HERO CONTACT ========== -->
<section class="contact-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <span class="badge bg-warning text-dark mb-3">
                    <i class="fas fa-headset me-1"></i> Get in Touch
                </span>
                <h1>Contact <span style="color: #ffd700;">Us</span></h1>
                <p class="lead">
                    Have a question, project idea, or just want to say hello? 
                    We'd love to hear from you. Fill out the form below and we'll get back to you soon.
                </p>
                <div class="d-flex gap-3 flex-wrap mt-3">
                    <div class="contact-info-item">
                        <i class="fas fa-envelope text-warning"></i>
                        <span>info@dummycorp.com</span>
                    </div>
                    <div class="contact-info-item">
                        <i class="fas fa-phone text-warning"></i>
                        <span>+62 812 3456 7890</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 text-center d-none d-lg-block">
                <img src="https://via.placeholder.com/400x300/ffffff/667eea?text=Contact+Us" 
                     alt="Contact Us" class="img-fluid" style="filter: drop-shadow(0 10px 40px rgba(0,0,0,0.2));" />
            </div>
        </div>
    </div>
</section>

<!-- ========== CONTACT SECTION ========== -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <!-- ===== FORM ===== -->
            <div class="col-lg-7">
                <div class="contact-form-wrapper">
                    <h3 class="fw-bold mb-4">
                        <i class="fas fa-paper-plane text-primary me-2"></i>
                        Send Us a Message
                    </h3>
                    <p class="text-muted mb-4">
                        Fill in the form below and we will respond within 24 hours.
                    </p>

                    <form id="contactForm">
                        <div class="row g-3">
                            <!-- Nama Lengkap -->
                            <div class="col-md-6">
                                <label for="fullname" class="form-label fw-semibold">
                                    <i class="fas fa-user text-primary me-1"></i> Full Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control form-control-lg" 
                                       id="fullname" 
                                       placeholder="John Doe"
                                       required />
                                <div class="invalid-feedback">Please enter your full name.</div>
                            </div>

                            <!-- No Telepon -->
                            <div class="col-md-6">
                                <label for="phone" class="form-label fw-semibold">
                                    <i class="fas fa-phone text-primary me-1"></i> Phone Number
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="tel" 
                                       class="form-control form-control-lg" 
                                       id="phone" 
                                       placeholder="+62 812 3456 7890"
                                       required />
                                <div class="invalid-feedback">Please enter your phone number.</div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-12">
                                <label for="email" class="form-label fw-semibold">
                                    <i class="fas fa-envelope text-primary me-1"></i> Email Address
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="email" 
                                       class="form-control form-control-lg" 
                                       id="email" 
                                       placeholder="john@example.com"
                                       required />
                                <div class="invalid-feedback">Please enter a valid email address.</div>
                            </div>

                            <!-- Alamat -->
                            <div class="col-md-12">
                                <label for="address" class="form-label fw-semibold">
                                    <i class="fas fa-map-marker-alt text-primary me-1"></i> Address
                                </label>
                                <input type="text" 
                                       class="form-control form-control-lg" 
                                       id="address" 
                                       placeholder="Jl. Sudirman No. 123, Jakarta" />
                            </div>

                            <!-- Subject -->
                            <div class="col-md-12">
                                <label for="subject" class="form-label fw-semibold">
                                    <i class="fas fa-tag text-primary me-1"></i> Subject
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-select form-control-lg" id="subject" required>
                                    <option value="">Select a subject...</option>
                                    <option value="general">General Inquiry</option>
                                    <option value="project">Project Discussion</option>
                                    <option value="support">Technical Support</option>
                                    <option value="partnership">Partnership</option>
                                    <option value="career">Career / Job Application</option>
                                    <option value="feedback">Feedback / Suggestion</option>
                                    <option value="other">Other</option>
                                </select>
                                <div class="invalid-feedback">Please select a subject.</div>
                            </div>

                            <!-- Message -->
                            <div class="col-md-12">
                                <label for="message" class="form-label fw-semibold">
                                    <i class="fas fa-comment text-primary me-1"></i> Message
                                    <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control" 
                                          id="message" 
                                          rows="5" 
                                          placeholder="Write your message here..."
                                          required></textarea>
                                <div class="invalid-feedback">Please enter your message.</div>
                                <div class="text-end">
                                    <small class="text-muted" id="charCount">0 / 500 characters</small>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-lg w-100" id="submitBtn">
                                    <i class="fas fa-paper-plane me-2"></i> Send Message
                                </button>
                                <div id="formMessage" class="mt-3"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ===== SIDEBAR INFO ===== -->
            <div class="col-lg-5">
                <!-- Contact Info Cards -->
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <h6>Our Office</h6>
                        <p class="text-muted mb-0">
                            Jl. Sudirman No. 123<br />
                            Jakarta Selatan, 12345<br />
                            Indonesia
                        </p>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div>
                        <h6>Phone Number</h6>
                        <p class="text-muted mb-0">
                            <strong>Main:</strong> +62 21 1234 5678<br />
                            <strong>Mobile:</strong> +62 812 3456 7890
                        </p>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h6>Email Address</h6>
                        <p class="text-muted mb-0">
                            <strong>Info:</strong> info@dummycorp.com<br />
                            <strong>Support:</strong> support@dummycorp.com
                        </p>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div>
                        <h6>Working Hours</h6>
                        <p class="text-muted mb-0">
                            <strong>Mon - Fri:</strong> 09:00 - 18:00<br />
                            <strong>Sat:</strong> 09:00 - 14:00<br />
                            <strong>Sun:</strong> Closed
                        </p>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="social-card">
                    <h6 class="fw-bold mb-3">
                        <i class="fas fa-share-alt text-primary me-2"></i>Follow Us
                    </h6>
                    <div class="d-flex gap-3">
                        <a href="#" class="social-icon facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon linkedin"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-icon youtube"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== MAP SECTION (DUMMY) ========== -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-4">
            <h3 class="fw-bold">Find <span style="color: #667eea;">Us</span></h3>
            <p class="text-muted">Visit our office location</p>
        </div>
        <div class="map-placeholder">
            <i class="fas fa-map-marked-alt"></i>
            <p>Google Map Location</p>
            <small class="text-muted">Jl. Sudirman No. 123, Jakarta Selatan</small>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
/* ===== HERO ===== */
.contact-hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 80px 0 70px;
}

.contact-hero h1 {
    font-size: 3.5rem;
    font-weight: 700;
}

.contact-hero .lead {
    font-size: 1.15rem;
    opacity: 0.9;
}

.contact-info-item {
    display: flex;
    align-items: center;
    gap: 10px;
    background: rgba(255, 255, 255, 0.15);
    padding: 8px 18px;
    border-radius: 30px;
    font-size: 0.9rem;
}

.contact-info-item i {
    font-size: 1.1rem;
}

/* ===== FORM WRAPPER ===== */
.contact-form-wrapper {
    background: white;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.06);
}

.contact-form-wrapper .form-control,
.contact-form-wrapper .form-select {
    border: 2px solid #e8ecf1;
    border-radius: 12px;
    padding: 12px 18px;
    transition: all 0.3s ease;
}

.contact-form-wrapper .form-control:focus,
.contact-form-wrapper .form-select:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
}

.contact-form-wrapper .form-control.is-valid,
.contact-form-wrapper .form-select.is-valid {
    border-color: #2ed573;
}

.contact-form-wrapper .form-control.is-invalid,
.contact-form-wrapper .form-select.is-invalid {
    border-color: #ff6b6b;
}

.contact-form-wrapper textarea.form-control {
    resize: vertical;
    min-height: 120px;
}

/* ===== INFO CARDS ===== */
.info-card {
    display: flex;
    align-items: flex-start;
    gap: 18px;
    background: white;
    padding: 22px 25px;
    border-radius: 16px;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.06);
    margin-bottom: 18px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.info-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 35px rgba(0, 0, 0, 0.1);
}

.info-card .info-icon {
    width: 50px;
    height: 50px;
    min-width: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
    border-radius: 12px;
    font-size: 22px;
    color: #667eea;
}

.info-card h6 {
    font-weight: 700;
    margin-bottom: 4px;
}

/* ===== SOCIAL CARD ===== */
.social-card {
    background: white;
    padding: 22px 25px;
    border-radius: 16px;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.06);
}

.social-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 45px;
    height: 45px;
    border-radius: 50%;
    color: white;
    font-size: 1.1rem;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-decoration: none;
}

.social-icon:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

.social-icon.facebook {
    background: #1877f2;
}

.social-icon.twitter {
    background: #1da1f2;
}

.social-icon.instagram {
    background: linear-gradient(135deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d);
}

.social-icon.linkedin {
    background: #0077b5;
}

.social-icon.youtube {
    background: #ff0000;
}

/* ===== MAP PLACEHOLDER ===== */
.map-placeholder {
    background: white;
    border-radius: 16px;
    padding: 60px 20px;
    text-align: center;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.06);
    border: 2px dashed #dce0e5;
}

.map-placeholder i {
    font-size: 3.5rem;
    color: #667eea;
    margin-bottom: 15px;
    display: block;
}

.map-placeholder p {
    font-weight: 600;
    font-size: 1.1rem;
    margin-bottom: 4px;
}

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {
    .contact-hero h1 {
        font-size: 2.2rem;
    }
    
    .contact-hero {
        padding: 50px 0 40px;
    }
    
    .contact-form-wrapper {
        padding: 24px 18px;
    }
    
    .contact-info-item {
        font-size: 0.8rem;
        padding: 6px 14px;
    }
    
    .info-card {
        padding: 18px 20px;
    }
}

/* ===== LOADING SPINNER ===== */
.spinner-border-sm {
    width: 1.2rem;
    height: 1.2rem;
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // ===== CHARACTER COUNTER =====
    $('#message').on('input', function() {
        var length = $(this).val().length;
        var maxLength = 500;
        $('#charCount').text(length + ' / ' + maxLength + ' characters');
        
        if (length > maxLength) {
            $(this).val($(this).val().substring(0, maxLength));
            $('#charCount').text(maxLength + ' / ' + maxLength + ' characters');
        }
        
        if (length > maxLength * 0.9) {
            $('#charCount').css('color', '#ff6b6b');
        } else {
            $('#charCount').css('color', '#6c757d');
        }
    });

    // ===== FORM VALIDATION & SUBMIT =====
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();
        
        // Reset validation
        $('.form-control, .form-select').removeClass('is-valid is-invalid');
        $('#formMessage').html('');
        
        // Get form data
        var fullname = $('#fullname').val().trim();
        var phone = $('#phone').val().trim();
        var email = $('#email').val().trim();
        var address = $('#address').val().trim();
        var subject = $('#subject').val();
        var message = $('#message').val().trim();
        
        var isValid = true;
        
        // Validate Full Name
        if (fullname === '') {
            $('#fullname').addClass('is-invalid');
            isValid = false;
        } else {
            $('#fullname').addClass('is-valid');
        }
        
        // Validate Phone
        if (phone === '') {
            $('#phone').addClass('is-invalid');
            isValid = false;
        } else {
            $('#phone').addClass('is-valid');
        }
        
        // Validate Email
        if (email === '' || !isValidEmail(email)) {
            $('#email').addClass('is-invalid');
            isValid = false;
        } else {
            $('#email').addClass('is-valid');
        }
        
        // Validate Subject
        if (subject === '') {
            $('#subject').addClass('is-invalid');
            isValid = false;
        } else {
            $('#subject').addClass('is-valid');
        }
        
        // Validate Message
        if (message === '') {
            $('#message').addClass('is-invalid');
            isValid = false;
        } else {
            $('#message').addClass('is-valid');
        }
        
        if (!isValid) {
            $('#formMessage').html(
                '<div class="alert alert-danger">' +
                    '<i class="fas fa-exclamation-circle me-2"></i> ' +
                    'Please fill in all required fields correctly.' +
                '</div>'
            );
            return;
        }
        
        // ===== DUMMY DATA YANG DIKIRIM =====
        var formData = {
            fullname: fullname,
            phone: phone,
            email: email,
            address: address || '-',
            subject: subject,
            message: message,
            submitted_at: new Date().toLocaleString('id-ID')
        };
        
        console.log('📨 Form Data Submitted:');
        console.log('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        console.log('👤 Nama Lengkap : ' + formData.fullname);
        console.log('📞 No Telepon   : ' + formData.phone);
        console.log('📧 Email       : ' + formData.email);
        console.log('📍 Alamat      : ' + formData.address);
        console.log('📌 Subject     : ' + formData.subject);
        console.log('💬 Message     : ' + formData.message);
        console.log('🕐 Waktu       : ' + formData.submitted_at);
        console.log('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        
        // ===== SHOW LOADING =====
        var btn = $('#submitBtn');
        var originalText = btn.html();
        btn.html('<span class="spinner-border spinner-border-sm me-2"></span> Sending...');
        btn.prop('disabled', true);
        
        // ===== SIMULASI SEND =====
        setTimeout(function() {
            // Reset button
            btn.html(originalText);
            btn.prop('disabled', false);
            
            // Show success message
            $('#formMessage').html(
                '<div class="alert alert-success">' +
                    '<i class="fas fa-check-circle me-2"></i> ' +
                    '<strong>Message sent successfully!</strong> ' +
                    'Thank you, ' + formData.fullname + '. We will get back to you soon.' +
                '</div>'
            );
            
            // Reset form after 3 seconds
            setTimeout(function() {
                $('#contactForm')[0].reset();
                $('.form-control, .form-select').removeClass('is-valid is-invalid');
                $('#charCount').text('0 / 500 characters');
                $('#charCount').css('color', '#6c757d');
            }, 3000);
            
        }, 1500);
    });

    // ===== VALIDASI EMAIL =====
    function isValidEmail(email) {
        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    // ===== REAL-TIME VALIDATION =====
    $('.form-control, .form-select').on('blur', function() {
        if ($(this).val().trim() !== '') {
            $(this).removeClass('is-invalid').addClass('is-valid');
        }
    });

    // ===== PHONE FORMATING =====
    $('#phone').on('input', function() {
        var value = $(this).val().replace(/\D/g, '');
        if (value.length > 0) {
            var formatted = '';
            if (value.length <= 3) {
                formatted = value;
            } else if (value.length <= 6) {
                formatted = value.slice(0, 3) + '-' + value.slice(3);
            } else {
                formatted = value.slice(0, 3) + '-' + value.slice(3, 6) + '-' + value.slice(6, 10);
            }
            $(this).val(formatted);
        }
    });

    console.log('✅ Contact page loaded successfully!');
});
</script>
@endpush