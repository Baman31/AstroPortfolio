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
        
        try {
            $stmt = db()->prepare("INSERT INTO leads (name, email, phone, subject, message, type, created_at) VALUES (?, ?, ?, ?, ?, 'contact', datetime('now'))");
            $result = $stmt->execute([$data['name'], $data['email'], $data['phone'], $data['subject'], $data['message']]);
            
            if (!$result) {
                error_log('Failed to insert lead: ' . print_r($stmt->errorInfo(), true));
                flash('error', 'Failed to send message. Please try again.');
                redirect('/contact');
                return '';
            }
            
            foreach (array_keys($data) as $key) {
                if (isset($_SESSION['flash_old_' . $key])) {
                    unset($_SESSION['flash_old_' . $key]);
                }
            }
            
            flash('success', 'Thank you for contacting us! We will get back to you soon.');
            redirect('/contact');
        } catch (\Exception $e) {
            error_log('Contact form error: ' . $e->getMessage());
            flash('error', 'An error occurred: ' . $e->getMessage());
            redirect('/contact');
        }
        
        return '';
    }
}
