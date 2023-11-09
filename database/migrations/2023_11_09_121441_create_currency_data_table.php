<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencyDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency_data', function (Blueprint $table) {
            $table->id();
            $table->string('currency')->nullable(); // Set as nullable
            $table->decimal('profit_and_loss', 10, 2)->nullable(); // Set as nullable
            $table->dateTime('date_time')->nullable(); // Set as nullable
            $table->decimal('buy_price', 10, 2)->nullable(); // Set as nullable
            $table->decimal('sell_price', 10, 2)->nullable(); // Set as nullable
            $table->integer('duration')->nullable(); // Set as nullable
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('currency_data');
    }
}
