<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $table = 'warga';
    protected $primaryKey = 'warga_id';

    protected $fillable = ['nama', 'alamat', 'no_hp', 'email'];

    public $timestamps = false; // kalau tabel warga gak punya created_at/updated_at
}

