@extends('layouts.frontend.app')

@section('content')

<style>
    /* ===== Custom Payment Form ===== */
    .payment-card {
        max-width: 500px;
        margin: 40px auto;
        padding: 2rem;
        border-radius: 1rem;
        background: #ffffff;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .payment-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    }

    .section-card {
        background-color: #f8f9fa;
        padding: 1.5rem;
        border-radius: .75rem;
        margin-bottom: 1.5rem;
        box-shadow: inset 0 1px 3px rgba(0,0,0,0.05);
    }

    .form-label {
        font-weight: 600;
        color: #333;
    }

    #amount {
        border: 2px solid #4ade80;
        border-radius: .5rem;
        padding: .75rem 1rem;
        font-size: 1.1rem;
        transition: border 0.3s;
    }

    #amount:focus {
        border-color: #16a34a;
        box-shadow: 0 0 5px rgba(22,163,74,0.3);
    }

    .btn-pay {
        background: linear-gradient(90deg, #4ade80, #16a34a);
        color: #fff;
        font-weight: 700;
        font-size: 1.1rem;
        padding: .85rem 0;
        border-radius: .75rem;
        transition: 0.3s;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .btn-pay:hover {
        background: linear-gradient(90deg, #16a34a, #4ade80);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    .payment-methods .btn {
        margin-right: 5px;
        margin-top: 5px;
    }

    .payment-header {
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .payment-header h2 {
        color: #16a34a;
        font-weight: 700;
        margin-bottom: .5rem;
    }

    .payment-header p {
        color: #555;
        font-size: 1rem;
        margin-bottom: 0;
    }
</style>

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4">Detail Transaksi</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}" class="text-white">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('frontend.booking.form', $payment->id) }}" class="text-white">Booking</a></li>
            <li class="breadcrumb-item active text-primary">Payment</li>
        </ol>    
    </div>
</div><br><br>
<!-- Header End -->

<div class="payment-card">
    <div class="payment-header">
        <h2>Payment</h2>
        <p>Sisa pembayaran: <strong>Rp {{ number_format($payment->total - $payment->amount_paid,0,',','.') }}</strong></p>
    </div>

    <!-- Pilih Metode Pembayaran -->
    <div class="section-card payment-methods">
        <h5 class="fw-bold mb-3 text-secondary">Pilih Metode Pembayaran</h5>
        <input type="radio" class="btn-check" name="payment_method_radio" id="bank" autocomplete="off" value="bank" checked>
        <label class="btn btn-outline-primary flex-fill" for="bank">Bank</label>

        <input type="radio" class="btn-check" name="payment_method_radio" id="ovo" autocomplete="off" value="ovo">
        <label class="btn btn-outline-warning flex-fill" for="ovo">OVO</label>

        <input type="radio" class="btn-check" name="payment_method_radio" id="gopay" autocomplete="off" value="gopay">
        <label class="btn btn-outline-success flex-fill" for="gopay">Gopay</label>
    </div>

    <!-- Form Pembayaran -->
    <form id="paymentForm" action="{{ route('frontend.booking.pay', $payment->id) }}" method="POST">
        @csrf
        <input type="hidden" name="payment_method" id="selected_payment_method" value="bank">
        <input type="hidden" name="amount" id="selected_amount" value="{{ $payment->total - $payment->amount_paid }}">

        <div class="section-card">
            <label class="form-label fw-bold">Jumlah yang ingin dibayar (Rp)</label>
            <input type="number" id="amount" class="form-control"
                   value="{{ $payment->total - $payment->amount_paid }}"
                   max="{{ $payment->total - $payment->amount_paid }}" required>
        </div>

        <button type="submit" class="btn btn-pay w-100 fw-bold">
            Confirm & Pay
        </button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const radioButtons = document.querySelectorAll('input[name="payment_method_radio"]');
    const amountInput = document.getElementById('amount');
    const selectedAmount = document.getElementById('selected_amount');

    radioButtons.forEach(rb => {
        rb.addEventListener('change', () => {
            document.getElementById('selected_payment_method').value = rb.value;
        });
    });

    document.getElementById('paymentForm').addEventListener('submit', function(e){
        const amount = parseFloat(amountInput.value);
        const maxAmount = parseFloat(amountInput.max);

        if(amount <= 0) {
            e.preventDefault();
            alert('Jumlah pembayaran harus lebih dari 0');
            return;
        }

        if(amount > maxAmount) {
            e.preventDefault();
            alert('Jumlah pembayaran tidak boleh lebih dari sisa pembayaran');
            return;
        }

        selectedAmount.value = amount;
    });
});
</script>
@endsection