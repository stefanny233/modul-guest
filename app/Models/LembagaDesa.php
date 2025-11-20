<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LembagaDesa extends Model
{
    protected $table = 'lembaga_desa';
    protected $primaryKey = 'lembaga_id'; 

    public $incrementing = true;          // PK auto increment
    protected $keyType = 'int';           // tipe data integer

    protected $fillable = [
        'nama_lembaga',
        'deskripsi',
        'kontak',
        'logo',
    ];

    public function jabatan()
    {
        return $this->hasMany(\App\Models\JabatanDesa::class, 'lembaga_id', 'lembaga_id');
    }
}
