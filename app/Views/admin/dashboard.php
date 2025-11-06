<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Acharya Astrology</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= asset('css/app.css') ?>">
</head>
<body class="bg-gray-100 font-body">
    <nav class="bg-deep-blue text-white p-4">
        <div class="container mx-auto flex justify-between">
            <h1 class="text-xl font-bold">Admin Dashboard</h1>
            <a href="/admin/logout" class="hover:text-gold">Logout</a>
        </div>
    </nav>
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold mb-8">Dashboard</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="text-gray-500 text-sm">Bookings Today</div>
                <div class="text-3xl font-bold text-deep-blue"><?= $stats['bookings_today'] ?></div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="text-gray-500 text-sm">Pending Bookings</div>
                <div class="text-3xl font-bold text-saffron"><?= $stats['pending_bookings'] ?></div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="text-gray-500 text-sm">Total Revenue</div>
                <div class="text-3xl font-bold text-green-600">₹<?= number_format($stats['total_revenue']) ?></div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="text-gray-500 text-sm">Pending Testimonials</div>
                <div class="text-3xl font-bold text-gold"><?= $stats['pending_testimonials'] ?></div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-2xl font-bold mb-4">Recent Bookings</h3>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left p-2">Name</th>
                            <th class="text-left p-2">Email</th>
                            <th class="text-left p-2">Service</th>
                            <th class="text-left p-2">Status</th>
                            <th class="text-left p-2">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recent_bookings as $booking): ?>
                        <tr class="border-b">
                            <td class="p-2"><?= e($booking['name']) ?></td>
                            <td class="p-2"><?= e($booking['email']) ?></td>
                            <td class="p-2">Service #<?= $booking['service_id'] ?></td>
                            <td class="p-2">
                                <span class="px-2 py-1 rounded text-sm <?= $booking['payment_status'] === 'paid' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' ?>">
                                    <?= e($booking['payment_status']) ?>
                                </span>
                            </td>
                            <td class="p-2"><?= date('M j, Y', strtotime($booking['created_at'])) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
