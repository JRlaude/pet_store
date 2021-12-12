@extends('layouts.app')
@section('title', $product->name. ' | Product')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="row no-gutters align-items-center shadow-lg">
                    <div class="col-md-6">
                        <img src="{{ asset('storage/images/products/'.$product->image) }}" class="img-fluid w-100" alt="{{$product->name}}">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
                            <p class="card-text mb-3"> &#8369; {{ $product->price }} </p>
                            <p class="lead">{{ $product->description }}</p>

                            <a href="{{ route('buynow', $product->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-shopping-bag"></i> Buy Now</a>
                            @if(Cart::session((auth()->user()) ? auth()->id() : '_token')->get($product->id))
                            <a href="{{ route('carts.remove', $product->id) }}" class="btn btn-sm btn-danger">Remove to Cart</a>
                            @else
                            <a href="{{ route('carts.add', $product->id) }}" class="btn btn-sm btn-success"> <i class="fas fa-cart-plus"></i> Add to Cart</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(count($products) > 0)
    <section class="py-5"> 
        <h2 class="my-5"> {{$product->category->name}}'s Products </h2>
        <div class="row">
            @foreach($products as $product)
            <div class="col-lg-3 col-md-4 col-6 mb-2 mb-lg-0">
                <div class="card">
                    <a href="{{ route('product', $product->id) }}"> <img src="{{ asset('storage/images/products/'.$product->image) }}" class="card-img-top" alt="..."> </a>
                    <div class="card-body">
                        <a href="{{ route('product', $product->id) }}">
                            <h5 class="text-dark  text-truncate "> {{ $product->name }} </h5>
                            <p class="small text-muted font-weight-light text-truncate">Lorem ipsum Lorem ipsum dolor sit amet, consectetur adipisicing elit.dolor sit amet, consectetur adipisicing elit.</p>
                            <p class="text-muted small mb-0">${{ $product->price }}</p>
                            <a title="add to cart" href="{{ route('carts.add', $product->id) }}" class="small rounded-circle btn btn-sm btn-primary float-right"><i class="fas fa-cart-plus fa-sm"></i></a>
                            <a title="buy now" href="{{ route('buynow', $product->id) }}" class="small rounded-circle btn btn-sm  btn-outline-primary float-right"><i class="fas fa-shopping-bag"></i></a>

                        </a>
                    </div>
                    <!-- <div class="card-footer text-muted">
                        <a title="buy now" href="{{ route('buynow', $product->id) }}" class="small rounded-circle btn btn-sm btn-primary float-right"><i class="fas fa-shopping-bag"> </i></a>
                        <a title="add to cart" href="{{ route('carts.add', $product->id) }}" class="small rounded-circle btn btn-sm btn-outline-primary float-right"><i class="fas fa-cart-plus"></i></a>
                        </div> -->
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif
</div>
@endsection