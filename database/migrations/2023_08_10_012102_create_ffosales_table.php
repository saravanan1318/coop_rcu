<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**ffo
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_ffo', function (Blueprint $table) {
            $table->id();
            $table->string("user_id");
            $table->string("qty");
            $table->date("amount");
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
        Schema::dropIfExists('sales_ffo');
    }
};
