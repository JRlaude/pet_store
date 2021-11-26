@extends('layouts.adminlte')

@section('title', 'Dashboard | ')

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
            <form class="form-horizontal" action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="description" rows="3">{{ $product->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="price" value="{{ $product->price }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="category_id">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="quantity" class="col-sm-2 col-form-label">quantity</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="quantity" value="{{ $product->quantity }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                
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