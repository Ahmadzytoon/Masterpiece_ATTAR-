@extends('admin.layout.master')

@section('title')
Activity_Create
@endsection

@section('css')
   
@endsection
@section('CategoryCreate')
active
@endsection
@section('title_page1')
Create
@endsection
@section('title_page2')
category
@endsection

@section('title_div')
Add category
@endsection
@section('content')
<div class="container m-aut">
<div class="">
          {{-- <div class="card-header">
            <h3 class="card-title">Add Activity</h3>
          </div> --}}
    <!-- /.card-header -->
    <!-- form start -->
          <form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data" >
            {{-- @method('PATCH') --}}
          @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name_category" class="form-control" id="" placeholder="">
              </div>

            
              <div class="form-group">
                  <label for="exampleInputPassword1">Description</label>
                  <input type="text" name="description" class="form-control" id="" placeholder="">
                </div>
              {{-- <div class="form-group">
                <label >Image</label>
                <input type="file"  name="image"> --}}

                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                    <label class="custom-file-label" for="exampleInputFile">Choose file Image</label>
                  </div>
                </div>
              </div>



                </div>
            </div>
            
            <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
          </form>

    </div>
  <div>
 
@endsection
@section('scripts')
@endsection