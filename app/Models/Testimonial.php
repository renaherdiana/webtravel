<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $table = 'testimonials'; // nama tabel di DB

    protected $fillable = [
        'name',       // nama pelanggan
        'photo',      // foto
        'rating',     // rating (misal 1-5)
        'status',     // active/inactive
        'message',    // isi testimonial opsional
    ];
}
