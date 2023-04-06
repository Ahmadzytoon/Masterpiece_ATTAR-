@extends('userLayout.master')

@section('title')
Attarjo

@endsection
@section('css')
@endsection
@section('script')
@endsection


{{-- ============= contant =============== --}}
@section('contant')
    <?php $total_price = 0; ?>
    <section id="cart-container" class="container my-5">

        <table width="100%">

            <thead>
                <tr>
                    <td>صورة</td>
                    <td>المنتج</td>
                    <td>السعر</td>
                    <td>الوزن</td>
                    <td>الكمية</td>
                    <td>تأكيد التعديل</td>
                    <td>حذف</td>
                    <td>المجموع</td>
                </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)
              {{-- {{dd($item)}} --}}

                    <tr>
                        <td><img src="{{ URL::asset('storage/image/' . $item['product_image']) }}" alt="{{ $item['product_image'] }}"></td>
                        <td>
                            <h5>
                                {{ $item['product_name'] }}
                            </h5>
                        </td>
                        <td>
                            @if ($item['is_sale'] == 0)
                                <h5>JD{{ $item['product_price'] }}</h5>
                                <?php $price = $item['product_price']; ?>
                            @else
                                <h5>JD{{ $item['product_price_discount'] }}</h5>
                                <?php $price = $item['product_price_discount']; ?>
                            @endif
                        </td>



                        <td>
                          <form action={{route('user.cartupdate.update',$item['product_id'])}} method="POST">
                            @if(!$item['weight']==0)
                                <select name="weight" id="cars" >
                                    <option value="{{$item['weight']}}">{{$item['weight']}}غرام</option>
                                    <option value="125">125غرام</option>
                                    <option value="250">250غرام</option>
                                    <option value="500">500غرام</option>
                                    <option value="1000">1 كغم</option>
                                </select>
                                <br><br>
                        
@else 
<h3>-</h3>
@endif
                            {{-- {{ $item['weight'] }} --}}
                        </td>
                        {{-- _____________________ --}}
                        <td>
                          
                            @method('PUT')

                              @csrf
                          <input type="number" name="quantity" class="w-25 pl-1" value="{{$item['quantity']}}" >
                          
                        </td>
                        <td>
<button type="submit">تأكيد التعديل</button>
                          </form>

                        </td>
                        {{-- _____________________ --}}
                        <td><a href="{{ route('user.cart.destroy', $item['product_id']) }}"><i class="fas fa-trash-alt"> حذف</i></a></td>
                        <td>
                          {{-- $price = ($price * $request->waight)/1000; --}}
                          @if($item['weight']>0)
                            <?php $priceTo = (($price * $item['weight'])/1000)*$item['quantity']; ?>
                            @else 
                            <?php $priceTo = $price*$item['quantity']; ?>
@endif
                            
                            <h5>{{ $priceTo }} JD</h5>
                            <?php $total_price += $priceTo; ?>
                        </td>
                    </tr>
                @endforeach
                {{-- {{dd($total_price);}} --}}

            </tbody>

        </table>

    </section>
    <section id="cart-bottom" class="container">

        <div class="row">
            {{-- <div class="coupon col-lg-6 col-md-6 col-12 mb-4">

                <div>
                    <h5>كوبون</h5>
                    <P>ادخل رمز الكوبون</P>
                    <input type="text" name="" placeholder="كود الكوبون">
                    <button>تطبيق</button>
                </div>

            </div> --}}
            <div class="total col-lg-6 col-md-6 col-12">

                <div>
                    <h5>مشترياتي</h5>
                    <div class="d-flex justify-content-between">
                        <h6>السعر الفرعي</h6>
                        <p>{{ $total_price }} JD</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6>التوصيل</h6>
                        <p>JD 2.000</p>
                    </div>
                    <hr class="second-hr">
                    <div class="d-flex justify-content-between">
                        <h6>السعر النهائي</h6>
                        <?php $final_price = $total_price + 2; ?>

                        <p>{{ $final_price }} JD</p>
                        {{ session()->put('total_price', $final_price) }}

                    </div>
                    <a href="{{ route('user.checkout.index') }}"><button class="ml-auto">تأكيد العملية</button></a>
                </div>

            </div>
        </div>

    </section>
@endsection
