<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- OverlayScrollbars -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.16.0/styles/overlayscrollbars.min.css">
    <!-- AdminLTE 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4.1.0/dist/css/adminlte.min.css">
</head>

<body class="login-page bg-body-secondary">
    <main class="login-box">
        <h1 class="login-logo">
            <a href="{{ route('admin.login') }}"><b>Admin</b>LTE</a>
        </h1>

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in untuk memulai sesi Anda</p>

                @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('admin.login.handle') }}" method="POST">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                        <div class="input-group-text">
                            <span class="bi bi-envelope"></span>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        <div class="input-group-text" id="togglePassword" style="cursor: pointer;">
                            <span class="bi bi-eye" id="eyeIcon"></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4 offset-8">
                            <button type="submit" class="btn btn-primary d-grid w-100">Sign In</button>
                        </div>
                    </div>
                </form>

                <p class="text-center text-muted small mt-3 mb-0">
                    Demo akun: <code>andi@gmail.com</code> / <code>andi12345</code>
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

    <!-- Script untuk toggle password -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            togglePassword.addEventListener('click', function() {
                // Toggle input type
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Toggle icon
                eyeIcon.classList.toggle('bi-eye');
                eyeIcon.classList.toggle('bi-eye-slash');
            });
        });
    </script>
</body>

</html>