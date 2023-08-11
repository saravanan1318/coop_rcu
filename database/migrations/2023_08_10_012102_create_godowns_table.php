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
        Schema::create('godowns', function (Blueprint $table) {
            $table->id();
            $table->string("user_id");

            $table->string("count");
            $table->string("capacity");
            $table->string("utilized");
            $table->string("pecentageutilized");
            $table->string("income");
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
        Schema::dropIfExists('godown');
    }
};
