@extends('layouts.app')

@section('title', 'Product')

@section('css')
<style>
    .card-img-top {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="dropdown d-flex justify-content-between align-items-center mb-5  d-block  d-sm-none">
        <a href="#!" class="dropdown-toggle text-body h3" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
            Categories
        </a>
        <div class="dropdown-menu">
            @forelse($categories as $category)
            <a class="dropdown-item" href="">{{$category->name}}</a>
            @empty
            <a class="dropdown-item" href="">No Category</a>
            @endforelse
        </div>
        <form action="{{ route('searchProduct') }}" method="post" class="md-form md-outline mt-0 d-flex justify-content-between align-items-center">
            @csrf
            <input type="text" id="search" name="search" class="form-control mb-0" placeholder="Search...">
            <button title="search" type="submit" class="btn btn-flat"> <i class="fas fa-search "></i> </button>
        </form>
    </div>
    <div class="row my-5">

        <div class="col-md-3">
            <!-- Section: Sidebar -->
            <section class="mb-5 d-none d-sm-block">
                <form action="{{route('searchProduct')}}" method="post" class="md-form md-outline mt-0 d-flex justify-content-between align-items-center">
                    @csrf
                    <input type="text" id="search" name="search" class="form-control mb-0" placeholder="Search...">
                    <button title="search" type="submit" class="btn btn-flat"> <i class="fas fa-search "></i> </button>
                </form>
                <h5 class="my-3">Categories</h5>
                <div class="text-muted small text-uppercase">
                    @forelse($categories as $category)
                    <p class="mb-3"><a href="{{route('productByCategory' , $category->id)}}" class="card-link-secondary">{{$category->name}}</a></p>
                    @empty
                    <p class="mb-3">No Category</p>
                    @endforelse
                </div>
            </section>
        </div>
        <!-- Products -->
        <div class="col-md-9">
            <section class="row">
                @forelse($products as $product)
                <div class="col-lg-3 col-md-4 col-6 mb-2 mb-lg-0">
                    <div class="card">
                        <a href="{{ route('product', $product->id) }}"> <img src="{{ asset('storage/images/products/'.$product->image) }}" class="card-img-top" alt="..."> </a>
                        <div class="card-body">
                            <a href="{{ route('product', $product->id) }}">
                                <h5 class="text-dark  text-truncate "> {{ $product->name }} </h5>
                                <p class="small text-muted font-weight-light text-truncate">{{$product->description}}</p>

                                <a title="buy now" href="{{ route('buynow', $product->id) }}" class="small rounded-circle btn btn-sm btn-primary float-right"><i class="fas fa-shopping-bag"> </i></a>
                                <a title="add to cart" href="{{ route('carts.add', $product->id) }}" class="small rounded-circle btn btn-sm btn-outline-primary float-right"><i class="fas fa-cart-plus fa-sm"></i></a>
                                <p class="text-muted small mb-0">&#8369; {{ $product->price }}</p>
                            </a>
                        </div>
                        <!-- <div class="card-footer text-muted">
                        <a title="buy now" href="{{ route('buynow', $product->id) }}" class="small rounded-circle btn btn-sm btn-primary float-right"><i class="fas fa-shopping-bag"> </i></a>
                        <a title="add to cart" href="{{ route('carts.add', $product->id) }}" class="small rounded-circle btn btn-sm btn-outline-primary float-right"><i class="fas fa-cart-plus"></i></a>
                        </div> -->
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="alert alert-info">
                        <h5 class="text-center">No products found</h5>
                    </div>
                </div>
                @endforelse
            </section>
        </div>
    </div>

</div>
@endsection