<?php

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
    public function index(): string
    {
        $services = db()->query("SELECT * FROM services WHERE is_active = 1 ORDER BY sort_order LIMIT 3")->fetchAll();
        $testimonials = db()->query("SELECT * FROM testimonials WHERE is_approved = 1 ORDER BY created_at DESC LIMIT 6")->fetchAll();
        $posts = db()->query("SELECT * FROM posts WHERE status = 'published' ORDER BY published_at DESC LIMIT 3")->fetchAll();
        
        return $this->view('pages.home', compact('services', 'testimonials', 'posts'));
    }
    
    public function about(): string
    {
        return $this->view('pages.about');
    }
    
    public function contact(): string
    {
        return $this->view('pages.contact');
    }
    
    public function contactSubmit(): string
    {
        $data = $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required|min:10'
        ]);
        
        $stmt = db()->prepare("INSERT INTO leads (name, email, phone, subject, message, type, created_at) VALUES (?, ?, ?, ?, ?, 'contact', datetime('now'))");
        $stmt->execute([$data['name'], $data['email'], $data['phone'], $data['subject'], $data['message']]);
        
        flash('success', 'Thank you for contacting us! We will get back to you soon.');
        redirect('/contact');
        return '';
    }
}
