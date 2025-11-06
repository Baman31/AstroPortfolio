<?php ob_start(); ?>

<section class="bg-gradient-to-r from-deep-blue to-indigo-900 text-white py-20">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-5xl md:text-6xl font-heading font-bold mb-6">
            Discover Your Cosmic Path
        </h1>
        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">
            Expert Vedic Astrology Consultations for Life, Career, Relationships & Spiritual Growth
        </p>
        <div class="space-x-4">
            <a href="/booking" class="btn-secondary inline-block">Book Consultation</a>
            <a href="/services" class="btn-primary inline-block">Explore Services</a>
        </div>
    </div>
</section>

<section class="py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl font-heading font-bold text-center mb-12 text-deep-blue">Our Services</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($services as $service): ?>
            <div class="card">
                <h3 class="text-2xl font-heading font-bold mb-4 text-deep-blue"><?= e($service['title']) ?></h3>
                <p class="text-gray-600 mb-4"><?= e($service['short_desc']) ?></p>
                <div class="flex justify-between items-center">
                    <span class="text-gold font-bold">₹<?= number_format($service['price_inr']) ?></span>
                    <a href="/service/<?= e($service['slug']) ?>" class="text-deep-blue hover:text-gold font-semibold">Learn More →</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-8">
            <a href="/services" class="btn-primary">View All Services</a>
        </div>
    </div>
</section>

<section class="bg-white py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl font-heading font-bold text-center mb-12 text-deep-blue">What Our Clients Say</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($testimonials as $testimonial): ?>
            <div class="card">
                <div class="flex items-center mb-4">
                    <?php for ($i = 0; $i < 5; $i++): ?>
                        <span class="text-gold text-xl"><?= $i < $testimonial['rating'] ? '★' : '☆' ?></span>
                    <?php endfor; ?>
                </div>
                <p class="text-gray-700 mb-4 italic">"<?= e($testimonial['content']) ?>"</p>
                <div class="font-semibold text-deep-blue">
                    - <?= e($testimonial['author_name']) ?>, <?= e($testimonial['country']) ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl font-heading font-bold text-center mb-12 text-deep-blue">Latest Insights</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($posts as $post): ?>
            <div class="card">
                <?php if ($post['featured_image']): ?>
                <img src="<?= e($post['featured_image']) ?>" alt="<?= e($post['title']) ?>" class="w-full h-48 object-cover rounded-t-lg -m-6 mb-4">
                <?php endif; ?>
                <h3 class="text-xl font-heading font-bold mb-2 text-deep-blue"><?= e($post['title']) ?></h3>
                <p class="text-gray-600 mb-4"><?= e($post['excerpt']) ?></p>
                <a href="/blog/<?= e($post['slug']) ?>" class="text-deep-blue hover:text-gold font-semibold">Read More →</a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="bg-deep-blue text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-heading font-bold mb-6">Ready to Begin Your Journey?</h2>
        <p class="text-xl mb-8">Book a consultation today and unlock the wisdom of the stars</p>
        <a href="/booking" class="btn-secondary inline-block text-lg">Book Now</a>
    </div>
</section>

<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/app.php';
