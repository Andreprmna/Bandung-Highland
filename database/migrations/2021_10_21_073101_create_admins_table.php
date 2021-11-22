<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id('id_admin');
            $table->string('id_role');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nama');
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->text('alamat');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
        DB::statement("ALTER TABLE admin ADD foto_profil LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
