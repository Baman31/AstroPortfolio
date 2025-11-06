<?php ob_start(); ?>
<section class="py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-5xl font-heading font-bold text-center mb-12 text-deep-blue">Testimonials</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php
            $testimonials = db()->query("SELECT * FROM testimonials WHERE is_approved = 1 ORDER BY created_at DESC")->fetchAll();
            foreach ($testimonials as $testimonial):
            ?>
            <div class="card">
                <div class="flex items-center mb-4">
                    <?php for ($i = 0; $i < 5; $i++): ?>
                        <span class="text-gold text-2xl"><?= $i < $testimonial['rating'] ? '★' : '☆' ?></span>
                    <?php endfor; ?>
                </div>
                <p class="text-gray-700 mb-4 italic">"<?= e($testimonial['content']) ?>"</p>
                <div class="border-t pt-4">
                    <div class="font-semibold text-deep-blue"><?= e($testimonial['author_name']) ?></div>
                    <div class="text-sm text-gray-500"><?= e($testimonial['country']) ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
$title = 'Testimonials - Acharya Astrology';
require __DIR__ . '/../layouts/app.php';
