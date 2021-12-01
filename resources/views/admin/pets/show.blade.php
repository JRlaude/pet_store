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
                <h3 class="card-title">{{ $pet->name }}</h3>

                <div class="card-tools">
                    <div class="btn-group float-right mr-5">
                        <a href="{{ route('pets.index') }}" class="btn btn-sm btn-outline-secondary">
                            <i class="fa fa-arrow-left"></i> back
                        </a>
                        <a href="{{ route('pets.edit', $pet->id) }}" class="btn btn-sm btn-outline-secondary">
                            <i class="fa fa-edit"></i> edit
                        </a>
                        <a href="{{ route('pets.destroy', $pet->id) }}" class="btn btn-sm btn-outline-secondary" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                            <i class="fa fa-trash"></i> delete
                        </a>
                        <form id="delete-form" action="{{ route('pets.destroy', $pet->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>

                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" value="{{ $pet->name }}" disabled>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label> description</label>
                            <textarea class="form-control" rows="3" disabled>{{ $pet->description }}</textarea>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

@endsection


@section('pluginsjs')

@endsection

@section('js')

@endsection