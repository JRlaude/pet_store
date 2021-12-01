@extends('layouts.adminlte')

@section('title', 'edit Pet Category | ')

@section('pluginscss')

@endsection

@section('css')

@endsection

@section('content_header')
edit Pet Category
@endsection

@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-edit"></i> Edit Pet Category</h3> 
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <a href="#!" onclick="history.back();" class="btn btn-sm  btn-secondary float-right"> <i class="fas fa-arrow-circle-left"></i> Back</a>
                    </div>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{ route('pet_categories.update', $pet_category->id) }}" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $pet_category->name }}">
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