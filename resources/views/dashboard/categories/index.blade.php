@extends('dashboard.layouts.master')
@section('title', 'Categories')
@section('categories', 'active')
@section('content')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-8">
                <h1>Categories</h1>
            </div>
            <div class="col-4">
                <button class="btn btn-primary"
                    onclick="window.location.href='{{ route('dashboard.categories.create') }}'">Create new Category</button>
            </div>
        </div>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">actions</th>

                </tr>
            </thead>
            <tbody>
                @if(count($categories))
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }} </th>

                        <td>{{ $category->name }}</td>
                        <td>
                            {{-- <a class="btn btn-sm btn-primary" href="{{route('dashboard.categories.edit' , [$category->id , 'type'=>'posts'])}}"> Edit </a> --}}

                            {{-- <a class="btn btn-sm btn-primary" href="{{route('dashboard.categories.destroy' , $category->id )}}"> Delete </a>  /// error --}}
                            <div class="row">
                                <div class="col-2">
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ route('dashboard.categories.edit', $category->id) }}"> Edit </a>
                                </div>
                                <div class="col-2">

                                    <form method="POST"
                                        action="{{ route('dashboard.categories.destroy', $category->id) }}">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>


                        </td>
                    </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="3" class="text-center">No Categories Found</td>
                </tr>
                @endif

            </tbody>
            {{ $categories->links() }}
        </table>
    </div>
@endsection
