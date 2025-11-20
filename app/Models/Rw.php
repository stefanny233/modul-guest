<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    protected $table = 'rw';
    protected $primaryKey = 'rw_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nomor_rw',
        'ketua_rw_warga_id',
        'keterangan'
    ];

    public function ketua()
    {
        return $this->belongsTo(Warga::class, 'ketua_rw_warga_id', 'id');
    }

    public function rts()
    {
        return $this->hasMany(Rt::class, 'rw_id', 'rw_id');
    }
}
