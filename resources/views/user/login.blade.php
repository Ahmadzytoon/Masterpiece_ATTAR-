@extends('userLayout.master')

@section('title')
Attarjo

@endsection
@section('css')  
<link rel="stylesheet" href="{{asset('./css/login.css')}}">

@endsection
@section('script')

@endsection


{{--============= contant ===============--}}
@section('contant')

<section class="login">
  <div class="container-login">
  <h2>تسجيل الدخول</h2>
  <form action="{{route('user.login.check')}}">
      <label for="">البريد الالكتروني</label>
      <input type="email" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email')}}">
      @error('email')
        <div class="error">{{ $message }}</div>
        @enderror
        
        
        <label for="">كلمة المرور</label>
        <input type="password" name="password" class="@error('password') is-invalid @enderror" value="{{ old('password')}}">
        @error('password')
        <div class="error">{{ $message }}</div>
       @enderror


      <p>هل نسيت كلمة السر؟</p>
      <button type="submit">تسجيل دخول</button>
      <p>لا تملك حساب ؟<a href={{route('user.signup.index')}} >تسجيل جديد</a></p>
  </form>
  </div>
  
  
  </section>

@endsection
  