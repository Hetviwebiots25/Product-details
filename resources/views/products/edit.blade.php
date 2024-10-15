@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Product</h2>

    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') 

        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>

        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" value="{{ $product->amount }}" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Product Image</label>
            <input type="file" name="image" class="form-control">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>

@if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
@endsection
