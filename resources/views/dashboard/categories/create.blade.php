@extends('dashboard.layouts.master')
@section('title','Create Category')
@section('categories' , 'active')
@section('content')
<div class="container">
    {{-- @DD(session()->all()) --}}
    <h3>Create New Category </h2>
    <form  action="{{route('dashboard.categories.store')}}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name"  name="name" value={{old('name')}}>
            @error('name')
            <p class="text-danger"> {{$message}} </p>
            @enderror
          </div>
        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </form>
</div>
@endsection
