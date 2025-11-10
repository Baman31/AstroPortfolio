<?php ob_start(); ?>
<?php 
$pageTitle = 'Our Services';
$subtitle = 'Astrological Consultations';
$description = 'Expert guidance for all aspects of your life journey';
require __DIR__ . '/../partials/page-hero.php';
?>

<section class="py-16 bg-cosmic-dark">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($services as $service): ?>
            <div class="card-dark">
                <h3 class="text-2xl font-heading font-bold mb-4 text-gold"><?= e($service['title']) ?></h3>
                <p class="text-gray-300 mb-4"><?= e($service['short_desc']) ?></p>
                <div class="flex justify-end items-center">
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
