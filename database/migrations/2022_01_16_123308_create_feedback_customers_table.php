<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_customers', function (Blueprint $table) {
            $table->id('feedback_id');
            $table->string('feedback_first_name')->nullable();
            $table->string('feedback_last_name')->nullable();
            $table->string('feedback_email')->nullable();
            $table->string('feedback_phone')->nullable();
            $table->text('feedback_message')->nullable();
            $table->datetime('feedback_date')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('feedback_customers');
    }
}
