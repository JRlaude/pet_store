@extends('layouts.adminlte')

@section('title', 'Pet Categories | ')

@section('pluginscss')
@include('layouts.plugins.datatables.css')
@endsection

@section('css')

@endsection

@section('content_header')
Pet Categories
@endsection

@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pet Categories</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <a href="{{ route('pet_categories.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Create</a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="pet_categories-table" class="table table-sm table-hover table-head-fixed">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pet_categories as $pet_category)
                        <tr>
                            <td>{{ $pet_category->id }}</td>
                            <td>{{ $pet_category->name }}</td>
                            <td>{{ $pet_category->created_at->diffForHumans()  }}</td>
                            <td>{{ $pet_category->updated_at->diffForHumans()  }}</td>
                            <td>
                                <a title="Edit" href="{{ route('pet_categories.edit', $pet_category->id) }}"><i class="fas fa-edit text-secondary"></i></a>
                                <a title="Delete" href="#!"><i class="fas fa-trash text-danger" data-toggle="modal" data-target="#modal-danger{{$pet_category->id}}"></i></a>
                            </td>
                        </tr>
                        <div class="modal fade" id="modal-danger{{$pet_category->id}}">
                            <div class="modal-dialog modal-dialog-centered modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger">
                                        <h4 class="modal-title">Confirmation</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete <b> {{ $pet_category->name }}</b></p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <form action="{{route('pet_categories.destroy', $pet_category->id) }}" method="POST">
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
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        <!-- /.card -->

    </div>
</div>

@endsection
@section('pluginsjs')
@include('layouts.plugins.datatables.js')
@endsection

@section('js')
<script>
    $(function() {
        $("#pet_categories-table").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
        });
    });
</script>
@endsection