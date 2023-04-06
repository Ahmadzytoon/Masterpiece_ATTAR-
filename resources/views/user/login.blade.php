@extends('userLayout.master')

@section('title')
Attarjo

@endsection
@section('css')  
<style>

  .login{
      background-color:  #F2F0EF;
      height: 90vh;
      padding: 40px 274px;
  
  }
  .container-login {
      background-color: white;
      height: 100%;
      border-radius: 10px;
      max-width: 600px;
      display: block;
      margin: auto;
  }
  
  
  .container-login p,label {
      color: black;
      font-size: 20px;
  }
  .container-login label {
      font-weight: bold;
     
  }
  .container-login h2 {
      color: #5d9604;
      font-size: 2.5em;
      font-weight: 700;
      text-align: center;
      padding-top: 30px;
   
  }
  .container-login a {
     text-decoration: none;
     color: var(--gold);
  margin-right: 5px ;
   
  }
  .container-login a:hover {
     color: #FF0000;
   
  }
  .container-login form{
      display: flex;
      flex-direction: column;
      justify-content: start;
      align-items: center;
      padding-top: 50px;
      gap: 6px;
    
      
  }
  .container-login form input[type=email],input[type=password] {
      width: 60%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-top: 6px;
      margin-bottom: 16px;
    }
  .container-login form button{
      width: 60%;
      padding: 12px;
      background-color: #5d9604;
  font-size: 18px;
      color: white;
      font-weight: 700;
      border: none;
      cursor: pointer;
      border-radius: 4px;
  
  
  }
  .container-login form button:hover{
      background-color: var(--gold);
      color: #5d9604;
  
      transition: all 0.5s;
  }
  
  @media (max-width:750px){
      .container-login form input[type=email],input[type=password],input[type=text],input[type=number] {
          width: 85%;
      }
      .login{
          background-color:  #F2F0EF;
          padding: 50px 75px;
      
      }
  }
  @media (max-width:500px){
      .login{
          background-color:  #F2F0EF;
          padding: 10px 20px;
      
      }
      .container-login h2 {
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

<section class="login">
  <div class="container-login">
  <h2>تسجيل الدخول</h2>
  <form action="{{route('user.login.check')}}">
      <label for="">الايميل</label>
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
  