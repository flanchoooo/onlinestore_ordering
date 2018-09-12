<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('shopping_order_id');
            $table->foreign('shopping_order_id')->references('id')->on('shopping_orders');
            $table->unsignedInteger('shopping_item_id');
            $table->foreign('shopping_item_id')->references('id')->on('shopping_items');
            $table->integer('quantity');
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
        Schema::dropIfExists('shopping_order_details');
    }
}
