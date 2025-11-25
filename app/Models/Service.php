<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    // Kolom yang dapat diisi (mass-assignment)
    protected $fillable = [
        'photo',
        'merk_mobil',
        'nama_mobil',
        'tahun_pembuatan',
        'harga_sewa',
        'status',
    ];
}
