<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use MVC\Router;

$router = new Router();

$router->get('/', [LoginController::class, 'login']);
$router->post('/', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

$router->get('/forgot-password', [LoginController::class, 'forgotPassword']);
$router->post('/forgot-password', [LoginController::class, 'forgotPassword']);
$router->get('/recover-password', [LoginController::class, 'recoverPassword']);
$router->post('/recover-password', [LoginController::class, 'recoverPassword']);

$router->get('/signup', [LoginController::class, 'signup']);
$router->post('/signup', [LoginController::class, 'signup']);
$router->get('/verify', [LoginController::class, 'verify']);
$router->get('/message', [LoginController::class, 'message']);

$router->checkRoutes();