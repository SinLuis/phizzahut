
@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row align-items-start">

      <div class="col">
      <img style="width: 500px;" src="{{$pizza->pizzaImage}}" alt="">
      </div>

      <div class="col">
        <b style="font-size: 35px">{{$pizza->namePizza}}</b>
        <div style="font-size: 20px">{{$pizza->description}}</div>
      <div class="mt2">Rp. {{$pizza->pricePizza}}</div>
      

      @if (Auth::user() != NULL && Auth::user()->role == "member")
          
      @php
          $userId = Auth::user()->id;
      @endphp

      <form action="/addtoCart/{{$pizza->id}}/{{$userId}}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="row g-2 align-items-center pt-3">
        <div class="col-auto">
          <label for="quantity" class="col-form-label">Quantity :</label>
        </div>
        <div class="col-auto">
          <input type="text" id="quantity" name="quantity" class="form-control">
        </div>
      </div>

      <div class="pt-3">
        <button class="btn btn-primary">Add to Cart</button>
      </div>

    </form>
    @endif

    
    </div>  
      </div>
    </div>





@endsection