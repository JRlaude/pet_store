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
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $product->name }}" required autofocus>
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label> 
                                <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required autofocus>{{ $product->description }}</textarea> 
                                @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>  
                                <input id="price" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price"  value="{{ $product->price }}" required autofocus>
                                @if ($errors->has('price'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" accept="image/*" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
                                @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label> 
                                <input id="category" list="listcategory" value="{{$product->category->name}}" class="form-control  {{ $errors->has('category') ? ' is-invalid' : '' }}" name="category" />
                                @if ($errors->has('category'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('category') }}</strong>
                                </span>
                                @endif
                                <datalist id="listcategory">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->name }}"></option>
                                    @endforeach
                                </datalist> 
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label> 
                                <input type="number" class="form-control {{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" value="{{ $product->quantity }}" required autofocus> 
                                @if ($errors->has('quantity'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('quantity') }}</strong>
                                </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button> 
                        </div>
                        <div class="col-12 col-sm-4"> 
                            <img src="{{asset('/storage/images/products/'.$product->img)}}" class="product-image" id="preview" alt=""> 
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