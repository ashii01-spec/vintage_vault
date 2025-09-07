<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Vintage Vault</title>
    <link rel="stylesheet" href="/ashmi/vintage_vault/public/css/style.css?v=<?php echo time(); ?>">
    </head>
<body>

<!-- navbar -->
<?php include __DIR__ . '/../components/navbar.php'; ?>

<div class="h1_register">
    <h1>REGISTER</h1>
</div>

<main class="main-content">
    <div class="register-container">
        <form action="#" method="POST">
            <div class="form-group">
                <label for="first-name">First Name</label>
                <input type="text" id="first-name" name="first-name" required>
            </div>
            <div class="form-group">
                <label for="last-name">Last Name</label>
                <input type="text" id="last-name" name="last-name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone-number">Phone Number</label>
                <div class="phone-input">
                    <span>+94</span>
                    <input type="tel" id="phone-number" name="phone-number" required>
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


<!-- Footer -->
<?php include __DIR__ . '/../components/footer.php'; ?>
    
</body>
</html>