<?php

require __DIR__ . '/../vendor/autoload.php';

$pdo = db();

$tables = [
    'CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        email TEXT UNIQUE NOT NULL,
        password_hash TEXT NOT NULL,
        role TEXT DEFAULT "admin",
        created_at TEXT,
        updated_at TEXT
    )',
    
    'CREATE TABLE IF NOT EXISTS services (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT NOT NULL,
        slug TEXT UNIQUE NOT NULL,
        short_desc TEXT,
        description TEXT,
        duration_minutes INTEGER DEFAULT 60,
        price_inr INTEGER DEFAULT 0,
        price_usd INTEGER DEFAULT 0,
        icon TEXT DEFAULT "✨",
        is_active INTEGER DEFAULT 1,
        sort_order INTEGER DEFAULT 0,
        created_at TEXT,
        updated_at TEXT
    )',
    
    'CREATE TABLE IF NOT EXISTS bookings (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        service_id INTEGER,
        name TEXT NOT NULL,
        email TEXT NOT NULL,
        phone TEXT,
        timezone TEXT DEFAULT "Asia/Kolkata",
        preferred_date TEXT,
        preferred_time TEXT,
        meeting_mode TEXT DEFAULT "video",
        amount INTEGER DEFAULT 0,
        currency TEXT DEFAULT "INR",
        payment_status TEXT DEFAULT "pending",
        rzp_order_id TEXT,
        stripe_session_id TEXT,
        notes TEXT,
        created_at TEXT,
        FOREIGN KEY (service_id) REFERENCES services(id)
    )',
    
    'CREATE TABLE IF NOT EXISTS testimonials (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        author_name TEXT NOT NULL,
        country TEXT,
        rating INTEGER DEFAULT 5,
        content TEXT,
        avatar_url TEXT,
        is_approved INTEGER DEFAULT 0,
        created_at TEXT
    )',
    
    'CREATE TABLE IF NOT EXISTS posts (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT NOT NULL,
        slug TEXT UNIQUE NOT NULL,
        excerpt TEXT,
        content TEXT,
        featured_image TEXT,
        status TEXT DEFAULT "draft",
        published_at TEXT,
        created_at TEXT,
        updated_at TEXT
    )',
    
    'CREATE TABLE IF NOT EXISTS media (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        path TEXT NOT NULL,
        alt_text TEXT,
        type TEXT DEFAULT "image",
        created_at TEXT
    )',
    
    'CREATE TABLE IF NOT EXISTS settings (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        key TEXT UNIQUE NOT NULL,
        value TEXT
    )',
    
    'CREATE TABLE IF NOT EXISTS leads (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT,
        email TEXT,
        phone TEXT,
        subject TEXT,
        message TEXT,
        type TEXT DEFAULT "contact",
        created_at TEXT
    )',
];

foreach ($tables as $sql) {
    $pdo->exec($sql);
}

echo "✓ Database tables created successfully\n";
