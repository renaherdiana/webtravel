<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supir extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'supirs';

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'name',
        'phone',
        'photo',
        'status',
        'price', 
    ];
}
