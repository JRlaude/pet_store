@extends('layouts.adminlte')

@section('title', 'Reservation | ')

@section('pluginscss')
@include('layouts.plugins.datatables.css')

@endsection

@section('css')

@endsection

<!-- @ section('content_header')
Reservations
@ endsection -->

@section('content')


<div class="row">
  <div class="col-12">
    <div class="card card-primary card-outline">

      <div class="card-header">
        <h3 class="card-title">Reservations</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm">
            <a href="{{route('reservations.create')}}" class="btn btn-sm  btn-primary float-right"> <i class="fas fa-plus-circle"></i> Add Reservation</a>

            <div class="input-group-append">
              <a href="{{route('category.create')}}" class="btn btn-sm  btn-primary float-right"> <i class="fas fa-plus-circle"></i> Add Category</a>

            </div>
          </div>
        </div>


      </div>

      <!-- /.card-header -->
      <div class="card-body">
        <table id="reservations-table" class="table table-sm table-hover table-head-fixed ">
          <thead>
            <tr>
              <th>Customer Name</th>
              <th>Image</th>
              <th>Pet</th>
              <!-- <th></th> -->
              <th>created at</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($reservations as $reservation)
            <tr>
              <td>{{$reservation->user->getName() }}</td>
              <td></td>
              <td>{{$reservation->pet->name }}</td>  

              <!-- <td> </td> -->
              <td>{{ $reservation->created_at->diffForHumans() }}</td>
              <td>
                <a title="View" href="{{route('reservations.show', $reservation->id)}}"><i class="fas fa-folder text-info"></i></a>
                <a title="Edit" href="{{route('reservations.edit', $reservation->id)}}"><i class="fas fa-edit text-secondary"></i></a>
                <a title="Delete" href="#!"><i class="fas fa-trash text-danger" data-toggle="modal" data-target="#modal-danger{{$reservation->id}}"></i></a>
              </td>
            </tr>
            <div class="modal fade" id="modal-danger{{$reservation->id}}">
              <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                  <div class="modal-header bg-danger">
                    <h4 class="modal-title">Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to delete <b> {{ $reservation->name }}</b></p>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <form action="{{route('reservations.destroy',$reservation->id)}}" method="POST">
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
    $("#reservations-table").DataTable({
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
    }).buttons().container().appendTo('#reservations-table_wrapper .col-md-6:eq(0)');

  });
</script>
@endsection