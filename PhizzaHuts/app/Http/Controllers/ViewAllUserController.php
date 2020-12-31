<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class ViewAllUserController extends Controller
{
    public function display(){
        $data = User::get();

        return view('viewAllUser', ['data'=> $data]);
    }
}
