<?php

use App\Controllers\HomeController;
use App\Controllers\ServiceController;
use App\Controllers\BlogController;
use App\Controllers\BookingController;
use App\Controllers\PaymentController;
use App\Controllers\AdminController;
use App\Middleware\AuthMiddleware;
use App\Middleware\CsrfMiddleware;

$router->get('/', [HomeController::class, 'index']);
$router->get('/about', [HomeController::class, 'about']);
$router->get('/contact', [HomeController::class, 'contact']);
$router->post('/contact', [HomeController::class, 'contactSubmit'], [CsrfMiddleware::class]);

$router->get('/services', [ServiceController::class, 'index']);
$router->get('/service/{slug}', [ServiceController::class, 'show']);

$router->get('/pricing', function() { return view('pages.pricing'); });
$router->get('/gallery', function() { return view('pages.gallery'); });
$router->get('/testimonials', function() { return view('pages.testimonials'); });

$router->get('/booking', [BookingController::class, 'index']);
$router->post('/booking/submit', [BookingController::class, 'submit'], [CsrfMiddleware::class]);

$router->get('/payment/razorpay', [PaymentController::class, 'razorpay']);
$router->get('/payment/stripe', [PaymentController::class, 'stripe']);
$router->get('/payment/success', [PaymentController::class, 'success']);
$router->get('/payment/failure', [PaymentController::class, 'failure']);

$router->get('/blog', [BlogController::class, 'index']);
$router->get('/blog/{slug}', [BlogController::class, 'show']);

$router->get('/admin/login', [AdminController::class, 'loginForm']);
$router->post('/admin/login', [AdminController::class, 'login'], [CsrfMiddleware::class]);
$router->get('/admin/logout', [AdminController::class, 'logout']);
$router->get('/admin/dashboard', [AdminController::class, 'dashboard'], [AuthMiddleware::class]);
