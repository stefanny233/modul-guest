<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    use HasFactory;

    protected $table      = 'rw';
    protected $primaryKey = 'rw_id';
    public $incrementing  = true;
    protected $keyType    = 'int';
    protected $guarded    = [];

    public function rts()
    {
        return $this->hasMany(Rt::class, 'rw_id', 'rw_id');
    }

    public function ketua()
    {
        return $this->belongsTo(\App\Models\Warga::class, 'ketua_rw_warga_id', 'id');
    }
}
