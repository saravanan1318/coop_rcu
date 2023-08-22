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
        Schema::create('croploan_entry', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->date('croploandate');
            $table->string('applicationsreceived');
            $table->string('applicationssanctioned');
            $table->string('applicationspending');
            $table->string('totalcultivatedarea');
            $table->string('loanissuedarea');
            $table->string('outstandingno');
            $table->string('outstandingamount');
            $table->string('overdueno');
            $table->string('overdueamount');
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
        Schema::dropIfExists('croploan_entry');
    }
};
