<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LembagaDesa extends Model
{
    protected $table      = 'lembaga_desa';
    protected $primaryKey = 'lembaga_id';

    public $incrementing = true;  // PK auto increment
    protected $keyType   = 'int'; // tipe data integer

    protected $fillable = [
        'nama_lembaga',
        'deskripsi',
        'kontak',
    ];

    public function jabatan()
    {
        return $this->hasMany(\App\Models\JabatanLembaga::class, 'lembaga_id', 'lembaga_id');
    }

    public function media()
    {
        return $this->hasMany(\App\Models\Media::class, 'ref_id', 'lembaga_id')
            ->where('ref_table', 'lembaga_desa');
    }
    public function anggota()
    {
        return $this->hasMany(\App\Models\AnggotaLembaga::class, 'lembaga_id', 'lembaga_id');
    }
    public function getLogoAttribute()
    {
        return $this->media()->where('mime_type', 'like', 'image%')->first();
    }
}
