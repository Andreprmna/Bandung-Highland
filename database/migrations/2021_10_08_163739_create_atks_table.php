<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atk', function (Blueprint $table) {
            $table->id('id_atk');
            $table->string('nama_atk');
            $table->integer('harga');
            $table->integer('jumlah');
            $table->text('deskripsi_atk');
            $table->integer('status_atk')->default(0);
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
        Schema::dropIfExists('atks');
    }
}
