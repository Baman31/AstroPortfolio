<?php ob_start(); ?>
<section class="py-16">
    <div class="container mx-auto px-4 max-w-2xl">
        <div class="card text-center">
            <div class="text-6xl mb-6">💳</div>
            <h1 class="text-4xl font-heading font-bold mb-4 text-deep-blue">Razorpay Payment</h1>
            <p class="text-xl mb-6">Booking ID: #<?= $bookingId ?></p>
            <p class="text-3xl font-bold text-gold mb-8">₹<?= number_format($amount) ?></p>
            
            <div class="bg-yellow-50 border-l-4 border-yellow-500 p-4 mb-6 text-left">
                <p class="font-semibold mb-2">⚠️ Payment Integration Pending</p>
                <p class="text-sm">Razorpay integration is being configured. For now, you can simulate a successful payment by clicking the button below.</p>
            </div>
            
            <a href="/payment/success" class="btn-primary inline-block">Simulate Successful Payment</a>
            <a href="/payment/failure" class="text-red-600 block mt-4">Simulate Payment Failure</a>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
$title = 'Payment - Razorpay';
require __DIR__ . '/../layouts/app.php';
