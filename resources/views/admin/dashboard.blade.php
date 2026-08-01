@extends('admin.layout')

@section('title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
@endsection

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-primary">
                <div class="inner">
                    <h3>0</h3>
                    <p>Total Service</p>
                </div>
                <i class="bi bi-gear small-box-icon"></i>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-success">
                <div class="inner">
                    <h3>0</h3>
                    <p>Total Blog</p>
                </div>
                <i class="bi bi-journal-text small-box-icon"></i>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-warning">
                <div class="inner">
                    <h3>0</h3>
                    <p>Total Article</p>
                </div>
                <i class="bi bi-file-earmark-text small-box-icon"></i>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-danger">
                <div class="inner">
                    <h3>0</h3>
                    <p>Pesan Masuk</p>
                </div>
                <i class="bi bi-envelope small-box-icon"></i>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Selamat Datang</h3>
        </div>
        <div class="card-body">
            <p class="mb-0">
                Selamat datang, <b>{{ $user->name }}</b> ({{ $user->email }})! Anda berhasil melewati middleware 'admin'.
            </p>
        </div>
    </div>

@endsection
