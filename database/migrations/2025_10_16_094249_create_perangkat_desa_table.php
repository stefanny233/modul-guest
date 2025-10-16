<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('perangkat_desa', function (Blueprint $table) {
            $table->id('perangkat_id');
            $table->unsignedBigInteger('warga_id');
            $table->string('jabatan');
            $table->string('nip')->nullable();
            $table->string('kontak')->nullable();
            $table->date('periode_mulai');
            $table->date('periode_selesai');
            $table->string('foto')->nullable();
            $table->timestamps();

            $table->foreign('warga_id')->references('id')->on('warga')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perangkat_desa');
    }
};
