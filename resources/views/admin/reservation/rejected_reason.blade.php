@extends('admin.layout.master')

@section('title')
Reservation
@endsection

@section('css')
   
@endsection

@section('title_page1')
Add rejected reason
@endsection
@section('title_page2')
Reservation
@endsection
@section('title_div')
Add rejected reason
@endsection

@section('content')
<!-- /.row -->
<div class="row container m-aut">
  <div class="col-9">
      {{-- <div class="card-header">
        <h3 class="card-title">Add Activity</h3>
      </div> --}}
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{Route('reservation.store')}}" method="POST" >
        {{-- @method('PATCH') --}}
        @method('GET')

                @csrf

            <div class="card-body">
            
                <div class="form-group">
                    <input type="hidden" name="id_rejected" class="form-control" id="" placeholder="" value="{{$id}}">

                  <label for="exampleInputPassword1">Add Rejected Reason</label>
                  <input type="text" name="rejected_reason" class="form-control" id="" placeholder="" value="">
                </div>
               
        <div>
        
        
        <!-- /.card-body -->
  
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Rejected</button>
            </div>
      </form>
    </div>
    <div>
@endsection


@section('scripts')
@endsection