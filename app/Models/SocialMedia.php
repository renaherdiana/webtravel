<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * Optional jika nama tabel mengikuti konvensi Laravel (socialmedias).
     *
     * @var string
     */
    protected $table = 'socialmedias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',          // Nama media sosial, misal Instagram
        'account_name',  // Nama akun media sosial
        'link',          // Link akun media sosial
        'photo',         // Foto/logo media sosial
        'status',        // Active / Inactive
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string,string>
     */
    protected $casts = [
        'status' => 'string',
    ];

    /**
     * Optional: default attributes
     */
    protected $attributes = [
        'status' => 'active',
    ];
}
