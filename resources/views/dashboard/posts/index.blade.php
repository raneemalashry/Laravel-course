@extends('dashboard.layouts.master')
@section('title', 'Posts')
@section('posts', 'active')
@section('content')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-8">
                <h1 >Posts</h1>
            </div>
            <div class="col-4">
                <button class="btn btn-primary"
                    onclick="window.location.href='{{ route('dashboard.posts.create') }}'">Create Post</button>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        console.log('hello');
    </script>
@endpush
