<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perangkat_desa', function (Blueprint $table) {
            $table->id('perangkat_id');
            $table->unsignedBigInteger('warga_id');
            $table->string('jabatan', 100);
            $table->string('nip', 50)->nullable();
            $table->string('kontak', 20);
            $table->date('periode_mulai');
            $table->date('periode_selesai')->nullable();
            $table->timestamps();

            $table->index('warga_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perangkat_desa');
    }
};
