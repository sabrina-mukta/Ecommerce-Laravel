<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customers_id');
            $table->string('customers_name')->nullable();
            $table->string('customers_username')->nullable();
            $table->string('customers_email')->nullable();
            $table->string('customers_phone')->nullable();
            $table->string('customers_password')->nullable();
            $table->string('customers_zipcode')->nullable();
            $table->string('customers_address_line')->nullable();
            $table->string('customers_address_line_two')->nullable();
            $table->string('customers_district')->nullable();
            $table->string('customers_country')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
