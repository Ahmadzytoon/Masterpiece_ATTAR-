



   @extends('userLayout.master')

@section('title')
   profile
@endsection
@section('css')  
<style>

  
  input {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
  }
  
  label {
    padding: 12px 12px 12px 0;
    display: inline-block;
    font-size: 18px;
    font-weight: 600;
    color: #5d9604
  }
  
  input[type=submit] {
    background: linear-gradient(#5d9604,#ddf705);
    color: white;
    padding: 8px 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: left;
    width: 145px;
    font-size: 24px;
}
  
  input[type=submit]:hover {
    background: linear-gradient(#5d9604,#5d9604);
  }
  .rowsubmit{
    margin-left: 9rem;
  }
  .container_form {
    display: flex;
    border-radius: 5px;
    /* background-color: rgb(255 7 7 / 17%); */
    padding: 18px;
    /* max-width: 80%; */
    flex-direction: column;
    
  }
  
  .col-25 {
    float: left;
    width: 17%;
    margin-top: 2px;
}
  
  .col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
  }
  
  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }
  
  /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
  @media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
      width: 100%;
      margin-top: 0;}
      .rowsubmit{
        margin-left: 0px;
  }
    
  }
  </style>
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
  