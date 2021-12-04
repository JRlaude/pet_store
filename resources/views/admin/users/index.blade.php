@extends('layouts.adminlte')

@section('title', 'User')

@section('pluginscss')
@include('layouts.plugins.datatables.css')
@endsection

@section('css')

@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">User</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table id="users-table" class="table table-sm table-hover table-head-fixed ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <!-- <tr onclick="window.location.href='{{route("profile", $user->id) }}'" > -->
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->getName() }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>
                                <td>
                                    <a href="{{ route('profile', $user->id) }}" class="btn btn-info btn-sm">View</a> ->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('pluginsjs')
@include('layouts.plugins.datatables.js')
@endsection

@section('js')

<script>
    $(function() {
        $("#users-table").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": [{
                    "extend": 'copy',
                    "exportOptions": {
                        "columns": ':visible'
                    }
                },
                {
                    "extend": 'csv',
                    "exportOptions": {
                        "columns": ':visible'
                    }
                }, {
                    "extend": 'excel',
                    "exportOptions": {
                        "columns": ':visible'
                    }
                },
                {
                    "extend": 'pdf',
                    "exportOptions": {
                        "columns": ':visible'
                    }
                },
                {
                    "extend": 'print',
                    "exportOptions": {
                        "columns": ':visible'

                    }

                },


                'colvis'
            ]
        }).buttons().container().appendTo('#users-table_wrapper .col-md-6:eq(0)');

    });
</script>
@endsection