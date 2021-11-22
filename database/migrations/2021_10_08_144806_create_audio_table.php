<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAudioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audio', function (Blueprint $table) {
            $table->id('id_audio');
            $table->string('judul');
            $table->string('pengisi_suara');
            $table->integer('tahun_rilis');
            $table->string('genre');
            $table->string('durasi');
            $table->string('format');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
        DB::statement("ALTER TABLE audio ADD cover LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audio');
    }
}
