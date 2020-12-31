
@extends('layouts.app')

@section('content')
<div class="container">
<h1> OUR FRESH PIZZA</h1>
<h3 > ORDER NOW ! <h3>


  @if (Auth::user() != NULL && Auth::user()->role == 'admin')
  <a href="/addPizza"><button class="btn btn-secondary">Add Pizza</button></a>
  
  @else
  
    <div class="form-inline">
      
      <form class="d-flex">
        <label class="pr-3" style="font-size: 20px" for="search">Search Pizza :</label>
        <input style="width: 250px;" class="form-control me-2" type="search" name="searchPizza" value="{{Request::input('sPizza')}}" aria-label="Search">
        <button class="btn btn-primary ml-3" type="submit">Search</button>
      </form>
    </div>

  
  @endif
</div>

<div class="container ">
  <div class="row row-cols-1 row-cols-md-3 g-4 " >
@foreach ($pizza as $p)
    
  <div class="col mb-3" style="max-width: 100%">
    <div class="card">
      <a href="/detailPizza/{{$p->id}}"><img src="{{$p->pizzaImage}}" class="card-img-top" alt="..."></a>
      <div class="card-body">
        <h5 class="card-title">{{$p->namePizza}}</h5>
      <p class="card-text">Rp. {{$p->pricePizza}}</p>
      @if (Auth::user() != NULL && Auth::user()->role == "admin");
          
      
      <a href="/updateView/{{$p->id}}" ><button class="btn btn-info">Update Pizza</button></a>
        <a href="/deletePizza/{{$p->id}}"><button class="btn btn-danger">Delete Pizza</button></a>
        @endif
      </div>
    </div>
  </div>

 @endforeach
</div>

<div class="row justify-content-center mt-2">
  {{$pizza->links()}}
</div>
  
</div>



@endsection