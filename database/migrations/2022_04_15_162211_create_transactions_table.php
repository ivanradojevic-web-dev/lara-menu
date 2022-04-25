<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('currency_id');
            $table->bigInteger('currency_amount');
            $table->bigInteger('paid_currency_amount');
            $table->unsignedBigInteger('convert_currency_id');
            $table->integer('convert_currency_rate');
            $table->bigInteger('convert_currency_amount');
            $table->integer('surcharge_percentage');
            $table->bigInteger('surcharge_amount');
            $table->integer('discount_percentage')->nullable();
            $table->bigInteger('discount_amount')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
