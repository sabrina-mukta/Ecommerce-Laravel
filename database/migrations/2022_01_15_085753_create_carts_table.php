<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id('cart_id');
            $table->string('cart_product_id')->nullable();
            $table->string('cart_product_name')->nullable();
            $table->string('cart_product_image')->nullable();
            $table->string('cart_product_price')->nullable();
            $table->string('cart_product_qty')->nullable();
            $table->string('cart_product_session_id')->nullable();
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
        Schema::dropIfExists('carts');
    }
}
