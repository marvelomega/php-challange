<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipOrderItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ship_order_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('note');
            $table->integer('quantity');
            $table->float('price');
            $table->unsignedBigInteger('shiporderid');
            $table->foreign('shiporderid')->references('id')->on('ship_order');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ship_order_item');
    }
}
