<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('booking_id');
            $table->bigInteger('customer_id');
            $table->foreign('customer_id')->unsigned()->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('bus_id');
            $table->string('pid');
            $table->bigInteger('schedule_id');
            $table->json('seats_booked'); //json
            $table->string('source');
            $table->string('destination');
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
        Schema::dropIfExists('bookings');
    }
}