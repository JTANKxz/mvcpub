<?php
require_once __DIR__ . '/../app/Controllers/HomeController.php';
require_once __DIR__ . '/../app/Controllers/DashboardController.php';
require_once __DIR__ . '/../app/Controllers/AuthController.php';
require_once __DIR__ . '/../app/Controllers/UserController.php';
require_once __DIR__ . '/../app/Middleware/AuthMiddleware.php';
require_once __DIR__ . '/../app/Middleware/GuestMiddleware.php';


use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;

$router->get('/', [HomeController::class, 'index']);

// Rotas de autenticação
$router->group(['middleware' => GuestMiddleware::class], function ($router) {
    $router->get('/login', [AuthController::class, 'showLoginForm']);
    $router->post('/login', [AuthController::class, 'login']);
    $router->get('/register', [AuthController::class, 'showRegisterForm']);
    $router->post('/register', [AuthController::class, 'register']);
});


$router->post('/logout', [AuthController::class, 'logout']);

// Rotas protegidas
$router->group(['middleware' => AuthMiddleware::class], function ($router) {
    $router->get('/dashboard', [DashboardController::class, 'index']);
    
    // CRUD Users
    $router->get('/dashboard/users', [UserController::class, 'index']);
    $router->get('/dashboard/users/create', [UserController::class, 'create']);
    $router->post('/dashboard/users/store', [UserController::class, 'store']);
    $router->get('/dashboard/users/edit/{id}', [UserController::class, 'edit']);
    $router->post('/dashboard/users/update/{id}', [UserController::class, 'update']);
    $router->post('/dashboard/users/delete/{id}', [UserController::class, 'delete']);
});