@extends('userLayout.master')

@section('title')
   profile
@endsection
@section('css')  
<link rel="stylesheet"href="{{asset('./css/profile.css')}}">
<style>


  .failed-msg,
    .info-msg,
    .success-msg,
    .warning-msg,
    .error-msg {
      margin: 10px 0;
      padding: 9px;
      border-radius: 3px 3px 3px 3px;
      height: 47px;
    }
    
    .success-msg {
  
        color: #270;
        background-color: #DFF2BF;
        text-align: center;
        font-size: 18px;
    }
    .failed-msg{
  font-size: 18px;
        color: rgb(198, 53, 21);
        background-color: #fda6a6;
        text-align: center;
    
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

  </div>
</div>
@if(session()->get('success'))
                <div class="success-msg">
                    <i class="fa fa-check"></i>

                    {{ session()->get('success') }}
                </div>
            @endif
<div class="parent">
<div class="wrapper">
  <div class="left">
      <img src="{{URL::asset("storage/image/".auth()->user()->image)}}"
      alt="user" height="200px" width="200px">
      <h4>{{Auth::user()->name}}</h4>
       
  </div>
  <div class="right">
      <div class="info">
          <h3>المعلومات الشخصية</h3>
          <div class="info_data">
               <div class="data">
                  <h4>البريد الالكتروني</h4>
                  <p>{{Auth::user()->email}}</p>
               </div>
               <div class="data">
                 <h4>الهاتف</h4>
                  <p>{{Auth::user()->phone}}</p>
            </div>
          </div>
      </div>
    
    <div class="projects">
          <h3>طلباتي</h3>
          <div class="projects_data">
               <div class="data">
                  <h4>حالة اخر طلب</h4>
                  <p>pending</p>
               </div>
               <div class="data">
                 <h4>تاريح التسجيل على الموقع</h4>
                  <p>{{Auth::user()->created_at}}</p>
            </div>
          </div>
      </div>
    
      <div class="social_media">
          <ul>
            <li><a href="{{route('user.profile.edit',auth()->user()->id)}}">تعديل الملف الشخصي</li>
            <li><a href="{{route('user.profile.show',auth()->user()->id)}}">طلباتي</a></li>
        </ul>
    </div>
  </div>
</div>
</div>
@endsection
  