<?php

require __DIR__ . '/../vendor/autoload.php';

$pdo = db();

$adminEmail = env('ADMIN_EMAIL', 'admin@astrology.local');
$adminPassword = env('ADMIN_PASSWORD', 'admin123');

$stmt = $pdo->prepare("SELECT COUNT(*) as count FROM users WHERE email = ?");
$stmt->execute([$adminEmail]);
$exists = $stmt->fetch()['count'] > 0;

if (!$exists) {
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password_hash, role) VALUES (?, ?, ?, 'admin')");
    $stmt->execute(['Admin', $adminEmail, password_hash($adminPassword, PASSWORD_BCRYPT)]);
    echo "✓ Admin user created: $adminEmail\n";
}

$services = [
    ['title' => 'Birth Chart Analysis', 'slug' => 'birth-chart-analysis', 'short_desc' => 'Comprehensive analysis of your natal chart', 'description' => 'Get detailed insights into your life path, personality, strengths, and challenges through a comprehensive birth chart analysis.', 'duration_minutes' => 60, 'price_inr' => 2000, 'price_usd' => 25, 'sort_order' => 1],
    ['title' => 'Career Guidance', 'slug' => 'career-guidance', 'short_desc' => 'Find your ideal career path', 'description' => 'Discover your professional calling and get guidance on career decisions through Vedic astrology.', 'duration_minutes' => 45, 'price_inr' => 1500, 'price_usd' => 20, 'sort_order' => 2],
    ['title' => 'Relationship Compatibility', 'slug' => 'relationship-compatibility', 'short_desc' => 'Understand your relationships better', 'description' => 'Analyze compatibility with your partner and get insights for a harmonious relationship.', 'duration_minutes' => 60, 'price_inr' => 2500, 'price_usd' => 30, 'sort_order' => 3],
];

foreach ($services as $service) {
    $stmt = $pdo->prepare("SELECT COUNT(*) as count FROM services WHERE slug = ?");
    $stmt->execute([$service['slug']]);
    if ($stmt->fetch()['count'] == 0) {
        $stmt = $pdo->prepare("INSERT INTO services (title, slug, short_desc, description, duration_minutes, price_inr, price_usd, is_active, sort_order) VALUES (?, ?, ?, ?, ?, ?, ?, 1, ?)");
        $stmt->execute([$service['title'], $service['slug'], $service['short_desc'], $service['description'], $service['duration_minutes'], $service['price_inr'], $service['price_usd'], $service['sort_order']]);
    }
}
echo "✓ Sample services created\n";

$testimonials = [
    ['author_name' => 'Priya Sharma', 'country' => 'India', 'rating' => 5, 'content' => 'The birth chart analysis was incredibly accurate and helped me understand my life purpose better.', 'is_approved' => 1],
    ['author_name' => 'John Smith', 'country' => 'USA', 'rating' => 5, 'content' => 'Professional and insightful consultation. Highly recommended for anyone seeking guidance.', 'is_approved' => 1],
    ['author_name' => 'Anita Desai', 'country' => 'India', 'rating' => 5, 'content' => 'The career guidance session was transformative. Thank you for the clarity!', 'is_approved' => 1],
];

foreach ($testimonials as $testimonial) {
    $stmt = $pdo->prepare("INSERT INTO testimonials (author_name, country, rating, content, is_approved) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$testimonial['author_name'], $testimonial['country'], $testimonial['rating'], $testimonial['content'], $testimonial['is_approved']]);
}
echo "✓ Sample testimonials created\n";

$posts = [
    ['title' => 'Understanding Your Birth Chart', 'slug' => 'understanding-your-birth-chart', 'excerpt' => 'Learn the basics of reading and interpreting your natal chart', 'content' => 'Your birth chart is a snapshot of the sky at the moment of your birth. It reveals your personality, strengths, challenges, and life path. In this post, we explore the key elements of a birth chart and how to begin understanding yours.', 'status' => 'published', 'published_at' => date('Y-m-d H:i:s')],
    ['title' => 'Vedic Astrology vs Western Astrology', 'slug' => 'vedic-vs-western-astrology', 'excerpt' => 'Discover the key differences between these two ancient systems', 'content' => 'While both Vedic and Western astrology share common roots, they differ in their approach and techniques. Vedic astrology uses the sidereal zodiac, while Western astrology uses the tropical zodiac. Learn more about these fascinating differences.', 'status' => 'published', 'published_at' => date('Y-m-d H:i:s', strtotime('-7 days'))],
    ['title' => 'Mercury Retrograde: What It Really Means', 'slug' => 'mercury-retrograde-meaning', 'excerpt' => 'Demystifying the most talked-about astrological phenomenon', 'content' => 'Mercury retrograde occurs 3-4 times a year and is often blamed for communication mishaps and technology failures. But what does it really mean from an astrological perspective? Let us explore the deeper meaning behind this planetary motion.', 'status' => 'published', 'published_at' => date('Y-m-d H:i:s', strtotime('-14 days'))],
];

foreach ($posts as $post) {
    $stmt = $pdo->prepare("SELECT COUNT(*) as count FROM posts WHERE slug = ?");
    $stmt->execute([$post['slug']]);
    if ($stmt->fetch()['count'] == 0) {
        $stmt = $pdo->prepare("INSERT INTO posts (title, slug, excerpt, content, status, published_at) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$post['title'], $post['slug'], $post['excerpt'], $post['content'], $post['status'], $post['published_at']]);
    }
}
echo "✓ Sample blog posts created\n";

echo "\n✓ All seed data created successfully!\n";
echo "Admin Login: $adminEmail / $adminPassword\n";
