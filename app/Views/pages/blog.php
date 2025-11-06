<?php ob_start(); ?>
<section class="py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-5xl font-heading font-bold text-center mb-12 text-deep-blue">Blog</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($posts as $post): ?>
            <div class="card">
                <?php if ($post['featured_image']): ?>
                <img src="<?= e($post['featured_image']) ?>" alt="<?= e($post['title']) ?>" class="w-full h-48 object-cover rounded-lg -m-6 mb-4">
                <?php endif; ?>
                <div class="text-sm text-gray-500 mb-2"><?= date('F j, Y', strtotime($post['published_at'])) ?></div>
                <h3 class="text-xl font-heading font-bold mb-2 text-deep-blue"><?= e($post['title']) ?></h3>
                <p class="text-gray-600 mb-4"><?= e($post['excerpt']) ?></p>
                <a href="/blog/<?= e($post['slug']) ?>" class="text-deep-blue hover:text-gold font-semibold">Read More →</a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
$title = 'Blog - Acharya Astrology';
require __DIR__ . '/../layouts/app.php';
