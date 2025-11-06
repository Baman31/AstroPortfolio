<footer class="bg-cosmic-black border-t border-gold/20">
    <div class="container mx-auto px-4 py-16">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            <div>
                <div class="flex items-center space-x-2 mb-4">
                    <span class="text-3xl">✨</span>
                    <h3 class="text-2xl font-heading font-bold text-gold tracking-wider">Augury</h3>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed">Professional Vedic astrology consultations for guidance in life, career, relationships, and spiritual growth.</p>
            </div>
            
            <div>
                <h4 class="font-heading font-semibold mb-6 text-gold text-lg">Quick Links</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="/services" class="text-gray-400 hover:text-gold transition-colors">Services</a></li>
                    <li><a href="/about" class="text-gray-400 hover:text-gold transition-colors">About</a></li>
                    <li><a href="/blog" class="text-gray-400 hover:text-gold transition-colors">Blog</a></li>
                    <li><a href="/contact" class="text-gray-400 hover:text-gold transition-colors">Contact</a></li>
                </ul>
            </div>
            
            <div>
                <h4 class="font-heading font-semibold mb-6 text-gold text-lg">Services</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="/services" class="text-gray-400 hover:text-gold transition-colors">Birth Chart Analysis</a></li>
                    <li><a href="/services" class="text-gray-400 hover:text-gold transition-colors">Career Guidance</a></li>
                    <li><a href="/services" class="text-gray-400 hover:text-gold transition-colors">Relationship Compatibility</a></li>
                    <li><a href="/booking" class="text-gray-400 hover:text-gold transition-colors">Book Consultation</a></li>
                </ul>
            </div>
            
            <div>
                <h4 class="font-heading font-semibold mb-6 text-gold text-lg">Connect</h4>
                <ul class="space-y-3 text-sm">
                    <li class="text-gray-400">
                        <span class="text-gold">Email:</span><br>
                        <?= e(env('MAIL_FROM', 'hello@astrology.com')) ?>
                    </li>
                    <li class="text-gray-400">
                        <span class="text-gold">WhatsApp:</span><br>
                        +<?= e(env('WHATSAPP_NUMBER', '919876543210')) ?>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="border-t border-gold/20 pt-8 text-center">
            <p class="text-gray-500 text-sm">&copy; <?= date('Y') ?> Augury Astrology. All rights reserved. Designed with cosmic precision.</p>
        </div>
    </div>
</footer>
