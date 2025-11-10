<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bookings - Admin</title>
    <link rel="stylesheet" href="/assets/css/app.css">
</head>
<body class="bg-cosmic-black text-off-white">
    <nav class="bg-cosmic-black text-white p-4 border-b border-gold/20">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold text-gold">Admin Panel</h1>
            <div class="flex gap-6 items-center">
                <a href="/admin/dashboard" class="hover:text-gold">Dashboard</a>
                <a href="/admin/services" class="hover:text-gold">Services</a>
                <a href="/admin/bookings" class="hover:text-gold text-gold">Bookings</a>
                <a href="/admin/posts" class="hover:text-gold">Posts</a>
                <a href="/admin/testimonials" class="hover:text-gold">Testimonials</a>
                <a href="/admin/leads" class="hover:text-gold">Contact Messages</a>
                <a href="/admin/logout" class="hover:text-gold">Logout</a>
            </div>
        </div>
    </nav>
    
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-heading font-bold text-gold">Manage Bookings</h2>
        </div>
        
        <?php if ($message = flash('success')): ?>
        <div class="bg-green-900/50 border border-green-500/50 text-green-200 px-4 py-3 rounded mb-4"><?= e($message) ?></div>
        <?php endif; ?>
        
        <div class="bg-cosmic-dark border border-gold/30 rounded-lg shadow-xl overflow-hidden">
            <table class="w-full">
                <thead class="bg-cosmic-black border-b border-gold/30">
                    <tr>
                        <th class="text-left p-4 text-gold">ID</th>
                        <th class="text-left p-4 text-gold">Name</th>
                        <th class="text-left p-4 text-gold">Email</th>
                        <th class="text-left p-4 text-gold">Phone</th>
                        <th class="text-left p-4 text-gold">Service</th>
                        <th class="text-left p-4 text-gold">Date & Time</th>
                        <th class="text-left p-4 text-gold">Amount</th>
                        <th class="text-left p-4 text-gold">Payment Status</th>
                        <th class="text-right p-4 text-gold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bookings as $booking): ?>
                    <tr class="border-t border-gold/10 hover:bg-cosmic-black/50 transition-colors">
                        <td class="p-4">#<?= $booking['id'] ?></td>
                        <td class="p-4"><?= e($booking['name']) ?></td>
                        <td class="p-4 text-gray-400"><?= e($booking['email']) ?></td>
                        <td class="p-4 text-gray-400"><?= e($booking['phone'] ?? 'N/A') ?></td>
                        <td class="p-4 text-gray-400"><?= e($booking['service_title'] ?? 'Service #' . $booking['service_id']) ?></td>
                        <td class="p-4 text-gray-400">
                            <?= e($booking['preferred_date'] ?? 'TBD') ?><br>
                            <span class="text-sm text-gray-500"><?= e($booking['preferred_time'] ?? '') ?></span>
                        </td>
                        <td class="p-4 text-gray-400">
                            <?= $booking['currency'] === 'USD' ? '$' : '₹' ?><?= number_format($booking['amount']) ?>
                        </td>
                        <td class="p-4">
                            <form method="POST" action="/admin/bookings/<?= $booking['id'] ?>/update-status" class="inline">
                                <?= csrf_field() ?>
                                <select name="payment_status" onchange="this.form.submit()" 
                                        class="bg-cosmic-black border border-gold/30 rounded px-2 py-1 text-sm text-off-white focus:outline-none focus:border-gold <?= $booking['payment_status'] === 'paid' ? 'border-green-500/50' : ($booking['payment_status'] === 'failed' ? 'border-red-500/50' : 'border-yellow-500/50') ?>">
                                    <option value="pending" <?= $booking['payment_status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                                    <option value="paid" <?= $booking['payment_status'] === 'paid' ? 'selected' : '' ?>>Paid</option>
                                    <option value="failed" <?= $booking['payment_status'] === 'failed' ? 'selected' : '' ?>>Failed</option>
                                    <option value="refunded" <?= $booking['payment_status'] === 'refunded' ? 'selected' : '' ?>>Refunded</option>
                                </select>
                            </form>
                        </td>
                        <td class="p-4 text-right">
                            <a href="/admin/bookings/<?= $booking['id'] ?>/view" class="text-gold hover:text-gold/80 mr-4">View</a>
                            <form method="POST" action="/admin/bookings/<?= $booking['id'] ?>/delete" class="inline" onsubmit="return confirm('Are you sure?')">
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
