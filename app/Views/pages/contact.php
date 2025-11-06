<?php ob_start(); ?>
<section class="py-16">
    <div class="container mx-auto px-4 max-w-2xl">
        <h1 class="text-5xl font-heading font-bold text-center mb-8 text-deep-blue">Contact Us</h1>
        <div class="card">
            <form method="POST" action="/contact">
                <?= csrf_field() ?>
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Name *</label>
                    <input type="text" name="name" class="input-field" required value="<?= old('name') ?>">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Email *</label>
                    <input type="email" name="email" class="input-field" required value="<?= old('email') ?>">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Phone *</label>
                    <input type="tel" name="phone" class="input-field" required value="<?= old('phone') ?>">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Subject *</label>
                    <input type="text" name="subject" class="input-field" required value="<?= old('subject') ?>">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Message *</label>
                    <textarea name="message" rows="5" class="input-field" required><?= old('message') ?></textarea>
                </div>
                <button type="submit" class="btn-primary w-full">Send Message</button>
            </form>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
$title = 'Contact Us - Acharya Astrology';
require __DIR__ . '/../layouts/app.php';
