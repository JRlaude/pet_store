@extends('layouts.adminlte')

@section('title', 'Orders | ')

@section('pluginscss')
@include('layouts.plugins.datatables.css')
@endsection

@section('css')

@endsection

@section('content_header')
Orders
@endsection

@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="orders-table" class="table table-sm table-hover table-head-fixed">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Address</th>
                            <th>Status</th> 
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr> 
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->getName() }}</td>
                            <td>{{ $order->shipping_address }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->updated_at }}</td>
                            <td>
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-primary">View</a>
                                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
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
    $("#orders-table").DataTable({
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
    }).buttons().container().appendTo('#orders-table_wrapper .col-md-6:eq(0)');

  });
</script>
@endsection