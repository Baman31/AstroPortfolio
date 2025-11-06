<?php ob_start(); ?>
<section class="py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-5xl font-heading font-bold text-center mb-12 text-deep-blue">Our Services</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($services as $service): ?>
            <div class="card">
                <h3 class="text-2xl font-heading font-bold mb-4 text-deep-blue"><?= e($service['title']) ?></h3>
                <p class="text-gray-600 mb-4"><?= e($service['short_desc']) ?></p>
                <div class="mb-4">
                    <span class="text-gold font-bold text-xl">₹<?= number_format($service['price_inr']) ?></span>
                    <span class="text-gray-500"> / $<?= number_format($service['price_usd']) ?></span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-500"><?= $service['duration_minutes'] ?> minutes</span>
                    <a href="/service/<?= e($service['slug']) ?>" class="btn-primary">View Details</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
$title = 'Our Services - Acharya Astrology';
require __DIR__ . '/../layouts/app.php';
