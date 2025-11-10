(function() {
    'use strict';
    
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    
    if (prefersReducedMotion) {
        return;
    }
    
    class ParticleField {
        constructor(canvas) {
            this.canvas = canvas;
            this.ctx = canvas.getContext('2d');
            this.particles = [];
            this.connections = [];
            this.mouse = { x: null, y: null };
            this.isVisible = false;
            this.animationId = null;
            this.frameCount = 0;
            this.throttle = isMobile ? 2 : 1;
            
            this.particleCount = isMobile ? 40 : 80;
            this.maxDistance = isMobile ? 120 : 150;
            this.mouseRadius = 100;
            
            this.init();
        }
        
        init() {
            this.resize();
            this.createParticles();
            
            window.addEventListener('resize', () => this.resize());
            this.canvas.addEventListener('mousemove', (e) => this.updateMouse(e));
            this.canvas.addEventListener('mouseleave', () => {
                this.mouse.x = null;
                this.mouse.y = null;
            });
        }
        
        resize() {
            const rect = this.canvas.getBoundingClientRect();
            this.canvas.width = rect.width;
            this.canvas.height = rect.height;
        }
        
        createParticles() {
            this.particles = [];
            for (let i = 0; i < this.particleCount; i++) {
                this.particles.push({
                    x: Math.random() * this.canvas.width,
                    y: Math.random() * this.canvas.height,
                    vx: (Math.random() - 0.5) * 0.3,
                    vy: (Math.random() - 0.5) * 0.3,
                    radius: Math.random() * 1.5 + 0.5,
                    depth: Math.random() * 0.6 + 0.4,
                    originalX: 0,
                    originalY: 0
                });
            }
            
            this.particles.forEach(p => {
                p.originalX = p.x;
                p.originalY = p.y;
            });
        }
        
        updateMouse(e) {
            const rect = this.canvas.getBoundingClientRect();
            this.mouse.x = e.clientX - rect.left;
            this.mouse.y = e.clientY - rect.top;
        }
        
        updateParticles() {
            this.particles.forEach(p => {
                p.x += p.vx * p.depth;
                p.y += p.vy * p.depth;
                
                if (p.x < 0 || p.x > this.canvas.width) p.vx *= -1;
                if (p.y < 0 || p.y > this.canvas.height) p.vy *= -1;
                
                if (this.mouse.x !== null && this.mouse.y !== null) {
                    const dx = p.x - this.mouse.x;
                    const dy = p.y - this.mouse.y;
                    const dist = Math.sqrt(dx * dx + dy * dy);
                    
                    if (dist < this.mouseRadius) {
                        const angle = Math.atan2(dy, dx);
                        const force = (this.mouseRadius - dist) / this.mouseRadius;
                        p.x += Math.cos(angle) * force * 2;
                        p.y += Math.sin(angle) * force * 2;
                    }
                }
            });
        }
        
        drawParticles() {
            this.particles.forEach(p => {
                const opacity = p.depth * 0.8;
                const size = p.radius * p.depth;
                
                this.ctx.beginPath();
                this.ctx.arc(p.x, p.y, size, 0, Math.PI * 2);
                this.ctx.fillStyle = `rgba(212, 175, 55, ${opacity})`;
                this.ctx.fill();
                
                this.ctx.beginPath();
                this.ctx.arc(p.x, p.y, size * 2, 0, Math.PI * 2);
                this.ctx.fillStyle = `rgba(212, 175, 55, ${opacity * 0.1})`;
                this.ctx.fill();
            });
        }
        
        drawConnections() {
            for (let i = 0; i < this.particles.length; i++) {
                for (let j = i + 1; j < this.particles.length; j++) {
                    const p1 = this.particles[i];
                    const p2 = this.particles[j];
                    
                    const dx = p1.x - p2.x;
                    const dy = p1.y - p2.y;
                    const dist = Math.sqrt(dx * dx + dy * dy);
                    
                    if (dist < this.maxDistance) {
                        const opacity = (1 - dist / this.maxDistance) * 0.3 * Math.min(p1.depth, p2.depth);
                        
                        this.ctx.beginPath();
                        this.ctx.moveTo(p1.x, p1.y);
                        this.ctx.lineTo(p2.x, p2.y);
                        this.ctx.strokeStyle = `rgba(212, 175, 55, ${opacity})`;
                        this.ctx.lineWidth = 0.5;
                        this.ctx.stroke();
                    }
                }
            }
        }
        
        animate() {
            if (!this.isVisible) return;
            
            this.frameCount++;
            
            if (this.frameCount % this.throttle === 0) {
                this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
                
                this.updateParticles();
                this.drawConnections();
                this.drawParticles();
            }
            
            this.animationId = requestAnimationFrame(() => this.animate());
        }
        
        start() {
            this.isVisible = true;
            if (!this.animationId) {
                this.animate();
            }
        }
        
        stop() {
            this.isVisible = false;
            if (this.animationId) {
                cancelAnimationFrame(this.animationId);
                this.animationId = null;
            }
        }
    }
    
    function initParticleBackground() {
        const section = document.querySelector('#services-section');
        if (!section) return;
        
        const canvas = section.querySelector('.particle-canvas');
        if (!canvas) return;
        
        const particleField = new ParticleField(canvas);
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    particleField.start();
                } else {
                    particleField.stop();
                }
            });
        }, {
            threshold: 0.1
        });
        
        observer.observe(section);
    }
    
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initParticleBackground);
    } else {
        initParticleBackground();
    }
})();
