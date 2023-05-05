@extends('userLayout.master')

@section('title')
Attarjo

@endsection
@section('css')  
<link rel="stylesheet"href="{{asset('./css/regester.css')}}">

@endsection
@section('script')

@endsection


{{--============= contant ===============--}}
@section('contant')

<section class="regester">
  <div class="container-reg">
  <h2> انشاء حساب</h2>
  <form action="{{route('user.signup.store')}}" method="POST">
    @csrf
            <label for="">الأسم الكامل</label>
            <input type="text" placeholder="أدخل أسمك الكامل" name="name" value="{{ old('name')}}" class="@error('name') is-invalid @enderror">
            @error('name')
            <div class="error">{{ $message }}</div>
          @enderror

            <label for="">رقم الهاتف</label>
            <input type="number" placeholder="أدخل رقم العاتف" name="phone" value="{{ old('phone')}}" class="@error('phone') is-invalid @enderror">
            @error('phone')
            <div class="error">{{ $message }}</div>
          @enderror
            <label for="">البريد الالكتروني</label>
            <input type="email" placeholder="أدخل بريدك الالكتروني" name="email" value="{{ old('email')}}" class="@error('email') is-invalid @enderror">
            @error('email')
            <div class="error">{{ $message }}</div>
          @enderror
            <label for="">كلمة السر</label>
            <input type="password" placeholder="أدخل كلمة المرور" name="password" value="{{ old('password')}}" class="@error('password') is-invalid @enderror">
            @error('password')
            <div class="error">{{ $message }}</div>
          @enderror
            {{-- <label for="">اعادة كلمة السر</label>
            <input type="password" name="Password"> --}}
            <button type="submit">تسجيل</button>
            <p>هل تملك حساب بالفعل؟<a href={{route('user.login')}} >تسجيل دخول</a></p>
  </form>
  </div>
  
  
  </section>


@endsection
  