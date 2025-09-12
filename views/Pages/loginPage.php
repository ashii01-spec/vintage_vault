<!-- HTML Document -->
<!DOCTYPE html>
<html lang="en">

<?php include __DIR__ . '/../components/header.php'; ?>

<body>

    <!-- Go back Button -->
     <br>
    <a href="home" class="bg-gray-500 text-white px-4 py-3 rounded hover:bg-gray-600 m-4">
        &larr;Back to Home
    </a>

    <!-- Success Message -->
     <?php
    if (isset($_SESSION['success_message'])) {
        // If it does, display it in a nice green box
        echo '<br>';
        echo '<center><div style="color: orange; background: green; font-size: 14pt;text-align: center; border: 1px solid green; padding: 10px; margin-bottom: 15px; width: 50%; box-shadow: 2px 2px 20px #000; border-radius: 10px ">';
        echo $_SESSION['success_message'];
        echo '</div></center>';
    
        // Now, "throw the note away" so it doesn't show again
        unset($_SESSION['success_message']);
    }
    ?>

    <!-- Error Message -->
    <?php
        // Check if an error "sticky note" exists
        if (isset($_SESSION['error_message'])) {
            // If it does, display it in a nice red box
            echo '<center><div style="color: red;background: black; width: 50%; font-size: 14pt; text-align: center; border: 1px solid red; padding: 10px; margin-bottom: 15px; box-shadow: 2px 2px 20px #000; border-radius: 10px ">';
            echo $_SESSION['error_message'];
            echo '</div><center>';
        
            // "Throw the note away" so it doesn't show again
            unset($_SESSION['error_message']);
        }
    ?>

    <div class="h1_login">
        <h1 class="text-center text-6xl font-bold">LOGIN</h1>
    </div>

   

    <main class="main-content">
        <div class="login-container">
            <form action="/ashmi/vintage_vault/public/login" method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <p>
                    Not Registered? <a href="register">Register</a>
                </p>
                <button type="submit" class="login-btn">Log In</button>
            </form>
        </div>
    </main>


    
</body>
</html>