@extends('admin.layout.master')

@section('title')
reservation
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}
">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}
">

@endsection
@section('ActivityShow')
active
@endsection
@section('title_page1')
Table
@endsection
@section('title_page2')
Reservation

@endsection
@section('title_div')
Reservation
@endsection

@section('content')

 <!-- /.row -->
 <div class="row container m-auto">
  <div class="col-12">
    <div class="card">
      {{-- <div class="card-header">
        <h3 class="card-title"></h3>

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
              {{-- <th>last_name</th> --}}
              <th>Phone</th>
              <th>Email</th>
              <th>Date</th>
              <th>time</th>
              <th>NO.Guest</th>
              <th>Price</th>
              <th>Status</th>
              <th>rejected reason</th>
              <th>Activity</th>
              <th>User Name</th>
              <th>Accept</th>
              <th>Rejected</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($data as $value)

              <tr>
                  <td>{{$value['id']}}</td>
                  <td>{{$value['first_name'].$value['last_name']}}</td>
                  <td>{{$value['phoneNumber']	}}</td>
                  <td>{{$value['email']	}}</td>
                  <td>{{$value['time']	}}:00</td>
                  <td>{{$value['time']}}</td>
                  <td>{{$value['number_of_guest']	}}</td>
                  <td>{{$value['price']	}}</td>
                  @if ($value['status']=="Pending")
                  <td><span class="badge bg-warning">Pending</span></td>
                  @endif

                  @if ($value['status']	=="Accepted")
                  <td><span class="badge bg-success">Accepted</span></td>

                  @endif     
                  @if ($value['status']	=="Rejected")
                  <td><span class="badge bg-danger">Rejected</span></td>

                  @endif

                  <td>{{$value['rejected_reason']}}</td>
                  <td>{{$value['activity']}}</td>
                  <td>{{$value['user']}}</td>

                  <td>
                      <form action="{{Route('admin.reservation.update',$value['id'])}}" method="POST">
                          @method('PUT')
                          {{-- Pending --}}
                          @csrf
                          <button type="submit" class="btn btn-block  bg-success btn-sm">Accept</button>
                      </form>
                  </td>
              
                <td>
                <form action="{{Route('reservation.rejected',$value['id'])}}" method="POST">
                  @method('GET')
                  {{-- Pending --}}
                  @csrf
                  <button type="submit" class="btn btn-block bg-gradient-danger btn-sm">Rejected</button>
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
