@extends('layout')
@section('content')
<h1>Admin Login</h1>
<!-- <p><code style="display:inline">GET {{ url('/admin/login') }}</code> &mdash; AuthController@loginRender (tidak dilindungi middleware)</p> -->

@if (session('error'))
<div class="box" style="background:#fdecea; border-color:#c0392b;">{{ session('error') }}</div>
@endif

@if ($errors->any())
<div class="box" style="background:#fdecea; border-color:#c0392b;">
    <ul style="margin:0;">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.login.handle') }}" method="POST" class="box">
    @csrf
    <p>
        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email') }}" style="width:100%;padding:6px;">
    </p>
    <p>
        <label>Password</label><br>
        <input type="password" name="password" style="width:100%;padding:6px;">
    </p>
    <button type="submit">Login</button>
</form>

<p><small>Demo akun: <code style="display:inline">admin@course-net.test</code> / <code style="display:inline">admin123</code>
        (dibuat lewat <code style="display:inline">AdminUserSeeder</code>)</small></p>
@endsection