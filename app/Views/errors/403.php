<?php ob_start(); ?>
<div class="container mx-auto px-4 py-20 text-center">
    <h1 class="text-6xl font-heading font-bold text-deep-blue mb-4">403</h1>
    <p class="text-2xl text-gray-600 mb-8">Access Denied - Invalid CSRF Token</p>
    <a href="/" class="btn-primary">Go Home</a>
</div>
<?php
$content = ob_get_clean();
$title = '403 - Access Denied';
require __DIR__ . '/../layouts/app.php';
