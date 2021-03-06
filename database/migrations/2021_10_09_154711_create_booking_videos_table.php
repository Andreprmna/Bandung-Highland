<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_video', function (Blueprint $table) {
            $table->id('id_booking_video');
            $table->integer('id_member');
            $table->integer('id_admin');
            $table->integer('id_video');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('booking_videos');
    }
}
