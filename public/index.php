<?php
require_once __DIR__ . '/../app/Database.php';

$config = [
    'host' => 'localhost',
    'port' => 3306,
    'dbname' => 'vintage_vault',
    'charset' => 'utf8mb4'
];

$db = new Database($config);

// Always start sessions for user login
session_start();

// Include the Database class
require_once __DIR__ . '/../app/controllers/authController.php';

// Simple Router Logic
$request_uri = '/' . ($_GET['url'] ?? '');

// Define your routes and which view file they load
$routes = [
    // Public Routes
    '/home' => '../views/Pages/homePage.php',
    '/shop' => '../views/Pages/shopPage.php',
    '/gallery' => '../views/Pages/galleryPage.php',
    '/contact' => '../views/Pages/contactPage.php',
    '/cart' => '../views/Pages/cartPage.php',

    // Authentication Routes
    '/login' => [AuthController::class, 'login'],
    '/register' => [AuthController::class, 'register'],
    '/logout' => [AuthController::class, 'logout'],
    
    // Categories Routes
    '/category1' => '../views/components/categories/category1.php',
    '/category2' => '../views/components/categories/category2.php',
    '/category3' => '../views/components/categories/category3.php',
    '/category4' => '../views/components/categories/category4.php',
    '/category5' => '../views/components/categories/category5.php',
    '/category6' => '../views/components/categories/category6.php',

    // Admin Routes
    '/admin' => '../views/Pages/adminPage.php',
];

// Check if the requested route exists
if (array_key_exists($request_uri, $routes)) {
    $route = $routes[$request_uri];

    if (is_array($route)) {
        list($controller, $method) = $route;

        // 1. This line creates our own "copy" of the controller object
        $controllerInstance = new $controller($db); 
        
        // 2. This line calls the "recipe" (method) on our specific copy
        $controllerInstance->$method(); 
    } else {
        // This handles simple view routes
        require $route;
    }
} else {
    http_response_code(404);
    echo "<h1>404 Page Not Found</h1>";
}
