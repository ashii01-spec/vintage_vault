<?php
require_once __DIR__ . '/../app/Database.php';

// Database configuration
$config = [
    'host' => 'localhost',
    'port' => 3306,
    'dbname' => 'vintage_vault',
    'charset' => 'utf8mb4'
];
$db = new Database($config);


// Control access to specific pages based on user authentication
function auth_guard() {
    // Check if the user ID is NOT set in the session
    if (!isset($_SESSION['user_id'])) {
        // If they are not logged in, set an error message
        $_SESSION['error_message'] = "You must be logged in to view that page.";
        
        // Redirect them to the login page
        header('Location: /ashmi/vintage_vault/public/login');
        exit();
    }
}

session_start();


require_once __DIR__ . '/../app/controllers/authController.php';
$request_uri = '/' . ($_GET['url'] ?? '');
$routes = [
    // Public Routes
    '/home' => '../views/Pages/homePage.php',
    '/shop' => function() {
        auth_guard();
        require '../views/Pages/shopPage.php';
    },
    '/gallery' => '../views/Pages/galleryPage.php',
    '/contact' => '../views/Pages/contactPage.php',
    '/cart' => function() {
        auth_guard();
        require '../views/Pages/cartPage.php';
    },

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
        // Case 1: It's a controller route (an array)
        list($controller, $method) = $route;
        $controllerInstance = new $controller($db);
        $controllerInstance->$method();

    } elseif (is_callable($route)) {
        // Case 2: It's a guard function/closure
        $route();

    } else {
        // Case 3: It's a simple view route (a string)
        require $route;
    }
} else {
    http_response_code(404);
    echo "<h1>404 Page Not Found</h1>";
}
