@extends('userLayout.master')

@section('title')
   تواصل معنا
@endsection
@section('css')  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<link rel="stylesheet" href="{{asset('./css/contact.css')}}">
@endsection
@section('script')

@endsection


{{--============= contant ===============--}}
@section('contant')
<section id="landpage">
  <h1> تواصل معنا</h1>
</section>
</div>
<section class="contact_section">

<div class="contact_body">
  <h2> نحن هنا لمساعدتك</h2>
          
      <div class="contact_info">
          <div>
              <span><i class="fa-solid fa-phone"></i></span>
              <span> رقم الهاتف.</span>
              <span class="text"> +962 796781246</span>
          </div>

          <div>
              <span><i class="fa-solid fa-at"></i></span>
              <span>  البريد الألكتروني </span>
              <span class="text"> ATTAR JO@gmail.com</span>
          </div>

          <div>
              <span><i class="fa-solid fa-location-dot"></i></span>
              <span> موقعنا </span>
              <span class="text"> الأردن </span>
          </div>

      </div>


      <div class="contact_form">
          <form action="{{route('user.contact.store')}}" method="post">
            @csrf
              <div>
              <input type="text"  class="form_control" name="name" id="name" placeholder="الأسم" required>
          </div>

          <div>
              <input type="email" class="form_control" name="email" id="email" placeholder="البريد الالكتروني" required>
              <input type="text" class="form_control" name="phoneNumber" id="phoneNumber" placeholder="رقم الهاتف" required>
          </div>
          <input type="text" class="form_control" name="subject" id="subject" placeholder="الموضوع  "required>

          <textarea class="form_control" name="message" id="message" cols="30" rows="5" placeholder="الرسالة"></textarea>
          <input type="submit" class="send_btn" value="ارسال الرسالة">
          </form>

          <div>
              <img src="https://www.metropolisindia.com/newdata/images/contact-us.svg" alt="contact us">
          </div>

      </div>
  </div>

 

</section>

<!-- Scroll to top -->
{{-- <span class="up"> <i class="fa-solid fa-up-long"></i></span> --}}
<!-- Scroll to top -->


@endsection
  