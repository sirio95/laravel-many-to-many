@extends('layouts.main-layout')

@section('content')
    <h1>Products</h1>
    <a href="{{ route('product.create_new') }}">Create new product</a>
    @foreach ($categories as $category)
        <h2>{{ $category-> name }}</h2>
        <sub>{{ $category -> description}}</sub>
        <ul>
            @foreach ($category-> products as $product)
                @include('components.products.single-product')
            @endforeach
        </ul>
        
    @endforeach
@endsection