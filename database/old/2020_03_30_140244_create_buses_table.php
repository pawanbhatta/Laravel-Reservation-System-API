<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {
            $table->bigIncrements('bus_id');
            $table->string('bus_name');
            $table->string('bus_num');
            $table->string('pickup_address');
            $table->string('dropoff_addres');
            $table->string('seats_avail');  //json
            $table->string('seats_booked'); //json
            $table->string('depart_time');
            $table->string('depart_date');
            $table->string('bus_image');
            $table->integer('total_seats');
            $table->integer('total_price');
            $table->boolean('status')->default(0);

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
        Schema::dropIfExists('buses');
    }
}