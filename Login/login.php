
<?php

include('../admin/include/config.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Admin credentials
    $adminEmail = 'admin123@gmail.com';
    $adminPassword = 'admin@123';

    if ($email === $adminEmail && $password === $adminPassword) {
        // Admin login successful
        $_SESSION['login'] = true;
        $_SESSION['role'] = 'admin';
        header('Location: ../admin/dashboard.php'); 
        exit();
    } else {
      
        $query = "SELECT * FROM `user-login` WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            // User login successful
            $_SESSION['login'] = true;
            $_SESSION['role'] = 'user'; 
            header('Location: /Aikon/index.php'); 
            exit();
        } else {
            $errorMessage = "Invalid Email or Password.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AIKON - SPORT</title>
    <link rel="stylesheet" href="/Aikon/style.css" />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
       .error-message p {
        color: red;
        font-size: 14px;
        margin: 10px 0;
        text-align: center;
      }
    </style>

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
        <li><a  href="/Aikon/Shop/shop.php">SHOP</a></li>
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

    <section class="login-form">
        <div class="form-box">
          <div class="form-value">
          <form method="post">
              <h2 class="login-title">Login</h2>
              <div class="inputbox">
                <i class="fa-solid fa-envelope loginicon"></i>    
                  <input type="email" name="email" required>
                <label for="">Email</label>
              </div>
              <div class="inputbox">
                <i class="fa-solid fa-lock loginicon"></i>               
                 <input type="password" name="password" required>
                <label for="">Password</label>
              </div>
              <div class="error-message">
              <?php if (isset($errorMessage)) echo "<p>$errorMessage</p>"; ?>
            </div>
              <div class="forget">
                <label>
                  <input type="checkbox"> Remember me
                </label>
                <label>
                  <a href="#">Forgot password?</a>
                </label>
              </div>
              <button class="login-form-button" name="login">Log in</button>
              <div class="register">
                <p>Don't have a account ? <a href="signup.php">Register</a></p>
              </div>
            </form>
          </div>
        </div>
      </section>

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
  </body>
</html>

