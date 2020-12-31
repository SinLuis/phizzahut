<?php

namespace App\Http\Controllers;
use App\Cart;
use App\User;
use App\Pizza;
use App\Transaction;
use Auth;
use App\TransactionDetail;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showCart($userId){
        $user = User::find($userId);
        $cart = Cart::where('userId', $user->id)->get();
// dd($cart->pizza);
        return view('viewCart', ['cart' => $cart]);
    }

    public function updateCart(Request $request, $cartId){
        $cart = Cart::find($cartId);
        $cart->quantity = $request->quantity;
        $cart->save();

        return back();
    }

    public function deleteCart($cartId){
        $cart = Cart::findOrFail($cartId);
        $cart->delete();

        return back();
    }

    public function checkout($userId){
        $cart = Cart::where('userId', $userId)->get();
        $transaction = new Transaction();
        $transaction->userId = $userId;
        $transaction->save();
        foreach ($cart as $c) {
            $detail = new TransactionDetail();
            $detail->transactionId = $transaction->id;
            $detail->pizzaId = $c->pizzaId;
            $detail->totalQuantity = $c->quantity;
            $detail->save();
        }
        $cart = Cart::where('userId', $userId)->delete();
        
        return back();
    }

    public function transactionHistory($userId){
        
        if(Auth::user()->role == "admin"){
            $transaction = Transaction::all();
        }else{
            $transaction = Transaction::where('userId', $userId)->get();
        }
        return view('viewAllTransaction', ['transaction' => $transaction]);
    }

    public function detailTransaction($transactionId){
        $detail = TransactionDetail::where('transactionId', $transactionId)->get();

        return view('viewDetailTransaction', ['detail'=> $detail]);
    }


        
}
