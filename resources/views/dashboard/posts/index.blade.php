@extends('dashboard.layouts.master')
@section('title','Posts')
@section('posts' , 'active')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
    <h1 class="mt-4">Posts</h1>
        </div>
        <div class="col-md-4">
    <button class="btn btn-primary text-end" onclick="window.location.href='{{route('dashboard.posts.create')}}'">Create Post</button>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        console.log('hello');
    </script>
@endpush
