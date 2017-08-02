<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSewaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sewa', function (Blueprint $table) {
            $table->increments('id_sewa');
            $table->integer('id_kamar')->unsigned();
            $table->foreign('id_kamar')->references('id_kamar')->on('kamar');
            $table->integer('id_customer')->unsigned();
            $table->foreign('id_customer')->references('id_customer')->on('customer');
            $table->timestamps('checkin_date');
            $table->timestamps('checkout_date');
            $table->integer('id_status_sewa')->unsigned();
            $table->foreign('id_status_sewa')->references('id_status_sewa')->on('status_sewa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sewa');
    }
}
