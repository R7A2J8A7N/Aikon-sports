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
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>

  <section id="header">
    <a href="/Aikon/index.php" class="logo-name">
      <img src="/Aikon/Assets/Aikon-logo.png" alt="Logo" class="logo" />
      <h4>AIKON SPORTS</h4>
    </a>

    <div id="mobile">
      <a href="/Aikon/AddCart/Cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
      <a href="/Aikon/Login/login.php"><i class="fa-solid fa-user"></i></a>
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
          <li><a href="equipment.php">Training Equipments</a></li>
        </ul>
      </li>


      <li><a href="/Aikon/About/aboutstore.php">ABOUT STORE</a></li>
      <li><a href="/Aikon/Contact/contact.php">CONTACT</a></li>
      <li>
        <a id="lg-bag" href="/Aikon/AddCart/Cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
      </li>
      <li>
        <a id="lg-bag" href="/Aikon/Login/login.php"><i class="fa-solid fa-user"></i></a>
      </li>
      <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
    </ul>
  </section>

  <section id="page-header">
    <h2>All Equipments</h2>
    <p>Save more with us & get original products</p>
    <div class="page-render">
      <a href="/Aikon/index.php">Home &nbsp;</a>
      <p>> Equipments</p>
    </div>
  </section>

  <section id="product1" class="section-p1">
    <h2>Fitness Equipments</h2>
    <p>Explore Our Exclusive Equipments</p>
    <div class="pro-container">
      <?php
      include('../admin/include/config.php');
      $featured_query = "SELECT * FROM products WHERE subcategory = 'Fitness Equipments' LIMIT 8";
      $featured_result = mysqli_query($conn, $featured_query);

      if (mysqli_num_rows($featured_result) > 0) {
        while ($product = mysqli_fetch_assoc($featured_result)) { ?>
          <div class="pro">

            <?php
            $imagePath = isset($product['image']) ? $product['image'] : 'default.jpg';
            if (!str_contains($imagePath, 'uploads/')) {
              $imagePath = 'uploads/' . $imagePath;
            }
            $imageFullPath = '../admin/' . $imagePath;
            ?>

            <img src="<?php echo $imageFullPath; ?>"
              alt="<?php echo isset($product['name']) ? $product['name'] : 'Product'; ?>"
              onclick="window.location.href='sproduct.php?id=<?php echo isset($product['id']) ? $product['id'] : ''; ?>';">

            <div class="des">
              <h5><?php echo isset($product['name']) ? $product['name'] : 'Product Name'; ?></h5>
              <div class="star">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
              </div>
              <h4>₹<?php echo number_format($product['price'], 2); ?></h4>
            </div>
            <div class="add-cart">
              <a href="#"><i class="fa-solid fa-cart-plus"></i></a>
            </div>
          </div>
      <?php
        }
      } ?>
    </div>
  </section>

  <!-- ================================================== -->

  <section id="newsletter">
    <div class="newstext">
      <h4>Sign Up For Newsletters</h4>
      <p>
        Get E-mail updates about our latest shop and
        <span>special offers.</span>
      </p>
    </div>
    <div class="form">
      <input type="text" placeholder="Your email address" />
      <button class="subscribe-btn">Sign Up</button>
    </div>
  </section>

  <footer class="section-p1">
    <div class="col">
      <img
        src="/Aikon/Assets/Aikon-logo.png"
        alt="Company"
        class="footer-logo" />
      <h4>Contact</h4>
      <p><strong>Address:</strong> Lajpat Nagar, Delhi 110086</p>
      <p>
        <strong>Phone:</strong>
        <a href="tel:931594xxxx" target="_blank">931594xxxx</a>
      </p>
      <p>
        <strong>Email:</strong>
        <a href="mailto:info@gmail.com" target="_blank">info@gmail.com</a>
      </p>
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
      <p>Premium quality dresses for Judo, Judo, and Taekwondo.</p>
      <div class="row">
        <img src="/Aikon/Assets/verified.png" class="verified-logo" />
        <img src="/Aikon/Assets/best-prodect.png" class="best-logo" />
      </div>
      <p>Secured Payment Gateways</p>
      <img src="/Aikon/Assets/pay.png" alt="" />
    </div>

    <div class="copyright">
      <p>
        &copy; <span id="currentYear"></span> <b>AIKON SPORTS</b>. All rights
        reserved. Design by
        <a href="https://www.digiindiasolutions.com/" target="_blank"><b>DIGI INDIA SOLUTIONS.</b></a>
      </p>
    </div>
  </footer>

  <script src="equipment.js"></script>
</body>

</html>