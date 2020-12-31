<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);


        // $table->id();
        // $table->string('namePizza');
        // $table->string('linkPhoto');
        // $table->string('description');
        // $table->bigInteger ('pricePizza');

        

        DB::table('pizza')->insert([
            [
           
                'namePizza'=> "Pizza Tuna",
                'pizzaImage'=> "/storage/PizzaImage/Pizza1.PNG",
                'description'=> "Tuna nya ludes",
                'pricePizza'=> "55000",
            ],
            [
           
                'namePizza'=> "Pizza Salmon",
                'pizzaImage'=> "/storage/PizzaImage/Pizza2.PNG",
                'description'=> "Salmon nyus",
                'pricePizza'=> "90000",
            ],
            [
              
                'namePizza'=> "Pizza Chicker",
                'pizzaImage'=> "/storage/PizzaImage/Pizza3.PNG",
                'description'=> "Aslinya dari telur ayam",
                'pricePizza'=> "70000",
            ],
            [
                
                'namePizza'=> "Pizza Mexx",
                'pizzaImage'=> "/storage/PizzaImage/Pizza4.JPG",
                'description'=> "Ini Pizza",
                'pricePizza'=> "90000",
            ],
            [
            
                'namePizza'=> "Pizza Biasa",
                'pizzaImage'=> "/storage/PizzaImage/Pizza5.PNG",
                'description'=> "Pizza AJE",
                'pricePizza'=> "90000",
            ],
            [
                
                'namePizza'=> "Pizza Cheese Bomb",
                'pizzaImage'=> "/storage/PizzaImage/Pizza6.PNG",
                'description'=> "Rasanya ledak ledak",
                'pricePizza'=> "100000",
            ],
            

        ]);









    }
}
