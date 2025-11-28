@extends('layouts.frontend.app')

@section('content')

<style>
    /* ===== AESTHETIC SOFT PAYMENT UI ===== */
    body {
        background: #f7f5f2 !important; /* soft aesthetic background */
    }

    .payment-card {
        max-width: 600px;
        margin: 50px auto;
        padding: 3rem;
        border-radius: 1.6rem;
        background: #fffdfb;
        border: 1px solid rgba(180, 170, 160, 0.20);
        box-shadow: 0 18px 45px rgba(0,0,0,0.07);
        transition: .35s ease;
    }

    .payment-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 22px 50px rgba(0,0,0,0.10);
    }

    .payment-header h2 {
        font-weight: 800;
        font-size: 2.2rem;
        letter-spacing: .5px;
        color: #6c6c6c;
    }

    .payment-header p {
        font-size: 1.15rem;
        color: #8b8b8b;
        margin-top: .3rem;
    }

    .section-card {
        background: #faf9f7;
        padding: 2rem;
        border-radius: 1.2rem;
        border: 1px solid rgba(180, 170, 160, 0.18);
        box-shadow: inset 0 2px 5px rgba(0,0,0,0.04);
        margin-bottom: 1.8rem;
    }

    .form-label {
        color: #6c6c6c;
        font-weight: 600;
        font-size: 1.1rem;
    }

    #amount {
        border: 2px solid #d7d4d0;
        background: #ffffff;
        padding: 1.1rem 1.2rem;
        font-size: 1.25rem;
        border-radius: 1rem;
        transition: .3s;
    }

    #amount:focus {
        border-color: #b7c6d9;
        box-shadow: 0 0 8px rgba(150,165,185,0.25);
    }

    /* Payment method aesthetic chips */
    .payment-methods label {
        padding: .8rem 1.5rem;
        border-radius: 1rem !important;
        font-size: 1rem;
        font-weight: 600;
        background: #ffffff;
        transition: .25s;
    }

    .payment-methods label:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 16px rgba(0,0,0,0.08);
    }

    /* Soft outline colors */
    .btn-outline-primary {
        border-color: #b7c6d9 !important;
        color: #6d7c8f !important;
    }
    .btn-outline-warning {
        border-color: #e6d2a6 !important;
        color: #b79a5b !important;
    }
    .btn-outline-success {
        border-color: #cde3d7 !important;
        color: #7ea897 !important;
    }

    /* Aesthetic Pay button */
    .btn-pay {
        background: linear-gradient(90deg, #e2d9d0, #c8d9e6);
        color: #4a4a4a;
        font-weight: 700;
        padding: 1.1rem 0;
        border-radius: 1rem;
        box-shadow: 0 10px 25px rgba(200,180,170,0.25);
        font-size: 1.2rem;
        letter-spacing: .8px;
        transition: .35s;
    }

    .btn-pay:hover {
        transform: translateY(-3px);
        background: linear-gradient(90deg, #d8ccc1, #b7cada);
        box-shadow: 0 13px 30px rgba(200,180,170,0.3);
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
</div>
<br><br>
<!-- Header End -->

<div class="payment-card">

    <div class="payment-header">
        <h2>Payment</h2>
        <p>Sisa pembayaran: 
            <strong>Rp {{ number_format($payment->total - $payment->amount_paid,0,',','.') }}</strong>
        </p>
    </div>

    <!-- Metode Pembayaran -->
    <div class="section-card payment-methods">
        <h5 class="fw-bold mb-3 text-secondary" style="font-size:1.2rem;">Pilih Metode Pembayaran</h5>

        <input type="radio" class="btn-check" name="payment_method_radio" id="bank" value="bank" checked>
        <label class="btn btn-outline-primary" for="bank">Bank</label>

        <input type="radio" class="btn-check" name="payment_method_radio" id="ovo" value="ovo">
        <label class="btn btn-outline-warning" for="ovo">OVO</label>

        <input type="radio" class="btn-check" name="payment_method_radio" id="gopay" value="gopay">
        <label class="btn btn-outline-success" for="gopay">Gopay</label>
    </div>

    <form id="paymentForm" action="{{ route('frontend.booking.pay', $payment->id) }}" method="POST">
        @csrf
        <input type="hidden" name="payment_method" id="selected_payment_method" value="bank">
        <input type="hidden" name="amount" id="selected_amount" value="{{ $payment->total - $payment->amount_paid }}">

        <div class="section-card">
            <label class="form-label">Jumlah Pembayaran (Rp)</label>
            <input type="number" id="amount" class="form-control"
                   value="{{ $payment->total - $payment->amount_paid }}"
                   max="{{ $payment->total - $payment->amount_paid }}"
                   required>
        </div>

        <button type="submit" class="btn btn-pay w-100">
            Confirm & Pay
        </button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const radios = document.querySelectorAll('input[name="payment_method_radio"]');
    const amountInput = document.getElementById('amount');
    const selectedAmount = document.getElementById('selected_amount');

    radios.forEach(rb => {
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
            alert('Jumlah pembayaran tidak boleh melebihi sisa pembayaran');
            return;
        }

        selectedAmount.value = amount;
    });
});
</script>

@endsection
