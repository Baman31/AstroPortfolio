<?php

namespace App\Middleware;

class CsrfMiddleware
{
    public function handle(): bool
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $_POST['csrf_token'] ?? '';
            $sessionToken = csrf_token();
            
            if (!hash_equals($sessionToken, $token)) {
                http_response_code(403);
                echo view('errors.403');
                return false;
            }
        }
        return true;
    }
}
