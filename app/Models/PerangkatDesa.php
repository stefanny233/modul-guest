<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerangkatDesa extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang benar (sesuai file aslimu).
     * Jika nama tabelmu 'perangkat_desas' (jamak), hapus baris ini.
     */
    protected $table = 'perangkat_desa';
    protected $primaryKey = 'id';
    protected $fillable = ['warga_id', 'jabatan', 'kontak', 'periode_mulai', 'periode_selesai'];

    /**
     * Kita nonaktifkan timestamps (sesuai file aslimu)
     */
    public $timestamps = false;

    /**
     * Relasi ke Model Warga (BUKAN Penduduk)
     * * Ini perbaikan utamanya:
     * 'warga_id' (foreign key di tabel ini)
     * 'id' (primary key di tabel warga)
     */
    public function warga()
    {
        // Pastikan Model kamu namanya 'Warga.php'
        return $this->belongsTo(Warga::class, 'warga_id', 'id');
    }
}

