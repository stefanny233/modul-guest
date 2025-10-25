<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $table = 'warga'; // pastikan sesuai nama tabel
    protected $fillable = [
        'nama',
        'nik',
        'alamat',
        'tanggal_lahir',
        'jenis_kelamin',
    ];
}
