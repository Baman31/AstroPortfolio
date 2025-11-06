<?php

namespace App\Controllers;

use App\Core\Controller;

class ServiceController extends Controller
{
    public function index(): string
    {
        $services = db()->query("SELECT * FROM services WHERE is_active = 1 ORDER BY sort_order")->fetchAll();
        return $this->view('pages.services', compact('services'));
    }
    
    public function show(array $params): string
    {
        $slug = $params['slug'] ?? '';
        $stmt = db()->prepare("SELECT * FROM services WHERE slug = ? AND is_active = 1");
        $stmt->execute([$slug]);
        $service = $stmt->fetch();
        
        if (!$service) {
            http_response_code(404);
            return $this->view('errors.404');
        }
        
        return $this->view('pages.service-detail', compact('service'));
    }
}
