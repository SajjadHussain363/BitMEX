<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankDetailsLocalTable extends Migration
{
    public function up()
    {
        
        Schema::create('BankDetailsLocal', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('Name')->nullable();
            $table->string('BankCardNumber', 16)->nullable();
            $table->string('BankName')->nullable();
            $table->string('AccountProvince', 50)->nullable();
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('BankDetailsLocal');
    }
}
