<?php ob_start(); ?>
<div class="container mx-auto px-4 py-20 text-center">
    <h1 class="text-6xl font-heading font-bold text-deep-blue mb-4">404</h1>
    <p class="text-2xl text-gray-600 mb-8">Page Not Found</p>
    <a href="/" class="btn-primary">Go Home</a>
</div>
<?php
$content = ob_get_clean();
$title = '404 - Page Not Found';
require __DIR__ . '/../layouts/app.php';
