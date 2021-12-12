@extends('layouts.adminlte')

@section('title', 'Pet | ')

@section('pluginscss')
@include('layouts.plugins.datatables.css')

@endsection

@section('css')

@endsection

<!-- @ section('content_header')
pets
@ endsection -->

@section('content')


<div class="row">
  <div class="col-12">
    <div class="card card-primary card-outline">

      <div class="card-header">
        <h3 class="card-title">Pets</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm">
            <a href="{{route('pets.create')}}" class="btn btn-sm  btn-primary float-right"> <i class="fas fa-plus-circle"></i> Add pet</a>

            <div class="input-group-append">
              <a href="{{route('pet_categories.create')}}" class="btn btn-sm  btn-primary float-right"> <i class="fas fa-plus-circle"></i> Add Category</a>

            </div>
          </div>
        </div>


      </div>

      <!-- /.card-header -->
      <div class="card-body">
        <table id="pets-table" class="table table-sm table-hover table-head-fixed ">
          <thead>
            <tr>
              <th>Category</th>
              <th>Pet name</th>
              <th>Description</th>
              <th>Price</th>
              <th>Image</th>
              <!-- <th></th> -->
              <th>created at</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($pets as $pet)
            <tr>
              <td>{{ $pet->pet_category->name }}</td>
              <td>{{ $pet->name }}</td>
              <td>{{$pet->description}}</td>
              <td>{{$pet->price}}</td>
              <td>{{$pet->image}}</td>
              <!-- <td> </td> -->
              <td>{{ $pet->created_at->diffForHumans() }}</td>
              <td>
                <a title="View" href="{{route('pets.show', $pet->id)}}"><i class="fas fa-folder text-info"></i></a>
                <a title="Edit" href="{{route('pets.edit', $pet->id)}}"><i class="fas fa-edit text-secondary"></i></a>
                <a title="Delete" href="#!"><i class="fas fa-trash text-danger" data-toggle="modal" data-target="#modal-danger{{$pet->id}}"></i></a>
              </td>
            </tr>
            <div class="modal fade" id="modal-danger{{$pet->id}}">
              <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                  <div class="modal-header bg-danger">
                    <h4 class="modal-title">Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to delete <b> {{ $pet->name }}</b></p>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <form action="{{route('pets.destroy',$pet->id)}}" method="POST">
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
    $("#pets-table").DataTable({
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
    }).buttons().container().appendTo('#pets-table_wrapper .col-md-6:eq(0)');

  });
</script>
@endsection