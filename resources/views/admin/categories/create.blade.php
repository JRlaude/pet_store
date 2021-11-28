@extends('layouts.adminlte')

@section('title', 'Create Category | ')


@section('pluginscss')
@include('layouts.plugins.datatables.css')
@include('layouts.plugins.toastr.css')

@endsection

@section('css')

@endsection

@section('content_header')
Create Category
@endsection

@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create Category</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{ route('category.store') }}" autocomplete="off">
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
@include('layouts.plugins.datatables.js')
@include('layouts.plugins.toastr.js')

@endsection

@section('js')
<x-toastr/>
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>
@endsection