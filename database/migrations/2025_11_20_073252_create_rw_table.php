<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRwTable extends Migration
{
    public function up()
    {
        Schema::create('rw', function (Blueprint $table) {
            $table->increments('rw_id'); // primary key sesuai permintaan
            $table->string('nomor_rw')->unique();
            $table->unsignedBigInteger('ketua_rw_warga_id')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            // FK ke tabel warga (anggap tabel warga punya id primary 'id')
            $table->foreign('ketua_rw_warga_id')->references('id')->on('warga')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rw');
    }
}
