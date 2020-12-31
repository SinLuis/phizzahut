@extends('layouts.app')

@section('content');
<div class="container">
<div class="card-group">
    @foreach ($data as $d)
        
    
    <div class="card">
    <div class="card-header" style="background-color: red">User Id: {{$d->id}}</div>
      <div class="card-body">
      <h5 class="card-text">Username : {{$d->name}}</h5>
      <h5 class="card-text">Email : {{$d->email}}</h5>
      <h5 class="card-text">Address : {{$d->address}}</h5>
      <h5 class="card-text">Phone Number : {{$d->phoneNumber}}</h5>
      <h5 class="card-text">Gender : {{$d->gender}}</h5>
      </div>
    </div>
    @endforeach
  </div>
</div>
    
@endsection