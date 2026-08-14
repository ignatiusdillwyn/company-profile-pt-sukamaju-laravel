@extends('admin.layout')

@section('title', 'Contact List')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Contacts</li>
@endsection

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i class="bi bi-envelope me-1"></i> Contact
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="contactTable" class="table table-bordered table-hover align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th style="width: 120px;">Status</th>
                            <th style="width: 140px;">Date</th>
                            <th style="width: 140px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $index => $value)
                            <tr id="contact-row-{{ $value->id }}">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->fullname }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->phone }}</td>
                                <td>
                                    <span class="badge text-bg-{{ $value->is_read ? 'success' : 'secondary' }}">
                                        {{ $value->is_read ? 'Sudah Dibaca' : 'Belum Dibaca' }}
                                    </span>
                                </td>
                                <td>{{ date('j F Y', strtotime($value->created)) }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm text-white" data-bs-toggle="modal"
                                        data-bs-target="#contactModal{{ $value->id }}">
                                        <i class="bi bi-eye"></i>
                                    </button>

                                    <!-- Delete Button -->
                                    <button class="btn btn-danger btn-sm btn-delete-contact" data-id="{{ $value->id }}"
                                        data-name="{{ $value->fullname }}" data-email="{{ $value->email }}">
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

    {{-- Modal detail per contact --}}
    @foreach ($contacts as $value)
        <div class="modal fade" id="contactModal{{ $value->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Pesan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-borderless table-sm mb-3">
                            <tr>
                                <th style="width: 110px;">Nama</th>
                                <td>: {{ $value->fullname }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>: {{ $value->email }}</td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td>: {{ $value->phone }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td>: {{ date('j F Y, H:i', strtotime($value->created)) }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>:
                                    <span class="badge text-bg-{{ $value->is_read ? 'success' : 'secondary' }}">
                                        {{ $value->is_read ? 'Sudah Dibaca' : 'Belum Dibaca' }}
                                    </span>
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <p class="mb-0">{{ $value->notes }}</p>
                    </div>
                    <div class="modal-footer">
                        @if (!$value->is_read)
                            <form action="{{ route('admin.contact-read', $value->id) }}" method="POST" class="m-0">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="bi bi-check2-circle me-1"></i> Sudah Dibaca
                                </button>
                            </form>
                        @else
                            <span class="badge text-bg-success me-auto">
                                <i class="bi bi-check2-circle me-1"></i> Sudah Dibaca
                            </span>
                        @endif
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection

@push('styles')
    <!-- DataTables (Bootstrap 5 styling) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/datatables.net-bs5@3.0.1/css/dataTables.bootstrap5.min.css">

    <style>
        /* ============================================
                    CUSTOM STYLES
                    ============================================ */
        .btn-delete-contact {
            transition: all 0.3s ease;
        }

        .btn-delete-contact:hover {
            transform: scale(1.1);
        }

        .btn-delete-contact:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: scale(0.95);
        }

        /* Table row hover effect */
        .table tbody tr {
            transition: all 0.2s ease;
        }

        .table tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.05);
        }

        /* Custom SweetAlert styling */
        .swal2-html-container {
            font-size: 1rem !important;
        }

        .swal2-html-container .bg-danger-soft {
            background-color: #f8d7da !important;
            border: 1px solid #f5c6cb;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }

        /* DataTables custom */
        .dataTables_wrapper .dataTables_filter input {
            border-radius: 4px;
            padding: 0.375rem 0.75rem;
            border: 1px solid #ced4da;
        }

        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .dataTables_wrapper .dataTables_length select {
            border-radius: 4px;
            padding: 0.375rem 0.75rem;
            border: 1px solid #ced4da;
        }

        /* Status badges */
        .badge {
            font-size: 0.85rem;
            padding: 0.4rem 0.8rem;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .btn-sm {
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
            }

            .dataTables_wrapper .dataTables_filter input {
                width: 150px;
            }
        }

        @media (max-width: 576px) {
            .dataTables_wrapper .dataTables_filter input {
                width: 100px;
            }

            .dataTables_wrapper .dataTables_length select {
                width: 60px;
            }
        }
    </style>
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
            $('#contactTable').DataTable({
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
            // 2. DELETE CONTACT WITH AJAX & SWEETALERT2
            // ==========================================
            $(document).on('click', '.btn-delete-contact', function (e) {
                e.preventDefault();

                const button = $(this);
                const contactId = button.data('id');
                const contactName = button.data('name');
                const contactEmail = button.data('email');

                console.log('Delete button clicked:', {
                    id: contactId,
                    name: contactName,
                    email: contactEmail
                });

                // Validasi
                if (!contactId) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Contact ID not found!'
                    });
                    return;
                }

                // ==========================================
                // SWEETALERT CONFIRMATION
                // ==========================================
                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    html: `
                                    <p>Anda akan menghapus kontak:</p>
                                    <p><strong>"${contactName}"</strong></p>
                                    <p class="text-muted" style="font-size: 0.9rem;">Email: ${contactEmail}</p>
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
                                url: "{{ route('admin.contact-delete', ['id' => ':id']) }}"
                                    .replace(':id', contactId),
                                type: 'GET',
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
                                        errorMessage = 'Kontak tidak ditemukan!';
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
                                text: response.message || 'Kontak berhasil dihapus.',
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => {
                                // ==========================================
                                // REDIRECT ATAU UPDATE UI
                                // ==========================================
                                if (response.redirect) {
                                    // Opsi 1: Redirect ke halaman list
                                    window.location.href = response.redirect;
                                } else {
                                    // Opsi 2: Hapus row tanpa redirect
                                    const row = $(`#contact-row-${contactId}`);
                                    row.css('transition', 'all 0.5s ease')
                                        .css('opacity', '0')
                                        .css('transform', 'translateX(-20px)');

                                    setTimeout(function () {
                                        row.remove();
                                        updateRowNumbers();

                                        // Cek jika tabel kosong
                                        const tableBody = $('#contactTable tbody');
                                        if (tableBody.children('tr:visible').length === 0) {
                                            tableBody.html(`
                                                            <tr>
                                                                <td colspan="7" class="text-center text-muted py-5">
                                                                    <i class="bi bi-inbox" style="font-size: 3rem; display: block; margin-bottom: 10px;"></i>
                                                                    <p>No contacts found.</p>
                                                                </td>
                                                            </tr>
                                                        `);
                                        }
                                    }, 500);
                                }
                            });

                        } else {
                            // ==========================================
                            // ERROR: Tampilkan pesan error
                            // ==========================================
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: response.message || 'Gagal menghapus kontak.',
                                confirmButtonText: 'OK'
                            });
                        }
                    }
                });
            });

            // ==========================================
            // 3. UPDATE ROW NUMBERS
            // ==========================================
            function updateRowNumbers() {
                $('#contactTable tbody tr:visible').each(function (index) {
                    $(this).find('td:first').text(index + 1);
                });
            }
            console.log('All scripts loaded successfully!');
        });
    </script>
@endpush