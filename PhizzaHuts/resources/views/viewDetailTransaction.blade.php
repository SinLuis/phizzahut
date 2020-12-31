
@extends('layouts.app')

@section('content')
    
@foreach ($detail as $d)
    

<div class="container mt-3 p-3">
 
    <div class="row align-items-start">

      <div class="col">
      <img style="width: 300px;" src="{{$d->pizza->pizzaImage}}" alt="">
      </div>

      <div class="col">
        <b style="font-size: 35px">{{$d->pizza->namePizza}}</b>
      <div class="mt2">Rp. {{$d->pizza->pricePizza}}</div>
      <div class="mt2">Quantity : {{$d->totalQuantity}}</div>
      <div class="mt2">Total Price : {{$d->totalQuantity*$d->pizza->pricePizza}}</div>
    </div>  
    
      </div>
    </div>


    @endforeach


@endsection