<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video', function (Blueprint $table) {
            $table->id('id_video');
            $table->string('judul');
            $table->integer('tahun_rilis');
            $table->string('genre');
            $table->string('durasi');
            $table->string('deskripsi');
            $table->string('format');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
        DB::statement("ALTER TABLE video ADD cover LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
