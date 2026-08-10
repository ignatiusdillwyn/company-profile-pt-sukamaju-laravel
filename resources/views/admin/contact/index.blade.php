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
                            <tr>
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
                                    <a href="{{ route('admin.contact-delete', ['id' => $value->id]) }}"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this article?')">
                                        <i class="bi bi-trash"></i>
                                    </a>
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
@endpush

@push('scripts')
    <!-- jQuery (dibutuhkan DataTables) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <!-- DataTables core + Bootstrap 5 adapter -->
    <script src="https://cdn.jsdelivr.net/npm/datatables.net@3.0.1/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables.net-bs5@3.0.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            // Zero configuration - https://datatables.net/examples/core/basic_init/zero_configuration.html
            $('#contactTable').DataTable({
                language: {
                    emptyTable: 'Belum ada data.'
                }
            });
        });
    </script>
@endpush