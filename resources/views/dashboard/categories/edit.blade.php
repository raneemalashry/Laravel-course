@extends('dashboard.layouts.master')
@section('title','Edit Category')
@section('categories' , 'active')
@section('content')
<div class="container">
    {{-- @DD(session()->all()) --}}
    <h3>Edit Category  {{$category->name}} </h2>
    <form  action="{{route('dashboard.categories.update', $category->id)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name"  name="name" value="{{$category->name}}">
            @error('name')
            <p class="text-danger"> {{$message}} </p>
            @enderror
          </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection
