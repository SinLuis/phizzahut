<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_detail', function (Blueprint $table) {
            
            $table->integer('transactionId')->unsigned();
            $table->foreign('transactionId')->references('id')->on('transaction');
            $table->integer('pizzaId')->unsigned();
            $table->foreign('pizzaId')->references('id')->on('pizza');
            $table->integer('totalQuantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_detail');
    }
}
