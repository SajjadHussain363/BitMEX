<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdrawal_records', function (Blueprint $table) {
            $table->id();
            $table->integer('serialNum');
            $table->integer('withdrawalAmount');
            $table->integer('handlingFee');
            $table->integer('actualArrival');
            $table->string('bankDeposit');
            $table->string('denialReason');
            $table->enum('processingProgress', ['completed','rejected','processing']);
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
        Schema::dropIfExists('withdrawal_records');
    }
}
