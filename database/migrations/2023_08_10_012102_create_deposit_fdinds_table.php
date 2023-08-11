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
        Schema::create('deposit_fdinds', function (Blueprint $table) {
            $table->id();
            $table->string("user_id");
            $table->date("recieveddate");
            $table->string("recievedothersno");
            $table->string("recievedothersamount");
            $table->string("recievedtotalno");
            $table->string("recievedtotalamount");
            $table->date("closeddate");
            $table->string("closedothersno");
            $table->string("closedothersamount");
            $table->string("closedtotalno");
            $table->string("closedtotalamount");
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
        Schema::dropIfExists('deposit_fdinds');
    }
};
