@extends('layouts.main-layout')

@section('content')

<h2>create new product</h2>
<form action="" method="POST">
    @csrf

    <label for="name">Name</label>
    <input type="text" name="name">

    <label for="description">Describe the product</label>
    <input type="text" name="description">

    <label for="price">Price</label>
    <label for="weight">Weight</label>

    <label for="typology">Typology</label>
    <select name="typology_id">
        @foreach ($typologies as $typology)
            <option value="{{ $typology-> id }}">{{ $typology-> name }}</option>
        @endforeach
    </select>
   
    <h3>categories</h3>
    <ul>
        @foreach ($categories as $category)
            <li>
                <input type="checkbox" name="categories[]" value="{{ $category-> id }}">
                <label for="categories">{{ $category-> name }}</label> 
            </li>
        @endforeach
    </ul>
    

    <input type="submit" value="CREATE NEW PRODUCT">
</form>

@endsection