@extends('layouts.adminlte')

@section('title', $product->name .' | ')

@section('pluginscss')

@endsection

@section('css')

@endsection

@section('content_header')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-edit"></i> Edit</h3> 
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <a href="{{route('products.index')}}" class="btn btn-sm  btn-secondary float-right"> <i class="fas fa-arrow-circle-left"></i> Back</a>
                    </div>
                </div>
            </div>
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <div class="row"> 
                        <div class="col-12 col-sm-8">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label> 
                                <textarea class="form-control" name="description" >{{ $product->description }}</textarea> 
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label> 
                                <input type="number" class="form-control" name="price" value="{{ $product->price }}"> 
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label> 
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select> 
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label> 
                                <input type="number" class="form-control" name="quantity" value="{{ $product->quantity }}"> 
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button> 
                        </div>
                        <div class="col-12 col-sm-4"> 
                            <img src="" class="product-image" id="preview" alt=""> 
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

@endsection


@section('pluginsjs')

@endsection

@section('js')

@endsection