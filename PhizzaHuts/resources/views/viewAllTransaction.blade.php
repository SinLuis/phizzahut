@extends('layouts.app')

@section('content')

<div class="container">
  
  {{-- @if ($userId)
      
  @endif --}}
  @foreach ($transaction as $tr)
      
 <a href="/detailTransaction/{{$tr->id}}" style="text-decoration: none">
    <div class="card text-white bg-danger mb-3" style="max-width: 100%;">
    <div class="card-body">
      <h5 class="card-text">Transaction at {{$tr->created_at}}</h5>
      @if (Auth::user() != NULL && Auth::user()->role == "admin")
      <h5 class="card-text">User ID: {{$tr->userId}}</h5>
      <h5 class="card-text">User Name : {{$tr->user->name}}</h5>
      @endif
      
    </div>
  </div>
</a>
  @endforeach

  {{-- <div class="card text-danger bg-white mb-3" style="max-width: 100%;">
    <div class="card-body">
      <h5 class="card-text">Transaction at 2020-05-17 07:09:11</h5>
      <h5 class="card-text">User ID: 2</h5>
      <h5 class="card-text">User Name : User</h5>
    </div>
  </div>
</div> --}}
    
@endsection