@extends('userLayout.master')

@section('title')
Checkout
@endsection
@section('css')  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('./css/checkout.css')}}">
@endsection
@section('script')

@endsection


{{--============= contant ===============--}}
@section('contant')
<div class="rowCheckout" style="margin: 30px;margin-top:50px">
  <div class="col-75">
    <div class="containerCheckout">
      <form action="{{route('user.checkout.store')}}" method="post">
        @csrf
        <div class="row">
          <div class="col-50">
            <h3>عنوان الشحن</h3>
            <label for="fname"><i class="fa fa-user"></i> الأسم الكامل</label>
            <input type="text" id="fname" name="name_contact" placeholder="الأسم" value="{{ old('name_contact')}}" class="@error('name_contact') is-invalid @enderror">
            @error('name_contact')
            <div class="error">{{ $message }}</div>
           @enderror
            <label for="email"><i class="fa fa-envelope"></i> البريد الالكتروني</label>
            <input type="text" id="email" name="email" placeholder="ahmad@example.com" value="{{ old('email')}}" class="@error('email') is-invalid @enderror">
            @error('email')
            <div class="error">{{ $message }}</div>
           @enderror
            <label for="phone"><i class="fa fa-phone"></i> رقم الهاتف</label>
            <input type="text" id="phone" name="phone" placeholder="+962 777777" value="{{ old('phone')}}" class="@error('phone') is-invalid @enderror">
            @error('phone')
            <div class="error">{{ $message }}</div>
           @enderror
            <label for="city"><i class="fa fa-institution"></i>  أسم المدينة </label>
            <input type="text" id="city" name="city" placeholder="عمان" value="{{ old('city')}}" class="@error('city') is-invalid @enderror">
            @error('city')
            <div class="error">{{ $message }}</div>
           @enderror
            <label for="adr"><i class="fa fa-address-card-o"></i> الموقع</label>
            <input type="text" id="adr" name="address" placeholder="المنطقة,أسم الشارع,رقم البناية" value="{{ old('address')}}" class="@error('address') is-invalid @enderror">
            @error('address')
            <div class="error">{{ $message }}</div>
           @enderror
            

            <div class="rowCheckout">
            
              <div class="col-50">
                <label for="zipcode">Zip</label>
                <input type="text" id="zipcode" name="zipcode" placeholder="10001" value="{{ old('zipcode')}}" class="@error('zipcode') is-invalid @enderror">
                @error('zipcode')
                <div class="error">{{ $message }}</div>
               @enderror
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="" value="{{ old('cardname')}}" class="@error('cardname') is-invalid @enderror">
            @error('cardname')
            <div class="error">{{ $message }}</div>
           @enderror
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" value="{{ old('cardnumber')}}" class="@error('cardnumber') is-invalid @enderror">
            @error('cardnumber')
            <div class="error">{{ $message }}</div>
           @enderror
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="02" value="{{ old('expmonth')}}" class="@error('expmonth') is-invalid @enderror">
            @error('expmonth')
            <div class="error">{{ $message }}</div>
           @enderror

            <div class="rowCheckout">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2023" value="{{ old('expyear')}}" class="@error('expyear') is-invalid @enderror">
                @error('expyear')
                <div class="error">{{ $message }}</div>
               @enderror
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352" value="{{ old('cvv')}}" class="@error('cvv') is-invalid @enderror">
                @error('cvv')
                <div class="error">{{ $message }}</div>
               @enderror
              </div>
            </div>
          </div>

        </div>
      
        <input type="submit" value="اتمام عملية الدفع" class="btn">
      </form>
    </div>
  </div>

  <div class="col-25">
    <div class="containerCheckout">
      <h4>السلة
        <span class="price" style="color:black">
          <i class="fa fa-shopping-cart"></i>
          <b>{{count(session('cart'))}}</b>
        </span>
      </h4>

<?php   $cart = session()->get('cart'); ?>
{{-- {{dd($cart)}} --}}
      <p><a href="#">المجموع </a> <span class="price"> {{session('total_price')}}دينار اردني </span></p>
      <p><a href="#">الضريبة </a> <span class="price">0.00 دينار أردني</span></p>

      <hr>
      <p>المجموع النهائي<span class="price" style="color:black"><b>{{session('total_price')}}دينار اردني  </b></span></p>
    </div>
  </div>
</div>
@endsection
  