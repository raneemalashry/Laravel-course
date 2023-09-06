@extends('dashboard.layouts.master')
@section('title','Create Post')
@section('posts' , 'active')
@section('content')
<div class="container">
    <form  action="{{route('dashboard.posts.store')}}" method="POST">
        @csrf
        {{-- @dd($errors->all()); --}}

        <div class="input-group">
            <label for="title">Title</label>
        <input type="text" name="title" class="form-control" placeholder="Title" id="title">
        @error('title')
        <p class="text-danger">{{$message}}</p>
        @enderror
        </div>
        <div class="input-group">
            <label for="content">Content</label>
        <textarea name="content" class="form-control" placeholder="Content" id="content"></textarea>
        @error('content')
        <p class="text-danger">{{$message}}</p>
        @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
