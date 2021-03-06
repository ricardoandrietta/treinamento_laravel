@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Categories</h1>
            <a href="{{route('admin.category.create')}}" class="btn btn-default">New Category</a>
            <br>
            <br>
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                @foreach($categories as $category)
                    <tr>
                        <td><a href="{{route('admin.category.edit', ['id' => $category->id])}}">{{$category->id}}</a></td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td>
                            <a href="{{route('admin.category.edit', ['id' => $category->id])}}">Edit</a> |
                            <a href="{{route('admin.category.destroy', ['id' => $category->id])}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! $categories->render() !!}
        </div>
    </div>
@endsection