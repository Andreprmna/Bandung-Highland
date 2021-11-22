<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id('id_buku');
            $table->integer('id_pengarang');
            $table->integer('id_penerbit');
            $table->string('judul');
            $table->integer('tahun_rilis');
            $table->integer('halaman');
            $table->string('isbn');
            $table->text('deskripsi')->nullable();
            $table->string('bentuk');
            $table->integer('kondisi')->default(1);
            $table->integer('status')->default(1);
            $table->timestamps();
        });
        DB::statement("ALTER TABLE buku ADD sampul LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukus');
    }
}
