@extends('layout')

@section('content')
    <h1>Admin Dashboard</h1>
    <!-- <p><code style="display:inline">GET {{ url('/admin') }}</code> &mdash; DashboardController@index (dilindungi middleware 'admin')</p> -->

    <div class="box" style="background:#e6ffed; border-color:#3c9a5f;">
        Selamat datang, <b>{{ $user->name }}</b> ({{ $user->email }})! Anda berhasil melewati middleware 'admin'.
    </div>

    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection
