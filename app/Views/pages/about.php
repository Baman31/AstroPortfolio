<?php ob_start(); ?>
<section class="py-16">
    <div class="container mx-auto px-4 max-w-4xl">
        <h1 class="text-5xl font-heading font-bold text-center mb-8 text-deep-blue">About Us</h1>
        <div class="prose max-w-none">
            <p class="text-xl mb-6">Welcome to Acharya Astrology, where ancient Vedic wisdom meets modern consultation.</p>
            <p class="mb-4">With over 15 years of experience in Vedic astrology, we provide personalized consultations to help you navigate life's challenges and opportunities.</p>
            <h2 class="text-3xl font-heading font-bold mt-8 mb-4 text-deep-blue">Our Expertise</h2>
            <ul class="list-disc list-inside space-y-2 mb-6">
                <li>Birth Chart Analysis & Horoscope Reading</li>
                <li>Career & Business Guidance</li>
                <li>Relationship Compatibility</li>
                <li>Gemstone Recommendations</li>
                <li>Vedic Remedies & Solutions</li>
            </ul>
            <h2 class="text-3xl font-heading font-bold mt-8 mb-4 text-deep-blue">Why Choose Us?</h2>
            <p class="mb-4">We combine traditional Vedic astrology principles with a compassionate, practical approach to help you make informed decisions about your life, career, and relationships.</p>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
$title = 'About Us - Acharya Astrology';
require __DIR__ . '/../layouts/app.php';
