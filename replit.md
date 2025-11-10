# Astrology Portfolio Website

## Overview
This project is a production-grade professional astrology portfolio website for **Pandit Devki Nandan Sharma**, a Vedic Astrologer & Spiritual Guide based in Rajasthan, India. The website showcases authentic Vedic astrology services including Kundali analysis, career guidance, relationship compatibility, and spiritual remedies. It provides a comprehensive online presence with integrated payment processing, a booking system, a blog, and a full-featured admin CMS. The website aims to facilitate client consultations and manage astrological content efficiently.

## User Preferences
I want the agent to prioritize security, performance, and maintainability. I prefer a mobile-first design approach. The agent should ensure that all critical integrations, especially payment verification with webhooks, are fully implemented and secure before considering the site production-ready. I also expect clear communication regarding the status of critical features and any security implications.

## System Architecture

### UI/UX Decisions
The website features a dark, mystical "AstroDevki" theme with a cosmic black (`#0a0a0a`) background and gold accents (`#D4AF37`). Typography uses Cinzel for headings, Cormorant Garamond for decorative elements, and Poppins for body text. The design incorporates a custom animated solar system with sacred geometry at its center, elliptical orbits, and stylized planets. Responsive design is a core principle, with comprehensive mobile optimization for various device sizes (320px to desktop), including full-screen mobile menu. Performance-optimized CSS-only animations include fade-in animations, hover effects, pulse animations, and shimmer effects with golden glows. The branding emphasizes authentic Indian Vedic astrology with professional Sanskrit terminology.

### Technical Implementations
The backend is built with PHP 8.4 using a lightweight, custom MVC framework (Router, Controller, Middleware). It utilizes SQLite for database management, chosen for its serverless, zero-configuration nature and ease of backup. Frontend development leverages TailwindCSS 3.4 for utility-first styling and Alpine.js 3.x for lightweight interactivity. The application supports multilingual content (EN/HI) and includes comprehensive security features such as CSRF protection, input validation, output escaping (XSS prevention), session security, and bcrypt password hashing.

### Feature Specifications
- **Public Website**: Home page with hero section featuring Pandit Devki Nandan Sharma, animated solar system, 3D services carousel, zodiac signs (12 rashi symbols), testimonials, blog highlights, services listing and detail pages, pricing page with currency toggle, booking system with timezone support, comprehensive about page with areas of expertise, blog with category filtering, testimonials showcase, gallery, enhanced contact page with contact information display and form, forecast page, and case studies.
- **Admin CMS**: Secure login with bcrypt hashing, dashboard with KPIs, session management, CRUD for services (with mystical icon support, timestamps, and duration tracking), bookings management, blog post editor (draft/published), testimonials approval, contact messages/leads management with delete functionality, and enhanced navigation.
- **Security Features**: CSRF protection, input validation/sanitization, output escaping, session security (HttpOnly, SameSite), bcrypt password hashing, session regeneration, and security headers.

### System Design Choices
- **Custom MVC Framework**: Chosen for lightweight control, educational value, and production-ready patterns.
- **SQLite Database**: Selected for serverless operation, ease of use within the Replit environment, and sufficient performance for moderate traffic.
- **Security First**: Prioritizing robust security measures across the application.
- **Performance**: Focus on minimal dependencies and optimized queries.
- **Maintainability**: Emphasis on clear structure and documented code.
- **Accessibility**: Adherence to WCAG AA compliance.
- **Responsive Design**: Mobile-first approach ensuring usability across all devices.

## Recent Changes

### November 10, 2025
- **Integrated Authentic Astrologer Data**: Updated entire website with professional information from official brochure for Pandit Devki Nandan Sharma
- **Branding Update**: Changed branding from "Augury" to "AstroDevki" across all pages (navbar, footer, mobile menu)
- **Contact Information**: Updated with authentic contact details:
  - Email: dnsnokiaip192@gmail.com
  - WhatsApp/Phone: +91-7891730033, +91-7298330003
  - Location: Rajasthan, India
- **About Page Overhaul**: Completely redesigned with professional bio, areas of expertise, methodology, and authentic Vedic astrology services including:
  - Vedic Astrology (Birth Chart Reading)
  - Career & Finance Astrology
  - Relationship Compatibility (Kundali Milan)
  - Prashna (Horary Astrology)
  - Yantra Activation & Installation
  - Muhurat Selection
- **Homepage Hero Section**: Updated with professional tagline "Guiding Lives Through Planetary Wisdom & Divine Remedies"
- **Contact Page Enhancement**: Added two-column layout with contact information card and message form
- **Footer Updates**: Updated with AstroDevki branding, authentic contact details, and professional tagline
- **WhatsApp Button**: Updated with correct number and culturally appropriate greeting
- **Removed SHOP Section**: Completely removed shop page, navigation links, and routes
- **Mobile Menu Enhancement**: Changed to full-screen width for better mobile UX

### November 9, 2025
- **Added Contact Messages Management**: Admin panel now displays all contact form submissions in a dedicated "Contact Messages" page with view and delete capabilities
- **Fixed Contact Form UX**: Form fields now automatically clear after successful submission while preserving validation behavior on errors
- **Fixed Services CRUD**: Resolved form submission issues by correcting route URLs and field name mismatches; added missing database columns (icon, created_at, updated_at) to services table

## External Dependencies

- **PHP Libraries**:
    - `vlucas/phpdotenv`: Environment variable management.
    - `paragonie/anti-csrf`: CSRF protection.
    - `phpmailer/phpmailer`: Email functionality.
    - `razorpay/razorpay`: Razorpay payment gateway integration.
    - `stripe/stripe-php`: Stripe payment gateway integration.
- **Frontend Libraries**:
    - `TailwindCSS 3.4`: Utility-first CSS framework.
    - `Alpine.js 3.x`: Lightweight JavaScript framework.
    - `Swiper.js`: For 3D services auto-carousel.
- **Database**:
    - `SQLite`: Serverless database.