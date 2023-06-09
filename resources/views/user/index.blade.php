@extends('userLayout.master')

@section('title')
   Attarjo
@endsection
@section('css')  
<style>



  </style>
@endsection
@section('script')

@endsection


{{--============= contant ===============--}}
@section('contant')

@if(session()->get('success'))
                <div class="success-msg">
                    <i class="fa fa-check"></i>

                    {{ session()->get('success') }}
                </div>
            @endif
@if(session()->get('failed'))
                <div class="failed-msg">
                    <i class="fa fa-check"></i>

                    {{ session()->get('failed') }}
                </div>
@endif

<!-- __________________________________________________hero____________________________________________________ -->

    <!-- hero section -->
    <div class="hero" >
      <div class="slider">
          <div class="container">
              <!-- slide item -->
              <div class="slide active">
                  <div class="info">
                      <div class="info-content">
                          <h3 class="top-down">
                          
                          </h3>
                          <h2 class="top-down trans-delay-0-2">
                             أطلب طلباتك الخاصة
                          </h2>
                          <p class="top-down trans-delay-0-4">
                                                       اطلب كل ما تريده من منتجات العطارة والبهارات والأعشاب وبالمقادير يلي بتختارها وسنقوم بتوفيرها وارسالها اينما كنت                            </p>
                          <div class="top-down trans-delay-0-6">
                            <a href="{{route('user.All_Product.index')}}">   <button class="btn-flat btn-hover">
                                  <span>سجل طلبك الان</span>
                              </button>
                            </a>
                          </div>
                      </div>
                  </div>
                  <div class="img top-down">
                      <!-- <img src="https://www.pngmart.com/files/3/Herbs-PNG-Transparent-Image.png" alt="ATTAR JO"> -->
                  </div>
              </div>
              <!-- end slide item -->

              <!-- slide item -->
              <div class="slide">
                  <div class="info">
                      <div class="info-content">
                          <h3 class="top-down">
                              
                          </h3>
                          <h2 class="top-down trans-delay-0-2">
                              جودة أصلها الطبيعة
                          </h2>
                          <p class="top-down trans-delay-0-4">
                             
                          </p>
                          <div class="top-down trans-delay-0-6">
                            <a href="{{route('user.All_Product.index')}}">   <button class="btn-flat btn-hover">
                                  <span>تسوق الان </span>
                              </button>
                            </a>
                          </div>
                      </div>
                  </div>
                  <div class="img right-left">
                      <img id="img-slid" src="https://www.seekpng.com/png/detail/948-9486302_mannil-chinese-herbs-png.png" alt="ATTAR JO">
                  </div>
              </div>
              <!-- end slide item -->
              <!-- slide item -->
              <div class="slide">
                  <div class="info">
                      <div class="info-content">
                          <h3 class="top-down">
                              
                          </h3>
                          <h2 class="top-down trans-delay-0-2">عطارJO   </h2>
                          <p class="top-down trans-delay-0-4">
                              أنت بالمكان الصح
                          </p>
                          <div class="top-down trans-delay-0-6">
                            <a href="{{route('user.All_Product.index')}}"> 
                               <button class="btn-flat btn-hover">
                                  <span>تسوق الان</span>
                              </button>
                            </a>
                          </div>
                      </div>
                  </div>
                  <div class="img left-right">
                      <img id="img-slid" src="https://ghanemtech.fra1.digitaloceanspaces.com/dlwaqty/179996/5a7d25b0e219b9db0d0482e8b642a378a0aa5ef2.jpg" alt="ATTAR JO">
                  </div>
              </div>
              <!-- end slide item -->
          </div>
          <!-- slider controller -->
          <button class="slide-controll slide-next">
              <i class='bx bxs-chevron-right'></i>
          </button>
          <button class="slide-controll slide-prev">
              <i class='bx bxs-chevron-left'></i>
          </button>
          <!-- end slider controller -->
      </div>
  </div>
  <!-- end hero section -->
<!-- ___________________________________________________endhero___________________________________________________ -->




<!-- promotion section -->
<div class="promotion">
    <div class="row promotion-new">
        <div class="col-5 col-md-12 col-sm-12">
            <div class="promotion-box">
                
                <img src="https://atarh.com/wp-content/uploads/2022/06/%D8%A8%D9%86%D8%B1-%D8%B5%D8%BA%D9%8A%D8%B1-1.png" alt="ATTAR JO">
            </div>
        </div>
        <div class="col-5 col-md-12 col-sm-12">
            <div class="promotion-box">

                <img src="https://atarh.com/wp-content/uploads/2022/06/%D8%A8%D9%86%D8%B1-%D8%B5%D8%BA%D9%8A%D8%B1-3.png" alt="ATTAR JO">
            </div>
        </div>
    </div>
</div>
<!-- end promotion section -->



<!-- slider category -->
<div class="reviews" id="reviews">
  <div class="section-header">
    <h2>      ꧂   تسوق حسب الأقسام   ꧁   </h2>
  </div>
  <div class="swiper reviews-slider">
      <div class="swiper-wrapper">
        @foreach ($category as $item)
          <div class="swiper-slide box">
            <a href="{{route('user.All_Product.show',$item->id)}}"><img src="{{URL::asset("storage/image/".$item->image)}}" alt="{{$item->name_category}}"></a>
            <h3 id="category">{{$item->name_category}}</h3>
          </div>
        @endforeach
      </div>
  </div>
</div>
<!-- end slider category -->


<!-- product list -->
<div class="section">
    <div class="container">
        <div class="section-header">
          <h2>      ꧂   منتجاتنا الأكثر مبيعا   ꧁   </h2>
        </div>
        {{-- id="latest-products" --}}
        <div class="row" >
          
          <?php $j = 0 ?>
                    @foreach ($products as $item)
                    @if ($j<=5)
            <div class="col-2 col-md-6 col-sm-12">
                
                <div class="product-card">
                    <a href="{{route('user.single_product.show',$item['id'])}}"><div class="product-card-img">
                      <img src="{{URL::asset("storage/image/".$item['image'])}}" alt="ATTAR JO">
                        <img src="{{URL::asset("storage/image/".$item['image'])}}" alt="ATTAR JO">

                  </div></a>

                    <div class="product-card-info">
                        <div class="product-btn">
                        <a href="{{route('user.single_product.show',$item->id)}}">   <button class="btn-flat btn-hover btn-shop-now">تفاصيل</button></a> 
                            <a>
                              <form action={{route("user.cart.add",$item->id)}} method="post">
                              @method('HEAD')
                              @csrf
                              <input type="hidden" name="quantity" value="1"/>
                              @if($item->unit == "weight")
                              <input type="hidden" name="waight" value="250" />
                              @else
                              <input type="hidden" name="waight" value="0" />
                              @endif
                              <button class="btn-flat btn-hover btn-cart-add">
                                <i class='bx bxs-cart-add'></i>
                              </button>
                              </form>
                            </a>
                            {{-- <button class="btn-flat btn-hover btn-cart-add">
                                <i class='bx bxs-heart'></i>
                            </button> --}}
                        </div>
                        <div class="product-card-name">
                  {{ $item->namepro }}   @if($item->unit == "weight")
                  /250غرام
                  @endif        
                </div>
                        <span class="rating">
                    
                        
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </span>
                        <div class="product-card-price">

                          @if($item->is_sale==1)
                                      @if($item->unit == "weight")
                                        <span><del>JD  {{ ($item->price*250)/1000  }}</del></span>
                                        <span class="curr-price">JD {{ ($item->price_discount*250)/1000  }}</span>
                                        @else
                                        <span><del>JD  {{ $item->price  }}</del></span>
                                        <span class="curr-price">JD {{ $item->price_discount}}</span>
                                      @endif



                          @else

                                            @if($item->unit == "weight")
                                            <span class="curr-price">JD {{ ($item->price*250)/1000  }}</span>
                                            @else
                                            <span class="curr-price">JD {{ $item->price }}</span>
                                          @endif



                          

                          @endif

                        </div>
                    </div>
                </div>
            </div> 
            <?php ++$j ?>
            @endif
              @endforeach
        </div>
        <div class="section-footer">
            <a href="{{route('user.All_Product.index')}}" class="btn-flat btn-hover">عرض المزيد</a>
        </div>
    </div>
</div>  
<!-- end product list -->




<!-- special product -->
  <div class="img-land">
    <div class="section-land">
      <h2>      ꧂  أفضل  العروض  ꧁   </h2>
  </div>
  </div>

  <div class="section">
      <div class="container">
          {{-- <div class="section-header">
              <h2>      ꧂  أفضل  العروض  ꧁   </h2>
          </div> --}}
          <div class="row" >
            {{-- _________________ --}}
            <?php $i=0 ?> 
            @foreach ($products as $item)
            {{-- {{$item->is_sale}} --}}
                    
                      @if($item->is_sale==1) 
                      @if ($i<=5)
              <div class="col-2 col-md-6 col-sm-12">
                {{-- {{dd($item->is_sale)}} --}}
                  <div class="product-card">
                      <div class="product-card-img">
                          <img src="{{URL::asset("storage/image/".$item->image)}}" alt="ATTAR JO">
                          <img src="{{URL::asset("storage/image/".$item->image)}}" alt="ATTAR JO">

                    </div>

                      <div class="product-card-info">
                          <div class="product-btn">
                          <a href="{{route('user.single_product.show',$item->id)}}">   <button class="btn-flat btn-hover btn-shop-now">تفاصيل</button></a> 
                              <a >
                                <form action={{route("user.cart.add",$item->id)}} method="post">
                                  @method('HEAD')
                                  @csrf
                                  <input type="hidden" name="quantity" value="1"/>
                                  @if($item->unit == "weight")
                                  <input type="hidden" name="waight" value="250" />
                                  @else
                                  <input type="hidden" name="waight" value="0" />
                                  @endif
                                  <button class="btn-flat btn-hover btn-cart-add">
                                    <i class='bx bxs-cart-add'></i>
                                  </button>
                                  </form>
                              </a>
                              {{-- <button class="btn-flat btn-hover btn-cart-add">
                                  <i class='bx bxs-heart'></i>
                              </button> --}}
                          </div>
                          <div class="product-card-name">
                            {{ $item->namepro }}   @if($item->unit == "weight")
                            /250غرام
                            @endif        
                          </div>
                          <span class="rating">
                      
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                          </span>
                          <div class="product-card-price">
                            @if($item->is_sale==1)
                              <span><del>JD  {{ $item->price  }}</del></span>
                              <span class="curr-price">JD {{ $item->price_discount   }}</span>
                                
                            @else
                            <span class="curr-price">JD {{ $item->price   }}</span>

                            @endif

                          </div>
                      </div>
                  </div>
              </div>  
              <?php $i++ ?>
              @endif
              @endif
            
              @endforeach
          </div>
          <div class="section-footer">
              <a href="{{route('user.All_Product.create')}}" class="btn-flat btn-hover">عرض المزيد</a>
          </div>
      </div>
  </div>  

<!-- end special product -->


<!-- blogs -->
<div class="section">
    <div class="container">
        <div class="section-header">
          <h2>       ꧂   مجلة ꧁   ATTAR JO     </h2>

          
        </div>
        <?php $i = 1?>
        @foreach ($data as $item)
            
      @if($i%2!=0)
        <div class="blog">
            <div class="blog-img">
              <img src="{{URL::asset("storage/image/".$item->image)}}" alt="ATTAR JO">

            </div>
            <div class="blog-info">
                <div class="blog-title">
                  <h2> {{$item->title}}</h2> 

                </div>
                <div class="blog-preview">
                  {{$item->short_description}}              
                    </div>
                  {{-- <a href="{{route('user.blog.show',$item->id)}}" class="btn-flat btn-hover">اقرأ المزيد</a> --}}
                </div>
        </div>

        @else
        <div class="blog row-revere">
          <div class="blog-img">
              <img src="{{URL::asset("storage/image/".$item->image)}}" alt="ATTAR JO">
          </div>
          <div class="blog-info">
              <div class="blog-title">
                  <h2> {{$item->title}}</h2> 
                  
              </div>
              <div class="blog-preview">
                {{$item->short_description}}                 
                {{-- <a href="{{route('user.blog.show',$item->id)}}" class="btn-flat btn-hover">اقرأ المزيد</a> --}}
              </div>
      </div>
      </div>
      @endif
      <?php ++$i?>
        @endforeach
      
        <div class="section-footer">
          <a href="{{route('user.blog.index')}}" class="btn-flat btn-hover">للمزيد</a>
        </div>
    </div>
</div>
<!-- end blogs -->
@endsection
  