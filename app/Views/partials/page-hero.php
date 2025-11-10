<section class="relative bg-cosmic-black overflow-hidden py-16 sm:py-20 md:py-24 lg:py-32">
    <div class="absolute inset-0 bg-cosmic opacity-30"></div>
    <div class="absolute inset-0" style="background-image: radial-gradient(2px 2px at 20% 30%, white, transparent), radial-gradient(2px 2px at 60% 70%, white, transparent), radial-gradient(1px 1px at 50% 50%, white, transparent); background-size: 200px 200px; opacity: 0.2;"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center max-w-4xl mx-auto">
            <?php if (isset($subtitle)): ?>
            <p class="text-gold text-sm tracking-widest uppercase mb-4 font-decorative"><?= e($subtitle) ?></p>
            <?php endif; ?>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-heading font-bold mb-6 text-off-white leading-tight">
                <?= $pageTitle ?>
            </h1>
            <?php if (isset($description)): ?>
            <p class="text-lg md:text-xl text-gray-300 font-light">
                <?= e($description) ?>
            </p>
            <?php endif; ?>
        </div>
    </div>
</section>
