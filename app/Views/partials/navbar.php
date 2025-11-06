<nav class="bg-cosmic-black/95 backdrop-blur-sm text-off-white border-b border-gold/20 sticky top-0 z-50" x-data="{ mobileMenuOpen: false }">
    <div class="container mx-auto px-4 py-5">
        <div class="flex justify-between items-center">
            <a href="/" class="flex items-center space-x-2">
                <span class="text-3xl">✨</span>
                <span class="text-2xl font-heading font-bold text-gold tracking-wider">Augury</span>
            </a>
            
            <div class="hidden md:flex space-x-8 items-center">
                <a href="/" class="hover:text-gold transition-colors text-sm tracking-wide uppercase">Home</a>
                <a href="/services" class="hover:text-gold transition-colors text-sm tracking-wide uppercase">Services</a>
                <a href="/about" class="hover:text-gold transition-colors text-sm tracking-wide uppercase">About</a>
                <a href="/blog" class="hover:text-gold transition-colors text-sm tracking-wide uppercase">Blog</a>
                <a href="/contact" class="hover:text-gold transition-colors text-sm tracking-wide uppercase">Contact</a>
                <a href="/booking" class="btn-primary text-xs">Book Consultation</a>
            </div>
            
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-gold">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        
        <div x-show="mobileMenuOpen" class="md:hidden mt-4 space-y-3 pb-4">
            <a href="/" class="block py-2 hover:text-gold transition-colors uppercase text-sm">Home</a>
            <a href="/services" class="block py-2 hover:text-gold transition-colors uppercase text-sm">Services</a>
            <a href="/about" class="block py-2 hover:text-gold transition-colors uppercase text-sm">About</a>
            <a href="/blog" class="block py-2 hover:text-gold transition-colors uppercase text-sm">Blog</a>
            <a href="/contact" class="block py-2 hover:text-gold transition-colors uppercase text-sm">Contact</a>
            <a href="/booking" class="btn-primary inline-block mt-2">Book Consultation</a>
        </div>
    </div>
</nav>
