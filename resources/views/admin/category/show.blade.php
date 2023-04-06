@extends('admin.layout.master')

@section('title')
Category
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}
">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}
">

@endsection
@section('CategoryShow')
active
@endsection
@section('title_page1')
Table
@endsection
@section('title_page2')
Category
@endsection

@section('title_div')
Category Table
@endsection
@section('content')

 <!-- /.row -->
 <div class="row container m-aut">
    <div class="col-12">
      <div class="card">
        {{-- <div class="card-header">
          <h3 class="card-title">Activity Table</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div> --}}
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
          <table class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>

                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $value)
                <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->name_category}}</td>
                    <td>{{$value->description	}}</td>
                    <td><img src="{{URL::asset("storage/image/".$value->image)}}" alt="" style="width: 75px ;    height: 75px"></td>
                
                    
                    <td>
                      <a href="{{Route('admin.category.edit',$value->id)}}">
                        <button type="button" class="btn btn-block bg-gradient-success btn-sm">Edit</button>
                      </a>
                    </td>
                    <td>
                        <form action="{{Route('admin.category.destroy',$value->id)}}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-block bg-gradient-danger btn-sm">Delete</button>
                        </form>
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


@section('scripts')

<script type="text/javascript" src="{{URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>


@endsection
