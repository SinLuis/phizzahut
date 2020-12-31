
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
      

      <div class="pt-3">
        <form action="/deletedPizza/{{$pizza->id}}" method="POST">
          @csrf
          {{@method_field('DELETE')}}
        <button class="btn btn-danger">Delete pizza</button>
      </form>
      </div>

    </div>  
      </div>
    </div>





@endsection