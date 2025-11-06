<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Acharya Astrology</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= asset('css/app.css') ?>">
</head>
<body class="bg-gray-100 font-body">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h1 class="text-3xl font-bold text-center mb-8 text-deep-blue">Admin Login</h1>
            <?php if (flash('error')): ?>
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                <p><?= e(flash('error')) ?></p>
            </div>
            <?php endif; ?>
            <form method="POST" action="/admin/login">
                <?= csrf_field() ?>
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" name="email" class="input-field" required>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Password</label>
                    <input type="password" name="password" class="input-field" required>
                </div>
                <button type="submit" class="btn-primary w-full">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
