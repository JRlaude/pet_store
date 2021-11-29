@extends('layouts.adminlte')

@section('title', 'Categories | ')


@section('pluginscss')
@include('layouts.plugins.datatables.css')
@include('layouts.plugins.toastr.css')

@endsection

@section('css')

@endsection
@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Categories</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Create</a>
                    </div>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <table id="categories-table" class="table table-sm table-hover table-head-fixed">
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
                                        <a title="Edit" href="{{ route('category.edit', $category->id) }}"><i class="fas fa-edit text-secondary"></i></a>
                                        <a title="Delete" href="#!"><i class="fas fa-trash text-danger" data-toggle="modal" data-target="#modal-danger{{$category->id}}"></i></a>

                                    </td>
                                </tr>

                                <div class="modal fade" id="modal-danger{{$category->id}}">
                                    <div class="modal-dialog modal-dialog-centered modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h4 class="modal-title">Confirmation</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete <b> {{ $category->name }}</b></p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <form action="{{route('category.destroy', $category->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="submit" value="Delete" class="btn btn-danger" />
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
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
        });
    });
</script>
@endsection