<?php

namespace App\Controllers;

use App\Core\Controller;

class AdminController extends Controller
{
    public function loginForm(): string
    {
        if (auth()) {
            redirect('/admin/dashboard');
        }
        return $this->view('admin.login');
    }
    
    public function login(): string
    {
        $data = $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        
        $stmt = db()->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$data['email']]);
        $user = $stmt->fetch();
        
        if (!$user || !password_verify($data['password'], $user['password_hash'])) {
            flash('error', 'Invalid credentials');
            back();
            return '';
        }
        
        session_regenerate_id(true);
        session('user', $user);
        redirect('/admin/dashboard');
        return '';
    }
    
    public function logout(): string
    {
        session_destroy();
        redirect('/admin/login');
        return '';
    }
    
    public function dashboard(): string
    {
        $stats = [
            'bookings_today' => db()->query("SELECT COUNT(*) as count FROM bookings WHERE DATE(created_at) = DATE('now')")->fetch()['count'],
            'pending_bookings' => db()->query("SELECT COUNT(*) as count FROM bookings WHERE payment_status = 'pending'")->fetch()['count'],
            'total_revenue' => db()->query("SELECT SUM(amount) as total FROM bookings WHERE payment_status = 'paid'")->fetch()['total'] ?? 0,
            'pending_testimonials' => db()->query("SELECT COUNT(*) as count FROM testimonials WHERE is_approved = 0")->fetch()['count']
        ];
        
        $recent_bookings = db()->query("SELECT * FROM bookings ORDER BY created_at DESC LIMIT 10")->fetchAll();
        
        return $this->view('admin.dashboard', compact('stats', 'recent_bookings'));
    }
}
