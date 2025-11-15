<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJabatanLembagaTable extends Migration
{
    public function up()
    {
        Schema::create('jabatan_lembaga', function (Blueprint $table) {
            $table->bigIncrements('jabatan_id');                  // PK khusus
            $table->unsignedBigInteger('lembaga_id')->nullable(); // FK -> lembaga_desa.lembaga_id
            $table->string('nama_jabatan');
            $table->string('level')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            // foreign key ke tabel lembaga_desa (pastikan tabel & kolom lembaga_id ada)
            $table->foreign('lembaga_id')->references('lembaga_id')->on('lembaga_desa')->nullOnDelete();

            // optional: mencegah duplikat nama jabatan pada lembaga yang sama
            $table->unique(['lembaga_id', 'nama_jabatan']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('jabatan_lembaga');
    }
}
