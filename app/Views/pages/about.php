<?php ob_start(); ?>
<?php 
$pageTitle = 'About Us';
$subtitle = 'Our Story';
$description = 'Where ancient Vedic wisdom meets modern consultation';
require __DIR__ . '/../partials/page-hero.php';
?>

<section class="py-16 bg-cosmic-dark">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="prose max-w-none">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-heading font-bold text-gold mb-4">Pandit Devki Nandan Sharma</h1>
                <p class="text-xl text-gold-light italic mb-6">Vedic Astrologer & Spiritual Guide</p>
                <p class="text-2xl font-decorative text-gray-300 mb-8">"Guiding Lives Through Planetary Wisdom & Divine Remedies"</p>
            </div>
            
            <div class="bg-cosmic-black/50 border border-gold/20 rounded-lg p-8 mb-8">
                <p class="text-xl mb-6 text-gray-300 leading-relaxed">I am a devoted Vedic Astrologer, guiding lives through the special positions of planets and nakshatras. My approach blends ancient Vedic knowledge with personalized astrological insights, covering all aspects, and comprehensive guidance.</p>
                
                <blockquote class="border-l-4 border-gold pl-6 my-8 italic text-lg text-gray-400">
                    "Every problem has a planetary reason - and every planet offers a divine solution."
                </blockquote>
            </div>
            
            <h2 class="text-3xl font-heading font-bold mt-12 mb-6 text-gold">My Approach</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                <div class="bg-cosmic-black/30 border border-gold/10 rounded p-4">
                    <h3 class="text-gold font-semibold mb-2">✦ Authentic Vedic Principles</h3>
                    <p class="text-gray-400 text-sm">Traditional Jyotish Shastra methods</p>
                </div>
                <div class="bg-cosmic-black/30 border border-gold/10 rounded p-4">
                    <h3 class="text-gold font-semibold mb-2">✦ Personalized Remedies & Guidance</h3>
                    <p class="text-gray-400 text-sm">Customized solutions for your unique chart</p>
                </div>
                <div class="bg-cosmic-black/30 border border-gold/10 rounded p-4">
                    <h3 class="text-gold font-semibold mb-2">✦ Yantra Activation & Installation</h3>
                    <p class="text-gray-400 text-sm">Sacred geometric tools for spiritual harmony</p>
                </div>
                <div class="bg-cosmic-black/30 border border-gold/10 rounded p-4">
                    <h3 class="text-gold font-semibold mb-2">✦ Prashna (Horary Astrology)</h3>
                    <p class="text-gray-400 text-sm">Immediate answers to specific questions</p>
                </div>
                <div class="bg-cosmic-black/30 border border-gold/10 rounded p-4">
                    <h3 class="text-gold font-semibold mb-2">✦ Muhurat Selection</h3>
                    <p class="text-gray-400 text-sm">Auspicious timing for important events</p>
                </div>
                <div class="bg-cosmic-black/30 border border-gold/10 rounded p-4">
                    <h3 class="text-gold font-semibold mb-2">✦ Vedic Rituals & Remedies</h3>
                    <p class="text-gray-400 text-sm">Authentic processes for maximum effect</p>
                </div>
            </div>
            
            <h2 class="text-3xl font-heading font-bold mt-12 mb-6 text-gold">Areas of Expertise</h2>
            
            <div class="space-y-6">
                <div class="border-l-4 border-gold/50 pl-6 py-2">
                    <h3 class="text-xl font-semibold text-gold-light mb-2">Vedic Astrology (Birth Chart Reading)</h3>
                    <p class="text-gray-400">Comprehensive guidance through the sacred wisdom of planets and dashas, accumulated over two decades of practice.</p>
                </div>
                
                <div class="border-l-4 border-gold/50 pl-6 py-2">
                    <h3 class="text-xl font-semibold text-gold-light mb-2">Career & Finance Astrology</h3>
                    <p class="text-gray-400">Professional guidance for career matters and livelihoods with practical spiritual remedies to overcome obstacles and achieve success.</p>
                </div>
                
                <div class="border-l-4 border-gold/50 pl-6 py-2">
                    <h3 class="text-xl font-semibold text-gold-light mb-2">Relationship Compatibility (Kundali Milan)</h3>
                    <p class="text-gray-400">Detailed matchmaking and compatibility analysis using traditional Gun Milan methods for harmonious relationships.</p>
                </div>
                
                <div class="border-l-4 border-gold/50 pl-6 py-2">
                    <h3 class="text-xl font-semibold text-gold-light mb-2">Prashna (Horary Astrology)</h3>
                    <p class="text-gray-400">Answers to specific life questions using ancient Vedic techniques and rare methods for immediate solutions.</p>
                </div>
                
                <div class="border-l-4 border-gold/50 pl-6 py-2">
                    <h3 class="text-xl font-semibold text-gold-light mb-2">Methodology</h3>
                    <p class="text-gray-400">Each remedy is prepared with authentic Vedic rituals, precise calculations, and traditional processes to ensure maximum effectiveness.</p>
                </div>
            </div>
            
            <div class="text-center mt-12 p-8 bg-gradient-to-r from-gold/5 via-gold/10 to-gold/5 rounded-lg border border-gold/20">
                <p class="text-xl font-decorative text-gold-light italic">
                    "Illuminate your destiny - let the stars guide your path."
                </p>
            </div>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
$title = 'About Pandit Devki Nandan Sharma - AstroDevki';
require __DIR__ . '/../layouts/app.php';
