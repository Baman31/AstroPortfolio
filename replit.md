# Astrology Portfolio Website

## Project Overview

A production-grade professional astrology portfolio website built with PHP 8.4, SQLite, TailwindCSS, and Alpine.js. Designed for a professional astrologer offering consultation services with integrated payment processing (Razorpay/Stripe), booking system, blog, and full-featured admin CMS.

## Tech Stack

### Backend
- **PHP 8.4**: Modern PHP with strict types and error handling
- **SQLite**: Lightweight, serverless database
- **Composer Dependencies**:
  - vlucas/phpdotenv: Environment variable management
  - paragonie/anti-csrf: CSRF protection
  - phpmailer/phpmailer: Email functionality
  - razorpay/razorpay: Indian payment gateway
  - stripe/stripe-php: International payment gateway

### Frontend
- **TailwindCSS 3.4**: Utility-first CSS framework
- **Alpine.js 3.x**: Lightweight JavaScript framework
- **Custom Design System (Augury Theme)**:
  - Colors: Cosmic Black (#0a0a0a), Gold (#D4AF37), Off-White (#f8f8f8)
  - Typography: Cinzel (headings), Cormorant Garamond (decorative), Poppins (body)
  - Animated Solar System: Elliptical orbits with sacred geometry center

## Project Structure

```
├── app/
│   ├── Core/              # Framework core (Router, Controller)
│   ├── Controllers/       # Application controllers
│   ├── Models/            # Database models
│   ├── Views/             # PHP templates
│   ├── Middleware/        # Auth, CSRF middleware
│   └── Helpers/           # Utility functions
├── config/
│   ├── app.php            # Application configuration
│   └── routes.php         # Route definitions
├── public/                # Web root
│   ├── index.php          # Front controller
│   └── assets/            # CSS, JS, images
├── scripts/
│   ├── migrate.php        # Database migrations
│   └── seed.php           # Seed sample data
├── storage/
│   ├── database.sqlite    # SQLite database
│   ├── logs/              # Application logs
│   └── cache/             # File cache
└── resources/
    └── lang/              # Translations (EN/HI)
```

## Recent Changes (November 2025)

### Augury Theme Redesign
- Completely redesigned website with dark mystical "Augury" theme
- Dark cosmic background (#0a0a0a) with gold accents (#D4AF37)
- New typography: Cinzel, Cormorant Garamond, Poppins
- Brand name changed from generic to "Augury" for mystical aesthetic

### Animated Solar System Section
- **Sacred Geometry Center**:
  - Hexagon with inner star/triangle patterns
  - Radiating rays with multiple density levels (16+ rays)
  - Pulsing gold center dot with glow effect
  - Concentric circles
- **Elliptical Orbits**:
  - 3 crossing orbital paths with preserved tilts (30°, -15°, 45°)
  - Nested orbit/wrapper architecture to maintain rotation while preserving tilt
  - Responsive sizing (50%/45%, 70%/62%, 90%/78%) across all breakpoints
- **Planets**:
  - 7 planets with varied sizes (small, medium, large)
  - Realistic gradient styling (gray/silver tones)
  - 1 gold accent planet
  - 1 planet with rings (Saturn-style)
  - 1 planet with orbiting moon
  - 4 floating background planets for depth
- **Performance**: CSS keyframe animations, 60fps smooth motion, fully responsive (320px to desktop)

## Features Implemented

### Public Website
- ✅ Home page with hero, animated solar system, services showcase, testimonials, blog highlights
- ✅ Services listing and detail pages with pricing
- ✅ Pricing page with INR/USD currency toggle
- ✅ About page with astrologer information
- ✅ Blog with category filtering and individual post pages
- ✅ Testimonials showcase page
- ✅ Gallery page for media
- ✅ Contact form with validation
- ✅ Booking system with timezone support
- ✅ WhatsApp floating contact button
- ✅ Responsive design (mobile-first)

### Admin CMS
- ✅ Secure login with bcrypt password hashing
- ✅ Dashboard with KPIs (bookings, revenue, pending items)
- ✅ Session management with regeneration (anti-fixation)
- ⏳ Services management (CRUD) - pending
- ⏳ Bookings management - pending
- ⏳ Blog post editor - pending
- ⏳ Testimonials approval - pending
- ⏳ Media manager - pending

### Security Features
- ✅ CSRF protection on all POST routes
- ✅ Input validation and sanitization
- ✅ Output escaping (XSS prevention)
- ✅ Session security (HttpOnly, SameSite)
- ✅ Password hashing (bcrypt)
- ✅ Session regeneration after login
- ✅ Security headers (X-Frame-Options, X-Content-Type-Options)

### Database Schema
- **users**: Admin authentication
- **services**: Astrology services catalog
- **bookings**: Client consultations
- **testimonials**: Client reviews
- **posts**: Blog articles
- **media**: Image/video gallery
- **settings**: Site configuration
- **leads**: Contact form submissions

## Configuration

### Environment Variables
Edit `.env.example` and set your values:

```bash
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com

# Admin Credentials
ADMIN_EMAIL=admin@example.com
ADMIN_PASSWORD=strong-password-here

# Payment Gateways
RZP_KEY_ID=your_razorpay_key
RZP_KEY_SECRET=your_razorpay_secret
STRIPE_KEY=your_stripe_public_key
STRIPE_SECRET=your_stripe_secret_key

# Email SMTP
MAIL_HOST=smtp.example.com
MAIL_PORT=587
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password

# Contact
WHATSAPP_NUMBER=919876543210
GA4_ID=G-XXXXXXXXXX
```

## Getting Started

### Initial Setup
1. Dependencies are already installed via Composer and npm
2. Database is migrated and seeded with sample data
3. TailwindCSS is compiled
4. Webserver is running on port 5000

### Admin Access
- URL: `/admin/login`
- Default Email: `admin@astrology.local`
- Default Password: `admin123`
- **⚠️ IMPORTANT**: Change admin password in production!

### Database Management
```bash
# Run migrations
php scripts/migrate.php

# Seed sample data
php scripts/seed.php
```

### Frontend Development
```bash
# Build CSS once
npm run build:css

# Watch for changes
npm run watch:css
```

## Routing

Routes are defined in `config/routes.php`:

**Public Routes**:
- `GET /` - Home page
- `GET /about` - About page
- `GET /services` - Services listing
- `GET /service/{slug}` - Service detail
- `GET /pricing` - Pricing with currency toggle
- `GET /booking` - Booking form
- `POST /booking/submit` - Submit booking
- `GET /blog` - Blog listing
- `GET /blog/{slug}` - Blog post
- `GET /gallery` - Media gallery
- `GET /testimonials` - Testimonials
- `GET /contact` - Contact form
- `POST /contact` - Submit contact

**Admin Routes** (requires authentication):
- `GET /admin/login` - Login form
- `POST /admin/login` - Process login
- `GET /admin/logout` - Logout
- `GET /admin/dashboard` - Admin dashboard

## Development Notes

### Custom MVC Framework
The application uses a lightweight custom MVC framework:
- **Router**: Pattern-based routing with middleware support
- **Controller**: Base controller with validation, redirects, JSON responses
- **Middleware**: CSRF protection, authentication guards

### Helper Functions
Available globally via `app/Helpers/functions.php`:
- `db()`: Get PDO database connection
- `view()`: Render PHP templates
- `redirect()`: HTTP redirects
- `session()`: Session management
- `flash()`: Flash messages
- `csrf_token()`, `csrf_field()`: CSRF protection
- `t()`: Translations (multilingual)
- `e()`: HTML escaping

### Sample Data Included
- 3 services (Birth Chart, Career Guidance, Relationship Compatibility)
- 3 testimonials
- 3 blog posts
- 1 admin user

## ⚠️ IMPORTANT: Production Readiness Status

**The website is fully functional for demonstration and testing, but requires the following critical integrations before accepting real bookings:**

1. **Payment Verification** (CRITICAL - Security Risk):
   - Currently, payment routes are stubs for testing the booking flow
   - Bookings remain in "pending" status (NOT marked as "paid")
   - DO NOT launch with real customers until payment webhooks are implemented
   - Risk: Without webhook verification, payment status cannot be trusted

2. **Email System**: Contact form submissions and bookings are saved to database but email notifications are not sent

3. **Admin Tools**: Dashboard is read-only; CRUD interfaces for managing content are pending

## Pending Features

### High Priority (REQUIRED FOR PRODUCTION)
- [ ] **CRITICAL**: Payment integration (Razorpay/Stripe) with webhook verification
  - Currently only stub routes exist - bookings stay in "pending" status
  - Must implement: order creation, checkout redirect, webhook verification
  - Must secure /payment/success to only update status via verified webhooks
- [ ] Email notifications (PHPMailer)
- [ ] Admin CRUD for services/bookings/posts
- [ ] .ics calendar file generation

### Medium Priority
- [ ] Language switcher (EN/HI)
- [ ] SEO meta tags & structured data
- [ ] Sitemap.xml & robots.txt
- [ ] File upload system

### Low Priority
- [ ] Page caching
- [ ] Rate limiting
- [ ] Advanced analytics

## Production Deployment

### Pre-Launch Checklist
- [ ] Change admin password
- [ ] Set `APP_DEBUG=false`
- [ ] Set `APP_ENV=production`
- [ ] Configure real payment API keys
- [ ] Set up SMTP for emails
- [ ] Update WhatsApp number
- [ ] Add Google Analytics ID
- [ ] Test all forms and payments
- [ ] Verify SSL certificate
- [ ] Create database backup

### Security Hardening
- [ ] Restrict file permissions
- [ ] Enable HTTPS only
- [ ] Configure CSP headers
- [ ] Set up monitoring/logging
- [ ] Regular dependency updates

## Architecture Decisions

### Why SQLite?
- Serverless, zero configuration
- Perfect for Replit environment
- Sufficient for moderate traffic
- Easy backups (single file)

### Why Custom Framework?
- Lightweight, no overhead
- Full control over routing and middleware
- Educational value
- Production-ready patterns

### Design Principles
- **Security First**: CSRF, XSS, session protection
- **Performance**: Minimal dependencies, optimized queries
- **Maintainability**: Clear structure, documented code
- **Accessibility**: WCAG AA compliant
- **Responsive**: Mobile-first design

## Support & Maintenance

### Backup Database
```bash
cp storage/database.sqlite storage/backups/backup-$(date +%Y%m%d).sqlite
```

### View Logs
```bash
tail -f storage/logs/app.log
```

### Clear Cache
```bash
rm -rf storage/cache/*
```

## License
Proprietary - NeoVedic Software

## Version
1.0.0 - Initial MVP Release
