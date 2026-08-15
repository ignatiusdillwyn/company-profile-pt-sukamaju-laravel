@extends('layout')

@section('title', 'Contact Us - DummyCorp')

@section('content')
<style>
    /* ============================================
       CONTACT PAGE STYLES
    ============================================ */
    .contact-page {
        max-width: 800px;
        margin: 0 auto;
        padding: 40px 20px;
    }

    /* Hero Section */
    .contact-hero {
        text-align: center;
        padding: 60px 20px 40px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 12px;
        color: white;
        margin-bottom: 40px;
    }

    .contact-hero h1 {
        font-size: 2.8rem;
        font-weight: 700;
        margin: 0 0 12px 0;
    }

    .contact-hero h1 span {
        color: #ffd700;
    }

    .contact-hero .lead {
        font-size: 1.1rem;
        opacity: 0.9;
        max-width: 500px;
        margin: 0 auto 20px;
        line-height: 1.7;
    }

    .contact-hero .badge {
        display: inline-block;
        background: rgba(255, 255, 255, 0.15);
        padding: 6px 20px;
        border-radius: 50px;
        font-size: 0.85rem;
        margin-bottom: 16px;
    }

    .contact-hero .badge i {
        margin-right: 8px;
    }

    .contact-info-items {
        display: flex;
        justify-content: center;
        gap: 16px;
        flex-wrap: wrap;
    }

    .contact-info-item {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: rgba(255, 255, 255, 0.15);
        padding: 8px 18px;
        border-radius: 50px;
        font-size: 0.9rem;
    }

    .contact-info-item i {
        color: #ffd700;
    }

    /* Form Wrapper */
    .form-wrapper {
        background: white;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 5px 30px rgba(0, 0, 0, 0.08);
        border: 1px solid #e8ecf1;
    }

    .form-wrapper h3 {
        font-size: 1.5rem;
        font-weight: 700;
        margin: 0 0 8px 0;
        color: #1a1a2e;
    }

    .form-wrapper h3 i {
        color: #667eea;
        margin-right: 10px;
    }

    .form-wrapper .subtitle {
        color: #6c757d;
        margin-bottom: 24px;
        font-size: 0.95rem;
    }

    /* Alert Messages */
    .alert {
        padding: 14px 18px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 0.95rem;
    }

    .alert-danger {
        background: #fff5f5;
        color: #c62828;
        border-left: 4px solid #ef5350;
    }

    .alert-danger ul {
        margin: 8px 0 0 0;
        padding-left: 20px;
    }

    .alert-success {
        background: #f0fff4;
        color: #2e7d32;
        border-left: 4px solid #66bb6a;
    }

    .alert i {
        margin-right: 8px;
    }

    /* Form Group */
    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        margin-bottom: 6px;
        color: #1a1a2e;
    }

    .form-group label .text-danger {
        color: #dc3545;
    }

    .form-group label i {
        color: #667eea;
        margin-right: 6px;
    }

    .form-control {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid #e8ecf1;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-sizing: border-box;
        font-family: inherit;
    }

    .form-control:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    }

    .form-control.is-invalid {
        border-color: #dc3545;
    }

    .form-control.is-invalid:focus {
        box-shadow: 0 0 0 4px rgba(220, 53, 69, 0.1);
    }

    .form-control.is-valid {
        border-color: #28a745;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 120px;
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 0.85rem;
        margin-top: 4px;
        display: block;
    }

    /* Submit Button */
    .btn-submit {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        border-radius: 50px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: inherit;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    }

    .btn-submit i {
        margin-right: 8px;
    }

    /* ============================================
       RESPONSIVE
    ============================================ */
    @media (max-width: 768px) {
        .contact-hero {
            padding: 40px 16px 30px;
        }

        .contact-hero h1 {
            font-size: 2rem;
        }

        .contact-hero .lead {
            font-size: 1rem;
        }

        .form-wrapper {
            padding: 24px 16px;
        }

        .contact-info-items {
            flex-direction: column;
            align-items: center;
        }

        .contact-info-item {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .contact-hero h1 {
            font-size: 1.7rem;
        }

        .form-wrapper {
            padding: 16px 12px;
        }

        .form-control {
            padding: 10px 14px;
            font-size: 0.95rem;
        }

        .btn-submit {
            padding: 12px;
            font-size: 1rem;
        }
    }
</style>

<!-- ========== CONTACT PAGE ========== -->
<div class="contact-page">
    <!-- HERO -->
    <div class="contact-hero">
        <div class="badge">
            <i class="fas fa-headset"></i> Get in Touch
        </div>
        <h1>Contact <span>Us</span></h1>
        <p class="lead">
            Have a question or project idea? We'd love to hear from you.
            Fill out the form below and we'll get back to you soon.
        </p>
        <div class="contact-info-items">
            <div class="contact-info-item">
                <i class="fas fa-envelope"></i>
                <span>info@dummycorp.com</span>
            </div>
            <div class="contact-info-item">
                <i class="fas fa-phone"></i>
                <span>+62 812 3456 7890</span>
            </div>
        </div>
    </div>

    <!-- FORM -->
    <div class="form-wrapper">
        <h3>
            <i class="fas fa-paper-plane"></i>
            Send Us a Message
        </h3>
        <p class="subtitle">Fill in the form below and we will respond within 24 hours.</p>

        <!-- Display Validation Errors
        @if ($errors->any())
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                <strong>Please fix the following errors:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif -->

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.save') }}" id="form" method="POST">
            @csrf

            <!-- Full Name -->
            <div class="form-group">
                <label for="full_name">
                    <i class="fas fa-user"></i> Full Name
                    <span class="text-danger">*</span>
                </label>
                <input type="text"
                    class="form-control @error('full_name') is-invalid @enderror"
                    id="full_name"
                    name="full_name"
                    value="{{ old('full_name') }}"
                    placeholder="John Doe" />
                @error('full_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">
                    <i class="fas fa-envelope"></i> Email Address
                    <span class="text-danger">*</span>
                </label>
                <input type="text"
                    class="form-control @error('email') is-invalid @enderror"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="john@example.com" />
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Phone -->
            <div class="form-group">
                <label for="phone">
                    <i class="fas fa-phone"></i> Phone Number
                    <span class="text-danger">*</span>
                </label>
                <input type="tel"
                    class="form-control @error('phone') is-invalid @enderror"
                    id="phone"
                    name="phone"
                    value="{{ old('phone') }}"
                    placeholder="081234567890" />
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Notes -->
            <div class="form-group">
                <label for="notes">
                    <i class="fas fa-comment"></i> Message
                    <span class="text-danger">*</span>
                </label>
                <textarea class="form-control @error('notes') is-invalid @enderror"
                    id="notes"
                    name="notes"
                    rows="5"
                    placeholder="Write your message here...">{{ old('notes') }}</textarea>
                @error('notes')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" id="saveButton" class="btn-submit">
                <i class="fas fa-paper-plane"></i> Send Message
            </button>
        </form>
    </div>
</div>
@endsection

<!-- ========== JQUERY ========== -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- <script>
    $(document).ready(function() {
        
        $('#form').on('submit', function(e) {

            let form = $(this);
            let url = form.attr('action');
            let button = $('#saveButton');

            $.ajax({
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                data: form.serialize(),
                beforeSend: function() {
                    button.prop('disabled', true).text('Sending...');
                },
                success: function(response) {
                    // Show success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message ?? 'Your message has been sent successfully.',
                        confirmButtonText: 'OK',
                    });
                    // Reset the form
                    form[0].reset();
                },
                error: function(xhr) {
                  // Show error messages
                  if (xhr.status === 422) {
                      var errors = xhr.responseJSON.errors;
                      var errorMessages = '';
                      $.each(errors, function(key, value) {
                          errorMessages += value[0] + '\n';
                      });

                      Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: errorMessages,
                        confirmButtonText: 'OK'
                    });
                  } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: 'An unexpected error occurred. Please try again later.',
                        confirmButtonText: 'OK'
                    });
                  }
                },
                complete: function() {
                
                  // Re-enable the submit button
                  $('#saveButton').prop('disabled', false).text('Send Message');
                }
            });
            
            return false;
        });
    });
</script> --}}