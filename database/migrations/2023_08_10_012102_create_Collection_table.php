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
        Schema::create('loan_Collection', function (Blueprint $table) {
            $table->id();
            $table->string("user_id");
            $table->string("loantype");
            $table->date("issuedate");
            $table->string("scstno");
            $table->string("scstamount");
            $table->string("othersno");
            $table->string("othersamount");
            $table->string("totalno");
            $table->string("totalamount");
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
        Schema::dropIfExists('Collection');
    }
};
