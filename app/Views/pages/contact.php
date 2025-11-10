<?php ob_start(); ?>
<?php 
$pageTitle = 'Contact Us';
$subtitle = 'Get in Touch';
$description = 'We are here to answer your questions and provide guidance';
require __DIR__ . '/../partials/page-hero.php';
?>

<section class="py-16 bg-cosmic-dark">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            <div class="card-dark">
                <h3 class="text-2xl font-heading font-bold text-gold mb-6">Get in Touch</h3>
                <div class="space-y-4">
                    <div>
                        <h4 class="text-gold font-semibold mb-2 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Email
                        </h4>
                        <p class="text-gray-300 ml-7">dnsnokiaip192@gmail.com</p>
                    </div>
                    
                    <div>
                        <h4 class="text-gold font-semibold mb-2 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            WhatsApp / Phone
                        </h4>
                        <p class="text-gray-300 ml-7">+91-7891730033</p>
                        <p class="text-gray-300 ml-7">+91-7298330003</p>
                    </div>
                    
                    <div>
                        <h4 class="text-gold font-semibold mb-2 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Location
                        </h4>
                        <p class="text-gray-300 ml-7">Rajasthan, India</p>
                    </div>
                </div>
                
                <div class="mt-6 pt-6 border-t border-gold/20">
                    <p class="text-sm text-gray-400 italic text-center">
                        "Illuminate your destiny - let the stars guide your path."
                    </p>
                </div>
            </div>
            
            <div class="card-dark">
                <h3 class="text-2xl font-heading font-bold text-gold mb-6">Send a Message</h3>
                
                <?php if ($message = flash('success')): ?>
                <div class="bg-green-900/50 border border-green-500/50 text-green-200 px-4 py-3 rounded mb-4"><?= e($message) ?></div>
                <?php endif; ?>
                
                <?php if ($message = flash('error')): ?>
                <div class="bg-red-900/50 border border-red-500/50 text-red-200 px-4 py-3 rounded mb-4"><?= e($message) ?></div>
                <?php endif; ?>
                
                <?php if ($errors = flash('errors')): ?>
                <div class="bg-red-900/50 border border-red-500/50 text-red-200 px-4 py-3 rounded mb-4">
                    <ul class="list-disc list-inside">
                        <?php foreach ($errors as $error): ?>
                        <li><?= e($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
                
                <form method="POST" action="/contact">
                    <?= csrf_field() ?>
                    <div class="mb-4">
                        <label class="block text-gray-300 font-semibold mb-2">Name *</label>
                        <input type="text" name="name" class="input-field" required value="<?= old('name') ?>">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-300 font-semibold mb-2">Email *</label>
                        <input type="email" name="email" class="input-field" required value="<?= old('email') ?>">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-300 font-semibold mb-2">Phone *</label>
                        <input type="tel" name="phone" class="input-field" required value="<?= old('phone') ?>">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-300 font-semibold mb-2">Subject *</label>
                        <input type="text" name="subject" class="input-field" required value="<?= old('subject') ?>">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-300 font-semibold mb-2">Message *</label>
                        <textarea name="message" rows="5" class="input-field" required><?= old('message') ?></textarea>
                    </div>
                    <button type="submit" class="btn-primary w-full">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
$title = 'Contact Us - AstroDevki | Pandit Devki Nandan Sharma';
require __DIR__ . '/../layouts/app.php';
