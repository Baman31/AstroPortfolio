<?php

use Dotenv\Dotenv;

function env(string $key, $default = null)
{
    static $loaded = false;
    if (!$loaded) {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->safeLoad();
        $loaded = true;
    }
    return $_ENV[$key] ?? getenv($key) ?: $default;
}

function db(): PDO
{
    static $pdo;
    if ($pdo) return $pdo;
    
    $path = env('DB_PATH', 'storage/database.sqlite');
    $fullPath = __DIR__ . '/../../' . $path;
    
    $pdo = new PDO('sqlite:' . $fullPath, null, null, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    
    return $pdo;
}

function view(string $path, array $data = []): string
{
    extract($data);
    ob_start();
    $viewPath = __DIR__ . '/../Views/' . str_replace('.', '/', $path) . '.php';
    if (file_exists($viewPath)) {
        require $viewPath;
    } else {
        echo "<h1>View not found: {$path}</h1>";
    }
    return ob_get_clean();
}

function redirect(string $url): void
{
    header("Location: $url");
    exit;
}

function back(): void
{
    redirect($_SERVER['HTTP_REFERER'] ?? '/');
}

function session(?string $key = null, $value = null)
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    if ($key === null) {
        return $_SESSION;
    }
    
    if ($value === null) {
        return $_SESSION[$key] ?? null;
    }
    
    $_SESSION[$key] = $value;
}

function flash(string $key, $value = null)
{
    if ($value === null) {
        $val = session('flash_' . $key);
        unset($_SESSION['flash_' . $key]);
        return $val;
    }
    
    session('flash_' . $key, $value);
}

function old(string $key, $default = '')
{
    return flash('old_' . $key) ?? $default;
}

function csrf_token(): string
{
    return session('csrf_token') ?? '';
}

function csrf_field(): string
{
    $token = csrf_token();
    return '<input type="hidden" name="csrf_token" value="' . htmlspecialchars($token) . '">';
}

function asset(string $path): string
{
    return '/assets/' . ltrim($path, '/');
}

function url(string $path = ''): string
{
    $base = env('APP_URL', 'http://localhost:5000');
    return rtrim($base, '/') . '/' . ltrim($path, '/');
}

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function t(string $key, ?string $lang = null): string
{
    static $translations = [];
    
    $lang = $lang ?? session('locale') ?? 'en';
    
    if (!isset($translations[$lang])) {
        $file = __DIR__ . '/../../resources/lang/' . $lang . '.php';
        $translations[$lang] = file_exists($file) ? require $file : [];
    }
    
    return $translations[$lang][$key] ?? $key;
}

function config(string $key, $default = null)
{
    static $config = [];
    
    [$file, $k] = explode('.', $key, 2);
    
    if (!isset($config[$file])) {
        $path = __DIR__ . '/../../config/' . $file . '.php';
        $config[$file] = file_exists($path) ? require $path : [];
    }
    
    return $config[$file][$k] ?? $default;
}

function auth(): ?array
{
    return session('user');
}

function guest(): bool
{
    return !auth();
}

function isAdmin(): bool
{
    $user = auth();
    return $user && ($user['role'] ?? '') === 'admin';
}
