<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    use HasFactory;

    protected $table      = 'media';
    protected $primaryKey = 'media_id';
    public $incrementing  = true;
    protected $keyType    = 'int';

    protected $fillable = [
        'ref_table',
        'ref_id',
        'file_name',
        'caption',
        'mime_type',
        'sort_order',
    ];

    /**
     * Optional: relasi ke PerangkatDesa jika ref_table = 'perangkat_desa'.
     * Jangan paksa foreign key karena kita menggunakan polymorphic-like ref_table/ref_id.
     */
    public function perangkat(): BelongsTo
    {
        return $this->belongsTo(PerangkatDesa::class, 'ref_id', 'perangkat_id');
    }

    public function getUrlAttribute()
    {
        return Storage::disk('public')->url($this->file_name);
    }
}
