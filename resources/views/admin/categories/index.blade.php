@extends('layouts.adminlte')

@section('title', 'Categories | ')


@section('pluginscss')
@include('layouts.plugins.datatables.css')
@include('layouts.plugins.toastr.css')

@endsection

@section('css')

@endsection

@section('content_header')
Category
@endsection

@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Categories</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('category.create') }}" class="btn btn-primary">Create</a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <table id="categories-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>{{ $category->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">Edit</a> 
                                        <form action="{{route('category.destroy', $category->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="Delete" class="btn btn-danger" />
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

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
<x-toastr />
<script>
    $(function() {
        $("#categories-table").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });
</script>
@endsection