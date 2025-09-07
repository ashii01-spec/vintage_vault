<!-- HTML Document -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/ashmi/vintage_vault/public/css/style.css?v=<?php echo time(); ?>">
    <title>Login</title>
</head>
<body>

<!-- navbar -->
<?php include __DIR__ . '/../components/navbar.php'; ?>

<div class="h1_login">
    <h1>LOGIN</h1>
</div>

<?php if (isset($error)): ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php endif; ?>

<main class="main-content">
        <div class="login-container">
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
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

<!-- Footer -->
<?php include __DIR__ . '/../components/footer.php'; ?>
    
</body>
</html>