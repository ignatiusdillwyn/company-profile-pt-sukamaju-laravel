@extends('admin.layout')

@section('title', 'Article Form')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.article.index') }}">Article</a></li>
    <li class="breadcrumb-item active" aria-current="page">Form</li>
@endsection

@section('content')

    <div>
      <p>This is form</p>
    </div>

@endsection
