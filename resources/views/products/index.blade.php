@extends('layouts.app')

@section('title', 'Product')

@section('content')
@foreach($products as $product)
<a href="{{ route('product', $product->id) }}">
<div class="col-md-4">
    <div class="card mb-4 shadow-sm">
        <img class="card-img-top" src="{{ asset('storage/'.$product->image) }}" alt="Card image cap">
        <div class="card-body">
            <p class="card-text">{{ $product->name }} 1 </p>
            <div class="d-flex justify-content-between align-items-center"> 
                <small class="text-muted">{{ $product->created_at->diffForHumans() }}</small>
            </div>
        </div>
    </div>
</div>
</a>
@endforeach

@endsection