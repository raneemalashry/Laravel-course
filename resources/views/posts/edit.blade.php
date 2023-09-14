@extends('layouts.master')
@section('title', 'Edit Post')
@section('content')
    <h3>Edit Post </h2>
        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">title</label>
                <input type="text" class="form-control" id="title" name="title" value={{ $post->title }}>
                @error('title')
                    <p class="text-danger"> {{ $message }} </p>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">content</label>
                <textarea class="form-control" id="content" name="content" rows="3">{{$post->content}}</textarea>
                @error('content')
                    <p class="text-danger"> {{ $message }} </p>
                @enderror
            </div>
            {{-- @DD(old('categories')) --}}
            @foreach ($categories as $category)
                <input type="checkbox" name="categories[]" value="{{ $category->id }}" id="{{ $category->id }}"  {{in_array($category->id,$selectedCategories) ? "checked": ''}}
                <label for="{{ $category->id }}">{{ $category->name }}</label>
                <br>
            @endforeach
            <img width="50px" height="50px" src="{{asset($post->image_path)}}" alt="">
            <div class="form-group">
                <label for="image">image</label>
                <input type="file" class="form-control" id="image" name="image">
                @error('image')
                    <p class="text-danger"> {{ $message }} </p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3 mb-3">update</button>
        </form>
    @endsection
