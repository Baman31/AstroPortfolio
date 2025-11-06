<?php

namespace App\Core;

class Router
{
    private array $routes = [];
    private array $middlewares = [];
    
    public function get(string $path, $handler, array $middleware = []): void
    {
        $this->addRoute('GET', $path, $handler, $middleware);
    }
    
    public function post(string $path, $handler, array $middleware = []): void
    {
        $this->addRoute('POST', $path, $handler, $middleware);
    }
    
    private function addRoute(string $method, string $path, $handler, array $middleware): void
    {
        $this->routes[$method][$path] = [
            'handler' => $handler,
            'middleware' => $middleware
        ];
    }
    
    public function dispatch(): void
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/';
        $method = $_SERVER['REQUEST_METHOD'];
        
        $routes = $this->routes[$method] ?? [];
        
        foreach ($routes as $path => $route) {
            $pattern = '@^' . preg_replace('@\{([a-zA-Z0-9_]+)\}@', '(?P<$1>[a-zA-Z0-9-_]+)', $path) . '$@';
            
            if (preg_match($pattern, $uri, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                
                foreach ($route['middleware'] as $middleware) {
                    $middlewareInstance = new $middleware();
                    if (!$middlewareInstance->handle()) {
                        return;
                    }
                }
                
                $handler = $route['handler'];
                $args = !empty($params) ? [$params] : [];
                
                if (is_callable($handler)) {
                    echo call_user_func_array($handler, $args);
                    return;
                } elseif (is_array($handler)) {
                    [$controller, $method] = $handler;
                    $controllerInstance = new $controller();
                    echo call_user_func_array([$controllerInstance, $method], $args);
                    return;
                }
            }
        }
        
        http_response_code(404);
        echo view('errors.404');
    }
}
