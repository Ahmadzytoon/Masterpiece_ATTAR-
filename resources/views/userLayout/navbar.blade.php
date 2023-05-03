
    <!-- header -->
    <header>
      <!-- mobile menu -->
      <div class="mobile-menu bg-second">
          <a href={{route('user.index')}} class="mb-logo"><img  width="195px" height="65px" src="{{URL::asset("images/logocopy.png")}}"  alt=""></a>
          <span class="mb-menu-toggle" id="mb-menu-toggle">
              <i class='bx bx-menu'></i>
          </span>
      </div>
      <!-- end mobile menu -->
      <!-- main header -->
      <div class="header-wrapper" id="header-wrapper">
          <span class="mb-menu-toggle mb-menu-close" id="mb-menu-close">
              <i class='bx bx-x'></i>
          </span>
          {{-- {{dd($products)}} --}}
          <!-- top header -->
          <div class="bg-second">
              <div class="top-header container">
                  <ul class="devided">
                      <li>

                          <p style="color: aliceblue">جميع انواع العطارة فى مكان واحد ...موقع عطار اونلاين تسوق الان+</p>
                          {{-- <a href="#">9626781246+</a> --}}
                      </li>
                      {{-- <li>
                          <a href="#">Attarjo@gmail.com</a>
                      </li> --}}
                  </ul>
                  <!-- <ul class="devided">
                      <li class="dropdown">
                          <a href="">دينار أردني</a>
                          <i class='bx bxs-chevron-down'></i>
                          <ul class="dropdown-content">
                              <li><a href="#">US</a></li>
                              <li><a href="#">EUR</a></li>
                          </ul>
                      </li>
                      <li class="dropdown">
                          <a href="">العربية</a>
                          <i class='bx bxs-chevron-down'></i>
                          <ul class="dropdown-content">
                              <li><a href="#">ENGLISH</a></li>
                              
                          </ul>
                      </li>
                      <li><a href="#">عروض</a></li>
                  </ul> -->
                  @if (Auth::user())
                  <ul class="devided">

                        
                    <li>
                      <a href={{route('user.login.destroy')}}> خروج</a>
                    </li>
                    <li>
                      <a href="{{route('user.All_Product.create')}}">عروض</a>
                    </li>
                    <li>
                      <a href={{route('user.profile.index')}}>الصفحة الشخصية</a>
                    </li>
                  
                  </ul>
                      
                  @else
                  <ul class="devided">
                    <li>
                      <a href={{route('user.login')}}> تسجيل دخول </a>
                    </li>
                    <li>
                      <a href="{{route('user.All_Product.create')}}">عروض</a>
                    </li>
                    <li>
                      <a href={{route('user.signup.index')}}>انشاء حساب </a>
                    </li>
                  </ul>
                  @endif
                </div>
          </div>
          <!-- end top header -->
          <!-- mid header -->
          <div class="bg-main">
              <div class="mid-header container">
                  <a href={{route('user.index')}} class="logo"><img src="{{URL::asset("images/logocopy.png")}}" alt="" width="195px" height="63px" ></a>
                  <form class="search" action="{{ route('user.search') }}" method="post">
                    @csrf  
                    <input type="text" name="search" placeholder="بحث ">
                      <button type="submit" class="button"><i class='bx bx-search-alt'></i></button>
                  </form>
                  <ul class="user-menu">
                      {{-- <li><a href="#"><i class='bx bx-bell'></i></a></li> --}}
                      @if (Auth::user())
                      <li><a href={{route('user.profile.index')}}><span style="    color: #5d9604;
                        font-size: 17px;"> مَرْحَبًا , {{Auth::user()->name}} </span><i class='bx bx-user-circle'></i></a></li>
                      @endif
                      <li><a href="{{Route('user.cart')}}"><i class='bx bx-cart'><span style="    color: #5d9604;
                        font-size: 20px;">5</span></i></a></li>
                  </ul>
              </div>
          </div>
          <!-- end mid header -->
          <!-- bottom header -->
          <div class="bg-second">
              <div class="bottom-header container">
                  <ul class="main-menu">
                      <li><a href={{route('user.index')}}>الرئيسية</a></li>
                      <!-- mega menu -->
                      <li class="mega-dropdown">
                          <a href="{{route('user.All_Product.index')}}">منتجاتنا<i class='bx bxs-chevron-down'></i></a>
                          <div class="mega-content">
                              <div class="row">
                                <?php $j = 0 ?>
                                <div class="col-2 col-md-12">
                                  <div class="box">
                                    <a href="{{route('user.All_Product.index')}}">  <h3 class="">جميع منتجاتنا</h3></a>
                                  </div>
                                </div>
                                
                                @foreach ($categoryNav as $value)
                                @if ($j<=4)
                            
                                <div class="col-2 col-md-12">
                                  <div class="box">
                                    <a href="{{route('user.All_Product.show',$value->id)}}">  <h3>{{$value->name_category}}</h3></a>
                                    
                                    <ul>
                                      <?php $i = 0 ?>
                                      @foreach ($productsNav as $product)
                                      @if ($product->category_id==$value->id &&$i<=3)
                                      
                                      <li><i class='bx bxs-chevron-left text-green'></i><a href="{{route('user.single_product.show',$product->id)}}">{{$product->namepro}}</a></li>
                                      {{-- <li><a href="#">بهارات مطحونة</a></li>
                                      <li><a href="#">ماجي صحي</a></li>
                                      <li><a href="#">بهارات مشكلة</a></li>
                                      <li><a href="#">بهارات كبسة</a></li> --}}
                    
                                      
                                      <?php ++$i ?>
                                      @endif
                                      @endforeach
                                    </ul>
                                  </div>
                                </div>
                                <?php ++$j ?>
                                      @endif
                                @endforeach
                                {{-- <div class="col-3 col-md-12">
                                  <div class="box">
                                          <h3> عطارة وأعشاب</h3>
                                          <ul>
                                              <li><a href="#">زعتر</a></li>
                                              <li><a href="#">عسل</a></li>
                                              <li><a href="#">مستكة</a></li>
                                              <li><a href="#">لبان الذكر</a></li>
                                          </ul>
                                      </div>
                                  </div>
                                  <div class="col-3 col-md-12">
                                      <div class="box">
                                          <h3>تمور</h3>
                                          <ul>
                                              <li><a href="#">تمر مجهول</a></li>
                                              <li><a href="#">تمر ربحي</a></li>
                                              <li><a href="#">تمر برني</a></li>
                                              <li><a href="#">تمر سكري</a></li>
                                              <li><a href="#">تمر مجدول</a></li>
                                          </ul>
                                      </div>
                                  </div>
                                  <div class="col-3 col-md-12">
                                      <div class="box">
                                          <h3>زيوت</h3>
                                          <ul>
                                              <li><a href="#">زيوت طبيعية</a></li>
                                              <li><a href="#">زيوت عطرية</a></li>
                                              <li><a href="#">خلطات زيوت</a></li>
                                          </ul>
                                      </div>
                                  </div> --}}
                              </div>
                              <div class="row img-row">
                                  <div class="col-3">
                                      <div class="box">
                                       <a href="{{route('user.All_Product.create')}}">     <img src={{URL::asset('./images/خصم-24-ساعة.png')}}></a>
                                      </div>
                                  </div>
                                  <div class="col-3">
                                      <div class="box">
                                        <a href="{{route('user.All_Product.index')}}">        <img src={{URL::asset('./images/شحن-مجاني.png')}}></a>
                                      </div>
                                  </div>
                                  <div class="col-3">
                                      <div class="box">
                                        <a href="{{route('user.All_Product.create')}}">     <img src={{URL::asset('./images/صفقة-الاسبوع.gif')}} alt=""></a>
                                      </div>
                                  </div>
                                  <div class="col-3">
                                      <div class="box" >
                                        <a href="{{route('user.All_Product.create')}}">  <img src={{URL::asset('./images/عروض-حتى-25.png')}} alt=""></a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </li>
                      <!-- end mega menu -->
                      {{-- <li><a href="{{route('user.PrivateOrder.index')}}">طلبك الخاص</a></li> --}}
                      {{-- <li><a href="{{route('user.blog.index')}}">مجلة عطارJO</a></li> --}}
                      <li><a href={{route('user.contact.index')}}>تواصل معنا</a></li>
                  </ul>
              </div>
          </div>
          <!-- end bottom header -->
      </div>
      <!-- end main header -->
  </header>
  <!-- end header -->