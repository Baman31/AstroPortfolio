<?php

namespace App\Controllers;

use App\Core\Controller;

class PaymentController extends Controller
{
    public function razorpay(): string
    {
        $bookingId = session('booking_id');
        $amount = session('booking_amount');
        
        if (!$bookingId) {
            flash('error', 'No booking found. Please start a new booking.');
            redirect('/booking');
            return '';
        }
        
        return $this->view('pages.payment-razorpay', compact('bookingId', 'amount'));
    }
    
    public function stripe(): string
    {
        $bookingId = session('booking_id');
        $amount = session('booking_amount');
        
        if (!$bookingId) {
            flash('error', 'No booking found. Please start a new booking.');
            redirect('/booking');
            return '';
        }
        
        return $this->view('pages.payment-stripe', compact('bookingId', 'amount'));
    }
    
    public function success(): string
    {
        $bookingId = session('booking_id');
        
        if ($bookingId) {
            session('booking_id', null);
            session('booking_amount', null);
            session('booking_currency', null);
        }
        
        return $this->view('pages.payment-success');
    }
    
    public function failure(): string
    {
        return $this->view('pages.payment-failure');
    }
}
