<?php

require_once __DIR__ . '/../database.php';
require_once __DIR__ . '/../models/user.php';

class AuthController {

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = new User();
            $user->setName($name);
            $user->setEmail($email);
            $user->setPassword($password);

            $user->save();

            header('Location: /Ashmi/vintage_vault/public/login');
            exit();
        }

        require_once __DIR__ . '/../../views/Pages/Register.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = new User();
            $loggedInUser = $user->findByEmail($email);

            if ($loggedInUser && password_verify($password, $loggedInUser['password'])) {
                session_start();
                $_SESSION['user_id'] = $loggedInUser['id'];
                $_SESSION['user_name'] = $loggedInUser['name'];

                header('Location: /Ashmi/vintage_vault/public/');
                exit();
            } else {
                $error = "Invalid email or password";
                require_once __DIR__ . '/../../views/Pages/login.php';
            }
        }

        require_once __DIR__ . '/../../views/Pages/login.php';
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /Ashmi/vintage_vault/public/');
        exit();
    }
}