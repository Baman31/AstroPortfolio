<?php ob_start(); ?>
<section class="py-16">
    <div class="container mx-auto px-4 max-w-4xl">
        <article>
            <h1 class="text-5xl font-heading font-bold mb-4 text-deep-blue"><?= e($post['title']) ?></h1>
            <div class="text-gray-500 mb-8"><?= date('F j, Y', strtotime($post['published_at'])) ?></div>
            <?php if ($post['featured_image']): ?>
            <img src="<?= e($post['featured_image']) ?>" alt="<?= e($post['title']) ?>" class="w-full h-96 object-cover rounded-lg mb-8">
            <?php endif; ?>
            <div class="prose max-w-none">
                <?= nl2br(e($post['content'])) ?>
            </div>
        </article>
        <div class="mt-12">
            <a href="/blog" class="text-deep-blue hover:text-gold font-semibold">← Back to Blog</a>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
$title = e($post['title']) . ' - AstroDevki';
require __DIR__ . '/../layouts/app.php';
