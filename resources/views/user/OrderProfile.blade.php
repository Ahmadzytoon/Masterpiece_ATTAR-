@extends('userLayout.master')

@section('title')
Attarjo

@endsection
@section('css')  
<link rel="stylesheet" href="{{asset('./css/OrderProfile.css')}}">
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
  <td><img src="{{URL::asset("storage/image/".$item->product->image)}}" alt="{{$item->product->namepro}}" style="width: 75px ;    height: 75px"></td>
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
