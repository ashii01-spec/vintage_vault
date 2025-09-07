<?php

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
    '/login' => '../views/Pages/loginPage.php',
    '/contact' => '../views/Pages/contactPage.php',
    '/cart' => '../views/Pages/cartPage.php',
    '/register' => '../views/Pages/registerPage.php',
    '/logout' => 'logout',
    
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
    if ($routes[$request_uri] === 'register') {
        $authController = new AuthController();
        $authController->register();
    } else if ($routes[$request_uri] === 'login') {
        $authController = new AuthController();
        $authController->login();
    } else if ($routes[$request_uri] === 'logout') {
        $authController = new AuthController();
        $authController->logout();
    } else {
        // Otherwise, just require the file
        require $routes[$request_uri];
    }
} else {
    // ... 404 error ...
    echo "404 Not Found";
}
