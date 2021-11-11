<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingCoworkingSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_coworking_spaces', function (Blueprint $table) {
            $table->id('id_bcs');
            $table->integer('id_cs');
            $table->integer('id_member');
            $table->integer('id_admin');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
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
        Schema::dropIfExists('booking_coworking_spaces');
    }
}
