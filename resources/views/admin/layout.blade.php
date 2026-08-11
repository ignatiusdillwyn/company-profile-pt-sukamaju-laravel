@php

$session = session('admin_user');

@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- OverlayScrollbars -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.16.0/styles/overlayscrollbars.min.css">
    <!-- AdminLTE 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4.1.0/dist/css/adminlte.min.css">

    @stack('styles')
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">

        <!-- Navbar atas -->
        <nav class="app-header navbar navbar-expand bg-body">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle fs-5"></i>
                            <span class="d-none d-md-inline ms-1">{{ session('admin_user.fullname', 'Admin') }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li class="user-header text-bg-primary">
                                <i class="bi bi-person-circle" style="font-size: 3rem;"></i>
                                <p>
                                    {{ session('admin_user.fullname', 'Admin') }}
                                    <small>{{ session('admin_user.email') }}</small>
                                </p>
                            </li>
                            <li class="user-footer">
                                <form action="{{ route('admin.logout') }}" method="POST" class="d-grid">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Sidebar kiri -->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <div class="sidebar-brand">
                <a href="{{ route('admin.dashboard') }}" class="brand-link">
                    <span class="brand-text fw-light">Admin Panel</span>
                </a>
            </div>

            <div class="sidebar-wrapper">
                <nav class="mt-2" aria-label="Main navigation">
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" data-accordion="false" role="menu">

                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-speedometer"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-file-earmark-text"></i>
                                <p>
                                    Article
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.article-index', ['article_type' => 'service']) }}" class="nav-link {{ request()->routeIs('admin.article*') && request('article_type', 'service') === 'service' ? 'active' : '' }}">
                                        <i class="nav-icon bi bi-1-square"></i>
                                        <p>List Service</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.article-index', ['article_type' => 'blog']) }}" class="nav-link {{ request()->routeIs('admin.article*') && request('article_type') === 'blog' ? 'active' : '' }}">
                                        <i class="nav-icon bi bi-journal-text"></i>
                                        <p>List Blog</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        @if ($session['role'] === 'admin')
                        <li class="nav-item">
                            <a href="{{ route('admin.contact-list') }}" class="nav-link {{ request()->routeIs('admin.contact-list*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-envelope"></i>
                                <p>Contacts</p>
                            </a>
                        </li>

                        <li class="nav-item d-none">
                            <a href="{{ route('admin.user-index-cms') }}" class="nav-link {{ request()->routeIs('admin.user-index-cms*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-people"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        @endif

                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Konten -->
        <main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">@yield('title', 'Dashboard')</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                @yield('breadcrumb')
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </main>

        <footer class="app-footer">
            <strong>Copyright &copy; {{ date('Y') }}.</strong> All rights reserved.
        </footer>

    </div>

    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- OverlayScrollbars -->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.16.0/browser/overlayscrollbars.browser.es5.min.js"></script>
    <!-- AdminLTE 4 -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@4.1.0/dist/js/adminlte.min.js"></script>

    @stack('scripts')
</body>
</html>
