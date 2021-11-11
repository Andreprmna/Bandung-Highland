<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointOfSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_of_sell', function (Blueprint $table) {
            $table->id('id_pos');
            $table->integer('id_member');
            $table->integer('id_admin');
            $table->integer('id_atk');
            $table->integer('jumlah_pos');
            $table->float('total_harga');
            $table->date('tgl_pos');
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
        Schema::dropIfExists('point_of_sells');
    }
}
