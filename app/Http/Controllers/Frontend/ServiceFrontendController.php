<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Supir;
use App\Models\Pelanggan;
use App\Models\Payment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ServiceFrontendController extends Controller
{
    // Daftar layanan mobil
    public function index(Request $request)
    {
        $query = Service::where('status', 'active');

        if ($request->has('merk') && $request->merk != '') {
            $query->where('merk_mobil', 'like', '%' . $request->merk . '%');
        }

        $services = $query->orderBy('id', 'DESC')->get();
        return view('page.frontend.service.index', compact('services'));
    }

    // Halaman booking
    public function booking(Request $request)
    {
        $services = Service::where('status', 'active')->orderBy('id', 'DESC')->get();
        $supirs = Supir::where('status', 'active')->orderBy('name', 'ASC')->get();
        $selectedService = $request->mobil_id ? Service::find($request->mobil_id) : null;

        return view('page.frontend.service.booking', compact('services', 'supirs', 'selectedService'));
    }

    // Simpan booking & payment
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'telepon' => 'required',
            'email' => 'required|email',
            'mobil_id' => 'required|exists:services,id',
            'pickup_date' => 'required|date',
            'pickup_time' => 'required',
            'dropoff_date' => 'required|date',
            'dropoff_time' => 'required',
        ]);

        $service = Service::findOrFail($request->mobil_id);
        $supir = $request->supir_id ? Supir::find($request->supir_id) : null;

        // Simpan data pelanggan
        $pelanggan = Pelanggan::create([
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'merk_mobil' => $service->merk_mobil,
            'tipe_mobil' => $service->nama_mobil,
            'tanggal_booking' => $request->pickup_date,
            'jam_booking' => $request->pickup_time,
            'tanggal_selesai' => $request->dropoff_date,
            'jam_selesai' => $request->dropoff_time,
            'status' => 'pending',
            'supir_id' => $supir?->id,
        ]);

        // Hitung total harga
        $days = Carbon::parse($request->pickup_date)
                    ->diffInDays(Carbon::parse($request->dropoff_date)) + 1;
        $totalMobil = $service->harga_sewa * $days;
        $totalSupir = $supir ? $supir->price * $days : 0;
        $grandTotal = $totalMobil + $totalSupir;

        // Simpan payment
        $payment = Payment::create([
            'pelanggan_id' => $pelanggan->id,
            'total' => $grandTotal,
            'amount_paid' => 0,
            'status' => 'pending',
        ]);

        return redirect()->route('frontend.booking.payment', $payment->id)
                         ->with('success', 'Booking berhasil! Silahkan lanjut ke pembayaran.');
    }

    // Payment Summary (input jumlah bayar)
        public function paymentSummary($paymentId)
    {
        $payment = Payment::with('pelanggan.supir')->findOrFail($paymentId);
        $pelanggan = $payment->pelanggan;

        $days = Carbon::parse($pelanggan->tanggal_booking)
                    ->diffInDays(Carbon::parse($pelanggan->tanggal_selesai)) + 1;

        $service = Service::where('nama_mobil', $pelanggan->tipe_mobil)
                        ->where('merk_mobil', $pelanggan->merk_mobil)
                        ->first();

        $totalMobil = $service ? $service->harga_sewa * $days : 0;
        $totalSupir = $pelanggan->supir ? $pelanggan->supir->price * $days : 0;
        $grandTotal = $totalMobil + $totalSupir;

        $sisa = $grandTotal - ($payment->amount_paid ?? 0); // <--- tambahan ini

        return view('page.frontend.service.payment-summary', compact(
            'payment', 'pelanggan', 'days', 'totalMobil', 'totalSupir', 'grandTotal', 'sisa'
        ));
    }

    // Proses pembayaran (multi / partial)
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

        // Update status otomatis
        if ($payment->amount_paid >= $payment->total) {
            $payment->status = 'paid';
        } elseif ($payment->amount_paid > 0) {
            $payment->status = 'partial';
        } else {
            $payment->status = 'pending';
        }

        $payment->save();

        return redirect()->route('frontend.booking.detail', $paymentId)
                         ->with('success', 'Pembayaran berhasil! Sisa bayar: Rp ' . number_format($payment->total - $payment->amount_paid, 0, ',', '.'));
    }

    // Detail pembayaran
    public function paymentDetail($paymentId)
    {
        $payment = Payment::with('pelanggan.supir')->findOrFail($paymentId);
        $pelanggan = $payment->pelanggan;

        $days = Carbon::parse($pelanggan->tanggal_booking)
                    ->diffInDays(Carbon::parse($pelanggan->tanggal_selesai)) + 1;

        $service = Service::where('nama_mobil', $pelanggan->tipe_mobil)
                        ->where('merk_mobil', $pelanggan->merk_mobil)
                        ->first();

        $totalMobil = $service ? $service->harga_sewa * $days : 0;
        $totalSupir = $pelanggan->supir ? $pelanggan->supir->price * $days : 0;
        $grandTotal = $totalMobil + $totalSupir;

        return view('page.frontend.service.payment-detail', compact(
            'payment', 'pelanggan', 'days', 'totalMobil', 'totalSupir', 'grandTotal'
        ));
    }

}
