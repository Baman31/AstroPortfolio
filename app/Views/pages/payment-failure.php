<?php ob_start(); ?>
<section class="py-16">
    <div class="container mx-auto px-4 max-w-2xl text-center">
        <div class="card">
            <div class="text-6xl mb-6">❌</div>
            <h1 class="text-4xl font-heading font-bold mb-4 text-red-600">Payment Failed</h1>
            <p class="text-xl mb-8">We couldn't process your payment. Please try again.</p>
            
            <div class="bg-red-50 border-l-4 border-red-500 p-6 mb-8 text-left">
                <h2 class="font-bold mb-2">Common Issues:</h2>
                <ul class="list-disc list-inside space-y-2">
                    <li>Insufficient funds in your account</li>
                    <li>Card declined by your bank</li>
                    <li>Incorrect card details</li>
                    <li>Payment gateway timeout</li>
                </ul>
                <p class="mt-4">If the problem persists, please contact us via WhatsApp or email.</p>
            </div>
            
            <div class="space-x-4">
                <a href="/booking" class="btn-primary inline-block">Try Again</a>
                <a href="/contact" class="btn-secondary inline-block">Contact Support</a>
            </div>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
$title = 'Payment Failed - AstroDevki';
require __DIR__ . '/../layouts/app.php';
