<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Acharya Astrology</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= asset('css/app.css') ?>">
</head>
<body class="bg-cosmic-black font-body">
    <div class="min-h-screen flex items-center justify-center relative overflow-hidden">
        <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(2px 2px at 25% 25%, white, transparent), radial-gradient(2px 2px at 75% 75%, white, transparent); background-size: 150px 150px;"></div>
        
        <div class="bg-cosmic-dark/80 backdrop-blur-sm border border-gold/30 p-8 rounded-lg shadow-2xl w-full max-w-md relative z-10">
            <div class="text-center mb-6">
                <span class="text-4xl">✨</span>
                <h1 class="text-3xl font-heading font-bold text-gold mt-2 mb-2">Admin Portal</h1>
                <p class="text-gray-400 text-sm">Access the mystical control panel</p>
            </div>
            
            <?php if (flash('error')): ?>
            <div class="bg-red-900/50 border-l-4 border-red-500 text-red-200 p-4 mb-6 rounded" role="alert">
                <p><?= e(flash('error')) ?></p>
            </div>
            <?php endif; ?>
            
            <form method="POST" action="/admin/login">
                <?= csrf_field() ?>
                <div class="mb-4">
                    <label class="block text-gold font-semibold mb-2">Email</label>
                    <input type="email" name="email" class="w-full bg-cosmic-black border border-gold/30 rounded px-4 py-2 text-off-white focus:outline-none focus:border-gold transition-colors" required>
                </div>
                <div class="mb-6">
                    <label class="block text-gold font-semibold mb-2">Password</label>
                    <input type="password" name="password" class="w-full bg-cosmic-black border border-gold/30 rounded px-4 py-2 text-off-white focus:outline-none focus:border-gold transition-colors" required>
                </div>
                <button type="submit" class="btn-primary w-full">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
