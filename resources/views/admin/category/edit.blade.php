@extends('admin.layout.master')

@section('title')
category_edite
@endsection

@section('css')
   
@endsection
@section('CategoryShow')
active
@endsection
@section('title_page1')
Edite
@endsection
@section('title_page2')
category
@endsection
@section('title_div')
Edit category
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
      <form action="{{route('admin.category.update',$data->id)}}" method="POST" files=true enctype="multipart/form-data" >
        {{-- @method('PATCH') --}}
        @method('PUT')

                @csrf

            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" name="name_category" class="form-control" id="" placeholder="" value="{{$data->name_category}}">
                </div>
          
                <div class="form-group">
                  <label for="exampleInputPassword1">Description</label>
                  <input type="text" name="description" class="form-control" id="" placeholder="" value="{{$data->description}}">
                </div>
  
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file"  name="image">
        
                  {{-- <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile" name="activity_image1">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                  </div> --}}
             </div>
            

                  {{-- <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile" name="activity_image2">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                  
                  </div> --}}
        <div>
        
        
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