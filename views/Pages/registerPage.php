<!DOCTYPE html>
<html lang="en">

<?php include __DIR__ . '/../components/header.php'; ?>


<body>

    <!-- Go back Button -->
     <br>
    <a href="home" class="bg-gray-500 text-white px-4 py-3 rounded hover:bg-gray-600 m-4">
        &larr;Back to Home
    </a>

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


    <div class="h1_register">
        <h1 class="text-center text-6xl font-bold">REGISTER</h1>
    </div>

    <main class="main-content">
        <div class="register-container">
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <div class="phone-input">
                        <span>+94</span>
                        <input type="tel" id="phone-mobile" name="mobile" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <p>
                    Already Registered? <a href="login">Login</a>
                </p><br>
                <button type="submit" class="register-btn">REGISTER</button>
            </form>
        </div>
    </main>

    
</body>
</html>