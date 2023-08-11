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
        Schema::create('services_psss', function (Blueprint $table) {
            $table->id();
            $table->string("user_id");
            $table->string("no_of_centres");
            $table->string("no_of_farmers");
            $table->string("qualitymt");
            $table->string("qualitylts");
            $table->string("purchase");
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
        Schema::dropIfExists('services_pss');
    }
};
