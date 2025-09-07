<?php
// app/controllers/authController.php

class AuthController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
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

        // --- NEW: Check for existing email FIRST ---
        $email = $_POST['email'];
        $user = $this->db->query("SELECT * FROM user WHERE email = :email", [':email' => $email])->fetch();

        if ($user) {
            // User already exists, set an error flash message
            $_SESSION['error_message'] = "An account with this email already exists. Please login instead.";

            // Redirect back to the registration form
            header('Location: /ashmi/vintage_vault/public/register');
            exit();
        }

        // --- If email is NOT found, proceed with registration ---
        $name = $_POST['name'];
        $address = $_POST['address'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $this->db->query(
            "INSERT INTO user(name, email, address, mobile, password) VALUES(:name, :email, :address, :mobile, :password)",
            [
                ':name' => $name,
                ':email' => $email,
                ':address' => $address,
                ':mobile' => $mobile,
                ':password' => $hashed_password
            ]
        );

        // Set the success message
        $_SESSION['success_message'] = "Registration successful! Please log in.";
        header('Location: /ashmi/vintage_vault/public/login');
        exit();
    }
    

    // ----------------------------- [Login Function] ----------------------------- //
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // --- Process the login form ---
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Find the user by email
            $user = $this->db->query("SELECT * FROM user WHERE email = :email", [':email' => $email])->fetch();

            // Check if user exists and if the password is correct
            if ($user && password_verify($password, $user['password'])) {
                // Password is correct! Login successful.
                // Store user info in the session to remember them
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_name'] = $user['name'];

                // Redirect to the homepage
                header('Location: /ashmi/vintage_vault/public/home');
                exit();
            } else {
                // Incorrect email or password
                $_SESSION['error_message'] = "Invalid email or password.";
                header('Location: /ashmi/vintage_vault/public/login');
                exit();
            }

        } else {
            // --- Show the login form ---
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