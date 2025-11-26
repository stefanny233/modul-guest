<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rw', function (Blueprint $table) {
            $table->increments('rw_id');
            $table->string('nomor_rw')->nullable();
            $table->unsignedBigInteger('ketua_rw_warga_id')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            // foreign key ke warga.id jika tabel warga ada
            $table->foreign('ketua_rw_warga_id')->references('id')->on('warga')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rw');
    }
};
