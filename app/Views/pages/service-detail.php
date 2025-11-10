<?php ob_start(); ?>
<section class="py-16">
    <div class="container mx-auto px-4 max-w-4xl">
        <h1 class="text-5xl font-heading font-bold mb-8 text-deep-blue"><?= e($service['title']) ?></h1>
        <div class="card mb-8">
            <div class="prose max-w-none mb-6">
                <?= nl2br(e($service['description'])) ?>
            </div>
            <div class="border-t pt-6 mt-6">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                    <div>
                        <div class="text-sm text-gray-500">Duration</div>
                        <div class="font-bold"><?= $service['duration_minutes'] ?> min</div>
                    </div>
                    <div>
                        <div class="text-sm text-gray-500">Price (INR)</div>
                        <div class="font-bold text-gold">₹<?= number_format($service['price_inr']) ?></div>
                    </div>
                    <div>
                        <div class="text-sm text-gray-500">Price (USD)</div>
                        <div class="font-bold text-gold">$<?= number_format($service['price_usd']) ?></div>
                    </div>
                </div>
                <a href="/booking?service=<?= e($service['slug']) ?>" class="btn-primary inline-block">Book This Service</a>
            </div>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
$title = e($service['title']) . ' - AstroDevki';
require __DIR__ . '/../layouts/app.php';
