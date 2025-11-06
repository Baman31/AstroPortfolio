<?php ob_start(); ?>

<section class="relative bg-cosmic-black py-24 md:py-32 overflow-hidden">
    <div class="absolute inset-0 bg-cosmic opacity-50"></div>
    <div class="absolute inset-0" style="background-image: radial-gradient(2px 2px at 20% 30%, white, transparent), radial-gradient(2px 2px at 60% 70%, white, transparent), radial-gradient(1px 1px at 50% 50%, white, transparent); background-size: 200px 200px; opacity: 0.3;"></div>
    
    <div class="container mx-auto px-4 text-center relative z-10">
        <div class="max-w-4xl mx-auto">
            <p class="text-gold text-sm tracking-widest uppercase mb-4 font-decorative">Unlock the Mysteries</p>
            <h1 class="text-5xl md:text-7xl font-heading font-bold mb-6 text-off-white leading-tight">
                Your path is illuminated by a<br>
                <span class="text-gold-gradient">road-map of stars.</span>
            </h1>
            <p class="text-xl md:text-2xl mb-10 text-gray-300 max-w-2xl mx-auto font-light">
                Expert Vedic Astrology Consultations for Life, Career, Relationships & Spiritual Growth
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/booking" class="btn-primary inline-block">Book Consultation</a>
                <a href="/services" class="btn-secondary inline-block">Explore Services</a>
            </div>
        </div>
    </div>
    
    <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-cosmic-black to-transparent"></div>
</section>

<section class="py-20 bg-cosmic-black">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <p class="text-gold text-sm tracking-widest uppercase mb-4">What we do</p>
            <h2 class="section-title">Choose Your Zodiac Sign</h2>
        </div>
        
        <div class="grid grid-cols-4 md:grid-cols-6 lg:grid-cols-12 gap-4 mb-16">
            <?php 
            $zodiacSigns = [
                ['name' => 'Aries', 'symbol' => '♈', 'dates' => 'Mar 21 - Apr 19'],
                ['name' => 'Taurus', 'symbol' => '♉', 'dates' => 'Apr 20 - May 20'],
                ['name' => 'Gemini', 'symbol' => '♊', 'dates' => 'May 21 - Jun 20'],
                ['name' => 'Cancer', 'symbol' => '♋', 'dates' => 'Jun 21 - Jul 22'],
                ['name' => 'Leo', 'symbol' => '♌', 'dates' => 'Jul 23 - Aug 22'],
                ['name' => 'Virgo', 'symbol' => '♍', 'dates' => 'Aug 23 - Sep 22'],
                ['name' => 'Libra', 'symbol' => '♎', 'dates' => 'Sep 23 - Oct 22'],
                ['name' => 'Scorpio', 'symbol' => '♏', 'dates' => 'Oct 23 - Nov 21'],
                ['name' => 'Sagittarius', 'symbol' => '♐', 'dates' => 'Nov 22 - Dec 21'],
                ['name' => 'Capricorn', 'symbol' => '♑', 'dates' => 'Dec 22 - Jan 19'],
                ['name' => 'Aquarius', 'symbol' => '♒', 'dates' => 'Jan 20 - Feb 18'],
                ['name' => 'Pisces', 'symbol' => '♓', 'dates' => 'Feb 19 - Mar 20']
            ];
            foreach ($zodiacSigns as $sign): ?>
            <div class="flex flex-col items-center group cursor-pointer">
                <div class="zodiac-icon text-2xl mb-2">
                    <?= $sign['symbol'] ?>
                </div>
                <p class="text-xs text-gray-400 group-hover:text-gold transition-colors"><?= $sign['name'] ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="py-20 bg-cosmic-dark">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="section-title">Our Services</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($services as $service): ?>
            <div class="card-dark group">
                <div class="text-4xl mb-4 text-gold">✨</div>
                <h3 class="text-2xl font-heading font-bold mb-4 text-off-white group-hover:text-gold transition-colors"><?= e($service['title']) ?></h3>
                <p class="text-gray-400 mb-6 leading-relaxed"><?= e($service['short_desc']) ?></p>
                <div class="flex justify-between items-center pt-4 border-t border-gold/20">
                    <span class="text-gold font-bold text-lg">₹<?= number_format($service['price_inr']) ?></span>
                    <a href="/service/<?= e($service['slug']) ?>" class="text-gold hover:text-gold-light font-semibold transition-colors flex items-center gap-2">
                        Learn More 
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-12">
            <a href="/services" class="btn-primary">View All Services</a>
        </div>
    </div>
</section>

<section class="py-20 bg-cosmic-black relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(2px 2px at 25% 25%, white, transparent), radial-gradient(2px 2px at 75% 75%, white, transparent); background-size: 150px 150px;"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-16">
            <p class="text-gold text-sm tracking-widest uppercase mb-4">What My Client Says</p>
            <h2 class="section-title">Testimonials</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($testimonials as $testimonial): ?>
            <div class="card-dark text-center">
                <div class="w-16 h-16 bg-cosmic-black border-2 border-gold rounded-full mx-auto mb-4 flex items-center justify-center text-2xl">
                    👤
                </div>
                <div class="flex items-center justify-center mb-4">
                    <?php for ($i = 0; $i < 5; $i++): ?>
                        <span class="text-gold text-lg"><?= $i < $testimonial['rating'] ? '★' : '☆' ?></span>
                    <?php endfor; ?>
                </div>
                <p class="text-gray-300 mb-6 italic leading-relaxed">"<?= e($testimonial['content']) ?>"</p>
                <div class="text-gold font-heading font-semibold">
                    <?= e($testimonial['author_name']) ?>
                </div>
                <div class="text-gray-500 text-sm">
                    <?= e($testimonial['country']) ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="py-20 bg-cosmic-dark">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <p class="text-gold text-sm tracking-widest uppercase mb-4">Knowledge & Wisdom</p>
            <h2 class="section-title">Latest Insights</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($posts as $post): ?>
            <div class="card-dark overflow-hidden group">
                <?php if ($post['featured_image']): ?>
                <img src="<?= e($post['featured_image']) ?>" alt="<?= e($post['title']) ?>" class="w-full h-56 object-cover -m-8 mb-6 group-hover:scale-105 transition-transform duration-300">
                <?php endif; ?>
                <h3 class="text-xl font-heading font-bold mb-3 text-off-white group-hover:text-gold transition-colors"><?= e($post['title']) ?></h3>
                <p class="text-gray-400 mb-4 leading-relaxed"><?= e($post['excerpt']) ?></p>
                <a href="/blog/<?= e($post['slug']) ?>" class="text-gold hover:text-gold-light font-semibold inline-flex items-center gap-2">
                    Read More
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="py-24 bg-cosmic-black relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-cosmic-dark via-mystic-purple/20 to-cosmic-black"></div>
    <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(2px 2px at 20% 30%, white, transparent), radial-gradient(2px 2px at 60% 70%, white, transparent); background-size: 200px 200px;"></div>
    
    <div class="container mx-auto px-4 text-center relative z-10">
        <div class="max-w-3xl mx-auto">
            <p class="text-gold text-sm tracking-widest uppercase mb-4">Get in Touch</p>
            <h2 class="text-4xl md:text-5xl font-heading font-bold mb-6 text-off-white">Ready to Begin Your Journey?</h2>
            <p class="text-xl text-gray-300 mb-10">Book a consultation today and unlock the wisdom of the stars</p>
            <a href="/booking" class="btn-primary inline-block text-base cosmic-glow">Book Consultation Now</a>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/app.php';
