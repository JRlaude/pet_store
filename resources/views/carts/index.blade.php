@extends('layouts.app')
@section('title', 'Cart')
@section('pluginscss')
@include('layouts.plugins.datatables.css')

@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Cart</h3>
                </div>
                <div class="card-body  table-responsive">
                    <table id="cart-table" class="table table-sm table-hover table-head-fixed ">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Product</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                            <tr>
                                <td class="text-center">
                                    <a class="text-danger" href="{{ route('carts.remove', $product->id) }}"><i class="fas fa-times"></i></a>
                                </td>

                                <td>
                                    <a href="#">
                                        <img class="rounded" src="{{ asset('storage/' . $product->associatedModel->image) }}" alt="image">
                                    </a>
                                </td>

                                <td>
                                    <h5>{{ $product->name}}</h5>
                                </td>

                                <td>
                                    <p class="price text-left">PHP {{number_format((float)$product->price, 2, '.', '')}}</p>
                                </td>

                                <td>
                                    <p class="d-none" >{{ $product->quantity }}</p>
                                    <form action="{{ route('carts.update', $product->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="d-flex align-items-center">
                                            <input class="form-control form-control-sm mr-2" type="number" min="1" name="quantity" value="{{ $product->quantity }}" style="width:50px">
                                            <button type="submit" class="btn btn-primary btn-sm btn-save">Save</button>
                                        </div>

                                    </form>

                                </td>

                                <td>
                                    <p class="price text-left">PHP {{number_format((float)Cart::get($product->id)->getPriceSum(), 2, '.', '')}}</p>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    <h5>No item in cart</h5>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3>Cart Summary</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Subtotal</p>
                            <p>Shipping</p>
                            <p>Total</p>
                        </div>
                        <div class="col-md-6">

                            <p>PHP {{number_format((float)$cartSubTotal, 2, '.', '')}}</p>
                            <p>PHP {{number_format((float)$shippingFee, 2, '.', '')}}</p>
                            <p>PHP {{number_format((float)$cartFinalTotal, 2, '.', '')}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a href=" " class="btn btn-primary btn-block">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('pluginsjs')
@include('layouts.plugins.datatables.js')

@endsection

@section('js')
<script>
    $(function() {
        $("#cart-table").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "searching": false,
        });

    });
</script>
@endsection