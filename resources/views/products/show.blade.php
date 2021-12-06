@extends('layouts.app')
@section('title', $product->name. ' | Product')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $product->name }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <h4>{{ $product->name }}</h4>
                            <p>{{ $product->description }}</p>
                            <!-- &#8369; peso sign -->
                            <h5>&#8369; {{ $product->price }}</h5> 
                            @if(Cart::session((auth()->user()) ? auth()->id() : '_token')->get($product->id))
                            <a href="{{ route('carts.remove', $product->id) }}" class="btn btn-sm btn-danger float-right">Remove to cart</a>
                            @else

                            <form action="{{ route('carts.add', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success ">Add to cart</button>
                            </form>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection