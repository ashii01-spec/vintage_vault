<?php
// app/controllers/authController.php

class AuthController {
    private $db;
    private $userModel;
    

    public function __construct($db) {
         $this->userModel = new User($db);
    }

    public function showRegisterForm() {
        require_once __DIR__ . '/../../views/Pages/registerPage.php';
    }

    // ----------------------------- [Register Function] ----------------------------- //
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->showRegisterForm();
            return;
        }

        $email = $_POST['email'];
        $user = $this->userModel->findByEmail($email);

        if ($user) {
            $_SESSION['error_message'] = "An account with this email already exists.";
            header('Location: /ashmi/vintage_vault/public/register');
            exit();
        }
        
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'address' => $_POST['address'],
            'mobile' => $_POST['mobile'],
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
        ];
        
        // The controller tells the model to create a user. No more SQL!
        if ($this->userModel->create($data)) {
            $_SESSION['success_message'] = "Registration successful! Please log in.";
            header('Location: /ashmi/vintage_vault/public/login');
            exit();
        }
    }
    

    // ----------------------------- [Login Function] ----------------------------- //
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // The controller asks the model to find the user. No more SQL!
            $user = $this->userModel->findByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_name'] = $user['name'];
                header('Location: /ashmi/vintage_vault/public/home');
                exit();
            } else {
                $_SESSION['error_message'] = "Invalid email or password.";
                header('Location: /ashmi/vintage_vault/public/login');
                exit();
            }
        } else {
            require_once __DIR__ . '/../../views/Pages/loginPage.php';
        }
    }


    // ----------------------------- [Logout Function] ----------------------------- //
    public function logout() {
        // Clear all session variables
        session_unset();
        // Destroy the session
        session_destroy();
        // Redirect to the homepage
        header('Location: /ashmi/vintage_vault/public/home');
        exit();
    }
}

?>