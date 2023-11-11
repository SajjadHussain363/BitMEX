<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRechargeRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recharge_records', function (Blueprint $table) {
            $table->id();
            $table->integer('rechargeAmount');
            $table->integer('giftAmount');
            $table->enum('paymentMethod', ['Bank Transfer','Card Payment','PIX','Cash On Delivery']);
            $table->timestamp('submissionTime')->useCurrent();
            $table->enum('state', ['complete', 'pending'])->default('pending');
            $table->string('reasonRejection');
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
        Schema::dropIfExists('recharge_records');
    }
}
