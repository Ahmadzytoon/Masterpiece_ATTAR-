@extends('userLayout.master')

@section('title')
   تواصل معنا
@endsection
@section('css')  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<style>
        
  #landpage {
width: 100%;
height: 60vh;
background-image: linear-gradient(rgba(9, 42, 9, 0.487), rgba(0, 0, 0, 0.529)),
url(https://burst.shopifycdn.com/photos/contact-us-flatlay.jpg?width=1200&format=pjpg&exif=1&iptc=1);
background-repeat: no-repeat;
background-position: center;
background-size: cover;
display: flex;
flex-direction: column;
justify-content: center;
align-items: center;
text-align: center;
color: white;
background-attachment: fixed;
}
#landpage h1{
  margin: 30px 0 20px 0;
  font-size: 55px;
  font-weight: 700;
  text-shadow: 2px 1px 5px black;
  text-transform: uppercase;
  color: #5d9604
}
.line div{
margin: 0 0.4rem;
}

.line div:nth-child(1),
.line div:nth-child(3) {
height: 4px;
width: 70px;
background: red;
border-radius: 5px;
}

.line {
display: flex;
align-items: center;
margin: 30px 0;

}

.line div:nth-child(2) {
width: 10px;
height: 10px;
background: red;
border-radius: 50%;
}

.text {
font-weight: 300;
opacity: 0.9;
}

.contact_bg .text {
margin: 1.6rem 0;
}

.contact_body {
max-width: 1320px;
margin: 0 auto;
padding: 0 1rem;
font-family: 'Open Sans', sans-serif;
}

.contact_body h2 {
font-size: 2rem;
text-transform: uppercase;
padding: 0.4rem 0;
letter-spacing: 4px;
font-weight: 600;
color: #5d9604;
margin: 30px 0;
text-align: center;
font-family: 'Open Sans', sans-serif;
}

.contact_body .line {
justify-content: center;
}

.contact_info {
margin: 2rem 0;
text-align: center;
padding: 2rem 0;
display: grid;
grid-template-columns: repeat(4 , 1fr);
font-family: 'Open Sans', sans-serif;
}
.contact_info span {
display: block;
}

.contact_info div {
margin: 0.8rem 0;
padding: 1rem;
}
.contact_info span i {
font-size: 2rem;
padding-bottom: 0.9rem;
color: #5d9604;
}
.contact_info div span:nth-child(3) {
margin: 0.7rem 0;
}

.contact_info div span:nth-child(2) {
font-weight: 500;
font-size: 1.1rem;
}

.contact_info text {
padding-top: 0.4rem;
color: #5d9604;
}
.contact_info span {
color: #5d9604;
}

.contact_form {
padding: 2rem 0;
border-top: 1px solid #c1c1c1;
display: grid;
grid-template-columns: repeat(2 , 1fr);
}
.contact_form form {
padding-bottom: 1rem;
}
.form_control {
width: 100%;
border : 1.5px solid #5d9604;
border-radius: 5px;
padding: 0.7rem;
margin: 1.3rem 0;
font-size: 1rem;
outline: 0;
}
.form_control:focus {
box-shadow: 0 0 9px -3px #5d9604;
}

.send_btn {
font-family:'open sans' sans-serif; 
font-size: 1rem;
text-transform: uppercase;
color: #fff;
background-color: #5d9604;
border: none;
border-radius: 5px;
padding: 0.7rem 1.5rem;
cursor: pointer;
transition: all 0.4s ease;
}

.send_btn:hover {
opacity: 0.8;
}
.contact_form div img {
width:100%;
height: 80vh;
}
.contact_form div {
margin: 0 auto;
text-align: center;
}

.map {
width: 95%;
height: 60vh;
border-radius: 20px;
margin: 20px auto;
}

@media (max-width: 768px) {
.contact_body .contact_info {
  display: flex;
  flex-direction: column;
}
.contact_form {
  display: flex;
  flex-direction: column;
}

}
@media (max-width: 500px) {
.contact_body{
  margin-top: 80px;
}



}
@media (max-width: 400px) {
#landpage h1{
font-size: 32px;
}
.contact_body h2{
font-size: 1.75rem;    
}


}

</style>
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
          <!-- <div class="line">
              <div></div>
              <div></div>
              <div></div>
           </div> -->
      <div class="contact_info">
          <div>
              <span><i class="fa-solid fa-phone"></i></span>
              <span> رقم الهاتف.</span>
              <span class="text"> +962 796781246</span>
          </div>

          <div>
              <span><i class="fa-solid fa-at"></i></span>
              <span>  ايميل </span>
              <span class="text"> ATTAR JO@gmail.com</span>
          </div>

          <div>
              <span><i class="fa-solid fa-location-dot"></i></span>
              <span> موقعنا </span>
              <span class="text"> الأردن </span>
          </div>

          <div>
              <span><i class="fa-solid fa-calendar"></i></span>
              <span> Opening Hours</span>
              <span class="text">  <br></span>
          </div>
      </div>


      <div class="contact_form">
          <form action="{{route('user.contact.store')}}" method="post">
            @csrf
              <div>
              <input type="text"  class="form_control" name="name" id="name" placeholder="الأسم" required>
          </div>

          <div>
              <input type="email" class="form_control" name="email" id="email" placeholder="الايميل" required>
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
<!-- 
 <div class="map">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3471.3794566788406!2d35.00686741138437!3d29.534441875080848!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15007110deda62e5%3A0x943e07a599369d37!2z2LnZitin2K_YqSDYp9mE2K_Zg9iq2YjYsdi52KjYr9in2YTZhdis2YrYryDYtNmG2K_ZgiDZhNi32Kgg2KfZhNij2LPZhtin2YY!5e0!3m2!1sen!2sjo!4v1671968113788!5m2!1sen!2sjo" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
 </div> -->

</section>

<!-- Scroll to top -->
{{-- <span class="up"> <i class="fa-solid fa-up-long"></i></span> --}}
<!-- Scroll to top -->


@endsection
  