<?php

namespace App\Middleware;

class AuthMiddleware
{
    public function handle(): bool
    {
        if (guest()) {
            flash('error', 'Please login to continue');
            redirect('/admin/login');
            return false;
        }
        return true;
    }
}
