<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('warga', function (Blueprint $table) {
            $table->string('jabatan', 100)->nullable()->after('email');
            $table->date('periode_mulai')->nullable()->after('jabatan');
            $table->date('periode_selesai')->nullable()->after('periode_mulai');
            $table->boolean('is_perangkat')->default(false)->after('periode_selesai');
        });
    }

    public function down(): void
    {
        Schema::table('warga', function (Blueprint $table) {
            $table->dropColumn(['jabatan', 'periode_mulai', 'periode_selesai', 'is_perangkat']);
        });
    }
};
