@extends('layouts.app')

@section('content')
    <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store')}}" method="POST">
        @csrf

        @if(isset($product))
            @method('PUT')
        @endif

        <label for="name">Név:</label>
        <input type="text" name="name" id="name" value="{{isset($product) ? $product->name : ''}}"/>
        <br>

        <label for="description">Leírás:</label>
        <input type="text" name="description" id="description" value="{{isset($product) ? $product->description : ''}}"/>
        <br>

        <label for="price">Ár</label>
        <input type="number" name="price" id="price" value="{{isset($product) ? $product->price : ''}}">
        <br>

        <button type="submit">Termék felvétele</button>
    </form>
@endsection
