<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jabatan_lembaga', function (Blueprint $table) {
            if (! Schema::hasColumn('jabatan_lembaga', 'slug')) {
                $table->string('slug')->nullable()->after('keterangan');
            }
        });
    }

    public function down(): void
    {
        Schema::table('jabatan_lembaga', function (Blueprint $table) {
            if (Schema::hasColumn('jabatan_lembaga', 'slug')) {
                $table->dropColumn('slug');
            }
        });
    }
};
