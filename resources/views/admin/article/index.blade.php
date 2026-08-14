@extends('admin.layout')

@section('title', 'Article - ' . ucfirst($type))
@php
    // dd($article_type);
@endphp
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Article</li>
@endsection

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header justify-content-between align-items-center flex-wrap gap-2">
            <div class="row">
                <div class="col-md-6">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link {{ $type === 'service' ? 'active' : '' }}"
                                href="{{ route('admin.article-index', ['article_type' => 'service']) }}">
                                <i class="bi bi-gear me-1"></i> Service
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $type === 'blog' ? 'active' : '' }}"
                                href="{{ route('admin.article-index', ['article_type' => 'blog']) }}">
                                <i class="bi bi-journal-text me-1"></i> Blog
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('admin.article-create', ['type' => $type]) }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-lg me-1"></i> Tambah {{ ucfirst($type) }}
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="articleTable" class="table table-bordered table-hover align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 50px;">No</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th style="width: 120px;">Status</th>
                                <th style="width: 140px;">Tanggal</th>
                                <th style="width: 140px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $index => $article)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ $article->article_type }}</td>
                                    <td>
                                        <span
                                            class="badge text-bg-{{ $article->is_published === 'Published' ? 'success' : 'secondary' }}">
                                            {{ $article->is_published }}
                                        </span>
                                    </td>
                                    <td>{{ date('j F Y', strtotime($article->created)) }}</td>
                                    <td>
                                        {{-- Edit --}}
                                        <a href="{{ route('admin.article-edit', ['id' => $article->id, 'type' => $type]) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        {{-- Delete --}}
                                        <button class="btn btn-danger btn-sm btn-delete-article" data-id="{{ $article->id }}"
                                            data-type="{{ $type }}" data-title="{{ $article->title }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

@endsection

    @push('styles')
        <!-- DataTables (Bootstrap 5 styling) -->
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/datatables.net-bs5@3.0.1/css/dataTables.bootstrap5.min.css">
    @endpush

    @push('scripts')
        <!-- jQuery (dibutuhkan DataTables) -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- DataTables core + Bootstrap 5 adapter -->
        <script src="https://cdn.jsdelivr.net/npm/datatables.net@3.0.1/js/dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/datatables.net-bs5@3.0.1/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(document).ready(function () {
                console.log('Document ready!');

                // ==========================================
                // 1. DATATABLES INITIALIZATION
                // ==========================================
                $('#articleTable').DataTable({
                    language: {
                        emptyTable: 'Belum ada data.',
                        search: 'Cari:',
                        lengthMenu: 'Tampilkan _MENU_ data per halaman',
                        info: 'Menampilkan _START_ - _END_ dari _TOTAL_ data',
                        infoEmpty: 'Tidak ada data',
                        infoFiltered: '(difilter dari _MAX_ total data)',
                        zeroRecords: 'Tidak ada data yang cocok',
                        paginate: {
                            first: 'Pertama',
                            last: 'Terakhir',
                            next: '→',
                            previous: '←'
                        }
                    },
                    pageLength: 10,
                    responsive: true,
                    ordering: true,
                    columnDefs: [
                        { orderable: false, targets: -1 } // Disable ordering on action column
                    ]
                });

                // ==========================================
                // 2. DELETE ARTICLE WITH AJAX & SWEETALERT2
                // ==========================================
                $(document).on('click', '.btn-delete-article', function (e) {
                    e.preventDefault();

                    const button = $(this);
                    const articleId = button.data('id');
                    const articleType = button.data('type');
                    const articleTitle = button.data('title');

                    console.log('Delete button clicked:', {
                        id: articleId,
                        type: articleType,
                        title: articleTitle
                    });

                    // Validasi
                    if (!articleId) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Article ID not found!'
                        });
                        return;
                    }

                    // ==========================================
                    // SWEETALERT CONFIRMATION
                    // ==========================================
                    Swal.fire({
                        title: 'Yakin ingin menghapus?',
                        html: `
                                            <p>Anda akan menghapus artikel:</p>
                                            <p><strong>"${articleTitle}"</strong></p>
                                            <div class="bg-danger-soft">
                                                <i class="bi bi-exclamation-triangle"></i> 
                                                Tindakan ini tidak dapat dibatalkan!
                                            </div>
                                        `,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, Hapus!',
                        cancelButtonText: 'Batal',
                        reverseButtons: true,
                        showLoaderOnConfirm: true,
                        preConfirm: () => {
                            return new Promise((resolve) => {
                                // ==========================================
                                // AJAX REQUEST
                                // ==========================================
                                $.ajax({
                                    url: `/admin/article/delete`,
                                    type: 'GET',
                                    data: {
                                        id: articleId,
                                        type: articleType,
                                        _token: $('meta[name="csrf-token"]').attr('content')
                                    },
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    beforeSend: function () {
                                        button.prop('disabled', true)
                                            .html('<i class="bi bi-hourglass-split"></i>');
                                    },
                                    success: function (response) {
                                        console.log('Success response:', response);
                                        resolve(response);
                                    },
                                    error: function (xhr) {
                                        console.error('Error response:', xhr);

                                        let errorMessage = 'Terjadi kesalahan!';

                                        if (xhr.status === 404) {
                                            errorMessage = 'Artikel tidak ditemukan!';
                                        } else if (xhr.status === 419) {
                                            errorMessage = 'Session expired. Silakan refresh halaman.';
                                        } else if (xhr.status === 500) {
                                            errorMessage = 'Terjadi kesalahan server. Silakan coba lagi.';
                                        } else if (xhr.responseJSON?.message) {
                                            errorMessage = xhr.responseJSON.message;
                                        }

                                        resolve({
                                            success: false,
                                            message: errorMessage
                                        });
                                    },
                                    complete: function () {
                                        button.prop('disabled', false)
                                            .html('<i class="bi bi-trash"></i>');
                                    }
                                });
                            });
                        },
                        allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                        console.log('SweetAlert result:', result);

                        if (result.isConfirmed && result.value) {
                            const response = result.value;

                            if (response.success) {
                                // ==========================================
                                // SUCCESS: Hapus baris dari tabel
                                // ==========================================
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: response.message || 'Artikel berhasil dihapus.',
                                    timer: 1500,
                                    showConfirmButton: false
                                });

                                setTimeout(function () {
                                    window.location.href = response.redirect;
                                }, 1500);

                                // Animasi fade out dan hapus row
                                const row = $(`#article-row-${articleId}`);
                                row.css('transition', 'all 0.5s ease')
                                    .css('opacity', '0')
                                    .css('transform', 'translateX(-20px)');

                                setTimeout(function () {
                                    row.remove();

                                    // Cek jika tabel kosong
                                    const tableBody = $('#articleTable tbody');
                                    if (tableBody.children('tr:visible').length === 0) {
                                        tableBody.html(`
                                                            <tr>
                                                                <td colspan="6" class="text-center text-muted py-5">
                                                                    <i class="bi bi-inbox" style="font-size: 3rem; display: block; margin-bottom: 10px;"></i>
                                                                    <p>No articles found.</p>
                                                                    <a href="{{ route('admin.article-create', ['type' => $type ?? 'blog']) }}" 
                                                                       class="btn btn-primary btn-sm mt-2">
                                                                        <i class="bi bi-plus"></i> Create New Article
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        `);
                                    }
                                }, 500);

                            } else {
                                // ==========================================
                                // ERROR: Tampilkan pesan error
                                // ==========================================
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: response.message || 'Gagal menghapus artikel.',
                                    confirmButtonText: 'OK'
                                });
                            }
                        }
                    });
                });
                console.log('All scripts loaded successfully!');
            });
        </script>
    @endpush