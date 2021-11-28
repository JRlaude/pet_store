@extends('layouts.adminlte')

@section('title', 'edit Category | ')

@section('pluginscss')

@endsection

@section('css')

@endsection

@section('content_header')
edit Category
@endsection

@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">edit Category</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{ route('category.update', $category->id) }}" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
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