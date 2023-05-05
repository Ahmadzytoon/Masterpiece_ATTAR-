@extends('userLayout.master')

@section('title')
Attarjo
@endsection
@section('css')  
<link rel="stylesheet" href="{{asset('./css/product-detail.css')}}">


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

    <!-- product-detail content -->
    <div class="bg-main">
      <div class="container">
          <div class="box">
              <div class="breadcumb">
                  <a href={{route('user.index')}}>الرئيسية</a>
                  <span><i class='bx bxs-chevrons-left text-green'></i></span>
                  <a href="{{route('user.All_Product.index')}}">منتجاتنا</a>
                  <span><i class='bx bxs-chevrons-left text-green'></i></span>
                  <a href="#">{{$product->namepro}}</a>
              </div>
          </div>
          <div class="row product-row">
              <div class="col-5 col-md-12">
                  <div class="product-img" id="product-img">
                      <img src="{{URL::asset("storage/image/".$product->image)}}" alt="">
                  </div>
                  <!-- <div class="box">
                      <div class="product-img-list">
                          <div class="product-img-item">
                              <img src="./images/kisspng-beats-electronics-headphones-apple-beats-studio-red-headphones.png" alt="">
                          </div>
                          <div class="product-img-item">
                              <img src="./images/JBL-Endurance-Sprint_Alt_Red-1605x1605px.webp" alt="">
                          </div>
                          <div class="product-img-item">
                              <img src="./images/JBL_Quantum_400_Product Image_Hero 02.png" alt="">
                          </div>
                      </div>
                  </div> -->
              </div>
              <div class="col-7 col-md-12">
                <form action={{route("user.cart.add",$product->id)}} method="post">
                  @method('HEAD')
                  @csrf
                  
                  <div class="product-info">
                    
                    
                      <h1>{{$product->namepro}}</h1>
                      <div class="product-info-detail">
                          <span class="product-info-detail-title">قسم:</span>
                          <a href="#">{{$product->category->name_category}}</a>
                      </div>
                      {{-- <div class="product-info-detail">
                          <span class="product-info-detail-title">التقييم:</span>
                          <span class="rating">
                              <i class='bx bxs-star'></i>
                              <i class='bx bxs-star'></i>
                              <i class='bx bxs-star'></i>
                              <i class='bx bxs-star'></i>
                              <i class='bx bxs-star'></i>
                          </span>
                      </div> --}}
                      <p class="product-description">{{$product->short_description}} </p>

              
                      @if($product->is_sale==1)
                      
                              @if($product->unit=="weight")

                              <div class="curr-price"><span class="product-info-detail-title">     السعر   :       </span><del>JD  {{ ($product->price*250)/1000  }}</del></div>
                        <span > 
                      </span >  <span class="product-info-price">JD {{ ($product->price_discount*250)/1000  }}</span>
                        

                              @else
                              <div class="curr-price"><span class="product-info-detail-title">     السعر   :       </span><del>JD  {{ $product->price }}</del></div>
                              <span > 
                            </span >  <span class="product-info-price">JD {{ $product->price_discount }}</span>
                              
      
                              @endif


                    



                      @else

                      @if($product->unit=="weight")

                    

                      <div class="product-info-price">   <span class="product-info-detail-title">    السعر   :     </span>JD  {{ ($product->price*250)/1000  }}</div>

                      @else
                    

                      <div class="product-info-price">  <span class="product-info-detail-title">    السعر   :     </span>JD  {{ $product->price }}</div>

                      @endif













                      @endif
                      @if($product->unit=="weight")
                      <p class="product-info-detail-title">السعر المعروض للوزن 250غرام </p>
                      @endif


                    <div class="product-quantity-wrapper">
                           {{-- <span class="product-quantity-btn">
                              <i class='bx bx-minus'></i>
                          </span>
                          <span class="product-quantity">1</span>
                          <span class="product-quantity-btn">
                              <i class='bx bx-plus'></i>
                          </span> --}}
                          <h3 class="product-info-detail-title"> الكمية :   </h3>
                          <input  type="number" name="quantity" value="1" min="1" max="10" />
                      </div>
                        <h2 style="font-size: 30px"> العبوات المتوفرة</h2>
                             
                             <div class="container-divweight">
                              @if($product->unit=="weight")
                            
                              <label class="container-check">125غرام
                               <input type="radio"  name="waight" value="125">
                              <span class="checkmark"></span>
                              </label>

                              <label class="container-check">250غرام
                              <input type="radio" checked="checked" name="waight" value="250">
                              <span class="checkmark"></span>
                              </label>
                              <label class="container-check">500غرام
                              <input type="radio" name="waight" value="500">
                              <span class="checkmark"></span>
                              </label>
                              {{-- <label class="container-check">ا كغم
                                <input type="radio" checked="checked" name="waight" value="1000">
                               <span class="checkmark"></span>
                               </label> --}}
                              @endif

                            </div>

                      
                          
                         
                         
                      
                      <div>
                          <button class="btn-flat btn-hover">اضاف الى السلة</button>
                      </div>
                  </div>
                </form>
              </div>
          </div>
          <!-- ________________________________________ -->
          
          <!-- ________________________________________ -->
          <div class="box">
              <div class="box-header">
                  اراء العملاء
              </div>
              <div>
                {{-- {{dd($comments)}} --}}
                @foreach ($comments as $comment)
                  <div class="user-rate">
                      <div class="user-info">
                          <div class="user-avt">
                              <img src="{{URL::asset("storage/image/".$comment->user->image)}}" alt="">
                          </div>
                          <div class="user-name">
                              <span class="name">{{$comment->user->name}}</span>
                              <span class="date">{{$comment->created_at}}</span>

                              <span class="rating">
                                  <i class='bx bxs-star'></i>
                                  <i class='bx bxs-star'></i>
                                  <i class='bx bxs-star'></i>
                                  <i class='bx bxs-star'></i>
                                  <i class='bx bxs-star'></i>
                              </span>
                          </div>
                      </div>
                      <div class="user-rate-content">{{$comment->comment}}</div>
                  </div>
                  @endforeach

                  
                  <div class="box">
                      <ul class="pagination">
                          <li><a href="#"><i class='bx bxs-chevron-right'></i></a></li>
                          <li><a href="#" class="active">1</a></li>
                          <li><a href="#">2</a></li>
                          <li><a href="#">3</a></li>
                          <li><a href="#">4</a></li>
                          <li><a href="#">5</a></li>
                          <li><a href="#"><i class='bx bxs-chevron-left'></i></a></li>
                      </ul>
                  </div>
              </div>
          </div>
          <div id="comment_section">
            {{-- @if(Auth::user()) --}}
    
            <form action="{{route('user.comment_product.store')}}" method="post">
    
                @csrf
                <h2 for="story">أكتب تعليق</h2>
                <div >
                    {{-- <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/> --}}
                    <input type="hidden" name="product_id" value="{{$product->id}}"/>
                    <textarea id="story" name="comment" rows="10" cols="47" class="@error('comment') is-invalid @enderror"></textarea>
                    @error('comment')
                    <div class="error">{{ $message }}</div>
                   @enderror
    
                </div>
                <div id="input">
                    <input class="btn-flat btn-hover" type="submit" id="submit" value="ارسال">
                </div>
            </form>
            {{-- @endif --}}
        </div>
          <!-- ________________________________________ -->
          <div class="box">
              <div class="box-header">
                  منتجات مقترحة
              </div>
              <div class="row" id="related-products"></div>
          </div>
      </div>
  </div>
  <!-- end product-detail content -->

@endsection
  