<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    protected $table = 'heroes';

    protected $fillable = [
        'title',
        'description',
        'photo',
        'status',
    ];

    // Scope untuk active
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    // Scope untuk inactive
    public function scopeInactive($query)
    {
        return $query->where('status', 'inactive');
    }
}
