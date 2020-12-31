<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';

    public function user(){
        return $this->belongsTo(User::class, 'userId');
    }

    public function pizza(){
        return $this->belongsTo(Pizza::class, 'pizzaId');
    }
    
}
