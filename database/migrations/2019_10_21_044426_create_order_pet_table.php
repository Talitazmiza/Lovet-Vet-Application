<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderPetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_pet', function (Blueprint $table) {
            $table->uuid('order_id');
            $table->unsignedBigInteger('pet_id');
            $table->text('information')->nullable();

            $table->primary(['order_id', 'pet_id']);

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('pet_id')->references('id')->on('pets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_pet');
    }
}
