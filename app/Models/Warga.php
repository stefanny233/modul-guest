<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    protected $table    = 'warga';
    protected $fillable = ['nama', 'nik', 'alamat'];

    // Relasi ke PerangkatDesa
    public function perangkat()
    {
        return $this->hasMany(PerangkatDesa::class, 'warga_id');
    }

}
