@extends('layouts.template')
@section('title', 'Dashboard')

@section('body')
<div class="container mt-4">
    <h1 class="mb-4">Dashboard Produk</h1>

    @php
        $totalQuantity = \App\Models\Produk::sum('quantity');
        $totalRetailPrice = \App\Models\Produk::sum('retail_price');
        $topProduct = \App\Models\Produk::orderBy('quantity', 'desc')->first();
    @endphp

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">Total Produk</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalQuantity }}</h5>
                    <p class="card-text">Jumlah total produk yang disimpan</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-success">
                <div class="card-header bg-success text-white">Total Retail Price</div>
                <div class="card-body">
                    <h5 class="card-title">Rp {{ number_format($totalRetailPrice, 2) }}</h5>
                    <p class="card-text">Total nilai produk (retail price).</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-warning">
                <div class="card-header bg-warning text-white">Produk Teratas</div>
                <div class="card-body">
                    @if($topProduct)
                        <h5 class="card-title">{{ $topProduct->product_name }}</h5>
                        <p class="card-text">Quantity: {{ $topProduct->quantity }}</p>
                    @else
                        <p class="card-text">Belum ada produk.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="mb-4">
        <a href="{{ route('produks.index') }}" class="btn btn-primary">Lihat Data Produk</a>
    </div>
</div>
@endsection
