@extends('userLayout.master')

@section('title')
Attarjo

@endsection
@section('css')  

<style>

  .regester{
      background-color:  #F2F0EF;
      padding: 60px 175px;
  }
  .container-reg {
      background-color: white;
      height: 100%;
      border-radius: 10px;
  
  }
  .container-reg p,label {
      color: #000000;
      font-size: 18px;
  }
  .container-reg label {
      font-weight: bold;
     
  }
  .container-reg h2 {
      color:#5d9604;
      font-size: 2.5em;
      font-weight: 700;
      text-align: center;
      padding-top: 30px;
      
   
  }
  
  .container-reg a {
     text-decoration: none;
     color: var(--gold);
     margin-right: 5px;
     font-size: 15px;
  
   
  }
  .container-reg a:hover {
     color: #FF0000;
   
  }
  .container-reg form{
      display: flex;
      flex-direction: column;
      justify-content: start;
      align-items: center;
      padding-top: 50px;
      /* gap: 6px; */
      margin: 0;
      padding-bottom: 50px;
    
      
  }
  .container-reg form input[type=email],input[type=password],input[type=text],input[type=number] {
      width: 50%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-top: 6px;
      margin-bottom: 16px;
    }
  .container-reg form button{
      width: 50%;
      padding: 12px;
      background-color: #5d9604;
  font-size: 18px;
      color: white;
      font-weight: 700;
      border: none;
      cursor: pointer;
      border-radius: 4px;
  
  
  }
  .container-reg form button:hover{
      background-color: var(--gold);
      color: #5d9604;
      transition: all 0.5s;
  }
  @media (max-width:750px){
      section{
          background-color:  #F2F0EF;
          padding: 50px 75px;
      
      }
  }
  @media (max-width:500px){
      .regester{
          background-color:  #F2F0EF;
          padding: 10px 20px;
      
      }
      .container-reg form input[type=email],input[type=password],input[type=text],input[type=number] {
          width: 90%;
      }
      .container-reg h2 {
          font-size: 2em;
          padding-left: 25px;
          padding-top: 15px;

      }
      
  }
      </style>
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
            <label for="">الايميل</label>
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
  