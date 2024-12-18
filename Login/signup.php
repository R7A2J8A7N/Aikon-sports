<?php
include('../admin/include/config.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $sql = "INSERT INTO `user-login`( `name`, `email`, `password`, `cpassword`) VALUES ('$name','$email','$password','$cpassword')";

    if (mysqli_query($conn, $sql)) {
        // echo "New record created successfully !";
        header('Location: /Aikon/index.php'); 
    } else {
        echo "Error: " . $sql . " " . mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AIKON - SPORT</title>
    <link rel="stylesheet" href="/Aikon/style.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

</head>

<body>

    <section id="header">
        <a href="/Aikon/index.php" class="logo-name">
            <img src="/Aikon/Assets/Aikon-logo.png" alt="Logo" class="logo" />
            <h4>AIKON SPORTS</h4>
        </a>

        <div id="mobile">
            <a href="/Aikon/AddCart/Cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
            <a href="login.php"><i class="fa-solid fa-user"></i></a>
            <i id="bar" class="fa-solid fa-bars"></i>
        </div>


        <ul id="navbar">
            <li><a class="active" href="/Aikon/index.php">HOME</a></li>
            <li><a href="/Aikon/Shop/shop.php">SHOP</a></li>
            <li class="dropdown">
                <a id="productsDropdown" href="javascript:void(0)">
                    CATEGORY
                    <span class="dropdown-icon">▼</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="/Aikon/Taekwondo/taekwondo.php">Taekwondo</a></li>
                    <li><a href="/Aikon/Karate/karate.php">Karate</a></li>
                    <li><a href="/Aikon/Judo/judo.php">Judo</a></li>
                    <li><a href="/Aikon/AllEquipment/equipment.php">Training Equipments</a></li>
                </ul>
            </li>


            <li><a href="/Aikon/About/aboutstore.php">ABOUT STORE</a></li>
            <li><a href="/Aikon/Contact/contact.php">CONTACT</a></li>
            <li>
                <a id="lg-bag" href="/Aikon/AddCart/Cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
            </li>
            <li>
                <a id="lg-bag" href="login.php"><i class="fa-solid fa-user"></i></a>
            </li>
            <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
        </ul>
    </section>


    <div class="form-container">
        <form id="myForm" method="post" class="signup-form" novalidate aria-label="Sign up form">
            <h2>Sign Up</h2>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" minlength="2" placeholder="Enter your name" required>
                <div class="error" id="nameError" role="alert">Name must be at least 2 characters</div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter your email" required>
                <div class="error" id="emailError" role="alert">Please enter a valid email address</div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" minlength="6" placeholder="Create a password" required>
                <div class="error" id="passwordError" role="alert">Password must be at least 6 characters</div>
            </div>

            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" name="cpassword" id="confirm-password" minlength="6" placeholder="Confirm password" required>
                <div class="error" id="confirmPasswordError" role="alert">Passwords do not match</div>
            </div>

            <button type="submit" name="submit">Create Account</button>
        </form>
    </div>

    <footer class="section-p1">
        <div class="col">
            <img src="/Aikon/Assets/Aikon-logo.png" alt="Company" class="footer-logo">
            <h4>Contact</h4>
            <p><strong>Address:</strong> Lajpat Nagar, Delhi 110086</p>
            <p><strong>Phone:</strong> <a href="tel:931594xxxx" target="_blank">931594xxxx</a></p>
            <p><strong>Email:</strong> <a href="mailto:info@gmail.com" target="_blank">info@gmail.com</a></p>
            <div class="follow">
                <h4>Follow us</h4>
                <div class="icon">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-square-instagram"></i>
                    <i class="fa-brands fa-youtube"></i>
                </div>
            </div>
        </div>

        <div class="col">
            <h4>About us</h4>
            <a href="">Delivery</a>
            <a href="">Delivery</a>
            <a href="">Delivery</a>
            <a href="">Delivery</a>
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="">View</a>
            <a href="">View</a>
            <a href="">View</a>
            <a href="">View</a>
        </div>

        <div class="col install">
            <h4>AIKON SPORTS</h4>
            <p>Premium quality dresses for Karate, Judo, and Taekwondo.</p>
            <div class="row">
                <img src="/Aikon/Assets/verified.png" class="verified-logo">
                <img src="/Aikon/Assets/best-prodect.png" class="best-logo">
            </div>
            <p>Secured Payment Gateways</p>
            <img src="/Aikon/Assets/pay.png" alt="">
        </div>

        <div class="copyright">
            <p>&copy; <span id="currentYear"></span> <b>AIKON SPORTS</b>. All rights reserved. Design by <a href="https://www.digiindiasolutions.com/" target="_blank"><b>DIGI INDIA SOLUTIONS.</b></a></p>
        </div>
    </footer>
    <script src="./signup.js"></script>
</body>

</html>