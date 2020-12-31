<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $table = 'pizza';

    public function cart(){
        return $this->hasMany(Cart::class, 'pizzaId');
    }

    public function transactionDetail(){
        return $this->hasMany(TransactionDetail::class, 'pizzaId');
    }
}
