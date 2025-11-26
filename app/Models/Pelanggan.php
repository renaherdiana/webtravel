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
    ];

    /**
     * AUTO UPDATE STATUS SETIAP DATA DIBACA
     * 
     * Status:
     * - pending     : booking belum dimulai
     * - ongoing     : sedang berlangsung
     * - completed   : sudah selesai
     * - cancelled   : dibatalkan (manual)
     */
    public function getStatusAttribute($value)
    {
        // jika dibatalkan manual → jangan diubah
        if ($value === 'cancelled') {
            return 'cancelled';
        }

        // gabungkan tanggal & jam booking
        $start = Carbon::parse($this->tanggal_booking . ' ' . $this->jam_booking);
        $end   = Carbon::parse($this->tanggal_selesai . ' ' . $this->jam_selesai);

        $now = Carbon::now();

        // sebelum hari H
        if ($now->lt($start)) {
            return 'pending';
        }

        // saat sedang berlangsung
        if ($now->between($start, $end)) {
            return 'ongoing';
        }

        // jika sudah lewat waktu selesai
        if ($now->gt($end)) {
            return 'completed';
        }

        return $value;
    }
}
