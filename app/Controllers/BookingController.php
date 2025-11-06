<?php

namespace App\Controllers;

use App\Core\Controller;

class BookingController extends Controller
{
    public function index(): string
    {
        return $this->view('pages.booking');
    }
    
    public function submit(): string
    {
        $data = $this->validate([
            'service_id' => 'required',
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required',
            'timezone' => 'required',
            'preferred_date' => 'required',
            'preferred_time' => 'required',
            'meeting_mode' => 'required',
            'currency' => 'required'
        ]);
        
        $stmt = db()->prepare("SELECT * FROM services WHERE id = ? AND is_active = 1");
        $stmt->execute([$data['service_id']]);
        $service = $stmt->fetch();
        
        if (!$service) {
            flash('error', 'Invalid service selected');
            back();
            return '';
        }
        
        $amount = $data['currency'] === 'inr' ? $service['price_inr'] : $service['price_usd'];
        
        $stmt = db()->prepare("INSERT INTO bookings (service_id, name, email, phone, timezone, preferred_date, preferred_time, meeting_mode, amount, currency, payment_status, notes, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'pending', ?, datetime('now'))");
        $stmt->execute([
            $service['id'],
            $data['name'],
            $data['email'],
            $data['phone'],
            $data['timezone'],
            $data['preferred_date'],
            $data['preferred_time'],
            $data['meeting_mode'],
            $amount,
            strtoupper($data['currency']),
            $data['notes'] ?? ''
        ]);
        
        $bookingId = db()->lastInsertId();
        
        session('booking_id', $bookingId);
        session('booking_amount', $amount);
        session('booking_currency', strtoupper($data['currency']));
        
        if ($data['currency'] === 'inr') {
            redirect('/payment/razorpay');
        } else {
            redirect('/payment/stripe');
        }
        
        return '';
    }
}
