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
        Schema::create('exchange_rates', function (Blueprint $table) {
            $table->primary(['currency_id', 'convert_currency_id']);  
            $table->foreignId('currency_id');
            $table->foreignId('convert_currency_id');
            $table->integer('rate');
            $table->integer('surcharge');
            $table->integer('discount')->default(0);
            $table->boolean('email_confirmation')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchange_rates');
    }
};
