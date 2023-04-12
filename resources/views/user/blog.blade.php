@extends('userLayout.master')

@section('title')
   Blog
@endsection

@section('css')  

@endsection

@section('script')

@endsection


{{--============= contant ===============--}}

@section('contant')

@foreach ($data as $item)
<div>
    {{ $item->title}}
    {{ $item->image}}
    {{ $item->short_description}}
    {{ $item->long_description}}
    {{ $item->created_at}}
</div>

@endforeach

@endsection
  