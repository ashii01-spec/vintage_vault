<!-- Navbar (Header) -->

<div class="navbar">
    <!-- Logo -->
    <div class="logo">
        <a href="home">
            <img src="/Ashmi/vintage_vault/public/images/logo.png" alt="Vintage Vault Logo">
        </a>
        <a href="home">
            <h1>VINTAGE VAULT</h1>
        </a>
    </div>
    
   

    <!-- Nav Items -->
    <nav>
        <ul>
            <li>
                <a href="home">Home</a>
            </li>
            <li>
                <a href="shop">Shop</a>
            </li>
            <li>
                <a href="gallery">Gallery</a>
            </li>
            <li>
                <a href="contact">Contact us</a>
            </li>
        </ul>
    </nav>

    <!-- Buttons -->
    <div class="buttons">
        <a href="cart" id="btn_cart">
            <img src="/Ashmi/vintage_vault/public/images/cart.png" alt="cart_img">
        </a>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="logout.php"><button id="logout">Logout</button></a>
        <?php else: ?>
            <a href="login"><button id="login">Login</button></a>
            <a href="register"><button id="signup">Sign Up</button></a>
        <?php endif; ?>
    </div>

</div>
 <!-- Navbar (Header) -->