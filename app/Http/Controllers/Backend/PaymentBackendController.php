<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentBackendController extends Controller
{
    /**
     * Tampilkan daftar payment
     */
    public function index()
    {
        // Ambil semua payment + pelanggan + supir
        $payments = Payment::with(['pelanggan.supir'])
            ->orderBy('id','DESC')
            ->get();

        // Hitung ulang total & status mengikuti FE
        foreach ($payments as $payment) {

            $pelanggan = $payment->pelanggan;

            if ($pelanggan) {

                // Hitung jumlah hari
                $days = Carbon::parse($pelanggan->tanggal_booking)
                    ->diffInDays(Carbon::parse($pelanggan->tanggal_selesai)) + 1;

                // Total FE (seperti FE)
                $totalMobil = $pelanggan->harga_mobil * $days;
                $totalSupir = $pelanggan->harga_supir * $days;
                $grandTotal = $totalMobil + $totalSupir;

                // Kirim grandTotal FE ke tabel index
                $payment->calculated_total = $grandTotal;

                // Status mengikuti FE
                if ($payment->amount_paid >= $grandTotal) {
                    $payment->calculated_status = 'paid';
                } elseif ($payment->amount_paid > 0) {
                    $payment->calculated_status = 'partial';
                } else {
                    $payment->calculated_status = 'pending';
                }
            }
        }

        return view('page.backend.payment.index', compact('payments'));
    }

    /**
     * Tampilkan detail payment
     */
    public function show($id)
    {
        $payment = Payment::with(['pelanggan.supir'])->findOrFail($id);
        $pelanggan = $payment->pelanggan;

        // Perhitungan FE (sama kayak halaman detail FE)
        $days = Carbon::parse($pelanggan->tanggal_booking)
            ->diffInDays(Carbon::parse($pelanggan->tanggal_selesai)) + 1;

        $totalMobil = $pelanggan->harga_mobil * $days;
        $totalSupir = $pelanggan->harga_supir * $days;
        $grandTotal = $totalMobil + $totalSupir;

        // Biar view backend bisa pakai
        $payment->calculated_total = $grandTotal;
        $payment->remaining = $grandTotal - $payment->amount_paid;

        return view('page.backend.payment.show', compact('payment', 'pelanggan', 'days', 'totalMobil', 'totalSupir', 'grandTotal'));
    }

    /**
     * Hapus payment
     */
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()
            ->route('adminpanel.payment')
            ->with('success','Payment berhasil dihapus!');
    }
    public function pay(Request $request, $paymentId)
{
    $request->validate([
        'payment_method' => 'required|string',
        'amount' => 'required|numeric|min:1',
    ]);

    $payment = Payment::findOrFail($paymentId);
    $remaining = $payment->total - $payment->amount_paid;
    $amount = min(floatval($request->amount), $remaining);

    $payment->amount_paid += $amount;
    $payment->payment_method = $request->payment_method;

    if ($payment->amount_paid >= $payment->total) {
        $payment->status = 'paid';
        $message = 'Pembayaran berhasil! Status sekarang: Lunas';
    } elseif ($payment->amount_paid > 0) {
        $payment->status = 'partial';
        $message = 'Pembayaran berhasil! Status sekarang: Partial';
    } else {
        $payment->status = 'pending';
        $message = 'Pembayaran gagal.';
    }

    $payment->save();

    return redirect()->route('adminpanel.payment')->with('success', $message);
}

}
