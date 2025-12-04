<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rt', function (Blueprint $table) {
            $table->increments('rt_id');
            $table->unsignedInteger('rw_id')->nullable();
            $table->string('nomor_rt');
            $table->unsignedBigInteger('ketua_rt_warga_id')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('rw_id')->references('rw_id')->on('rw')->onDelete('cascade');
        });
    }

    public function down(): void
    {   
        Schema::dropIfExists('rt');
    }
};
