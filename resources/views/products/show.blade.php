@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Product Details</h2>

    <div class="card">
        <div class="card-header">
            <h3>{{ $product->name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Amount:</strong> ${{ $product->amount }}</p>
            <p><strong>Description:</strong> {{ $product->description }}</p>

            @if ($product->image)
                <p><strong>Image:</strong></p>
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="200">
            @else
                <p>No image available</p>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('product.index') }}" class="btn btn-primary">Back to Product Listing</a>
        </div>
    </div>
</div>
@endsection