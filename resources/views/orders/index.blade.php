@extends('layouts.app')
@section('title', 'Orders')

@section('content')
<div class="container py-5">
    <div class="row">

        @forelse($orders as $order)
        <div class="col-8 mx-auto ">
            <a title="View order details" href="{{route('orders.show', $order->id)}}" class="text-body">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Order Number :<span class="text-primary"> # {{$order->id}}</span> </h4>
                        <span class="badge badge-secondary mx-3">{{ $order->created_at->diffForHumans() }}</span>
                        <div class="card-tools">
                            <span class="badge badge-pill badge-primary py-1 px-2">{{$order->status}}</span>
                        </div>
                    </div>
                    <table id="products-table" class="p-3">

                        <tbody>
                            @foreach($order->products as $product)
                            <tr>
                                <td>
                                    <img class="img-size-50" src="/storage/images/products/{{$product->attributes->image}}" alt="">
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>&#8369; {{$product->price}}</td>
                                <td><span class="text-muted">Qty :</span> {{$product->quantity }}</td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </a>
        </div>
        @empty

        <div class="alert alert-warning">
            <p>No orders found</p>
        </div>
        @endforelse

    </div>
</div>
</div>
@endsection