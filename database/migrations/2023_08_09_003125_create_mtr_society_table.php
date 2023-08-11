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
        Schema::create('mtr_society', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('region_id');
            $table->unsignedBigInteger('circle_id');
            $table->unsignedBigInteger('societytype_id');
            $table->string('society_name');
            $table->string('registration_no');
            $table->string('staff_name');
            $table->string('designation');
            $table->string('mobile_no');
            $table->string('address');
            $table->string('pincode');
            $table->integer('status');
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
        Schema::dropIfExists('mtr_society');
    }
};
