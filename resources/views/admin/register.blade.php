@extends('admin.layout')

@section('title', 'Admin Register - DummyCorp')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                <!-- Header -->
                <div class="card-header bg-gradient-primary text-white py-4">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle bg-white bg-opacity-20 p-3 me-3">
                            <i class="fas fa-user-plus fa-2x text-white"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-0">Admin Register</h3>
                            <p class="mb-0 opacity-75">Create a new admin account</p>
                        </div>
                    </div>
                </div>

                <!-- Body -->
                <div class="card-body p-5">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <strong>Please fix the following errors:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('admin.register.handle') }}" method="POST" id="registerForm">
                        @csrf

                        <!-- Name -->
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold">
                                <i class="fas fa-user text-primary me-2"></i>Full Name
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   placeholder="Enter your full name"
                                   value="{{ old('name') }}"
                                   required />
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>
                                Enter your full name as it appears on official documents.
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold">
                                <i class="fas fa-envelope text-primary me-2"></i>Email Address
                                <span class="text-danger">*</span>
                            </label>
                            <input type="email" 
                                   class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   placeholder="Enter your email address"
                                   value="{{ old('email') }}"
                                   required />
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>
                                We'll send a verification link to this email.
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold">
                                <i class="fas fa-lock text-primary me-2"></i>Password
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <input type="password" 
                                       class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                       id="password" 
                                       name="password" 
                                       placeholder="Enter your password"
                                       required />
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>
                                Password must be at least 8 characters with letters and numbers.
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-semibold">
                                <i class="fas fa-check-circle text-primary me-2"></i>Confirm Password
                                <span class="text-danger">*</span>
                            </label>
                            <input type="password" 
                                   class="form-control form-control-lg" 
                                   id="password_confirmation" 
                                   name="password_confirmation" 
                                   placeholder="Confirm your password"
                                   required />
                            <div id="passwordMatch" class="mt-1 small"></div>
                        </div>

                        <!-- Role -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                <i class="fas fa-user-tag text-primary me-2"></i>Role
                                <span class="text-danger">*</span>
                            </label>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-check role-card @error('role') is-invalid @enderror">
                                        <input class="form-check-input" 
                                               type="radio" 
                                               name="role" 
                                               id="roleAdmin" 
                                               value="admin"
                                               {{ old('role') == 'admin' ? 'checked' : '' }} />
                                        <label class="form-check-label w-100" for="roleAdmin">
                                            <div class="role-card-content">
                                                <div class="role-icon bg-gradient-admin">
                                                    <i class="fas fa-crown"></i>
                                                </div>
                                                <div>
                                                    <h6 class="fw-bold mb-0">Administrator</h6>
                                                    <small class="text-muted">Full access to all features</small>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check role-card @error('role') is-invalid @enderror">
                                        <input class="form-check-input" 
                                               type="radio" 
                                               name="role" 
                                               id="roleAuthor" 
                                               value="author"
                                               {{ old('role') == 'author' ? 'checked' : '' }} />
                                        <label class="form-check-label w-100" for="roleAuthor">
                                            <div class="role-card-content">
                                                <div class="role-icon bg-gradient-author">
                                                    <i class="fas fa-pen-fancy"></i>
                                                </div>
                                                <div>
                                                    <h6 class="fw-bold mb-0">Author</h6>
                                                    <small class="text-muted">Write and manage content</small>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            @error('role')
                                <div class="text-danger small mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Terms -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms" name="terms" required />
                                <label class="form-check-label" for="terms">
                                    I agree to the 
                                    <a href="#" class="text-primary">Terms of Service</a> 
                                    and 
                                    <a href="#" class="text-primary">Privacy Policy</a>
                                    <span class="text-danger">*</span>
                                </label>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg" id="submitBtn">
                                <i class="fas fa-user-plus me-2"></i> Register Admin
                            </button>
                        </div>

                        <!-- Login Link -->
                        <div class="text-center mt-4">
                            <p class="text-muted">
                                Already have an account? 
                                <a href="{{ route('admin.login') }}" class="text-primary fw-semibold text-decoration-none">
                                    Login here
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Info Card -->
            <div class="card mt-4 border-0 bg-light">
                <div class="card-body">
                    <div class="row text-center g-3">
                        <div class="col-md-4">
                            <i class="fas fa-shield-alt fa-2x text-primary mb-2"></i>
                            <h6 class="fw-bold mb-0">Secure Registration</h6>
                            <small class="text-muted">Your data is encrypted and secure</small>
                        </div>
                        <div class="col-md-4">
                            <i class="fas fa-user-check fa-2x text-primary mb-2"></i>
                            <h6 class="fw-bold mb-0">Role Management</h6>
                            <small class="text-muted">Choose admin or author role</small>
                        </div>
                        <div class="col-md-4">
                            <i class="fas fa-headset fa-2x text-primary mb-2"></i>
                            <h6 class="fw-bold mb-0">24/7 Support</h6>
                            <small class="text-muted">We're here to help you</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
/* ===== GRADIENT ===== */
.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.bg-opacity-20 {
    background: rgba(255, 255, 255, 0.2);
}

/* ===== FORM ===== */
.form-control-lg {
    border-radius: 12px;
    padding: 14px 18px;
    border: 2px solid #e8ecf1;
    transition: all 0.3s ease;
}

.form-control-lg:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
}

.form-control-lg.is-invalid:focus {
    border-color: #ff6b6b;
    box-shadow: 0 0 0 4px rgba(255, 107, 107, 0.1);
}

/* ===== ROLE CARDS ===== */
.role-card {
    position: relative;
    padding: 0;
    margin: 0;
}

.role-card .form-check-input {
    position: absolute;
    top: 12px;
    right: 12px;
    z-index: 2;
    width: 20px;
    height: 20px;
    border: 2px solid #dce0e5;
    cursor: pointer;
}

.role-card .form-check-input:checked {
    border-color: #667eea;
    background-color: #667eea;
}

.role-card .form-check-label {
    display: block;
    padding: 16px 20px;
    border: 2px solid #e8ecf1;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.3s ease;
    margin: 0;
}

.role-card .form-check-label:hover {
    border-color: #667eea;
    background: rgba(102, 126, 234, 0.03);
}

.role-card .form-check-input:checked + .form-check-label {
    border-color: #667eea;
    background: rgba(102, 126, 234, 0.06);
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.08);
}

.role-card .role-card-content {
    display: flex;
    align-items: center;
    gap: 14px;
}

.role-card .role-icon {
    width: 48px;
    height: 48px;
    min-width: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.3rem;
}

.bg-gradient-admin {
    background: linear-gradient(135deg, #ff6b6b, #ee5a24);
}

.bg-gradient-author {
    background: linear-gradient(135deg, #667eea, #764ba2);
}

/* ===== BUTTON ===== */
.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    border-radius: 12px;
    padding: 14px 0;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
}

.btn-primary:active {
    transform: translateY(0);
}

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {
    .role-card .role-card-content {
        flex-direction: column;
        text-align: center;
    }
    
    .role-card .form-check-input {
        top: 8px;
        right: 8px;
    }
    
    .card-body {
        padding: 24px !important;
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

.card {
    animation: fadeInUp 0.6s ease;
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // ===== TOGGLE PASSWORD =====
    $('#togglePassword').on('click', function() {
        var passwordInput = $('#password');
        var icon = $(this).find('i');
        
        if (passwordInput.attr('type') === 'password') {
            passwordInput.attr('type', 'text');
            icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            passwordInput.attr('type', 'password');
            icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });

    // ===== PASSWORD MATCH VALIDATION =====
    $('#password_confirmation').on('keyup', function() {
        var password = $('#password').val();
        var confirm = $(this).val();
        var matchMsg = $('#passwordMatch');
        
        if (confirm.length === 0) {
            matchMsg.html('');
            return;
        }
        
        if (password === confirm) {
            matchMsg.html('<span class="text-success"><i class="fas fa-check-circle me-1"></i> Passwords match!</span>');
            $(this).removeClass('is-invalid').addClass('is-valid');
        } else {
            matchMsg.html('<span class="text-danger"><i class="fas fa-exclamation-circle me-1"></i> Passwords do not match!</span>');
            $(this).removeClass('is-valid').addClass('is-invalid');
        }
    });

    // ===== PASSWORD STRENGTH =====
    $('#password').on('keyup', function() {
        var password = $(this).val();
        var strength = checkPasswordStrength(password);
        
        // Hapus existing strength indicator
        $(this).parent().find('.password-strength').remove();
        
        if (password.length > 0) {
            var html = '<div class="password-strength mt-2">';
            html += '<div class="progress" style="height: 4px;">';
            html += '<div class="progress-bar" role="progressbar" style="width: ' + strength.percentage + '%; background: ' + strength.color + ';"></div>';
            html += '</div>';
            html += '<small class="text-muted">' + strength.label + '</small>';
            html += '</div>';
            $(this).parent().append(html);
        }
    });

    function checkPasswordStrength(password) {
        var strength = {
            percentage: 0,
            label: 'Weak',
            color: '#ff6b6b'
        };
        
        if (password.length >= 8) {
            strength.percentage += 25;
        }
        if (password.match(/[a-z]/)) {
            strength.percentage += 25;
        }
        if (password.match(/[A-Z]/)) {
            strength.percentage += 25;
        }
        if (password.match(/[0-9]/)) {
            strength.percentage += 15;
        }
        if (password.match(/[^a-zA-Z0-9]/)) {
            strength.percentage += 10;
        }
        
        if (strength.percentage <= 25) {
            strength.label = 'Weak';
            strength.color = '#ff6b6b';
        } else if (strength.percentage <= 50) {
            strength.label = 'Fair';
            strength.color = '#ffa502';
        } else if (strength.percentage <= 75) {
            strength.label = 'Good';
            strength.color = '#2ed573';
        } else {
            strength.label = 'Strong';
            strength.color = '#2ed573';
        }
        
        return strength;
    }

    // ===== FORM SUBMIT =====
    $('#registerForm').on('submit', function(e) {
        var btn = $('#submitBtn');
        var originalText = btn.html();
        
        btn.html('<span class="spinner-border spinner-border-sm me-2"></span> Registering...');
        btn.prop('disabled', true);
        
        // Simulate delay (will be replaced by actual form submission)
        setTimeout(function() {
            btn.html(originalText);
            btn.prop('disabled', false);
        }, 2000);
    });

    // ===== REAL-TIME VALIDATION =====
    $('.form-control').on('blur', function() {
        if ($(this).val().trim() !== '') {
            $(this).removeClass('is-invalid').addClass('is-valid');
        }
    });

    console.log('✅ Admin Register page loaded!');
});
</script>
@endpush