<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('anggota_lembaga', function (Blueprint $table) {
            $table->id('anggota_id');
            $table->foreignId('lembaga_id')->constrained('lembaga_desa', 'lembaga_id');
            $table->foreignId('warga_id')->constrained('warga', 'id');
            $table->foreignId('jabatan_id')->constrained('jabatan_lembaga', 'jabatan_id');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('anggota_lembaga');
    }
};
