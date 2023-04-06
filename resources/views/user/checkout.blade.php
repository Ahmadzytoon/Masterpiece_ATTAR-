@extends('userLayout.master')

@section('title')
Checkout
@endsection
@section('css')  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
      .error{
  color: red;
  font-size: 15px;
  margin-top: -1px;
}

.rowCheckout {
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  /* margin: 0 -16px; */
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.containerCheckout {
  background: linear-gradient(to right,#60a52c00,rgb(241 211 43));    padding: 22px 25px 20px 27px;
    border: 1px solid lightgrey;
    border-radius: 5px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color:#5d9604;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #5e960488;
}

span.price {
  float: right;
    margin-left: 33px;
    color: #378158;;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .rowCheckout {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}

</style>
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
          <b>4</b>
        </span>
      </h4>


      <p><a href="#">المنتج </a> <span class="price">10 دينار أردني</span></p>
      <p><a href="#">المنتج </a> <span class="price">20 دينار أردني</span></p>
      <p><a href="#">المنتج </a> <span class="price">13 دينار أردني</span></p>
      <p><a href="#">المنتج </a> <span class="price">7 دينار أردني</span></p>
      <p><a href="#">المنتج </a> <span class="price">10 دينار أردني</span></p>

      <hr>
      <p>المجموع <span class="price" style="color:black"><b> {{session('total_price')}}دينار اردني  </b></span></p>
    </div>
  </div>
</div>
@endsection
  