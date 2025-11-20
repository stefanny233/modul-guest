<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rt extends Model
{
    protected $table      = 'rt';
    protected $primaryKey = 'rt_id';
    public $incrementing  = true;
    protected $keyType    = 'int';

    protected $fillable = [
        'rw_id',
        'nomor_rt',
        'ketua_rt_warga_id',
        'keterangan',
    ];

    public function rw()
    {
        return $this->belongsTo(Rw::class, 'rw_id', 'rw_id');
    }

    public function ketua()
    {
        return $this->belongsTo(Warga::class, 'ketua_rt_warga_id', 'id');
    }
}
