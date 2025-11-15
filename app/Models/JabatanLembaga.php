<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class JabatanLembaga extends Model
{
    protected $table    = 'jabatan_lembaga';
    protected $fillable = ['lembaga_id', 'nama_jabatan', 'slug', 'level', 'keterangan'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (! $model->slug) {
                $model->slug = Str::slug($model->nama_jabatan);
            }
        });
    }

    public function lembaga()
    {
        return $this->belongsTo(\App\Models\LembagaDesa::class, 'lembaga_id');
    }
}
