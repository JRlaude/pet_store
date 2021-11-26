@extends('layouts.app')

@section('title', 'Product')

@section('content') 
@foreach($products as $product)

<div class="col-md-4">
    <div class="card mb-4 shadow-sm">
        <img class="card-img-top" src="{{ asset('storage/'.$product->image) }}" alt="Card image cap">
        <div class="card-body">
            <p class="card-text">{{ $product->name }} 1 </p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-outline-secondary">View {{$product->id}}</a>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                    <span onclick="event.preventDefault();document.getElementById('form-delete-{{$product->id}}').submit()"class="btn btn-sm btn-outline-secondary">Delete</span>
                    <form id="form-delete-{{$product->id}}" action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form> 

                    <form action="{{route('products.destroy',$product->id)}}" id="{{'form-delete-'.$product->id}}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="delete" class="btn btn-sm btn-outline-secondary"/>
                    </form>
                </div>
                <small class="text-muted">{{ $product->created_at->diffForHumans() }}</small>
            </div>
        </div>
    </div>
</div>

@endforeach

@endsection
 