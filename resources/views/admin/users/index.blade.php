@extends('admin.layout')

@section('title', 'User List')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                        <a class="nav-link active"
                           href="#">
                            <i class="bi bi-gear me-1"></i> User List
                        </a>
                    </li>
                </ul>
              </div>
              <div class="col-md-6 text-end">
                <a href="{{ route('admin.user-create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-lg me-1"></i> Tambah
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="userTable" class="table table-bordered table-hover align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th style="width: 120px;">Status</th>
                            <th style="width: 140px;">Tanggal</th>
                            <th style="width: 140px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->fullname }}</td>
                                <td>{{ $value->email }}</td>
                                <td>
                                    <span class="badge text-bg-{{ $value->is_active === 1 ? 'success' : 'secondary' }}">
                                        {{ $value->is_active === 1 ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>{{ date('j F Y', strtotime($value->created)) }}</td>
                                <td>
                                    <a href="{{ route('admin.article-edit', $value->id) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm">
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
            $('#userTable').DataTable({
                language: {
                    emptyTable: 'Belum ada data.'
                }
            });
        });
    </script>
@endpush
