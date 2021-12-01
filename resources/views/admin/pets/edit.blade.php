@extends('layouts.adminlte')

@section('title', $pet->name .' | ')

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
                        <a href="{{route('pets.index')}}" class="btn btn-sm  btn-secondary float-right"> <i class="fas fa-arrow-circle-left"></i> Back</a>
                    </div>
                </div>
            </div>
            <form action="{{ route('pets.update', $pet->id) }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12 col-sm-8">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $pet->name }}">
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">{{ $pet->description }}</textarea>
                                @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ $pet->price }}">
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
                                <input id="category" list="listcategory" value="{{$pet->pet_category->name}}" class="form-control {{ $errors->has('pet_category') ? ' is-invalid' : '' }}" name="pet_category" />
                                @if ($errors->has('pet_category'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('pet_category') }}</strong>
                                </span>
                                @endif
                                <datalist id="listcategory">
                                    @foreach($pet_categories as $pet_category)
                                    <option value="{{ $pet_category->name }}"></option>
                                    @endforeach
                                </datalist>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        <div class="col-12 col-sm-4">
                            <img src="{{asset('/storage/images/pets/'.$pet->img)}}" class="w-100" id="preview" alt="">
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