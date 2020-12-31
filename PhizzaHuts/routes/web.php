<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('pizzaMenu');
// });

Route::get('/' ,'PizzaController@Indexpizza');



Auth::routes();

Route::get('/home', 'PizzaController@Indexpizza')->name('home');
Route::get('/pizza', 'PizzaController@Indexpizza');

Route::get('/updateView/{id}' , 'PizzaController@updateView')->middleware('checkAdmin');
Route::put('/updatePizza/{id}' , 'PizzaController@update')->middleware('checkAdmin');

Route::get('/deletePizza/{id}' , 'PizzaController@delete')->middleware('checkAdmin');
Route::delete('/deletedPizza/{id}', 'PizzaController@destroy')->middleware('checkAdmin');


Route::get('/viewAllUser' , 'ViewAllUserController@display')->middleware('checkAdmin');

Route::get('/viewAllTransaction', function(){
    return view ('viewAllTransaction');
})->middleware('checkAdmin');

Route::get('/addPizza', 'PizzaController@addPizzaView')->middleware('checkAdmin');


Route::post('/addNewPizza','PizzaController@create')->middleware('checkAdmin');

Route::get('/detailPizza/{id}', 'PizzaController@edit');
Route::post('/addtoCart/{pizzaId}/{userId}', 'PizzaController@addtoCart')->middleware('checkMember');

Route::get('/viewCart/{userId}', 'UserController@showCart')->middleware('checkMember');
Route::put('/updateQuantity/{id}', 'UserController@updateCart')->middleware('checkMember');
Route::delete('/deleteCart/{id}', 'UserController@deleteCart')->middleware('checkMember');

Route::post('/checkout/{userId}', 'UserController@checkout')->middleware('checkMember');

Route::get('/transactionHistory/{userId}', 'UserController@transactionHistory')->middleware('auth');

Route::get('/detailTransaction/{transactionId}', 'UserController@detailTransaction')->middleware('auth');
