@extends('userLayout.master')

@section('title')
PrivateOrder
@endsection
@section('css')  
<style>
  select::-ms-expand {
  display: none;
}
select {
  display: inline-block;
  box-sizing: border-box;
  padding: 0.5em 2em 0.5em 0.5em;
  border: 1px solid #eee;
  font: inherit;
  line-height: inherit;
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  appearance: none;
  background-repeat: no-repeat;
  background-image: linear-gradient(45deg, transparent 50%, currentColor 50%), linear-gradient(135deg, currentColor 50%, transparent 50%);
  background-position: right 15px top 1em, right 10px top 1em;
  background-size: 5px 5px, 5px 5px;
}


</style>

@endsection
@section('script')
<script> 
  $(document).ready(function() {
    var max_fields = 15;
    var wrapper = $(".container1");
    var add_button = $(".add_form_field");

    var x = 1;
    $(add_button).click(function(e) {
        e.preventDefault();
        if (x < max_fields) {
            x++;
            $(wrapper).append(`
            <div><select name="namepro${x}" id="">  
          @foreach ($products as $item)
              @if ($item->unit=="weight")
                <option value="{{$item->id}}">{{$item->namepro}} / {{$item->price}} 1 kg</option>
              @endif
          @endforeach
      </select>
      <input type="number" name="weight${x}" placeholder="Enter a weight grame ex. 50 gram"><a href="#" class="delete">Delete</a>
      </div>`);//add input box
        } else {
        alert('You Reached the limits')
        }   
    });   

    $(wrapper).on("click", ".delete", function(e) { 
        e.preventDefault(); 
        $(this).parent('div').remove(); 
        x--; 
    }) 
}); 

</script>
@endsection


{{--============= contant ===============--}}
@section('contant')

<div>
<form action="{{route('user.PrivateOrder.store')}}" method="POST">
  @csrf

    {{-- ___________________________________________ --}}

      <div class="container1">
           <button class="add_form_field">Add New Field &nbsp; 
            <span style="font-size:16px; font-weight:bold;">+</span>
          </button>

        <div class="divcon">
          <select name="namepro" id="">  
            @foreach ($products as $item)
                @if ($item->unit=="weight")
                    <option value="{{$item->id}}">{{$item->namepro}}  /  {{$item->price}} 1 kg</option>
                @endif
            @endforeach
          </select>

          <input type="number" name="weight" placeholder="Enter a weight grame ex. 50 gram">

        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </div>
    {{-- ___________________________________________ --}}
<button type="submit" >submit</button>
</form>


</div>
@endsection
