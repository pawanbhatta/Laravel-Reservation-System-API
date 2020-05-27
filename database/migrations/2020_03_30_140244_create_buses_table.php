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
            $table->string('phone');
            $table->json('seats')->nullable();  //json
            // $table->json('seats_booked')->nullable()->change(); //json
            $table->string('bus_image');
            $table->integer('total_seats'); 
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