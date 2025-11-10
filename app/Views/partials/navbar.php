<div class="bg-cosmic-black/95 backdrop-blur-sm text-off-white" x-data="{ sidebarOpen: false }">
    <div class="hidden lg:block bg-cosmic-black border-b border-gold/10">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center text-sm">
                <div class="flex items-center space-x-2">
                    <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <div>
                        <span class="text-gray-400 text-xs">Location</span>
                        <p class="text-off-white">Rajasthan, India</p>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    <div>
                        <span class="text-gray-400 text-xs">Talk to Guru Ji</span>
                        <p class="text-off-white">+91-7891730003</p>
                    </div>
                </div>
                <a href="/booking" class="bg-gold/20 hover:bg-gold/30 transition-colors px-6 py-2 rounded-full text-off-white font-semibold text-xs tracking-wider border border-gold/30">
                    APPOINTMENTS
                </a>
            </div>
        </div>
    </div>

    <nav class="border-b border-gold/20 bg-cosmic-black/95 backdrop-blur-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-5">
            <div class="flex justify-between items-center lg:justify-center lg:relative">
                <a href="/" class="flex items-center space-x-2 lg:absolute lg:left-0">
                    <span class="text-3xl">✨</span>
                    <span class="text-2xl font-heading font-bold text-gold tracking-wider">AstroDevki</span>
                </a>
                
                <div class="hidden lg:flex space-x-8 items-center">
                    <a href="/" class="hover:text-gold transition-colors text-sm tracking-wide uppercase">Home</a>
                    <a href="/services" class="hover:text-gold transition-colors text-sm tracking-wide uppercase">Services</a>
                    <a href="/forecast" class="hover:text-gold transition-colors text-sm tracking-wide uppercase">Forecast</a>
                    <a href="/case-studies" class="hover:text-gold transition-colors text-sm tracking-wide uppercase">Case Studies</a>
                    <a href="/blog" class="hover:text-gold transition-colors text-sm tracking-wide uppercase">Blog</a>
                    <a href="/contact" class="hover:text-gold transition-colors text-sm tracking-wide uppercase">Contact Us</a>
                </div>
                
                <a href="/booking" class="btn-primary text-xs hidden lg:block lg:absolute lg:right-0">Book Consultation</a>
                
                <button @click="sidebarOpen = true" class="lg:hidden text-gold focus:outline-none">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>
    
    <div x-show="sidebarOpen"
         x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="sidebarOpen = false"
         class="fixed inset-0 bg-cosmic-black/80 backdrop-blur-sm z-40 lg:hidden">
    </div>
    
    <div x-show="sidebarOpen"
         x-cloak
         x-transition:enter="transition ease-out duration-300 transform"
         x-transition:enter-start="translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition ease-in duration-200 transform"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="translate-x-full"
         class="fixed inset-y-0 right-0 w-full bg-cosmic-black z-50 shadow-2xl lg:hidden overflow-y-auto">
        
        <div class="p-6">
            <div class="flex justify-between items-center mb-8">
                <div class="flex items-center space-x-2">
                    <span class="text-3xl">✨</span>
                    <span class="text-2xl font-heading font-bold text-gold">AstroDevki</span>
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
                <a href="/forecast" class="block py-3 px-4 hover:bg-gold/10 hover:text-gold transition-all rounded text-sm tracking-wide uppercase border-l-2 border-transparent hover:border-gold">Forecast</a>
                <a href="/case-studies" class="block py-3 px-4 hover:bg-gold/10 hover:text-gold transition-all rounded text-sm tracking-wide uppercase border-l-2 border-transparent hover:border-gold">Case Studies</a>
                <a href="/blog" class="block py-3 px-4 hover:bg-gold/10 hover:text-gold transition-all rounded text-sm tracking-wide uppercase border-l-2 border-transparent hover:border-gold">Blog</a>
                <a href="/contact" class="block py-3 px-4 hover:bg-gold/10 hover:text-gold transition-all rounded text-sm tracking-wide uppercase border-l-2 border-transparent hover:border-gold">Contact Us</a>
                <div class="pt-4">
                    <a href="/booking" class="btn-primary w-full text-center block">Book Consultation</a>
                </div>
            </nav>
        </div>
    </div>
</div>
