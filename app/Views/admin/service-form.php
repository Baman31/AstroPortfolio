<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($service) ? 'Edit' : 'Create' ?> Service - Admin</title>
    <link rel="stylesheet" href="/assets/css/app.css">
</head>
<body class="bg-cosmic-black text-off-white">
    <nav class="bg-cosmic-black text-white p-4 border-b border-gold/20">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold text-gold">Admin Panel</h1>
            <div class="flex gap-6 items-center">
                <a href="/admin/dashboard" class="hover:text-gold">Dashboard</a>
                <a href="/admin/services" class="hover:text-gold text-gold">Services</a>
                <a href="/admin/bookings" class="hover:text-gold">Bookings</a>
                <a href="/admin/posts" class="hover:text-gold">Posts</a>
                <a href="/admin/testimonials" class="hover:text-gold">Testimonials</a>
                <a href="/admin/leads" class="hover:text-gold">Contact Messages</a>
                <a href="/admin/logout" class="hover:text-gold">Logout</a>
            </div>
        </div>
    </nav>
    
    <div class="container mx-auto px-4 py-8">
        <div class="mb-8">
            <h2 class="text-3xl font-heading font-bold text-gold"><?= isset($service) ? 'Edit' : 'Create New' ?> Service</h2>
        </div>
        
        <?php if ($errors = flash('errors')): ?>
        <div class="bg-red-900/50 border border-red-500/50 text-red-200 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside">
                <?php foreach ($errors as $error): ?>
                <li><?= e($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>
        
        <div class="bg-cosmic-dark border border-gold/30 rounded-lg shadow-xl p-6">
            <form method="POST" action="<?= isset($service) ? '/admin/services/' . $service['id'] . '/edit' : '/admin/services/create' ?>">
                <?= csrf_field() ?>
                
                <div class="mb-4">
                    <label for="title" class="block text-gold font-semibold mb-2">Title *</label>
                    <input type="text" id="title" name="title" value="<?= e($service['title'] ?? '') ?>" 
                           class="w-full bg-cosmic-black border border-gold/30 rounded px-4 py-2 text-off-white focus:outline-none focus:border-gold transition-colors" required>
                </div>
                
                <div class="mb-4">
                    <label for="slug" class="block text-gold font-semibold mb-2">Slug *</label>
                    <input type="text" id="slug" name="slug" value="<?= e($service['slug'] ?? '') ?>" 
                           class="w-full bg-cosmic-black border border-gold/30 rounded px-4 py-2 text-off-white focus:outline-none focus:border-gold transition-colors" required>
                    <p class="text-sm text-gray-400 mt-1">URL-friendly version (e.g., birth-chart-analysis)</p>
                </div>
                
                <div class="mb-4">
                    <label for="short_desc" class="block text-gold font-semibold mb-2">Short Description</label>
                    <textarea id="short_desc" name="short_desc" rows="2" 
                              class="w-full bg-cosmic-black border border-gold/30 rounded px-4 py-2 text-off-white focus:outline-none focus:border-gold transition-colors"><?= e($service['short_desc'] ?? '') ?></textarea>
                </div>
                
                <div class="mb-4">
                    <label for="description" class="block text-gold font-semibold mb-2">Description</label>
                    <textarea id="description" name="description" rows="6" 
                              class="w-full bg-cosmic-black border border-gold/30 rounded px-4 py-2 text-off-white focus:outline-none focus:border-gold transition-colors"><?= e($service['description'] ?? '') ?></textarea>
                </div>
                
                <div class="mb-4">
                    <label for="icon" class="block text-gold font-semibold mb-2">Mystical Icon</label>
                    <input type="text" id="icon" name="icon" value="<?= e($service['icon'] ?? '✨') ?>" 
                           class="w-full bg-cosmic-black border border-gold/30 rounded px-4 py-2 text-4xl text-center focus:outline-none focus:border-gold transition-colors" 
                           placeholder="✨">
                    <p class="text-sm text-gray-400 mt-1">Enter a mystical emoji (e.g., 🔮 ⭐ 💫 ✨ 🌙 ☀️)</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div>
                        <label for="price_inr" class="block text-gold font-semibold mb-2">Price (INR) *</label>
                        <input type="number" id="price_inr" name="price_inr" value="<?= e($service['price_inr'] ?? '') ?>" 
                               class="w-full bg-cosmic-black border border-gold/30 rounded px-4 py-2 text-off-white focus:outline-none focus:border-gold transition-colors" required>
                    </div>
                    
                    <div>
                        <label for="price_usd" class="block text-gold font-semibold mb-2">Price (USD) *</label>
                        <input type="number" id="price_usd" name="price_usd" value="<?= e($service['price_usd'] ?? '') ?>" 
                               class="w-full bg-cosmic-black border border-gold/30 rounded px-4 py-2 text-off-white focus:outline-none focus:border-gold transition-colors" required>
                    </div>
                    
                    <div>
                        <label for="duration_minutes" class="block text-gold font-semibold mb-2">Duration (minutes) *</label>
                        <input type="number" id="duration_minutes" name="duration_minutes" value="<?= e($service['duration_minutes'] ?? 60) ?>" 
                               class="w-full bg-cosmic-black border border-gold/30 rounded px-4 py-2 text-off-white focus:outline-none focus:border-gold transition-colors" required>
                    </div>
                </div>
                
                <div class="flex gap-4">
                    <button type="submit" class="bg-gold text-cosmic-black px-6 py-2 rounded hover:bg-gold/90 font-semibold transition-all">
                        <?= isset($service) ? 'Update' : 'Create' ?> Service
                    </button>
                    <a href="/admin/services" class="bg-cosmic-black border border-gold/30 text-off-white px-6 py-2 rounded hover:border-gold font-semibold transition-all">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
