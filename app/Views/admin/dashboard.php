<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Acharya Astrology</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= asset('css/app.css') ?>">
</head>
<body class="bg-cosmic-black font-body text-off-white">
    <nav class="bg-cosmic-black text-white p-4 border-b border-gold/20">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold text-gold">Admin Panel</h1>
            <div class="flex gap-6 items-center">
                <a href="/admin/dashboard" class="hover:text-gold">Dashboard</a>
                <a href="/admin/services" class="hover:text-gold">Services</a>
                <a href="/admin/bookings" class="hover:text-gold">Bookings</a>
                <a href="/admin/posts" class="hover:text-gold">Posts</a>
                <a href="/admin/testimonials" class="hover:text-gold">Testimonials</a>
                <a href="/admin/leads" class="hover:text-gold">Contact Messages</a>
                <a href="/admin/logout" class="hover:text-gold">Logout</a>
            </div>
        </div>
    </nav>
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-heading font-bold mb-8 text-gold">Dashboard</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-cosmic-dark border border-gold/30 p-6 rounded-lg shadow-xl">
                <div class="text-gray-400 text-sm mb-2">Bookings Today</div>
                <div class="text-3xl font-bold text-gold"><?= $stats['bookings_today'] ?></div>
            </div>
            <div class="bg-cosmic-dark border border-gold/30 p-6 rounded-lg shadow-xl">
                <div class="text-gray-400 text-sm mb-2">Pending Bookings</div>
                <div class="text-3xl font-bold text-gold"><?= $stats['pending_bookings'] ?></div>
            </div>
            <div class="bg-cosmic-dark border border-gold/30 p-6 rounded-lg shadow-xl">
                <div class="text-gray-400 text-sm mb-2">Total Revenue</div>
                <div class="text-3xl font-bold text-gold">₹<?= number_format($stats['total_revenue']) ?></div>
            </div>
            <div class="bg-cosmic-dark border border-gold/30 p-6 rounded-lg shadow-xl">
                <div class="text-gray-400 text-sm mb-2">Pending Testimonials</div>
                <div class="text-3xl font-bold text-gold"><?= $stats['pending_testimonials'] ?></div>
            </div>
        </div>
        <div class="bg-cosmic-dark border border-gold/30 rounded-lg shadow-xl p-6">
            <h3 class="text-2xl font-heading font-bold mb-4 text-gold">Recent Bookings</h3>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gold/30">
                            <th class="text-left p-2 text-gold">Name</th>
                            <th class="text-left p-2 text-gold">Email</th>
                            <th class="text-left p-2 text-gold">Service</th>
                            <th class="text-left p-2 text-gold">Status</th>
                            <th class="text-left p-2 text-gold">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recent_bookings as $booking): ?>
                        <tr class="border-b border-gold/10 hover:bg-cosmic-black/50 transition-colors">
                            <td class="p-2"><?= e($booking['name']) ?></td>
                            <td class="p-2 text-gray-400"><?= e($booking['email']) ?></td>
                            <td class="p-2 text-gray-400">Service #<?= $booking['service_id'] ?></td>
                            <td class="p-2">
                                <span class="px-2 py-1 rounded text-sm <?= $booking['payment_status'] === 'paid' ? 'bg-green-900/50 text-green-300 border border-green-500/50' : 'bg-yellow-900/50 text-yellow-300 border border-yellow-500/50' ?>">
                                    <?= e($booking['payment_status']) ?>
                                </span>
                            </td>
                            <td class="p-2 text-gray-400"><?= date('M j, Y', strtotime($booking['created_at'])) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
