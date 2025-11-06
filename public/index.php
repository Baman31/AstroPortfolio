<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;

session_start([
    'cookie_httponly' => true,
    'cookie_samesite' => 'Lax',
    'cookie_secure' => env('APP_ENV') === 'production'
]);

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

header('X-Frame-Options: SAMEORIGIN');
header('X-Content-Type-Options: nosniff');
header('X-XSS-Protection: 1; mode=block');

if (env('APP_DEBUG', false)) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    error_reporting(0);
}

$router = new Router();

require __DIR__ . '/../config/routes.php';

$router->dispatch();
