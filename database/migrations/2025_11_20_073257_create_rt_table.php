<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRtTable extends Migration
{
    public function up()
    {
        Schema::create('rt', function (Blueprint $table) {
            $table->increments('rt_id'); // primary key sesuai permintaan
            $table->unsignedInteger('rw_id');
            $table->string('nomor_rt');
            $table->unsignedBigInteger('ketua_rt_warga_id')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('rw_id')->references('rw_id')->on('rw')->onDelete('cascade');
            $table->foreign('ketua_rt_warga_id')->references('id')->on('warga')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rt');
    }
}
