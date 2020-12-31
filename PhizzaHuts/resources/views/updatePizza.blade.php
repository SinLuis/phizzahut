@extends('layouts.app')

@section('content')
<div class="container">
<div class="row no-gutters">
    <div class="col-md-4">
        <img src="{{$pizza->pizzaImage}}" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
        <div class="card-body">
            <form action="/updatePizza/{{$pizza->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{@method_field('PUT')}}
            <label for="pizzaName" class="col-sm-2 col-form-label col-form-label-sm">Pizza Name:</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm" name="pizzaName" id="pizzaName" >
            </div>
            
            <label for="pizzaPrice" class="col-sm-2 col-form-label col-form-label-sm">Pizza Price:</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm" name="pizzaPrice" id="pizzaPrice" >
            </div>

            <label for="pizzaDescription" class="col-sm-3 col-form-label col-form-label-sm">Pizza Description:</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm" name="pizzaDesc" id="pizzaDescription" >
            </div>


            <div class="col-sm-2 col-form-label col-form-label-sm">
                <label for="formFile" class="form-label">Pizza Image:</label>
                <input class="form-control" type="file" name="pizzaImage" id="formFile">
              </div>
            <br><br>
            <a ><button style="background-color: steelblue; text-decoration: none; color: white">Edit Pizza</button></a>
            </form>
        </div>
    </div>
</div>
</div>
</div>
    
@endsection