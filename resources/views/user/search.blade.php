@extends('userLayout.master')

@section('title')
Attarjo

@endsection
@section('css')  

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
    <!-- products content -->
    <div class="bg-main">
      <div class="container">
        <div class="box">
          <div class="breadcumb">
              <a href={{route('user.index')}}>الرئيسية</a>
              <span><i class='bx bxs-chevrons-left text-green'></i></span>
              <a href="{{route('user.All_Product.index')}}">منتجاتنا</a>
          </div>
      </div>
          <div class="box">
              <div class="row">
                  <div class="col-3 filter-col" id="filter-col">
                      <div class="box filter-toggle-box">
                          <button class="btn-flat btn-hover" id="filter-close">اغلاق</button>
                      </div>
                      <div class="box">
                          <span class="filter-header">
                              منتجاتنا
                          </span>
                          <ul class="filter-list">
                           <li><i class='bx bxs-chevron-left text-green'></i><a href="{{route('user.All_Product.index')}}">جميع المنتجات</a></li>
                              <li><i class='bx bxs-chevron-left text-green'></i><a href="{{route('user.All_Product.create')}}">العروض</a></li>
  
                            @foreach ($category as $item)
                            
                              
                              <li><i class='bx bxs-chevron-left text-green'></i><a href="{{route('user.All_Product.show',$item->id)}}">{{$item->name_category}}</a></li>
                        
                     @endforeach
                              {{-- <li><i class='bx bxs-chevron-left'></i><a href="#">عطارة</a></li>
                              <li><i class='bx bxs-chevron-left'></i><a href="#">بهارات</a></li>
                              <li><i class='bx bxs-chevron-left'></i><a href="#">خلطات توابل</a></li>
                              <li><i class='bx bxs-chevron-left'></i><a href="#">عسل</a></li>
                              <li><i class='bx bxs-chevron-left'></i><a href="#">زيوت طبيعية</a></li>
                              <li><i class='bx bxs-chevron-left'></i><a href="#">تمور</a></li>
                              <li><i class='bx bxs-chevron-left'></i><a href="#">شاي</a></li> --}}



                          </ul>
                      </div>
                     
                  </div> 
                  <div class="col-9 col-md-12">
                      <div class="box filter-toggle-box">
                          <button class="btn-flat btn-hover" id="filter-toggle">تصنيفات</button>
                      </div>
                      <!-- ______________________ -->
                      <div class="box">
                        <div class="row" >
                          {{-- _________________ --}}
                                    @foreach ($products as $item)
                            <div class="col-3 col-md-6 col-sm-12">
                                
                                <div class="product-card">
                                    <a href="{{route('user.single_product.show',$item['id'])}}"><div class="product-card-img">
                       <img src="{{URL::asset("storage/image/".$item['image'])}}" alt="  {{ $item['namepro']}} ">
                          <img src="{{URL::asset("storage/image/".$item['image'])}}" alt="  {{ $item['namepro']}} ">
  
                    </div></a>
              
                                    <div class="product-card-info">
                                        <div class="product-btn">
                                        <a href="{{route('user.single_product.show',$item['id'])}}">   <button class="btn-flat btn-hover btn-shop-now">تفاصيل</button></a> 
                                            <a >
                                              <form action={{route("user.cart.add",$item['id'])}} method="POST">
                                              @method('HEAD')
                                                @csrf
                                                  
                                                <input type="hidden" name="quantity" value="1"/>
                                                  @if($item['unit']== "weight")
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
                                          {{ $item['namepro']}} 
                                            @if($item['unit'] == "weight")
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

                                          @if($item['is_sale']==1)



                                                      
                                                  


                                                      @if($item['unit'] == "weight")  
                                                      
                                                      <span><del>JD  {{ ($item['price']*250)/1000  }}</del></span>
                                                      <span class="curr-price">JD {{ ($item['price_discount']*250)/1000  }}</span>
                                                      
                                                      @else
                                                      <span><del>JD  {{ $item['price'] }}</del></span>
                                                      <span class="curr-price">JD {{ $item['price_discount'] }}</span>
                                                      @endif   





                                          @else


                                                      @if($item['unit'] == "weight")  
                                                                  
                                                      <span class="curr-price">JD {{ ($item['price']*250)/1000  }}</span>
                                                      
                                                      @else
                                                      <span class="curr-price">JD {{ $item['price'] }}</span>
                                                      @endif   





                                  
              
                                          @endif
              
                                        </div>
                                    </div>


                                </div>
                            </div> 
                             @endforeach
                        </div>
                      </div>
                      <!-- ______________________ -->

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
          </div>
      </div>
  </div>
  <!-- end products content -->
@endsection
  