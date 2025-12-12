<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AnggotaLembaga extends Model
{
    use HasFactory;

    protected $table = 'anggota_lembaga';
    protected $primaryKey = 'anggota_id';
    public $timestamps = true;

    protected $fillable = [
        'lembaga_id',
        'warga_id',
        'jabatan_id',
        'tgl_mulai',
        'tgl_selesai',
    ];

    protected $casts = [
        'tgl_mulai' => 'date',
        'tgl_selesai' => 'date',
    ];

    /**
     * Get the lembaga that owns the anggota.
     */
    public function lembaga(): BelongsTo
    {
        return $this->belongsTo(LembagaDesa::class, 'lembaga_id', 'lembaga_id');
    }

    /**
     * Get the warga that owns the anggota.
     */
    public function warga(): BelongsTo
    {
        return $this->belongsTo(Warga::class, 'warga_id', 'id');
    }

    /**
     * Get the jabatan that owns the anggota.
     */
    public function jabatan(): BelongsTo
    {
        return $this->belongsTo(JabatanLembaga::class, 'jabatan_id', 'jabatan_id');
    }

    /**
     * Scope untuk anggota aktif
     */
    public function scopeAktif($query)
    {
        return $query->whereNull('tgl_selesai');
    }

    /**
     * Scope untuk anggota selesai
     */
    public function scopeSelesai($query)
    {
        return $query->whereNotNull('tgl_selesai');
    }

    /**
     * Check if anggota is active
     */
    public function isActive(): bool
    {
        return is_null($this->tgl_selesai);
    }
}
