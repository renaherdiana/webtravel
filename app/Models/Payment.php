<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'pelanggan_id',
        'total',
        'amount_paid',    // jumlah yang sudah dibayar
        'status',         // pending / partial / paid
        'payment_method', // bank / ovo / gopay
    ];

    // Relasi ke pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    // Hitung sisa pembayaran
    public function remaining()
    {
        return $this->total - $this->amount_paid;
    }

    // Cek apakah sudah lunas
    public function isPaid()
    {
        return $this->amount_paid >= $this->total;
    }

    // Update status otomatis
    public function updateStatus()
    {
        if ($this->isPaid()) {
            $this->status = 'paid';
        } elseif ($this->amount_paid > 0) {
            $this->status = 'partial';
        } else {
            $this->status = 'pending';
        }
        $this->save();
    }
}
