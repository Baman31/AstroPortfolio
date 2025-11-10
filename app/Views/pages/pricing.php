<?php ob_start(); ?>
<?php 
$pageTitle = 'Pricing';
$subtitle = 'Investment in Your Future';
$description = 'Choose the perfect consultation package for your needs';
require __DIR__ . '/../partials/page-hero.php';
?>

<section class="py-16 bg-cosmic-dark" x-data="{ currency: 'inr' }">
    <div class="container mx-auto px-4">
        <div class="text-center mb-8">
            <div class="inline-flex rounded-lg border-2 border-gold p-1">
                <button @click="currency = 'inr'" :class="currency === 'inr' ? 'bg-gold text-cosmic-black' : 'text-gold'" class="px-6 py-2 rounded-lg font-semibold transition-all">INR (₹)</button>
                <button @click="currency = 'usd'" :class="currency === 'usd' ? 'bg-gold text-cosmic-black' : 'text-gold'" class="px-6 py-2 rounded-lg font-semibold transition-all">USD ($)</button>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            <?php
            $services = db()->query("SELECT * FROM services WHERE is_active = 1 ORDER BY sort_order")->fetchAll();
            foreach ($services as $service):
            ?>
            <div class="card-dark text-center">
                <h3 class="text-2xl font-heading font-bold mb-4 text-gold"><?= e($service['title']) ?></h3>
                <div class="mb-6">
                    <div x-show="currency === 'inr'">
                        <div class="text-4xl font-bold text-off-white mb-2">₹<?= number_format($service['price_inr']) ?></div>
                    </div>
                    <div x-show="currency === 'usd'">
                        <div class="text-4xl font-bold text-off-white mb-2">$<?= number_format($service['price_usd']) ?></div>
                    </div>
                    <div class="text-gray-400"><?= $service['duration_minutes'] ?> minutes</div>
                </div>
                <p class="text-gray-300 mb-6"><?= e($service['short_desc']) ?></p>
                <a href="/booking?service=<?= e($service['slug']) ?>" class="btn-primary w-full inline-block">Book Now</a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
$title = 'Pricing - Augury Astrology';
require __DIR__ . '/../layouts/app.php';
