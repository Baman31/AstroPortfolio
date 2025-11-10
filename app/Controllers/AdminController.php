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
    
    public function services(): string
    {
        $services = db()->query("SELECT * FROM services ORDER BY created_at DESC")->fetchAll();
        return $this->view('admin.services', compact('services'));
    }
    
    public function serviceCreate(): string
    {
        return $this->view('admin.service-form', ['service' => null]);
    }
    
    public function serviceStore(): string
    {
        $data = $this->validate([
            'title' => 'required',
            'slug' => 'required',
            'short_desc' => 'required',
            'description' => 'required',
            'price_inr' => 'required|numeric',
            'price_usd' => 'required|numeric',
            'duration_minutes' => 'required|numeric'
        ]);
        
        $icon = $_POST['icon'] ?? '✨';
        
        $stmt = db()->prepare("INSERT INTO services (title, slug, short_desc, description, price_inr, price_usd, duration_minutes, icon, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, datetime('now'))");
        $stmt->execute([$data['title'], $data['slug'], $data['short_desc'], $data['description'], $data['price_inr'], $data['price_usd'], $data['duration_minutes'], $icon]);
        
        flash('success', 'Service created successfully');
        redirect('/admin/services');
        return '';
    }
    
    public function serviceEdit(int $id): string
    {
        $stmt = db()->prepare("SELECT * FROM services WHERE id = ?");
        $stmt->execute([$id]);
        $service = $stmt->fetch();
        
        if (!$service) {
            flash('error', 'Service not found');
            redirect('/admin/services');
            return '';
        }
        
        return $this->view('admin.service-form', compact('service'));
    }
    
    public function serviceUpdate(int $id): string
    {
        $data = $this->validate([
            'title' => 'required',
            'slug' => 'required',
            'short_desc' => 'required',
            'description' => 'required',
            'price_inr' => 'required|numeric',
            'price_usd' => 'required|numeric',
            'duration_minutes' => 'required|numeric'
        ]);
        
        $icon = $_POST['icon'] ?? '✨';
        
        $stmt = db()->prepare("UPDATE services SET title = ?, slug = ?, short_desc = ?, description = ?, price_inr = ?, price_usd = ?, duration_minutes = ?, icon = ?, updated_at = datetime('now') WHERE id = ?");
        $stmt->execute([$data['title'], $data['slug'], $data['short_desc'], $data['description'], $data['price_inr'], $data['price_usd'], $data['duration_minutes'], $icon, $id]);
        
        flash('success', 'Service updated successfully');
        redirect('/admin/services');
        return '';
    }
    
    public function serviceDelete(int $id): string
    {
        $stmt = db()->prepare("DELETE FROM services WHERE id = ?");
        $stmt->execute([$id]);
        
        flash('success', 'Service deleted successfully');
        redirect('/admin/services');
        return '';
    }
    
    public function bookings(): string
    {
        $bookings = db()->query("SELECT b.*, s.title as service_title FROM bookings b LEFT JOIN services s ON b.service_id = s.id ORDER BY b.created_at DESC")->fetchAll();
        return $this->view('admin.bookings', compact('bookings'));
    }
    
    public function bookingUpdate(int $id): string
    {
        $data = $this->validate([
            'payment_status' => 'required'
        ]);
        
        $stmt = db()->prepare("UPDATE bookings SET payment_status = ?, updated_at = datetime('now') WHERE id = ?");
        $stmt->execute([$data['payment_status'], $id]);
        
        flash('success', 'Booking updated successfully');
        redirect('/admin/bookings');
        return '';
    }
    
    public function posts(): string
    {
        $posts = db()->query("SELECT * FROM posts ORDER BY created_at DESC")->fetchAll();
        return $this->view('admin.posts', compact('posts'));
    }
    
    public function postCreate(): string
    {
        return $this->view('admin.post-form', ['post' => null]);
    }
    
    public function postStore(): string
    {
        $data = $this->validate([
            'title' => 'required',
            'slug' => 'required',
            'excerpt' => 'required',
            'content' => 'required',
            'category' => 'required'
        ]);
        
        $featuredImage = $_POST['featured_image'] ?? '';
        
        $stmt = db()->prepare("INSERT INTO posts (title, slug, excerpt, content, featured_image, category, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, datetime('now'), datetime('now'))");
        $stmt->execute([$data['title'], $data['slug'], $data['excerpt'], $data['content'], $featuredImage, $data['category']]);
        
        flash('success', 'Post created successfully');
        redirect('/admin/posts');
        return '';
    }
    
    public function postEdit(int $id): string
    {
        $stmt = db()->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$id]);
        $post = $stmt->fetch();
        
        if (!$post) {
            flash('error', 'Post not found');
            redirect('/admin/posts');
            return '';
        }
        
        return $this->view('admin.post-form', compact('post'));
    }
    
    public function postUpdate(int $id): string
    {
        $data = $this->validate([
            'title' => 'required',
            'slug' => 'required',
            'excerpt' => 'required',
            'content' => 'required',
            'category' => 'required'
        ]);
        
        $featuredImage = $_POST['featured_image'] ?? '';
        
        $stmt = db()->prepare("UPDATE posts SET title = ?, slug = ?, excerpt = ?, content = ?, featured_image = ?, category = ?, updated_at = datetime('now') WHERE id = ?");
        $stmt->execute([$data['title'], $data['slug'], $data['excerpt'], $data['content'], $featuredImage, $data['category'], $id]);
        
        flash('success', 'Post updated successfully');
        redirect('/admin/posts');
        return '';
    }
    
    public function postDelete(int $id): string
    {
        $stmt = db()->prepare("DELETE FROM posts WHERE id = ?");
        $stmt->execute([$id]);
        
        flash('success', 'Post deleted successfully');
        redirect('/admin/posts');
        return '';
    }
    
    public function testimonials(): string
    {
        $testimonials = db()->query("SELECT * FROM testimonials ORDER BY created_at DESC")->fetchAll();
        return $this->view('admin.testimonials', compact('testimonials'));
    }
    
    public function testimonialApprove(int $id): string
    {
        $stmt = db()->prepare("UPDATE testimonials SET is_approved = 1, updated_at = datetime('now') WHERE id = ?");
        $stmt->execute([$id]);
        
        flash('success', 'Testimonial approved successfully');
        redirect('/admin/testimonials');
        return '';
    }
    
    public function testimonialDelete(int $id): string
    {
        $stmt = db()->prepare("DELETE FROM testimonials WHERE id = ?");
        $stmt->execute([$id]);
        
        flash('success', 'Testimonial deleted successfully');
        redirect('/admin/testimonials');
        return '';
    }
    
    public function leads(): string
    {
        $leads = db()->query("SELECT * FROM leads WHERE type = 'contact' ORDER BY created_at DESC")->fetchAll();
        return $this->view('admin.leads', compact('leads'));
    }
    
    public function leadDelete(int $id): string
    {
        $stmt = db()->prepare("DELETE FROM leads WHERE id = ?");
        $stmt->execute([$id]);
        
        flash('success', 'Contact message deleted successfully');
        redirect('/admin/leads');
        return '';
    }
}
