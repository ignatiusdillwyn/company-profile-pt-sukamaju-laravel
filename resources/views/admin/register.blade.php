<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register</title>

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- OverlayScrollbars -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.16.0/styles/overlayscrollbars.min.css">
    <!-- AdminLTE 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4.1.0/dist/css/adminlte.min.css">
</head>

<body class="register-page bg-body-secondary">
    <main class="register-box">
        <h1 class="register-logo">
            <a href="{{ route('admin.login') }}"><b>Admin</b>LTE</a>
        </h1>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="register-box-msg">Register a new membership</p>

                @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <!-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif -->

                <form action="{{ route('admin.register.handle') }}" method="POST">
                    @csrf

                    <label class="visually-hidden" for="registerName">Full Name</label>
                    <div class="input-group mb-3">
                        <input id="registerName" type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name">
                        <div class="input-group-text">
                            <span class="bi bi-person"></span>
                        </div>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <label class="visually-hidden" for="registerEmail">Email</label>
                    <div class="input-group mb-3">
                        <input id="registerEmail" type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                        <div class="input-group-text">
                            <span class="bi bi-envelope"></span>
                        </div>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password dengan Show/Hide -->
                    <label class="visually-hidden" for="registerPassword">Password</label>
                    <div class="input-group mb-3">
                        <input id="registerPassword" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        <button class="input-group-text password-toggle" type="button" data-target="registerPassword" style="cursor: pointer;">
                            <span class="bi bi-eye-slash" id="registerPasswordIcon"></span>
                        </button>
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm Password dengan Show/Hide -->
                    <label class="visually-hidden" for="registerConfirmPassword">Confirm Password</label>
                    <div class="input-group mb-3">
                        <input id="registerConfirmPassword" type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                        <button class="input-group-text password-toggle" type="button" data-target="registerConfirmPassword" style="cursor: pointer;">
                            <span class="bi bi-eye-slash" id="registerConfirmPasswordIcon"></span>
                        </button>
                    </div>

                    <!-- Role Selection -->
                    <label class="visually-hidden" for="registerRole">Role</label>
                    <div class="input-group mb-3">
                        <select id="registerRole" name="role" class="form-control @error('role') is-invalid @enderror">
                            <option value="">Select Role</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="author" {{ old('role') == 'author' ? 'selected' : '' }}>Author</option>
                        </select>
                        <div class="input-group-text">
                            <span class="bi bi-person-badge"></span>
                        </div>
                        @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary right">Register</button>
                            </div>
                        </div>
                    </div>
                </form>

                <p class="mb-0 mt-3">
                    <a href="{{ route('admin.login') }}" class="text-center">I already have a account</a>
                </p>
            </div>
        </div>
    </main>

    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- OverlayScrollbars -->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.16.0/browser/overlayscrollbars.browser.es5.min.js"></script>
    <!-- AdminLTE 4 -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@4.1.0/dist/js/adminlte.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle password visibility
            const toggleButtons = document.querySelectorAll('.password-toggle');

            toggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.dataset.target;
                    const input = document.getElementById(targetId);
                    const icon = this.querySelector('span');

                    if (input.type === 'password') {
                        input.type = 'text';
                        icon.classList.remove('bi-eye-slash');
                        icon.classList.add('bi-eye');
                    } else {
                        input.type = 'password';
                        icon.classList.remove('bi-eye');
                        icon.classList.add('bi-eye-slash');
                    }
                });
            });
        });
    </script>
</body>

</html>