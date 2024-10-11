@extends('layouts.template')

@section('title', 'Product Details')

@section('body')

<h2>Product Details</h2>

    <p>ID: {{ $product->id }}</p>
    <p>Product Name: {{ $product->product_name }}</p>
    <p>Retail Price: {{ number_format($product->retail_price, 0, ',', '.') }}</p>
    <p>Wholesale Price: {{ number_format($product->wholesale_price, 0, ',', '.') }}</p>
    <p>Quantity: {{ $product->quantity }}</p>
    <div class="d-flex justify-content-center">
        <img src="{{asset('storage/' . $product->photo) }}" class="img-fluid rounded shadow" style="height: 200px; object-fit: cover;" alt="{{$product->product_name}}" onerror="this.onerror=null;this.src='https://placehold.co/200';">
    </div>

@endsection

