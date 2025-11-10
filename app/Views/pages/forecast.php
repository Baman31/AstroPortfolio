<?php ob_start(); ?>

<section class="relative bg-cosmic-black py-24 md:py-32 overflow-hidden">
    <div class="absolute inset-0 bg-cosmic opacity-50"></div>
    <div class="absolute inset-0" style="background-image: radial-gradient(2px 2px at 20% 30%, white, transparent), radial-gradient(2px 2px at 60% 70%, white, transparent); background-size: 200px 200px; opacity: 0.3;"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center max-w-4xl mx-auto">
            <p class="text-gold text-sm tracking-widest uppercase mb-4 font-decorative">Cosmic Insights</p>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-heading font-bold mb-6 text-off-white leading-tight">
                Daily <span class="text-gold-gradient">Forecast</span>
            </h1>
            <p class="text-lg md:text-xl mb-10 text-gray-300 font-light">
                Discover what the stars have in store for you today
            </p>
        </div>
    </div>
</section>

<section class="py-20 bg-cosmic-dark">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php 
            $forecasts = [
                ['sign' => 'Aries', 'dates' => 'Mar 21 - Apr 19', 'forecast' => 'Today brings opportunities for leadership and new beginnings. Your energy is high and others will be drawn to your confidence.'],
                ['sign' => 'Taurus', 'dates' => 'Apr 20 - May 20', 'forecast' => 'Financial matters take center stage. A practical approach to your goals will yield positive results.'],
                ['sign' => 'Gemini', 'dates' => 'May 21 - Jun 20', 'forecast' => 'Communication flows easily today. This is an excellent time for important conversations and networking.'],
                ['sign' => 'Cancer', 'dates' => 'Jun 21 - Jul 22', 'forecast' => 'Focus on home and family matters. Emotional connections deepen and nurturing relationships brings joy.'],
                ['sign' => 'Leo', 'dates' => 'Jul 23 - Aug 22', 'forecast' => 'Your creative energy is at its peak. Express yourself boldly and don\'t be afraid to take center stage.'],
                ['sign' => 'Virgo', 'dates' => 'Aug 23 - Sep 22', 'forecast' => 'Organization and attention to detail serve you well. Small improvements lead to significant progress.'],
                ['sign' => 'Libra', 'dates' => 'Sep 23 - Oct 22', 'forecast' => 'Harmony in relationships is highlighted. Seek balance in all areas of your life for optimal results.'],
                ['sign' => 'Scorpio', 'dates' => 'Oct 23 - Nov 21', 'forecast' => 'Deep transformation is possible today. Trust your intuition and embrace profound changes.'],
                ['sign' => 'Sagittarius', 'dates' => 'Nov 22 - Dec 21', 'forecast' => 'Adventure calls to you. Expand your horizons through learning, travel, or philosophical discussions.'],
                ['sign' => 'Capricorn', 'dates' => 'Dec 22 - Jan 19', 'forecast' => 'Career ambitions are favored. Your hard work and discipline are about to pay off significantly.'],
                ['sign' => 'Aquarius', 'dates' => 'Jan 20 - Feb 18', 'forecast' => 'Innovation and originality set you apart. Embrace your unique perspective and share your ideas.'],
                ['sign' => 'Pisces', 'dates' => 'Feb 19 - Mar 20', 'forecast' => 'Spiritual insights flow freely. Pay attention to dreams and intuitive messages from the universe.']
            ];
            foreach ($forecasts as $item): ?>
            <div class="card-dark">
                <h3 class="text-2xl font-heading font-bold mb-2 text-gold"><?= $item['sign'] ?></h3>
                <p class="text-xs text-gray-500 mb-4"><?= $item['dates'] ?></p>
                <p class="text-gray-300 leading-relaxed"><?= $item['forecast'] ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/app.php';
