@extends('layouts.adminlte')

@section('title', 'Create Pet Category | ')


@section('pluginscss')
@include('layouts.plugins.datatables.css')
@endsection

@section('css')

@endsection

@section('content_header')
Create Pet Category
@endsection

@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create Pet Category</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <a href="{{route('pet_categories.index')}}" class="btn btn-sm  btn-secondary float-right"> <i class="fas fa-arrow-circle-left"></i> Back</a>
                    </div>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{ route('pet_categories.store') }}" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </div>
</div>

@endsection
@section('pluginsjs')
@endsection

@section('js') 
@endsection