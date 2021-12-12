@extends('layouts.adminlte')

@section('title', 'Order| ')


@section('css')

@endsection


@section('content')


<div class="row">
  <div class="col-12">
    <div class="card card-primary card-outline">

      <div class="card-header">
        <h3 class="card-title">Order</h3>
        
      </div>

      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Customer</h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" class="form-control" id="" placeholder="Enter name" value="{{ $order->user->name }}" disabled>
                </div>
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="text" class="form-control" id="" placeholder="Enter email" value="{{ $order->user->email }}" disabled>
                </div>
                <div class="form-group">
                  <label for="">Phone</label>
                  <input type="text" class="form-control" id="" placeholder="Enter phone" value="{{ $order->user->phone }}" disabled>
                </div>
                <div class="form-group">
                  <label for="">Address</label>
                  <input type="text" class="form-control" id="" placeholder="Enter address" value="{{ $order->user->address }}" disabled>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Order</h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="">Order ID</label>
                  <input type="text" class="form-control" id="" placeholder="Enter order id" value="{{ $order->id }}" disabled>
                </div>
                <div class="form-group">
                  <label for="">Order Date</label>
                  <input type="text" class="form-control" id="" placeholder="Enter order date" value="{{ $order->created_at }}" disabled>
                </div>
                <div class="form-group">
                  <label for="">Order Status</label>
                  <input type="text" class="form-control" id="" placeholder="Enter order status" value="{{ $order->status }}" disabled>
                </div>
                <div class="form-group">
                  <label for="">Order Total</label>
                  <input type="text" class="form-control" id="" placeholder="Enter order total" value="{{ $order->total }}" disabled>
                </div>
                <div class="form-group">
                  <label for="">Order Note</label>
                  <input type="text" class="form-control" id="" placeholder="Enter order note" value="{{ $order->note }}" disabled>
                </div>
                <div class="form-group">
                  <label for="">Order Payment</label>
                  <input type="text" class="form-control" id="" placeholder="Enter order payment" value="{{ $order->payment }}" disabled>
                </div>

               @foreach($order->products as $product)
                <div class="form-group">
                  <label for="">Product</label>
                  <input type="text" class="form-control" id="" placeholder="Enter product" value="{{ $product->name }}" disabled>
                </div>
                <div class="form-group">
                  <label for="">Product Price</label>
                  <input type="text" class="form-control" id="" placeholder="Enter product price" value="{{ $product->price }}" disabled>
                </div>
                <div class="form-group">
                  <label for="">Product Quantity</label>
                  <input type="text" class="form-control" id="" placeholder="Enter product quantity" value="{{ $product->quantity }}" disabled>
                </div>
                <div class="form-group">
                  <label for="">Product Total</label>
                  <input type="text" class="form-control" id="" placeholder="Enter product total" value="{{ $product->price  * $product->quantity }}" disabled>
                </div>
                @endforeach
                



        
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </div>

</div>

@endsection