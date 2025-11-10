<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Messages - Admin</title>
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
                <a href="/admin/testimonials" class="hover:text-gold">Testimonials</a>
                <a href="/admin/leads" class="hover:text-gold text-gold">Contact Messages</a>
                <a href="/admin/logout" class="hover:text-gold">Logout</a>
            </div>
        </div>
    </nav>
    
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-heading font-bold text-gold">Contact Messages</h2>
        </div>
        
        <?php if ($message = flash('success')): ?>
        <div class="bg-green-900/50 border border-green-500/50 text-green-200 px-4 py-3 rounded mb-4"><?= e($message) ?></div>
        <?php endif; ?>
        
        <?php if (empty($leads)): ?>
        <div class="bg-cosmic-dark border border-gold/30 rounded-lg shadow-xl p-8 text-center">
            <p class="text-gray-400 text-lg">No contact messages yet.</p>
        </div>
        <?php else: ?>
        <div class="bg-cosmic-dark border border-gold/30 rounded-lg shadow-xl overflow-hidden">
            <table class="w-full">
                <thead class="bg-cosmic-black border-b border-gold/30">
                    <tr>
                        <th class="text-left p-4 text-gold">ID</th>
                        <th class="text-left p-4 text-gold">Name</th>
                        <th class="text-left p-4 text-gold">Email</th>
                        <th class="text-left p-4 text-gold">Phone</th>
                        <th class="text-left p-4 text-gold">Subject</th>
                        <th class="text-left p-4 text-gold">Message</th>
                        <th class="text-left p-4 text-gold">Date</th>
                        <th class="text-right p-4 text-gold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($leads as $lead): ?>
                    <tr class="border-t border-gold/10 hover:bg-cosmic-black/50 transition-colors">
                        <td class="p-4">#<?= $lead['id'] ?></td>
                        <td class="p-4 font-semibold"><?= e($lead['name']) ?></td>
                        <td class="p-4 text-gray-400">
                            <a href="mailto:<?= e($lead['email']) ?>" class="hover:text-gold"><?= e($lead['email']) ?></a>
                        </td>
                        <td class="p-4 text-gray-400">
                            <a href="tel:<?= e($lead['phone']) ?>" class="hover:text-gold"><?= e($lead['phone']) ?></a>
                        </td>
                        <td class="p-4"><?= e($lead['subject']) ?></td>
                        <td class="p-4 text-sm text-gray-400 max-w-xs truncate" title="<?= e($lead['message']) ?>">
                            <?= e(substr($lead['message'], 0, 60)) ?><?= strlen($lead['message']) > 60 ? '...' : '' ?>
                        </td>
                        <td class="p-4 text-sm text-gray-400">
                            <?= date('M d, Y', strtotime($lead['created_at'])) ?><br>
                            <span class="text-xs"><?= date('g:i A', strtotime($lead['created_at'])) ?></span>
                        </td>
                        <td class="p-4 text-right">
                            <form method="POST" action="/admin/leads/<?= $lead['id'] ?>/delete" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this message?');">
                                <?= csrf_field() ?>
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm transition-colors">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
