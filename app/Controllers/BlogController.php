<?php

namespace App\Controllers;

use App\Core\Controller;

class BlogController extends Controller
{
    public function index(): string
    {
        $posts = db()->query("SELECT * FROM posts WHERE status = 'published' ORDER BY published_at DESC")->fetchAll();
        return $this->view('pages.blog', compact('posts'));
    }
    
    public function show(array $params): string
    {
        $slug = $params['slug'] ?? '';
        $stmt = db()->prepare("SELECT * FROM posts WHERE slug = ? AND status = 'published'");
        $stmt->execute([$slug]);
        $post = $stmt->fetch();
        
        if (!$post) {
            http_response_code(404);
            return $this->view('errors.404');
        }
        
        return $this->view('pages.blog-detail', compact('post'));
    }
}
