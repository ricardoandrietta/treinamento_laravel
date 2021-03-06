@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-tagsinput.css')}}" />
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <h1>Products Form</h1>

            @if ($errors)
                <ul class="alert">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif

            {!! Form::open(['route' => ['admin.product.update', $product->id], 'method' => 'PUT']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', $product->name, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category_id', 'Category') !!}
                {!! Form::select('category_id', $categories,  $product->category->id, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description') !!}
                {!! Form::textarea('description', $product->description, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('price', 'Price') !!}
                {!! Form::text('price', $product->price, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('tags', 'Tags') !!}<br>
                {!! Form::text('tags', $product->tags, ['class' => 'form-control', 'data-role' => 'tagsinput', 'placeholder' => 'Write a Tag and press Enter']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('featured', 'Featured') !!}
                {!! Form::checkbox('featured', 1, $product->featured) !!}
            </div>
            <div class="form-group">
                {!! Form::label('recommend', 'Recommend') !!}
                {!! Form::checkbox('recommend', 1, $product->recommend) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
            </div>


            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>
@endsection