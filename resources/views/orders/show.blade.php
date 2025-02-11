@extends('layouts.app')
@section('title', 'Orders')
@section('css')
<style>
    .track {
        position: relative;
        background-color: #ddd;
        height: 7px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin-bottom: 60px;
        margin-top: 50px
    }

    .track .step {
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        width: 25%;
        margin-top: -18px;
        text-align: center;
        position: relative
    }

    .track .step.active:before {
        background: #FF5722
    }

    .track .step::before {
        height: 7px;
        position: absolute;
        content: "";
        width: 100%;
        left: 0;
        top: 18px
    }

    .track .step.active .icon {
        background: #ee5435;
        color: #fff
    }

    .track .icon {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        position: relative;
        border-radius: 100%;
        background: #ddd
    }

    .track .step.active .text {
        font-weight: 400;
        color: #000
    }

    .track .text {
        display: block;
        margin-top: 7px
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                    <div class="col-12">
                        <img src="/greenlogo.png" width="30" alt="" class="float-left">
                        <h4 class="align-middle">
                            {{ config('app.name', 'Pet Store') }}
                            <small class="float-right">Date: {{$order->created_at->format('d M  Y ')}}</small>
                        </h4>
                    </div>
                    <!-- /.col -->
                </div>

                <!-- /.row -->
                <div class="card mt-3">
                    <header class="card-header">
                        <h4 class="card-title"> My Orders / Tracking</h4>
                        <div class="card-tools">
                            @if($order->status == 'pending')
                            <span class="text-xs text-muted font-weight-light ">{{$order->created_at->format('d M  Y h:i:s A')}}</span>
                            <span class="badge badge-pill badge-secondary ml-2 py-1 px-2">{{$order->status}}</span>
                            @elseif($order->status == 'packed')
                            <span class="text-xs text-muted font-weight-light "> {{date('d M Y h:i:s A', strtotime($order->packing_time))}}</span>
                            <span class="badge badge-pill badge-info ml-2 py-1 px-2">{{$order->status}}</span>
                            @elseif($order->status == 'shipped')
                            <span class="text-xs text-muted font-weight-light "> {{date('d M Y h:i:s A', strtotime($order->delivery_time))}}</span>
                            <span class="badge badge-pill badge-warning ml-2 py-1 px-2">{{$order->status}}</span>
                            @elseif($order->status == 'delivered')
                            <span class="text-xs text-muted font-weight-light "> {{date('d M Y h:i:s A', strtotime($order->arrival_time))}} </span>
                            <span class="badge badge-pill badge-success ml-2 py-1 px-2">{{$order->status}}</span>
                            @elseif($order->status == 'cancelled')
                            <span class="text-xs text-muted font-weight-light "> {{date('d M Y h:i:s A', strtotime($order->cancelled_time))}} </span>
                            <span class="badge badge-pill badge-danger ml-2 py-1 px-2">{{$order->status}}</span>
                            @endif
                        </div>
                    </header>
                    <div class="card-body pb-5">
                        <h6>Order Number: {{$order->id}}</h6>

                        <div class="track">
                            @if($order->status != 'cancelled')
                            <div class="step active">
                                <span class="icon"><i class="fas fa-shopping-cart"></i></span>
                                <span class="text">Placed Order</span>
                                <span class="text-xs text-muted font-weight-light ">{{$order->created_at->format('d M  Y h:i:s A')}}</span>
                            </div>
                            <div class="step {{$order->status != 'pending' ? 'active' : ''}}">
                                <span class="icon"><i class="fa fa-box"></i></span>
                                <span class="text">Packed</span>
                                <span class="text-xs text-muted font-weight-light "> {{date('d M Y h:i:s A', strtotime($order->packing_time))}}</span>
                            </div>
                            <div class="step {{$order->status=='shipped' ? 'active' : ($order->status=='delivered' ? 'active' : '') }}">
                                <span class="icon"> <i class="fa fa-truck"></i> </span>
                                <span class="text"> On the way </span>
                                <span class="text-xs text-muted font-weight-light "> {{date('d M Y h:i:s A', strtotime($order->delivery_time))}}</span>
                            </div>
                            <div class="step {{$order->status=='delivered' ? 'active':''}}">
                                <span class="icon"> <i class="fa fa-check"></i> </span>
                                <span class="text">Delivered</span>
                                <span class="text-xs text-muted font-weight-light "> {{date('d M Y h:i:s A', strtotime($order->arrival_time))}} </span>
                            </div>
                            @else
                            <div class="step active">
                                <span class="icon"> <i class="fa fa-times"></i> </span>
                                <span class="text">Cancelled</span>
                                <span class="text-xs text-muted font-weight-light "> {{date('d M Y h:i:s A', strtotime($order->cancelled_time))}} </span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Table row -->
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->products as $product)
                                <tr>
                                    <td>
                                        <img class="img-size-50" src="/storage/images/products/{{$product->attributes->image}}" alt="">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>&#8369; {{$product->price}}</td>
                                    <td><span class="text-muted"></span> {{$product->quantity }}</td>
                                    <td>&#8369; {{$product->price * $product->quantity  }}</td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-sm-5 invoice-col">
                        <p class="lead">Shipping address</p>
                        <address>
                            <strong>{{$order->user->getName()}}</strong><br>
                            {{$order->shipping_address}}
                            <br> Email: {{$order->user->email}}
                            <br> {{$order->user->contact_number}}
                        </address>
                    </div>

                    <!-- accepted payments column -->
                    <div class="col-sm-3">
                        <p class="lead">Payment Methods:</p>
                        @if($order->payment_method == 'COD')
                        <p class="h6">Cash on Delivery</p>

                        @else
                        <img src="/AdminLTE-3.1.0/dist/img/credit/{{$order->payment_method}}.png" alt="{{$order->payment_method}}">
                        @endif



                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4">
                        <p class="lead">Order Summary</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td>&#8369; {{$order->subTotal}}</td>
                                </tr>
                                <tr>
                                    <th>Shipping fee:</th>
                                    <td>&#8369; {{$order->shippingFee}}</td>
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    <td><strong> &#8369; {{$order->total}}</strong></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-12">
                        <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>

                    </div>
                </div>
            </div>
            <!-- /.invoice -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection