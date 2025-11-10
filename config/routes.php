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
$router->get('/forecast', function() { return view('pages.forecast'); });
$router->get('/case-studies', function() { return view('pages.case-studies'); });

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

$router->get('/admin/services', [AdminController::class, 'services'], [AuthMiddleware::class]);
$router->get('/admin/services/create', [AdminController::class, 'serviceCreate'], [AuthMiddleware::class]);
$router->post('/admin/services/create', [AdminController::class, 'serviceStore'], [AuthMiddleware::class, CsrfMiddleware::class]);
$router->get('/admin/services/{id}/edit', [AdminController::class, 'serviceEdit'], [AuthMiddleware::class]);
$router->post('/admin/services/{id}/edit', [AdminController::class, 'serviceUpdate'], [AuthMiddleware::class, CsrfMiddleware::class]);
$router->post('/admin/services/{id}/delete', [AdminController::class, 'serviceDelete'], [AuthMiddleware::class, CsrfMiddleware::class]);

$router->get('/admin/bookings', [AdminController::class, 'bookings'], [AuthMiddleware::class]);
$router->post('/admin/bookings/{id}/update', [AdminController::class, 'bookingUpdate'], [AuthMiddleware::class, CsrfMiddleware::class]);

$router->get('/admin/posts', [AdminController::class, 'posts'], [AuthMiddleware::class]);
$router->get('/admin/posts/create', [AdminController::class, 'postCreate'], [AuthMiddleware::class]);
$router->post('/admin/posts/create', [AdminController::class, 'postStore'], [AuthMiddleware::class, CsrfMiddleware::class]);
$router->get('/admin/posts/{id}/edit', [AdminController::class, 'postEdit'], [AuthMiddleware::class]);
$router->post('/admin/posts/{id}/edit', [AdminController::class, 'postUpdate'], [AuthMiddleware::class, CsrfMiddleware::class]);
$router->post('/admin/posts/{id}/delete', [AdminController::class, 'postDelete'], [AuthMiddleware::class, CsrfMiddleware::class]);

$router->get('/admin/testimonials', [AdminController::class, 'testimonials'], [AuthMiddleware::class]);
$router->post('/admin/testimonials/{id}/approve', [AdminController::class, 'testimonialApprove'], [AuthMiddleware::class, CsrfMiddleware::class]);
$router->post('/admin/testimonials/{id}/delete', [AdminController::class, 'testimonialDelete'], [AuthMiddleware::class, CsrfMiddleware::class]);

$router->get('/admin/leads', [AdminController::class, 'leads'], [AuthMiddleware::class]);
$router->post('/admin/leads/{id}/delete', [AdminController::class, 'leadDelete'], [AuthMiddleware::class, CsrfMiddleware::class]);
