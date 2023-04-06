@extends('admin.layout.master')

@section('title')
Product_edite
@endsection

@section('css')
   
@endsection
@section('productsShow')
active
@endsection
@section('title_page1')
Edite
@endsection
@section('title_page2')
Product
@endsection
@section('title_div')
Edit Product
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
              

      <form action="{{Route('admin.products.update',$data->id)}}" method="POST" files=true enctype="multipart/form-data" >
        {{-- @method('PATCH') --}}
        @method('PUT')

                @csrf
            <div class="card-body">

              <div class="form-group">
                <label for="exampleSelectRounded0">Category <code></code></label>
                <select class="custom-select rounded-0" id="exampleSelectRounded0" name="category_id"   class="@error('category_id') is-invalid @enderror">
                    @foreach($category as $value)
                        <option value="{{$value->id}}">{{$value->name_category}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
               @enderror
              </div>
            

                <div class="form-group">
                  <label for="exampleInputPassword1">unit</label>
                        <select class="custom-select rounded-0" id="exampleSelectRounded0" name="unit">
                                <option value="retail">retail</option>
                                <option value="weight">weight</option>
                        </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" name="namepro" class="form-control" id="" placeholder="" value="{{$data->namepro}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="number" name="price" class="form-control" id="" placeholder="" value="{{$data->price}}">
                  </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Short description</label>
                  <input type="text" name="short_description" class="form-control" id="" placeholder="" value="{{$data->short_description}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Long description</label>
                    <input type="text" name="long_description" class="form-control" id="" placeholder="" value="{{$data->long_description}}">
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