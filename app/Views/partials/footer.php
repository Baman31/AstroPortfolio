<footer class="bg-deep-blue text-white mt-16">
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-heading font-bold text-gold mb-4">Acharya Astrology</h3>
                <p class="text-sm">Professional Vedic astrology consultations for guidance in life, career, relationships, and spiritual growth.</p>
            </div>
            
            <div>
                <h4 class="font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="/services" class="hover:text-gold">Services</a></li>
                    <li><a href="/about" class="hover:text-gold">About</a></li>
                    <li><a href="/blog" class="hover:text-gold">Blog</a></li>
                    <li><a href="/contact" class="hover:text-gold">Contact</a></li>
                </ul>
            </div>
            
            <div>
                <h4 class="font-semibold mb-4">Services</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="/services" class="hover:text-gold">Birth Chart Analysis</a></li>
                    <li><a href="/services" class="hover:text-gold">Career Guidance</a></li>
                    <li><a href="/services" class="hover:text-gold">Relationship Compatibility</a></li>
                    <li><a href="/booking" class="hover:text-gold">Book Consultation</a></li>
                </ul>
            </div>
            
            <div>
                <h4 class="font-semibold mb-4">Contact</h4>
                <ul class="space-y-2 text-sm">
                    <li>Email: <?= e(env('MAIL_FROM', 'hello@astrology.com')) ?></li>
                    <li>WhatsApp: +<?= e(env('WHATSAPP_NUMBER', '919876543210')) ?></li>
                </ul>
            </div>
        </div>
        
        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-sm">
            <p>&copy; <?= date('Y') ?> Acharya Astrology. All rights reserved.</p>
        </div>
    </div>
</footer>
