<nav class="bg-cosmic-black/95 backdrop-blur-sm text-off-white border-b border-gold/20 sticky top-0 z-50" x-data="{ sidebarOpen: false }">
    <div class="container mx-auto px-4 py-5">
        <div class="flex justify-between items-center lg:justify-center lg:relative">
            <a href="/" class="flex items-center space-x-2 lg:absolute lg:left-0">
                <span class="text-3xl">✨</span>
                <span class="text-2xl font-heading font-bold text-gold tracking-wider">Augury</span>
            </a>
            
            <div class="hidden lg:flex space-x-8 items-center">
                <a href="/" class="hover:text-gold transition-colors text-sm tracking-wide uppercase">Home</a>
                <a href="/services" class="hover:text-gold transition-colors text-sm tracking-wide uppercase">Services</a>
                <a href="/about" class="hover:text-gold transition-colors text-sm tracking-wide uppercase">About</a>
                <a href="/blog" class="hover:text-gold transition-colors text-sm tracking-wide uppercase">Blog</a>
                <a href="/contact" class="hover:text-gold transition-colors text-sm tracking-wide uppercase">Contact</a>
            </div>
            
            <a href="/booking" class="btn-primary text-xs hidden lg:block lg:absolute lg:right-0">Book Consultation</a>
            
            <button @click="sidebarOpen = true" class="lg:hidden text-gold focus:outline-none">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>
    
    <div x-show="sidebarOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="sidebarOpen = false"
         class="fixed inset-0 bg-cosmic-black/80 backdrop-blur-sm z-40 lg:hidden"
         style="display: none;">
    </div>
    
    <div x-show="sidebarOpen"
         x-transition:enter="transition ease-out duration-300 transform"
         x-transition:enter-start="translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition ease-in duration-200 transform"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="translate-x-full"
         class="fixed top-0 right-0 h-full w-80 bg-cosmic-black border-l border-gold/30 z-50 shadow-2xl lg:hidden overflow-y-auto"
         style="display: none;">
        
        <div class="p-6">
            <div class="flex justify-between items-center mb-8">
                <div class="flex items-center space-x-2">
                    <span class="text-3xl">✨</span>
                    <span class="text-2xl font-heading font-bold text-gold">Augury</span>
                </div>
                <button @click="sidebarOpen = false" class="text-gold hover:text-gold-light transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <nav class="space-y-4">
                <a href="/" class="block py-3 px-4 hover:bg-gold/10 hover:text-gold transition-all rounded text-sm tracking-wide uppercase border-l-2 border-transparent hover:border-gold">Home</a>
                <a href="/services" class="block py-3 px-4 hover:bg-gold/10 hover:text-gold transition-all rounded text-sm tracking-wide uppercase border-l-2 border-transparent hover:border-gold">Services</a>
                <a href="/about" class="block py-3 px-4 hover:bg-gold/10 hover:text-gold transition-all rounded text-sm tracking-wide uppercase border-l-2 border-transparent hover:border-gold">About</a>
                <a href="/blog" class="block py-3 px-4 hover:bg-gold/10 hover:text-gold transition-all rounded text-sm tracking-wide uppercase border-l-2 border-transparent hover:border-gold">Blog</a>
                <a href="/contact" class="block py-3 px-4 hover:bg-gold/10 hover:text-gold transition-all rounded text-sm tracking-wide uppercase border-l-2 border-transparent hover:border-gold">Contact</a>
                <div class="pt-4">
                    <a href="/booking" class="btn-primary w-full text-center block">Book Consultation</a>
                </div>
            </nav>
        </div>
    </div>
</nav>
