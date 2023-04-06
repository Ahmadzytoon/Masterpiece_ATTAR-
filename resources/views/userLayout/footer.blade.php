<!-- __________________________footer___________________________________ -->
    <!-- footer -->
    <footer class="bg-second">
      <div class="container">
          <div class="row"> 
              <div class="col-3 col-md-6 col-sm-12">
                  <div class="contact">
                      <h3 class="contact-header">
                          <img  width="210px" height="80px" src="{{URL::asset("images/logocopy.png")}}" alt="">
                      </h3>  
                      <div class="text-footer">
                     <div> عطار جو متجر متخصص في بيع البهارات والأعشاب
                      والزيوت الطبيعية والعسل والعطارة
                      نقدم لكم منتجاتنا بسعر الجمله وبأقل الاسعار</div>
              </div>
                      <ul class="contact-socials">
                          <li><a href="#">
                                  <i class='bx bxl-facebook-circle'></i>
                              </a></li>
                          <li><a href="#">
                                  <i class='bx bxl-instagram-alt'></i>
                              </a></li>
                          <li><a href="#">
                                  <i class='bx bxl-youtube'></i>
                              </a></li>
                          <li><a href="#">
                                  <i class='bx bxl-twitter'></i>
                              </a></li>
                      </ul>
                  </div>
                
          </div>
              <div class="col-3 col-md-6">
                  <h3 class="footer-head">خريطة الموقع</h3>
                  <ul class="menu">
                      <li><a href="#">الرئيسة</a></li>
                      <li><a href="#">منتجاتنا</a></li>
                      <li><a href="#">طلبك الخاص</a></li>
                      <li><a href="#">عروض</a></li>
                      <li><a href="#">مجلة عطارJO</a></li>
                  </ul>
              </div>
              <div class="col-3 col-md-6">
                  <h3 class="footer-head">الشركة</h3>
                  <ul class="menu">
                      <li><a href="#">سياسة الخصوصية</a></li>
                      <li><a href="#">الشروط والأحكام</a></li>
                      <li><a href="#">الشحن والتوصيل</a></li>
                      <li><a href="#">الأرجاع والاستبدال</a></li>
                  </ul>
              </div>
              <div class="col-3 col-md-6">
                  <h3 class="footer-head">تواصل معنا</h3>
                  <ul class="menu">
                      <li>
                         رقم التواصل : <a href="#">9626781246+</a>
                      </li>
                      <li>
                         ايميل : <a href="#">Attarjo@gmail.com</a>
                      </li>
          
                  </ul>
              </div>
             
      </div>
     <div class="footer2 bg-second">  
          <li>© 2023 جميع الحقوق محفوظة لموقع عطار jo</li>
      </div>
  </footer>
  <!-- end footer -->




  <!-- app js -->
  
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="{{URL::asset('/js/app.js')}}"></script>
<script src="{{URL::asset('/js/index.js')}}"></script>

  @yield('script')