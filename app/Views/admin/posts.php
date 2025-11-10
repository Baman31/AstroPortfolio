<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Posts - Admin</title>
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
                <a href="/admin/posts" class="hover:text-gold text-gold">Posts</a>
                <a href="/admin/testimonials" class="hover:text-gold">Testimonials</a>
                <a href="/admin/leads" class="hover:text-gold">Contact Messages</a>
                <a href="/admin/logout" class="hover:text-gold">Logout</a>
            </div>
        </div>
    </nav>
    
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-heading font-bold text-gold">Manage Blog Posts</h2>
            <a href="/admin/posts/create" class="bg-gold text-cosmic-black px-6 py-2 rounded hover:bg-gold/90 font-semibold transition-all">Add New Post</a>
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
                        <th class="text-left p-4 text-gold">Status</th>
                        <th class="text-left p-4 text-gold">Published</th>
                        <th class="text-left p-4 text-gold">Created</th>
                        <th class="text-right p-4 text-gold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $post): ?>
                    <tr class="border-t border-gold/10 hover:bg-cosmic-black/50 transition-colors">
                        <td class="p-4 font-semibold"><?= e($post['title']) ?></td>
                        <td class="p-4 text-gray-400"><?= e($post['slug']) ?></td>
                        <td class="p-4">
                            <span class="px-2 py-1 rounded text-sm <?= $post['status'] === 'published' ? 'bg-green-900/50 text-green-300 border border-green-500/50' : 'bg-gray-900/50 text-gray-300 border border-gray-500/50' ?>">
                                <?= ucfirst(e($post['status'])) ?>
                            </span>
                        </td>
                        <td class="p-4 text-gray-400">
                            <?= $post['published_at'] ? date('M j, Y', strtotime($post['published_at'])) : 'Not published' ?>
                        </td>
                        <td class="p-4 text-gray-400">
                            <?= date('M j, Y', strtotime($post['created_at'])) ?>
                        </td>
                        <td class="p-4 text-right">
                            <a href="/blog/<?= $post['slug'] ?>" target="_blank" class="text-green-400 hover:text-green-300 mr-4">View</a>
                            <a href="/admin/posts/<?= $post['id'] ?>/edit" class="text-gold hover:text-gold/80 mr-4">Edit</a>
                            <form method="POST" action="/admin/posts/<?= $post['id'] ?>/delete" class="inline" onsubmit="return confirm('Are you sure?')">
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
