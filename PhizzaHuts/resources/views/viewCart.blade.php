@extends('layouts.app')

@section('content')
    @if (empty($cart) || count($cart) == 0)

        <div class="container" style="text-align: center">
            <h5>Cart is Empty</h5>
        </div>

    @else

        @foreach ($cart as $c)
            <div class="container mt-5" style="background-color: rgb(223, 223, 223)">
                <div class="container pt-3 pb-3">
                    <div class="row align-items-start">





                        <div class="col">
                            <img style="width: 500px;" src="{{ $c->pizza->pizzaImage }}" alt="">
                        </div>

                        <div class="col">
                            <b style="font-size: 35px">{{ $c->pizza->namePizza }}</b>
                            <div style="font-size: 20px">Rp. {{ $c->pizza->pricePizza }}</div>
                            <div class="mt2"> Quantity : {{ $c->quantity }}</div>

                            <form action="/updateQuantity/{{ $c->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{ @method_field('PUT') }}
                                <div class="row g-2 align-items-center pt-3">
                                    <div class="col-auto">
                                        <label for="quantity" class="col-form-label">Quantity :</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" id="quantity" name="quantity" class="form-control">
                                    </div>
                                </div>

                                <div class="pt-3">
                                    <button class="btn btn-primary">Update Quantity</button>
                                </div>
                            </form>

                            <form action="/deleteCart/{{ $c->id }}" method="POST">
                                @csrf
                                {{ @method_field('DELETE') }}
                                <div class="pt-3">
                                    <button class="btn btn-danger">Delete From Cart</button>
                                </div>
                            </form>


                        </div>



                    </div>
                </div>
            </div>

        @endforeach
        @php
            $userId = Auth::user()->id;
        @endphp
        <form action="/checkout/{{$userId}}" method="POST">
          @csrf
            <div class="row justify-content-center pt-5">
                <button class="btn btn-dark ">Checkout</button>
            </div>
        </form>
    @endif


@endsection
