<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JabatanLembaga extends Model
{
    protected $table      = 'jabatan_lembaga';
    protected $primaryKey = 'jabatan_id';
    public $incrementing  = true;
    protected $keyType    = 'int';

    protected $fillable = [
        'lembaga_id',
        'nama_jabatan',
        'level',
        'keterangan',
    ];

    public function lembaga()
    {
        return $this->belongsTo(\App\Models\LembagaDesa::class, 'lembaga_id', 'lembaga_id');
    }
}
