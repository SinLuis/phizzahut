<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';

    public function user(){
        return $this->belongsTo(User::class, 'userId');
    }
}
