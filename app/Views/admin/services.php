<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Services - Admin</title>
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
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-heading font-bold text-gold">Manage Services</h2>
            <a href="/admin/services/create" class="bg-gold text-cosmic-black px-6 py-2 rounded hover:bg-gold/90 font-semibold transition-all">Add New Service</a>
        </div>
        
        <?php if ($message = flash('success')): ?>
        <div class="bg-green-900/50 border border-green-500/50 text-green-200 px-4 py-3 rounded mb-4"><?= e($message) ?></div>
        <?php endif; ?>
        
        <div class="bg-cosmic-dark border border-gold/30 rounded-lg shadow-xl overflow-hidden">
            <table class="w-full">
                <thead class="bg-cosmic-black border-b border-gold/30">
                    <tr>
                        <th class="text-left p-4 text-gold">Title</th>
                        <th class="text-left p-4 text-gold">Slug</th>
                        <th class="text-left p-4 text-gold">Price (INR)</th>
                        <th class="text-left p-4 text-gold">Duration</th>
                        <th class="text-right p-4 text-gold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($services as $service): ?>
                    <tr class="border-t border-gold/10 hover:bg-cosmic-black/50 transition-colors">
                        <td class="p-4"><?= e($service['title']) ?></td>
                        <td class="p-4 text-gray-400"><?= e($service['slug']) ?></td>
                        <td class="p-4 text-gray-400">₹<?= number_format($service['price_inr']) ?></td>
                        <td class="p-4 text-gray-400"><?= $service['duration'] ?> min</td>
                        <td class="p-4 text-right">
                            <a href="/admin/services/<?= $service['id'] ?>/edit" class="text-gold hover:text-gold/80 mr-4">Edit</a>
                            <form method="POST" action="/admin/services/<?= $service['id'] ?>/delete" class="inline" onsubmit="return confirm('Are you sure?')">
                                <?= csrf_field() ?>
                                <button type="submit" class="text-red-400 hover:text-red-300">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
