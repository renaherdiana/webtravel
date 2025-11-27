<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';

    protected $fillable = [
        'nama',
        'telepon',
        'email',
        'merk_mobil',
        'tipe_mobil',
        'tanggal_booking',
        'jam_booking',
        'tanggal_selesai',
        'jam_selesai',
        'status',
        'supir_id', // pastikan ini ada di fillable
    ];

    // Relasi ke Supir
    public function supir()
    {
        return $this->belongsTo(Supir::class, 'supir_id');
    }

    /**
     * AUTO UPDATE STATUS SETIAP DATA DIBACA
     */
    public function getStatusAttribute($value)
    {
        if ($value === 'cancelled') {
            return 'cancelled';
        }

        $start = Carbon::parse($this->tanggal_booking . ' ' . $this->jam_booking);
        $end   = Carbon::parse($this->tanggal_selesai . ' ' . $this->jam_selesai);

        $now = Carbon::now();

        if ($now->lt($start)) {
            return 'pending';
        }

        if ($now->between($start, $end)) {
            return 'ongoing';
        }

        if ($now->gt($end)) {
            return 'completed';
        }

        return $value;
    }
}
