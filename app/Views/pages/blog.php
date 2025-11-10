<?php ob_start(); ?>
<?php 
$pageTitle = 'Blog';
$subtitle = 'Insights & Wisdom';
$description = 'Explore the mysteries of astrology through our articles and insights';
require __DIR__ . '/../partials/page-hero.php';
?>

<section class="py-16 bg-cosmic-dark">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($posts as $post): ?>
            <div class="card-dark">
                <?php if ($post['featured_image']): ?>
                <img src="<?= e($post['featured_image']) ?>" alt="<?= e($post['title']) ?>" class="w-full h-48 object-cover rounded-lg -m-6 mb-4">
                <?php endif; ?>
                <div class="text-sm text-gray-400 mb-2"><?= date('F j, Y', strtotime($post['published_at'])) ?></div>
                <h3 class="text-xl font-heading font-bold mb-2 text-gold"><?= e($post['title']) ?></h3>
                <p class="text-gray-300 mb-4"><?= e($post['excerpt']) ?></p>
                <a href="/blog/<?= e($post['slug']) ?>" class="text-gold hover:text-gold-light font-semibold">Read More →</a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
$title = 'Blog - Augury Astrology';
require __DIR__ . '/../layouts/app.php';
