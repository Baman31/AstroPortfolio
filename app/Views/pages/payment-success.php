<?php ob_start(); ?>
<section class="py-16">
    <div class="container mx-auto px-4 max-w-2xl text-center">
        <div class="card">
            <div class="text-6xl mb-6">✅</div>
            <h1 class="text-4xl font-heading font-bold mb-4 text-green-600">Payment Successful!</h1>
            <p class="text-xl mb-8">Thank you for booking a consultation with us.</p>
            
            <div class="bg-yellow-50 border-l-4 border-yellow-500 p-6 mb-8 text-left">
                <h2 class="font-bold mb-2">⚠️ Demo Mode - Payment Integration Required</h2>
                <p class="mb-2">This is a demonstration of the booking flow. In production:</p>
                <ul class="list-disc list-inside space-y-2">
                    <li>Real Razorpay/Stripe payment verification will be required</li>
                    <li>Bookings will only be marked as "paid" after successful payment webhook verification</li>
                    <li>Email confirmation will be sent with calendar invitations</li>
                    <li>Admin dashboard will show actual payment confirmations</li>
                </ul>
                <p class="mt-2 font-semibold text-sm">Note: Currently, bookings remain in "pending" status until payment gateway integration is completed.</p>
            </div>
            
            <div class="space-x-4">
                <a href="/" class="btn-primary inline-block">Go to Home</a>
                <a href="/booking" class="btn-secondary inline-block">Book Another Consultation</a>
            </div>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
$title = 'Payment Successful - AstroDevki';
require __DIR__ . '/../layouts/app.php';
