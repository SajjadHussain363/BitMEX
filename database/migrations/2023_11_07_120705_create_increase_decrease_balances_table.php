<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncreaseDecreaseBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('increase_decrease_balances', function (Blueprint $table) {
            $table->id();
            $table->string('userAccount');
            $table->boolean('increaseDecreaseType');
            $table->integer('increaseDecreaseAmount');
            $table->string('reasonForModification');
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
        Schema::dropIfExists('increase_decrease_balances');
    }
}
