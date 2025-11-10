<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Testimonials - Admin</title>
    <link rel="stylesheet" href="/assets/css/app.css">
</head>
<body class="bg-cosmic-black text-off-white">
    <nav class="bg-cosmic-black text-white p-4 border-b border-gold/20">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold text-gold">Admin Panel</h1>
            <div class="flex gap-6 items-center">
                <a href="/admin/dashboard" class="hover:text-gold">Dashboard</a>
                <a href="/admin/services" class="hover:text-gold">Services</a>
                <a href="/admin/bookings" class="hover:text-gold">Bookings</a>
                <a href="/admin/posts" class="hover:text-gold">Posts</a>
                <a href="/admin/testimonials" class="hover:text-gold text-gold">Testimonials</a>
                <a href="/admin/leads" class="hover:text-gold">Contact Messages</a>
                <a href="/admin/logout" class="hover:text-gold">Logout</a>
            </div>
        </div>
    </nav>
    
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-heading font-bold text-gold">Manage Testimonials</h2>
        </div>
        
        <?php if ($message = flash('success')): ?>
        <div class="bg-green-900/50 border border-green-500/50 text-green-200 px-4 py-3 rounded mb-4"><?= e($message) ?></div>
        <?php endif; ?>
        
        <div class="bg-cosmic-dark border border-gold/30 rounded-lg shadow-xl overflow-hidden">
            <table class="w-full">
                <thead class="bg-cosmic-black border-b border-gold/30">
                    <tr>
                        <th class="text-left p-4 text-gold">ID</th>
                        <th class="text-left p-4 text-gold">Author</th>
                        <th class="text-left p-4 text-gold">Country</th>
                        <th class="text-left p-4 text-gold">Rating</th>
                        <th class="text-left p-4 text-gold">Content</th>
                        <th class="text-left p-4 text-gold">Status</th>
                        <th class="text-left p-4 text-gold">Date</th>
                        <th class="text-right p-4 text-gold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($testimonials as $testimonial): ?>
                    <tr class="border-t border-gold/10 hover:bg-cosmic-black/50 transition-colors">
                        <td class="p-4">#<?= $testimonial['id'] ?></td>
                        <td class="p-4 font-semibold"><?= e($testimonial['author_name']) ?></td>
                        <td class="p-4 text-gray-400"><?= e($testimonial['country'] ?? 'N/A') ?></td>
                        <td class="p-4">
                            <div class="flex items-center">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <span class="<?= $i <= $testimonial['rating'] ? 'text-gold' : 'text-gray-600' ?>">★</span>
                                <?php endfor; ?>
                            </div>
                        </td>
                        <td class="p-4 text-gray-400">
                            <div class="max-w-md truncate"><?= e($testimonial['content']) ?></div>
                        </td>
                        <td class="p-4">
                            <?php if ($testimonial['is_approved']): ?>
                                <span class="px-2 py-1 rounded text-sm bg-green-900/50 text-green-300 border border-green-500/50">Approved</span>
                            <?php else: ?>
                                <span class="px-2 py-1 rounded text-sm bg-yellow-900/50 text-yellow-300 border border-yellow-500/50">Pending</span>
                            <?php endif; ?>
                        </td>
                        <td class="p-4 text-gray-400">
                            <?= date('M j, Y', strtotime($testimonial['created_at'])) ?>
                        </td>
                        <td class="p-4 text-right">
                            <?php if (!$testimonial['is_approved']): ?>
                                <form method="POST" action="/admin/testimonials/<?= $testimonial['id'] ?>/approve" class="inline mr-4">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="text-green-400 hover:text-green-300">Approve</button>
                                </form>
                            <?php endif; ?>
                            <form method="POST" action="/admin/testimonials/<?= $testimonial['id'] ?>/delete" class="inline" onsubmit="return confirm('Are you sure?')">
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
