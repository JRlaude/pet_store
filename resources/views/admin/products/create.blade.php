@extends('layouts.adminlte')
@section('title', 'Add Product |')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-edit"></i>Add Product</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <a href="{{route('products.index')}}" class="btn btn-sm  btn-secondary float-right"> <i class="fas fa-arrow-circle-left"></i> Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-8">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" required autofocus>{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input id="price" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" required autofocus>
                                @if ($errors->has('price'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input id="image" type="file" accept="image/*" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" autofocus onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
                                @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <input id="category" list="listcategory" class="form-control {{ $errors->has('category') ? ' is-invalid' : '' }}" name="category"  value="{{ old('category') }}"  />
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
                                <input id="quantity" type="number" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" value="{{ old('quantity') }}" required autofocus>
                                @if ($errors->has('quantity'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('quantity') }}</strong>
                                </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        <div class="col-12 col-sm-4">
                            <img src="" class="product-image" id="preview" alt="">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection