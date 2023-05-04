@extends('userLayout.master')

@section('title')
Attarjo

@endsection
@section('css')  
<style>
  #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  
  #customers td, #customers th {
    /* border: 1px solid #ddd; */
    padding: 8px;
    text-align: center
  }
  
  #customers tr:nth-child(even){background-color: #f2f2f2;}
  
  #customers tr:hover {background-color: #ddd;}
  
  #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    background: linear-gradient(#5d9604,#ddf705);
    color: white;
    text-align: center
    
  }
  .order{
padding: 50px;
width:90% ;
margin: 0 auto;
min-height:65vh 
/* height: ; */
  }
  @media only screen and (max-width: 600px) {
    #customers td, #customers th {
    /* border: 1px solid #ddd; */
    padding: 3px;
    font-size: 11px;
    text-align: center
}
.order {
    padding: 9px;
    /* width: 90%; */
    margin: 0 auto;
    height: 65vh;
}
}
  </style>
@endsection
@section('script')

@endsection


{{--============= contant ===============--}}
@section('contant')
<div class="box">
  <div class="breadcumb">
      <a href={{route('user.index')}}>الصفحة الرئيسية</a>
      <span><i class='bx bxs-chevrons-left text-green'></i></span>
      <a href={{route('user.profile.index')}}>الصفحة الشخصية</a>
      <span><i class='bx bxs-chevrons-left text-green'></i></span>
      <a href="./products.html">طلباتي</a>
  </div>
</div>
<div class="order">
<table id="customers">
<thead>
{{-- <th>المجموع الكلي للطلب</th> --}}
<th>صورة المنتج</th>
<th>اسم المنتج</th>
<th>سعر المنتج</th>

<th>الكمية</th>
<th>الوزن</th>
<th>مكان الأستلام</th>


</thead>

{{-- {{dd($data)}} --}}

@foreach ($data as $item)

<tbody>
  
  {{-- <td>JD{{$item->order->total_price}}</td> --}}
  <td><img src="{{URL::asset("storage/image/".$item->product->image)}}" alt="" style="width: 75px ;    height: 75px"></td>
  <td>{{$item->product->namepro}}</td>

  <td>{{$item->product->price}} JD </td>
  
  <td>{{$item->quantity}} </td>
  @if($item->weight>0)
  <td> {{$item->weight}}غرام</td>
  @else 
  <td>-</td>
  @endif
  <td>      المدينة : {{$item->order->city}}  ,  شارع {{$item->order->address}}  ,  {{$item->order->zipcode}} </td>
</tbody>

@endforeach
  <th   style="text-align: center"> المجموع الكلي </th>

  <td   style="text-align: center ;color:red">{{$item->order->total_price}}JD</td>







</table>


</div>

@endsection
