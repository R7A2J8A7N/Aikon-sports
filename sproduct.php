<?php
include('./admin/include/config.php');

if (isset($_GET['id'])) {
    $product_id = (int)$_GET['id'];
    $product_query = "SELECT * FROM products WHERE id = $product_id";
    $product_result = mysqli_query($conn, $product_query);

    if (mysqli_num_rows($product_result) > 0) {
        $product = mysqli_fetch_assoc($product_result);
    } else {
        header("Location: shop.php");
        exit();
    }
} else {
    header("Location: shop.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AIKON - SPORT</title>
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
  </head>
  <body>
    <section id="header">
      <a href="index.php" class="logo-name">
        <img src="Assets/Aikon-logo.png" alt="Logo" class="logo" />
        <h4>AIKON SPORTS</h4>
      </a>

      <div id="mobile">
        <a href="/Aikon/AddCart/Cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
        <a href="/Aikon/Login/login.php"><i class="fa-solid fa-user"></i></a>
        <i id="bar" class="fa-solid fa-bars"></i>
      </div>

      <ul id="navbar">
        <li><a href="index.php">HOME</a></li>
        <li><a class="active" href="/Aikon/Shop/shop.php">SHOP</a></li>
        <li class="dropdown">
          <a id="productsDropdown" href="javascript:void(0)">CATEGORY &#11167;</a>
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
          <a id="lg-bag" href="/Aikon/Login/login.php"><i class="fa-solid fa-user"></i></a>
        </li>
        <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
      </ul>
    </section>

    <section id="prodetails" class="section-p1">
      <div class="single-pro-image">
        <?php
        $imagePath = isset($product['image']) ? $product['image'] : 'default.jpg';
        if (!str_contains($imagePath, 'uploads/')) {
            $imagePath = 'uploads/' . $imagePath;
        }
        $imageFullPath = './admin/' . $imagePath;
        ?>
        <img src="<?php echo $imageFullPath; ?>" alt="<?php echo $product['name']; ?>" id="MainImg" height="400px"  width="100%" />

        <div class="small-img-group">
          <?php
        
          $other_images = isset($product['other_images']) ? json_decode($product['other_images'], true) : [];

          if (!empty($other_images)) {
              foreach ($other_images as $image) {
                  $imagePath = 'uploads/' . $image; // Path of each child image
                  echo '<div class="small-img-col">
                          <img src="' . $imagePath . '" class="small-img" alt="Product Image" />
                        </div>';
              }
          } else {
              // Default images in case no additional images are found
              echo '<div class="small-img-col">
                      <img src="Assets/karate-dress3.jpg" class="small-img" alt="" />
                    </div>';
              echo '<div class="small-img-col">
                      <img src="Assets/karate-dress2.jpg" class="small-img" alt="" />
                    </div>';
              echo '<div class="small-img-col">
                      <img src="Assets/karate-dress4.jpg" class="small-img" alt="" />
                    </div>';
              echo '<div class="small-img-col">
                      <img src="Assets/karate-dress1.jpg" class="small-img" alt="" />
                    </div>';
          }
          ?>
        </div>
      </div>

      <div class="single-pro-details">
        <h4><?php echo $product['brand_name']; ?></h4>
        <h3><?php echo $product['name'];?></h3>
        <h2> ₹ <?php echo $product['price'];?> (Inclusive of all taxes)</h2>
        <div class="star" style="color: gold; margin-bottom:10px">
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
        </div>

       

        <select>
          <option value="">Select Size</option>
          <option value="">S</option>
          <option value="">L</option>
          <option value="">XL</option>
          <option value="">XXL</option>
        </select>

        <div class="quantity-selector">
          <button class="quantity-btn decrement" onclick="updateQuantity(-1)">-</button>
          <input type="number" id="quantity" value="1" min="1" />
          <button class="quantity-btn increment" onclick="updateQuantity(1)">+</button>
        </div>

        <button class="add-to-cart" role="button">
          <i class="fa-solid fa-cart-shopping"></i> Add to Cart
        </button>

        <h4>Product Details</h4>
        <p>
          <?php echo $product['description']; ?>
        </p>
      </div>
    </section>

    <section id="product1" class="section-p1">
      <h2>Similar Products</h2>
      <p>From Our Best Selling Product</p>
      <div class="pro-container" id="similarProducts">
        <!-- Products will be dynamically injected here -->
      </div>
    </section>

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
        <img src="Assets/Aikon-logo.png" alt="Company" class="footer-logo" />
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
        <p>Designed & Developed by <b>AIKON TECHNOLOGIES</b></p>
      </div>
    </footer>

    <script src="script.js"></script>
    <script src="sproduct.js"></script>
  </body>
</html>
