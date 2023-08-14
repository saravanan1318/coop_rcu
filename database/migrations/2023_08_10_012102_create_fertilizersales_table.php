<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**fertilizer
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_fertilizer', function (Blueprint $table) {
            $table->id();
            $table->string("user_id");
            $table->date("Fertilizerdate");
            $table->integer("nosveriety");
            $table->integer("nosfarmer");
            $table->integer("qty");
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
        Schema::dropIfExists('purchase_fertilizer');
    }
};
