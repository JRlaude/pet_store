@extends('layouts.adminlte')

@section('title', 'Product | ')

@section('pluginscss')
@include('layouts.plugins.datatables.css')
@endsection

@section('css')

@endsection

<!-- @ section('content_header')
Products
@ endsection -->

@section('content')


<div class="row">
  <div class="col-12">
    <div class="card card-primary card-outline">

      <div class="card-header">
        <h3 class="card-title">Products</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm">
            <a href="{{route('products.create')}}" class="btn btn-sm  btn-primary float-right"> <i class="fas fa-plus-circle"></i> Add Product</a>

            <div class="input-group-append">
            <a href="{{route('category.create')}}" class="btn btn-sm  btn-primary float-right"> <i class="fas fa-plus-circle"></i> Add Category</a>
 
            </div>
          </div>
        </div>


      </div>

      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-sm table-hover table-head-fixed ">
          <thead>
            <tr>
              <th>category</th>
              <th>Product Name</th>
              <th>Description</th>
              <th>Price</th>
              <th>Image</th>
              <!-- <th></th> -->
              <th>created at</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $product)
            <tr>
              <td>{{ $product->category->name }}</td>
              <td>{{ $product->name }}</td>
              <td>{{$product->description}}</td>
              <td>{{$product->price}}</td>
              <td>{{$product->img}}</td>
              <!-- <td> </td> -->
              <td>{{ $product->created_at->diffForHumans() }}</td>
              <td>
                <a title="View" href="{{route('products.show', $product->id)}}"><i class="fas fa-folder text-info"></i></a>
                <a title="Edit" href="{{route('products.edit', $product->id)}}"><i class="fas fa-edit text-secondary"></i></a>
                <a title="Delete" href="#!" ><i class="fas fa-trash text-danger" data-toggle="modal" data-target="#modal-danger{{$product->id}}"></i></a>
              </td>
            </tr>
            <div class="modal fade" id="modal-danger{{$product->id}}">
              <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                  <div class="modal-header bg-danger">
                    <h4 class="modal-title">Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to delete  <b> {{ $product->name }}</b></p>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <form action="{{route('products.destroy',$product->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" class="btn btn-danger"/>
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
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>
@endsection