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
        Schema::create('croploan_cropwise', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('croploandate');
            $table->integer('crop_id');
            $table->integer('number');
            $table->integer('amount');
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
        Schema::dropIfExists('croploan_cropwise');
    }
};