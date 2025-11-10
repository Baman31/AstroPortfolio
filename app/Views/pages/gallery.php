<?php ob_start(); ?>
<?php 
$pageTitle = 'Gallery';
$subtitle = 'Visual Journey';
$description = 'Explore our collection of moments and memories';
require __DIR__ . '/../partials/page-hero.php';
?>

<section class="py-16 bg-cosmic-dark">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php
            $media = db()->query("SELECT * FROM media WHERE type = 'image' ORDER BY created_at DESC LIMIT 12")->fetchAll();
            if (empty($media)): ?>
                <div class="col-span-3 text-center py-12">
                    <p class="text-gray-400 text-xl">Gallery images coming soon...</p>
                </div>
            <?php else:
                foreach ($media as $item):
            ?>
                <div class="card-dark p-0 overflow-hidden">
                    <img src="<?= e($item['path']) ?>" alt="<?= e($item['alt_text']) ?>" class="w-full h-64 object-cover">
                    <?php if ($item['alt_text']): ?>
                    <div class="p-4">
                        <p class="text-gray-300"><?= e($item['alt_text']) ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
$title = 'Gallery - Augury Astrology';
require __DIR__ . '/../layouts/app.php';
