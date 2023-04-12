@extends('admin.layout.master')

@section('title')
Post_edite
@endsection

@section('css')
   
@endsection
@section('Show_posts')
active
@endsection
@section('title_page1')
Edite
@endsection
@section('title_page2')
Post
@endsection
@section('title_div')
Edit Post
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
              

      <form action="{{Route('admin.blog_Admin.update',$data->id)}}" method="POST" files=true enctype="multipart/form-data" >
        {{-- @method('PATCH') --}}
            @method('PUT')

                @csrf
            <div class="card-body">

        
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" name="title" class="form-control" id="" placeholder="" value="{{$data->title}}">
                </div>
            
                <div class="form-group">
                  <label for="exampleInputPassword1">Short description</label>
                  <textarea rows="3" name="short_description" class="form-control" id="" placeholder="" >{{$data->short_description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Long description</label>
                    <textarea rows="3" name="long_description" class="form-control" id="" placeholder="" >{{$data->long_description}}</textarea>
                  </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                      <label class="custom-file-label" for="exampleInputFile">Choose file image</label>
                    </div>
                  </div>
                  </div>
             </div>
            
        <div>

        <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
      </form>
      {{-- @endforeach   --}}
    </div>
    <div>
@endsection


@section('scripts')
@endsection