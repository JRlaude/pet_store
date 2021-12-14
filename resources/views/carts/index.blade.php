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
                <th>Product image</th>
                <th>Product name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Remove</th>
              </tr>
            </thead>
            <tbody>
              @forelse($products as $product)
              <tr class="text-center">


                <td class="w-25">
                  <a href="#">
                    <img class="rounded img-fluid" src="{{ asset('storage/images/products/'. $product->attributes->image) }}" alt="image">
                  </a>
                </td>

                <td>
                  <h5>{{ $product->name}}</h5>
                </td>

                <td>
                  <p class="price text-left"> &#8369; {{$product->price}}</p>
                </td>

                <td>
                  <p class="d-none">{{ $product->quantity }}</p>
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
                  <a class="text-danger" href="{{ route('carts.remove', $product->id) }}"><i class="fas fa-trash"></i></a>
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
  @if(count($products) > 0)
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
              <p> &#8369; {{$cartSubTotal}}</p>
              <p> &#8369; {{number_format((float)$shippingFee, 2, '.', '')}}</p>
              <p> &#8369; {{$cartFinalTotal}}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <a href="/checkout" class="btn btn-primary btn-block">Checkout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif
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