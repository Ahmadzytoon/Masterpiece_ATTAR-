@extends('admin.layout.master')

@section('title')
Admin
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href=".{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('title_page1')
add_admin
@endsection
@section('title_page2')
admin
@endsection


@section('content')
<div class="row container m-auto">
  <div class="col-12">
      <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Add Admin</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          {{-- <form action="{{route('admin.users.store')}}" method="POST" enctype="multipart/form-data"> --}}
          <form action="{{route('admin.addadmin.store')}}" method="POST" enctype="multipart/form-data">
              @method('POST')
              @csrf

            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter name" value="{{ old('name')}}" class="@error('name') is-invalid @enderror">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
               @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail11">Email</label>
                <input type="text" class="form-control" id="exampleInputEmail11" name="email" placeholder="Enter Long description" value="{{ old('email')}}" class="@error('email') is-invalid @enderror">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
               @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputEmail11">Phone Number</label>
                <input type="number" class="form-control" id="exampleInputEmail11" name="phone" placeholder="Enter Long description" value="{{ old('phone')}}" class="@error('phone') is-invalid @enderror">
                @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
               @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="password" placeholder="Enter guest number" value="{{ old('password')}}" class="@error('password') is-invalid @enderror">
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
               @enderror
              </div>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                  <label class="custom-file-label" for="exampleInputFile">Choose file Image</label>
                </div>
              </div>
              {{-- <div class="form-group">
                  <label for="exampleSelectRounded0">Is Admin <code></code></label>
                  <select class="custom-select rounded-0" id="exampleSelectRounded0" name="select">
                    <option value="0">User</option>
                    <option value="1">Admin</option>
                  </select>
                </div> --}}
              {{-- <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                  <div class="custom-file">
                      <input id="trip_image" type="file" name="trip_image" placeholder="Upload Image" value="{{ old('trip_image')}}" class="@error('movie_image') is-invalid @enderror"><br><br>


                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
              </div> --}}


            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
  </div>
</div>
</div>
<!-- /.row -->
@endsection


@section('scripts')
<script src="{{URL::asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src=".{{URL::asset('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

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