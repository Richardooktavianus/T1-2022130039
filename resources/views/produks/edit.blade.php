@extends('layouts.template')

@section('title', 'Edit Product')

@section('body')
    <h2>Edit Product</h2>

    <form action="{{ route('produks.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Product Name:</label>
            <input type="text" name="product_name" value="{{ $product->product_name }}" required class="form-control @error('product_name') is-invalid @enderror">
            @error('product_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Retail Price:</label>
            <input type="number" name="retail_price" value="{{ $product->retail_price }}" required class="form-control @error('retail_price') is-invalid @enderror">
            @error('retail_price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Wholesale Price:</label>
            <input type="number" name="wholesale_price" value="{{ $product->wholesale_price }}" required class="form-control @error('wholesale_price') is-invalid @enderror">
            @error('wholesale_price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Origin:</label>
            <input type="text" name="origin" value="{{ $product->origin }}" required class="form-control @error('origin') is-invalid @enderror">
            @error('origin')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Quantity:</label>
            <input type="number" name="quantity" value="{{ $product->quantity }}" required class="form-control @error('quantity') is-invalid @enderror">
            @error('quantity')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-6 mt-2 mb-2">
            <label class="form-label" for="photo">Photo</label>
            <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo" id="photo" accept="image/*">
            <img src="{{ Storage::url($product->photo) }}" alt="" width="100">
            @error('photo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection

