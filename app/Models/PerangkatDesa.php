<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class PerangkatDesa extends Model
{
    use HasFactory;

    protected $table      = 'perangkat_desa';
    protected $primaryKey = 'perangkat_id';
    public $incrementing  = true;
    protected $keyType    = 'int';

    protected $fillable = [
        'warga_id',
        'jabatan',
        'nip',
        'kontak',
        'periode_mulai',
        'periode_selesai',
    ];

    protected $casts = [
        'periode_mulai'   => 'date',
        'periode_selesai' => 'date',
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }

    /**
     * Semua media yang terhubung ke perangkat_desa ini.
     * Filter ref_table agar hanya mengambil yang relevan.
     */
    public function media(): HasMany
    {
        return $this->hasMany(Media::class, 'ref_id', 'perangkat_id')
            ->where('ref_table', 'perangkat_desa')
            ->orderBy('sort_order');
    }

    public function getFirstImageAttribute()
    {
        return $this->media()->where('mime_type', 'like', 'image%')->orderBy('sort_order')->first();

    }

/**
 * Ambil URL gambar pertama atau null string
 */
    public function getFirstImageUrlAttribute()
    {
        $m = $this->first_media;
        if (! $m || empty($m->file_name)) {
            return null;
        }

        // cek di public/storage dulu (paling reliable di laragon/windows)
        $pub = public_path('storage/' . ltrim($m->file_name, '/'));
        if (file_exists($pub)) {
            return asset('storage/' . ltrim($m->file_name, '/'));
        }

        // fallback ke storage disk
        if (Storage::disk('public')->exists($m->file_name)) {
            return Storage::disk('public')->url($m->file_name);
        }

        return null;
    }
}
