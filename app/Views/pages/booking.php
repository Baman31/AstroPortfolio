<?php ob_start(); ?>
<?php 
$pageTitle = 'Appointment II';
$subtitle = 'Book Your Session';
$description = 'Schedule your personalized astrology consultation with our expert astrologers';
require __DIR__ . '/../partials/page-hero.php';
?>

<section class="py-16 bg-cosmic-dark">
    <div class="container mx-auto px-4 max-w-3xl">
        
        <div class="card">
            <form method="POST" action="/booking/submit" x-data="{ currency: 'inr' }">
                <?= csrf_field() ?>
                
                <div class="mb-6">
                    <label class="block text-gray-300 font-semibold mb-2">Select Service *</label>
                    <select name="service_id" class="input-field" required>
                        <option value="">Choose a service...</option>
                        <?php
                        $services = db()->query("SELECT * FROM services WHERE is_active = 1 ORDER BY sort_order")->fetchAll();
                        foreach ($services as $service):
                        ?>
                        <option value="<?= $service['id'] ?>"><?= e($service['title']) ?> - ₹<?= number_format($service['price_inr']) ?> / $<?= number_format($service['price_usd']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-300 font-semibold mb-2">Full Name *</label>
                        <input type="text" name="name" class="input-field" required value="<?= old('name') ?>">
                    </div>
                    <div>
                        <label class="block text-gray-300 font-semibold mb-2">Email *</label>
                        <input type="email" name="email" class="input-field" required value="<?= old('email') ?>">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-300 font-semibold mb-2">Phone *</label>
                        <input type="tel" name="phone" class="input-field" required value="<?= old('phone') ?>">
                    </div>
                    <div>
                        <label class="block text-gray-300 font-semibold mb-2">Timezone</label>
                        <select name="timezone" class="input-field">
                            <option value="Asia/Kolkata">IST (Asia/Kolkata)</option>
                            <option value="America/New_York">EST (New York)</option>
                            <option value="America/Los_Angeles">PST (Los Angeles)</option>
                            <option value="Europe/London">GMT (London)</option>
                            <option value="Australia/Sydney">AEDT (Sydney)</option>
                        </select>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-300 font-semibold mb-2">Preferred Date *</label>
                        <input type="date" name="preferred_date" class="input-field" required min="<?= date('Y-m-d', strtotime('+1 day')) ?>">
                    </div>
                    <div>
                        <label class="block text-gray-300 font-semibold mb-2">Preferred Time *</label>
                        <input type="time" name="preferred_time" class="input-field" required>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-300 font-semibold mb-2">Meeting Mode *</label>
                    <select name="meeting_mode" class="input-field" required>
                        <option value="video">Video Call (Zoom/Google Meet)</option>
                        <option value="phone">Phone Call</option>
                        <option value="in-person">In-Person (if available)</option>
                    </select>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-300 font-semibold mb-2">Currency for Payment *</label>
                    <select name="currency" x-model="currency" class="input-field" required>
                        <option value="inr">INR (₹) - Razorpay</option>
                        <option value="usd">USD ($) - Stripe</option>
                    </select>
                </div>
                
                <div class="mb-6">
                    <label class="block text-gray-300 font-semibold mb-2">Additional Notes</label>
                    <textarea name="notes" rows="4" class="input-field" placeholder="Any specific questions or topics you'd like to discuss..."><?= old('notes') ?></textarea>
                </div>
                
                <button type="submit" class="btn-primary w-full">Proceed to Payment</button>
            </form>
        </div>
        
        <div class="mt-8 text-center text-gray-600">
            <p>By booking, you agree to our terms of service. You will receive a confirmation email with meeting details after successful payment.</p>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
$title = 'Book a Consultation - Acharya Astrology';
require __DIR__ . '/../layouts/app.php';
