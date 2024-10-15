@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


    <h6>Welcome to Admin Dashboard</h6>
    <p>You are logged in as an admin.</p>

    <a href="{{ route('product.index') }}" class="btn btn-primary">View Product Listing</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
