<!DOCTYPE html>
<html lang="<?= session('locale') ?? 'en' ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Acharya Astrology - Professional Vedic Astrology Services' ?></title>
    <meta name="description" content="<?= $description ?? 'Professional Vedic astrology consultations, personalized horoscopes, and spiritual guidance' ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= asset('css/app.css') ?>">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-off-white">
    <?php require __DIR__ . '/../partials/navbar.php'; ?>
    
    <?php
    $successMsg = flash('success');
    $errorMsg = flash('error');
    ?>
    
    <?php if ($successMsg): ?>
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
        <p><?= e($successMsg) ?></p>
    </div>
    <?php endif; ?>
    
    <?php if ($errorMsg): ?>
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
        <p><?= e($errorMsg) ?></p>
    </div>
    <?php endif; ?>
    
    <main>
        <?= $content ?? '' ?>
    </main>
    
    <?php require __DIR__ . '/../partials/footer.php'; ?>
    <?php require __DIR__ . '/../partials/whatsapp-button.php'; ?>
</body>
</html>
