<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankDetailsTable extends Migration
{
    public function up()
    {


        Schema::create('BankDetails', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('Name')->nullable();
            $table->string('BankCardNumber', 16)->nullable();
            $table->string('BankName')->nullable();
            $table->string('AccountProvince', 50)->nullable();
            $table->date('AccountOpeningDate')->nullable();
            $table->string('IdentityID', 20)->nullable();
            $table->string('InternationalRemittanceCode', 10)->nullable();
            $table->string('ContactNumber', 15)->nullable();
            $table->timestamps();
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('BankDetails');
    }
}
