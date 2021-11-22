@extends('layouts.app')

@section('title', '| Product')

@section('content')  
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $product->name }}</h1>
            <p class="lead">{{ $product->description }}</p>
            <hr>
            <p>{{ $product->price }}</p>
            <p>{{ $product->category->name }}</p>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>
    
    @endsection