@extends('layouts.app')

@section('content')
    


<form action= "/addNewPizza" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="container" style="background-color: white; width: 750px">
        <h4><b>Add New Pizza</b></h4>

    <div class="row mb-3">
      <label for="pizzaName" class="col-sm-2 col-form-label">Pizza Name :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="pizzaName" name="pizzaName">
      </div>
    </div>

    <div class="row mb-3">
      <label for="pizzaPrice" class="col-sm-2 col-form-label">Pizza Price :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="pizzaPrice" name="pizzaPrice">
      </div>
    </div>
    
    <div class="row mb-3">
        <label for="pizzaDesc" class="col-sm-2 col-form-label">Pizza Description :</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="pizzaDesc" name="pizzaDesc">
        </div>
      </div>

      <div class="row mb-3">
        <label for="pizzaImage" class="col-sm-2 col-form-label">Pizza Image :</label>
        <div class="col-sm-10">
            <div class="mb-3">
                <input class="form-control" type="file" id="pizzaImage" name="pizzaImage">
              </div>
        </div>
      </div>
    
    
    <button type="submit" class="btn btn-primary">Add Pizza</button>

</div>
</form>


@endsection