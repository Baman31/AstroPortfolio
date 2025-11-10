<?php ob_start(); ?>
<?php 
$pageTitle = 'Testimonials';
$subtitle = 'Client Stories';
$description = 'Hear from those who have experienced the transformative power of astrology';
require __DIR__ . '/../partials/page-hero.php';
?>

<section class="py-16 bg-cosmic-dark">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php
            $testimonials = db()->query("SELECT * FROM testimonials WHERE is_approved = 1 ORDER BY created_at DESC")->fetchAll();
            foreach ($testimonials as $testimonial):
            ?>
            <div class="card-dark">
                <div class="flex items-center mb-4">
                    <?php for ($i = 0; $i < 5; $i++): ?>
                        <span class="text-gold text-2xl"><?= $i < $testimonial['rating'] ? '★' : '☆' ?></span>
                    <?php endfor; ?>
                </div>
                <p class="text-gray-300 mb-4 italic">"<?= e($testimonial['content']) ?>"</p>
                <div class="border-t border-gold/20 pt-4">
                    <div class="font-semibold text-off-white"><?= e($testimonial['author_name']) ?></div>
                    <div class="text-sm text-gray-400"><?= e($testimonial['country']) ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
$title = 'Testimonials - Augury Astrology';
require __DIR__ . '/../layouts/app.php';
