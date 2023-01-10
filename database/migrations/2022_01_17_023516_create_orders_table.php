<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('orders_id');
            $table->string('orders_customer_id')->nullable();
            $table->string('orders_product_id')->nullable();
            $table->string('orders_product_name')->nullable();
            $table->string('orders_product_image')->nullable();
            $table->string('orders_product_qty')->nullable();
            $table->string('orders_product_price')->nullable();
            $table->datetime('orders_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date('orders_date_only')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('order_work_status')->default(1);
            $table->integer('orders_status')->default(1);
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
        Schema::dropIfExists('orders');
    }
}
