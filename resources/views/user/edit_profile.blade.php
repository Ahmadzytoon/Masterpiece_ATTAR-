



   @extends('userLayout.master')

@section('title')
   profile
@endsection
@section('css')  
<link rel="stylesheet" href="{{asset('./css/edit_profile.css')}}">

@endsection
@section('script')

@endsection


{{--============= contant ===============--}}
@section('contant')
<div class="box">
  <div class="breadcumb">
      <a href={{route('user.index')}}>الصفحة الرئيسية</a>
      <span><i class='bx bxs-chevrons-left text-green'></i></span>
      <a href={{route('user.profile.index')}}>الصفحة الشخصية</a>
      <span><i class='bx bxs-chevrons-left text-green'></i></span>
      <a href="./products.html">تعديل معلوماتي</a>
  </div>
</div>
<div class="container_form">

    

  <form action="{{route('user.profile.update',$data[0]->id)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
      <div class="col-25">
        <label for="fname">الأسم الكامل</label>
      </div>
      <div class="col-75">
        <input type="text" name="name" value="{{$data[0]->name}}" class="@error('name') is-invalid @enderror" >
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
       @enderror
      </div>
    </div>


    <div class="row">
      <div class="col-25">
        <label for="lname">رقم الهاتف</label>
      </div>
      <div class="col-75">
        <input type="number"   value="{{$data[0]->phone}}" name="phone"  class="@error('phone') is-invalid @enderror" >
        @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
       @enderror
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="lname">البريد الألكتروني</label>
      </div>
      <div class="col-75">
        <input type="email"   value="{{$data[0]->email}}" name="email"  class="@error('email') is-invalid @enderror" >
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
       @enderror
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="lname"> الصورة الشخصية</label>
      </div>
      <div class="col-75">
        <input type="file"   name="update_image">
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
       @enderror
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname"> كلمة السر</label>
      </div>
      <div class="col-75">
        <input type="text"   value="{{$data[0]->password}}" name="password"  class="@error('password') is-invalid @enderror">
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
       @enderror
      </div>
    </div>


    <div class="rowsubmit">
      <input type="submit" value="تأكيد">
    </div>
    
  </form>
  
</div>
@endsection
  