<?php ob_start(); ?>
<section class="py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-5xl font-heading font-bold text-center mb-12 text-deep-blue">Gallery</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php
            $media = db()->query("SELECT * FROM media WHERE type = 'image' ORDER BY created_at DESC LIMIT 12")->fetchAll();
            if (empty($media)): ?>
                <div class="col-span-3 text-center py-12">
                    <p class="text-gray-500 text-xl">Gallery images coming soon...</p>
                </div>
            <?php else:
                foreach ($media as $item):
            ?>
                <div class="card p-0 overflow-hidden">
                    <img src="<?= e($item['path']) ?>" alt="<?= e($item['alt_text']) ?>" class="w-full h-64 object-cover">
                    <?php if ($item['alt_text']): ?>
                    <div class="p-4">
                        <p class="text-gray-700"><?= e($item['alt_text']) ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
$title = 'Gallery - Acharya Astrology';
require __DIR__ . '/../layouts/app.php';
