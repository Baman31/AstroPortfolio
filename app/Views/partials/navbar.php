<nav class="bg-deep-blue text-white shadow-lg" x-data="{ mobileMenuOpen: false }">
    <div class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center">
            <a href="/" class="text-2xl font-heading font-bold text-gold">
                ✨ Acharya Astrology
            </a>
            
            <div class="hidden md:flex space-x-6 items-center">
                <a href="/" class="hover:text-gold transition-colors">Home</a>
                <a href="/services" class="hover:text-gold transition-colors">Services</a>
                <a href="/about" class="hover:text-gold transition-colors">About</a>
                <a href="/blog" class="hover:text-gold transition-colors">Blog</a>
                <a href="/contact" class="hover:text-gold transition-colors">Contact</a>
                <a href="/booking" class="btn-secondary text-sm">Book Consultation</a>
            </div>
            
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        
        <div x-show="mobileMenuOpen" class="md:hidden mt-4 space-y-2">
            <a href="/" class="block py-2 hover:text-gold">Home</a>
            <a href="/services" class="block py-2 hover:text-gold">Services</a>
            <a href="/about" class="block py-2 hover:text-gold">About</a>
            <a href="/blog" class="block py-2 hover:text-gold">Blog</a>
            <a href="/contact" class="block py-2 hover:text-gold">Contact</a>
            <a href="/booking" class="block py-2 btn-secondary inline-block">Book Consultation</a>
        </div>
    </div>
</nav>
