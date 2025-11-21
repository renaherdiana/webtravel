<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TenagaKerja extends Model
{
    protected $table = 'tenaga_kerja';

    protected $fillable = [
        'name', 'position', 'photo', 'status'
    ];
}
