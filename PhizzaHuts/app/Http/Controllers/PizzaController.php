<?php

namespace App\Http\Controllers;
use App\Pizza;
use App\User;
use App\Cart;
use Storage;
use Illuminate\Http\Request;

class PizzaController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Indexpizza(Request $request)
    {
        $temp = $request->input('searchPizza');
        $pizza = Pizza::where('namePizza', 'like', "%$temp%")->paginate(6);

        return view ('pizzaMenu', ['pizza'=>$pizza]);
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // return Pizza::create([
        //     'namePizza' => $request['pizzaName'],
        //     'pricePizza' => $request['pizzaPrice'],
        //     'description' => $request['pizzaDesc'],
        //     'linkPhoto' => $request['pizzaImage'],
        // ]);
        $pizza = new Pizza();
        $pizza->namePizza = $request->input('pizzaName');
        $pizza->pricePizza = $request->input('pizzaPrice');
        $pizza->description = $request->input('pizzaDesc');
        $image = $request->file('pizzaImage');
        $exten = $image->getClientOriginalExtension();
        $nameImage = date('dmyHis').".".$exten;
        $pizza->pizzaImage = str_replace('public', '/storage', Storage::putFileAs('/public/PizzaImage', $request->pizzaImage, $nameImage));
        $pizza->save();

        return redirect('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * 
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //untuk show detail Pizza
        $pizza = Pizza::find($id);
        
        return view('detailPizza', ['pizza' => $pizza]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateView($id){
        $pizza  = Pizza::find($id);

        return view('updatePizza', ['pizza'=> $pizza]);
    }

    public function update(Request $request, $id)
    {
        $pizza = Pizza::find($id);
        $pizza->namePizza = $request->input('pizzaName');
        $pizza->pricePizza = $request->input('pizzaPrice');
        $pizza->description = $request->input('pizzaDesc');
        $image = $request->file('pizzaImage');
        $exten = $image->getClientOriginalExtension();
        $nameImage = date('dmyHis').".".$exten;
        $pizza->pizzaImage = str_replace('public', '/storage', Storage::putFileAs('/public/PizzaImage', $request->pizzaImage, $nameImage));
        $pizza->save();

        return redirect('home');
    }

    public function addPizzaView(){
        return view ('addPizza');
    }

    public function addtoCart(Request $request,$pizzaId, $userId){
            
            $pizza = Pizza::find($pizzaId);
            $user = User::find($userId);
            $cart = new Cart();

            $cart->pizzaId = $pizza->id;
            $cart->userId = $user->id;
            $cart->quantity =  $request->quantity;
            $cart->save();
            
            return redirect('home');
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // KEHALAMAN DELETEPIZZA
        $pizza = Pizza::find($id);
        return view('deletePizza', ['pizza' => $pizza]);
    }

    public function destroy($id)
    {
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();

        return redirect ('home');
    }

}