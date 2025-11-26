<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // tambahkan kolom nomor_rw dan keterangan jika belum ada
        Schema::table('rw', function (Blueprint $table) {
            if (! Schema::hasColumn('rw', 'nomor_rw')) {
                $table->string('nomor_rw')->nullable()->after('rw_id');
            }
            if (! Schema::hasColumn('rw', 'keterangan')) {
                $table->text('keterangan')->nullable()->after('nomor_rw');
            }
        });
    }

    public function down(): void
    {
        Schema::table('rw', function (Blueprint $table) {
            if (Schema::hasColumn('rw', 'keterangan')) {
                $table->dropColumn('keterangan');
            }
            if (Schema::hasColumn('rw', 'nomor_rw')) {
                $table->dropColumn('nomor_rw');
            }
        });
    }
};
