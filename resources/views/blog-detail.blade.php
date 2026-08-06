@extends('layout')

@section('title', $data['title'] . ' - DummyCorp')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/blog') }}">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $data['title'] }}</li>
                </ol>
            </nav>

            <!-- Blog Card -->
            <div class="card border-0 shadow-sm">
                <!-- Blog Image -->
                @if(isset($data['image']))
                <img src="{{ $data['image'] }}" 
                     class="card-img-top" 
                     alt="{{ $data['title'] }}"
                     style="height: 400px; object-fit: cover;">
                @endif

                <div class="card-body p-4 p-lg-5">
                    <!-- Blog Title -->
                    <h1 class="card-title mb-3">{{ $data['title'] }}</h1>

                    <!-- Meta Info -->
                    <div class="d-flex align-items-center text-muted mb-4">
                        <i class="bi bi-calendar3 me-2"></i>
                        <span>{{ \Carbon\Carbon::parse($data['created'])->format('d F Y') }}</span>
                        <span class="mx-2">|</span>
                        <i class="bi bi-clock me-2"></i>
                        <span>{{ \Carbon\Carbon::parse($data['created'])->format('H:i') }}</span>
                    </div>

                    <!-- Blog Content -->
                    <div class="blog-content">
                        <p class="lead">{{ $data['content'] }}</p>
                        
                        <!-- Placeholder for full content -->
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        
                        <h3 class="mt-4">Langkah-langkah Memulai Usaha</h3>
                        <ul>
                            <li>Menentukan ide bisnis yang tepat</li>
                            <li>Melakukan riset pasar</li>
                            <li>Membuat perencanaan bisnis</li>
                            <li>Mengelola keuangan dengan baik</li>
                            <li>Memulai pemasaran dan promosi</li>
                        </ul>
                    </div>

                    <!-- Share & Navigation -->
                    <hr class="my-4">
                    
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <span class="text-muted me-2">Bagikan:</span>
                            <a href="#" class="btn btn-outline-primary btn-sm me-1">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="#" class="btn btn-outline-info btn-sm me-1">
                                <i class="bi bi-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-outline-danger btn-sm me-1">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="#" class="btn btn-outline-success btn-sm">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <a href="{{ url('/blog') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-1"></i> Kembali ke Blog
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Posts (Optional) -->
            <div class="mt-5">
                <h4 class="mb-4">Artikel Lainnya</h4>
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="card-title">Cara Mengelola Keuangan</h6>
                                <p class="card-text small text-muted">Tips mengatur keuangan untuk pemula</p>
                                <a href="#" class="btn btn-sm btn-outline-primary">Baca</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="card-title">Strategi Pemasaran</h6>
                                <p class="card-text small text-muted">Cara efektif memasarkan produk</p>
                                <a href="#" class="btn btn-sm btn-outline-primary">Baca</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="card-title">Tips Sukses Bisnis</h6>
                                <p class="card-text small text-muted">Kunci sukses dalam berbisnis</p>
                                <a href="#" class="btn btn-sm btn-outline-primary">Baca</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection