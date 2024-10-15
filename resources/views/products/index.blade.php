@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Product Listing</h2>
    <a href="{{ route('product.create') }}" class="btn btn-primary">Create Product </a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
 
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>${{ $product->amount }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="50">
                        @else
                            No image
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-info">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
