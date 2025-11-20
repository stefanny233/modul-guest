<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJabatanLembagaTable extends Migration
{
    public function up()
    {
        Schema::create('jabatan_lembaga', function (Blueprint $table) {
            $table->bigIncrements('jabatan_id');                  // PK
            $table->unsignedBigInteger('lembaga_id')->nullable(); // FK
            $table->string('nama_jabatan');
            $table->string('level')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('lembaga_id')->references('lembaga_id')->on('lembaga_desa')->nullOnDelete();

            $table->unique(['lembaga_id', 'nama_jabatan']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('jabatan_lembaga');
    }
}
