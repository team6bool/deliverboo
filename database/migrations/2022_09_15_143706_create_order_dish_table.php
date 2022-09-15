<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_dish', function (Blueprint $table) {
            $table->id();
            $table->foreignId("order_id")->constrained();
            $table->foreignId("dish_id")->constrained();
            $table->tinyInteger('quantity')->unsigned();
            $table->double('subtotal', 5,2)->unsigned();
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
        Schema::dropIfExists('order_dish');
    }
}
