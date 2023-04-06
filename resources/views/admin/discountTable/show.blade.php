@extends('admin.layout.master')


@section('title')
Discount
@endsection

@section('section_title')
Discount Table
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href=".{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('discount')
active
@endsection

@section('title_page1')
admin
@endsection

@section('title_page2')
Discount
@endsection


@section('content')
 <!-- /.row -->

 <div class="row container-fluid m-auto">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Discount controls</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 130px;">


         <a href="{{route('admin.discount.create')}}"><button type="button" class="btn btn-block bg-gradient-primary btn-sm">Add new discount</button></a>



              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" >

          <table class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th style="text-align: center">#</th>
                <th style="text-align: center">Category name</th>
                <th style="text-align: center">Discount percentage % </th>
                <th style="text-align: center">edit</th>
                <th style="text-align: center">delete</th>
              </tr>
            </thead>
            <tbody>
               @foreach ($category as $value)
@if($value->discount > 0)
                <tr>
                    <td style="text-align: center">{{$value->id}}</td>
                    <td style="text-align: center">{{$value->name_category}}</td>
                    <td style="text-align: center">{{$value->discount}} %</td>



                    <td style="text-align: center"><a href="{{Route('admin.category_discount.edit',$value->id)}}"><button type="button" class="btn btn-block bg-gradient-success btn-sm">Edit</button>
                    </a></td>
                    <td style="text-align: center">

                        <form action="{{Route('admin.category_discount.destroy',$value->id)}}" method="post">
                            @method('delete')
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-block  bg-gradient-danger  show_confirm"  data-toggle="tooltip" title='Delete'>Delete</button>
                    </form>
                    </td>

                </tr>
@endif
                @endforeach

              {{-- </tr> <tr>
                <td>183</td>
                <td>John Doe</td>
                <td>11-7-2014</td>
                <td><span class="tag tag-success">Approved</span></td>
                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                <td>
                    <button href="" type="button" class="btn btn-block bg-gradient-success btn-sm">Edit</button>
                  </td>
                <td>
                    <button href="" type="button" class="btn btn-block bg-gradient-danger btn-sm">Delete</button>
                </td> --}}

            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0 mt-5" >
          <table class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th style="text-align: center">#</th>
                <th style="text-align: center">Produc name</th>
                <th style="text-align: center">Old price </th>
                <th style="text-align: center">Discount percentage % </th>
                <th style="text-align: center">New price</th>
                <th style="text-align: center">edit</th>
                <th style="text-align: center">delete</th>
              </tr>
            </thead>
            <tbody>
               @foreach ($products as $value)
               @if($value->discount > 0)

                <tr>
                    <td style="text-align: center">{{$value->id}}</td>
                    <td style="text-align: center">{{$value->namepro}}</td>
                    <td style="text-align: center">{{$value->price}}</td>
                    <td style="text-align: center">{{$value->discount}}</td>
                    <td style="text-align: center">{{$value->price_discount}}</td>
                    {{-- <td style="text-align: center">{{$value->price * (1 - $value->discount / 100) }}</td> --}}



                    <td style="text-align: center"><a href="{{Route('admin.product_discount.edit',$value->id)}}"><button type="button" class="btn btn-block bg-gradient-success btn-sm">Edit</button>
                    </a></td>
                    <td style="text-align: center">

                        <form action="{{Route('admin.product_discount.destroy',$value->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-block  bg-gradient-danger  show_confirm"  data-toggle="tooltip" title='Delete'>Delete</button>
                    </form>
                    </td>

                </tr>

                @endif

                @endforeach

              {{-- </tr> <tr>
                <td>183</td>
                <td>John Doe</td>
                <td>11-7-2014</td>
                <td><span class="tag tag-success">Approved</span></td>
                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                <td>
                    <button href="" type="button" class="btn btn-block bg-gradient-success btn-sm">Edit</button>
                  </td>
                <td>
                    <button href="" type="button" class="btn btn-block bg-gradient-danger btn-sm">Delete</button>
                </td> --}}

            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->
@endsection

@section('script')
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

      {{-- sweet alert --}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
      <script type="text/javascript">

           $('.show_confirm').click(function(event) {
                var form =  $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    form.submit();
                  }
                });
            });

      </script>
@endsection
