<?php ob_start(); ?>

<section class="relative bg-cosmic-black py-24 md:py-32 overflow-hidden">
    <div class="absolute inset-0 bg-cosmic opacity-50"></div>
    <div class="absolute inset-0" style="background-image: radial-gradient(2px 2px at 20% 30%, white, transparent), radial-gradient(2px 2px at 60% 70%, white, transparent); background-size: 200px 200px; opacity: 0.3;"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center max-w-4xl mx-auto">
            <p class="text-gold text-sm tracking-widest uppercase mb-4 font-decorative">Success Stories</p>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-heading font-bold mb-6 text-off-white leading-tight">
                Case <span class="text-gold-gradient">Studies</span>
            </h1>
            <p class="text-lg md:text-xl mb-10 text-gray-300 font-light">
                Real transformations through the wisdom of astrology
            </p>
        </div>
    </div>
</section>

<section class="py-20 bg-cosmic-dark relative overflow-hidden">
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(2px 2px at 25% 25%, white, transparent), radial-gradient(2px 2px at 75% 75%, white, transparent); background-size: 150px 150px;"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <?php 
        $caseStudies = [
            [
                'title' => 'Career Transformation Through Birth Chart Analysis',
                'subtitle' => 'Study',
                'client' => 'Sarah M.',
                'description' => 'Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.',
                'challenge' => 'Struggling with career direction and feeling unfulfilled in her corporate role.',
                'solution' => 'Through detailed birth chart analysis, we identified Sarah\'s natural talents in creative fields and recommended a career shift aligned with her Venus-Jupiter conjunction.',
                'result' => 'Within 6 months, Sarah successfully transitioned to a creative director role, experiencing a 40% increase in job satisfaction and aligning her work with her true purpose.',
                'image' => '👩‍💼'
            ],
            [
                'title' => 'Relationship Compatibility and Timing',
                'subtitle' => 'Study',
                'client' => 'Michael & Jennifer',
                'description' => 'Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.',
                'challenge' => 'Experiencing communication difficulties and timing issues in their relationship.',
                'solution' => 'Synastry chart analysis revealed complementary energies but challenging Saturn transits. We provided guidance on communication strategies and optimal timing for major decisions.',
                'result' => 'The couple improved their understanding of each other\'s needs, navigated challenging periods successfully, and are now happily engaged.',
                'image' => '💑'
            ],
            [
                'title' => 'Business Launch Timing Using Electional Astrology',
                'subtitle' => 'Study',
                'client' => 'David K.',
                'description' => 'Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.',
                'challenge' => 'Uncertain about the best timing to launch his startup venture.',
                'solution' => 'Used electional astrology to identify the most auspicious date and time for business registration, considering favorable planetary positions and avoiding malefic aspects.',
                'result' => 'David\'s business exceeded first-year projections by 150%, attributing success to launching during an optimal cosmic window.',
                'image' => '💼'
            ]
        ];
        
        $index = 0;
        foreach ($caseStudies as $study): 
            $isEven = $index % 2 === 0;
        ?>
        <div class="mb-32 max-w-6xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <?php if (!$isEven): ?>
                <div class="order-2 lg:order-1">
                    <p class="text-gold text-sm tracking-widest uppercase mb-4 font-decorative"><?= e($study['subtitle']) ?></p>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-heading font-bold mb-6 text-off-white leading-tight">
                        <?= e($study['title']) ?>
                    </h2>
                    <p class="text-lg text-gray-300 font-light leading-relaxed mb-8">
                        <?= e($study['description']) ?>
                    </p>
                    <a href="#details-<?= $index ?>" class="inline-block px-8 py-3 border-2 border-gold text-gold rounded-full hover:bg-gold hover:text-cosmic-black transition-all duration-300 font-semibold">
                        Read More
                    </a>
                </div>
                <div class="order-1 lg:order-2 flex justify-center lg:justify-end">
                    <div class="relative w-full max-w-md aspect-square">
                        <div class="absolute inset-0 rounded-full overflow-hidden border-4 border-gold/30 shadow-2xl">
                            <div class="w-full h-full bg-gradient-to-br from-cosmic-gray to-cosmic-dark flex items-center justify-center">
                                <div class="text-9xl"><?= $study['image'] ?></div>
                            </div>
                        </div>
                        <div class="absolute -inset-4 border-2 border-gold/10 rounded-full"></div>
                    </div>
                </div>
                <?php else: ?>
                <div class="order-1 flex justify-center lg:justify-start">
                    <div class="relative w-full max-w-md aspect-square">
                        <div class="absolute inset-0 rounded-full overflow-hidden border-4 border-gold/30 shadow-2xl">
                            <div class="w-full h-full bg-gradient-to-br from-cosmic-gray to-cosmic-dark flex items-center justify-center">
                                <div class="text-9xl"><?= $study['image'] ?></div>
                            </div>
                        </div>
                        <div class="absolute -inset-4 border-2 border-gold/10 rounded-full"></div>
                    </div>
                </div>
                <div class="order-2">
                    <p class="text-gold text-sm tracking-widest uppercase mb-4 font-decorative"><?= e($study['subtitle']) ?></p>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-heading font-bold mb-6 text-off-white leading-tight">
                        <?= e($study['title']) ?>
                    </h2>
                    <p class="text-lg text-gray-300 font-light leading-relaxed mb-8">
                        <?= e($study['description']) ?>
                    </p>
                    <a href="#details-<?= $index ?>" class="inline-block px-8 py-3 border-2 border-gold text-gold rounded-full hover:bg-gold hover:text-cosmic-black transition-all duration-300 font-semibold">
                        Read More
                    </a>
                </div>
                <?php endif; ?>
            </div>
            
            <div id="details-<?= $index ?>" class="mt-12 card-dark border-l-4 border-gold/50 max-w-4xl mx-auto">
                <p class="text-gold mb-6 italic">Client: <?= e($study['client']) ?></p>
                
                <div class="space-y-4 text-gray-300">
                    <div>
                        <h4 class="text-gold font-semibold mb-2">Challenge:</h4>
                        <p class="leading-relaxed"><?= e($study['challenge']) ?></p>
                    </div>
                    
                    <div>
                        <h4 class="text-gold font-semibold mb-2">Astrological Solution:</h4>
                        <p class="leading-relaxed"><?= e($study['solution']) ?></p>
                    </div>
                    
                    <div>
                        <h4 class="text-gold font-semibold mb-2">Result:</h4>
                        <p class="leading-relaxed font-semibold text-off-white"><?= e($study['result']) ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            $index++;
        endforeach; ?>
        
        <div class="text-center mt-16">
            <p class="text-gray-400 mb-6">Ready to write your own success story?</p>
            <a href="/booking" class="btn-primary">Book Your Consultation</a>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/app.php';
