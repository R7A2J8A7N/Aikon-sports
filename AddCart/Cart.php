<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AIKON - SPORT</title>
  <link rel="stylesheet" href="/Aikon/style.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


  <style>
    
    /* Global settings */



label {
  color: #aaa;
}

/* .shopping-cart {
  margin-top: -45px;
} */

.column-labels{
  margin: 20px 0px 0px 53px;
}


.product-image {
  float: left;
  width: 12%;
}

.product-details {
  float: left;
  width: 30%;
}

.product-price {
  float: left;
  width: 14%;
}

.product-quantity {
  float: left;
  width: 14%;
}

.product-removal {
  float: left;
  width: 15%;
}

.product-line-price {
  float: left;
  width: 12%;
  /* text-align: right; */
}

.group:before,
.group:after {
  content: '';
  display: table;
}

.group:after {
  clear: both;
}

.group {
  zoom: 1;
}


.shopping-cart,
.column-labels,
.product,
.totals-item {
  content: '';
  /* display: table; */
  clear: both;
}

.product .product-price:before,
.product .product-line-price:before,
.totals-value:before {
  content: '$';
}

.column-labels label {
  padding-bottom: 15px;
  margin-bottom: 15px;
  border-bottom: 1px solid #eee;
}

.column-labels .product-image,
.column-labels .product-details,
.column-labels .product-removal {
  /* text-indent: -9999px; */
}


.product {
  margin-bottom: 20px;
  padding-bottom: 10px;
  border-bottom: 1px solid #eee;
}

.product .product-image {
  text-align: center;
}

.product .product-image img {
  width: 100px;
}

.product .product-details .product-title {
  margin-right: 20px;
  }

.product .product-details .product-description {
  margin: 5px 20px 5px 0;
  line-height: 1.4em;
}

.product .product-quantity input {
  width: 40px;
}

.product .remove-product {
  border: 0;
  padding: 4px 8px;
  background-color: #c66;
  color: #fff;
  font-family: 'HelveticaNeue-Medium', 'Helvetica Neue Medium';
  font-size: 12px;
  border-radius: 3px;
}

.product .remove-product:hover {
  background-color: #a44;
}

.totals .totals-item {
  float: right;
  clear: both;
  width: 100%;
  margin-bottom: 10px;
}

.totals .totals-item label {
  float: left;
  clear: both;
  width: 79%;
  text-align: right;
}

.totals .totals-item .totals-value {
  float: right;
  width: 21%;
  text-align: right;
}

.totals .totals-item-total {
  font-family: 'HelveticaNeue-Medium', 'Helvetica Neue Medium';
}

.checkout {
  float: right;
  border: 0;
  margin-top: 20px;
  padding: 6px 25px;
  background-color: #6b6;
  color: #fff;
  font-size: 25px;
  border-radius: 3px;
}

.checkout:hover {
  background-color: #494;
}

/* Make adjustments for tablet */
@media screen and (max-width: 650px) {
  .shopping-cart {
    margin: 0;
    padding-top: 20px;
    border-top: 1px solid #eee;
  }

  .column-labels {
    display: none;
  }

  .product-image {
    float: right;
    width: auto;
  }

  .product-image img {
    margin: 0 0 10px 10px;
  }

  .product-details {
    float: none;
    margin-bottom: 10px;
    width: auto;
  }

  .product-price {
    clear: both;
    width: 70px;
  }

  .product-quantity {
    width: 100px;
  }

  .product-quantity input {
    margin-left: 20px;
  }

  .product-quantity:before {
    content: 'x';
  }

  .product-removal {
    width: auto;
  }

  .product-line-price {
    float: right;
    width: 70px;
  }
}

/* Make more adjustments for phone */
@media screen and (max-width: 350px) {
  .product-removal {
    float: right;
  }

  .product-line-price {
    float: right;
    clear: left;
    width: auto;
    margin-top: 10px;
  }

  .product .product-line-price:before {
    content: 'Item Total: $';
  }

  .totals .totals-item label {
    width: 60%;
  }

  .totals .totals-item .totals-value {
    width: 40%;
  }
}

  </style>


</head>
</head>

<body>
  <section id="header">
    <a href="/Aikon/index.php" class="logo-name">
      <img src="/Aikon/Assets/Aikon-logo.png" alt="Logo" class="logo" />
      <h4>AIKON SPORTS</h4>
    </a>

    <div id="mobile">
      <a href="Cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
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
          <li><a href="/Aikon/AllEquipment/equipment.php">Training Equipments</a></li>
        </ul>
      </li>


      <li><a href="/Aikon/About/aboutstore.php">ABOUT STORE</a></li>
      <li><a href="/Aikon/Contact/contact.php">CONTACT</a></li>
      <li>
        <a id="lg-bag" href="Cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
      </li>
      <li>
        <a id="lg-bag" href="/Aikon/Login/login.php"><i class="fa-solid fa-user"></i></a>
      </li>
      <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
    </ul>
  </section>

  <section id="header">
    <a href="/Aikon/index.php" class="logo-name">
      <img src="/Aikon/Assets/Aikon-logo.png" alt="Logo" class="logo" />
      <h4>AIKON SPORTS</h4>
    </a>

    <div id="mobile">
      <a href="Cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
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
          <li><a href="/Aikon/AllEquipment/equipment.php">Training Equipments</a></li>
        </ul>
      </li>

      <li><a href="/Aikon/About/aboutstore.php">ABOUT STORE</a></li>
      <li><a href="/Aikon/Contact/contact.php">CONTACT</a></li>
      <li>
        <a id="lg-bag" href="Cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
      </li>
      <li>
        <a id="lg-bag" href="/Aikon/Login/login.php"><i class="fa-solid fa-user"></i></a>
      </li>
      <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
    </ul>
  </section>


  

<div class="shopping-cart">

  <div class="column-labels">
    <label class="product-image">Image</label>
    <label class="product-details">Product</label>
    <label class="product-price">Price</label>
    <label class="product-quantity">Quantity</label>
    <label class="product-removal">Remove</label>
    <label class="product-line-price">Total</label>
  </div>

  <div class="product">
    <div class="product-image">
      <img src="https://s.cdpn.io/3/dingo-dog-bones.jpg">
    </div>
    <div class="product-details">
      <div class="product-title">Dingo Dog Bones</div>
      <p class="product-description">The best dog bones of all time. Holy crap. Your dog will be begging for these things! I got curious once and ate one myself. I'm a fan.</p>
    </div>
    <div class="product-price">12.99</div>
    <div class="product-quantity">
      <input type="number" value="2" min="1">
    </div>
    <div class="product-removal">
      <button class="remove-product">
        Remove
      </button>
    </div>
    <div class="product-line-price">25.98</div>
  </div>

  <div class="product">
    <div class="product-image">
      <img src="https://s.cdpn.io/3/large-NutroNaturalChoiceAdultLambMealandRiceDryDogFood.png">
    </div>
    <div class="product-details">
      <div class="product-title">Nutro™ Adult Lamb and Rice Dog Food</div>
      <p class="product-description">Who doesn't like lamb and rice? We've all hit the halal cart at 3am while quasi-blackout after a night of binge drinking in Manhattan. Now it's your dog's turn!</p>
    </div>
    <div class="product-price">45.99</div>
    <div class="product-quantity">
      <input type="number" value="1" min="1">
    </div>
    <div class="product-removal">
      <button class="remove-product">
        Remove
      </button>
    </div>
    <div class="product-line-price">45.99</div>
  </div>

  <div class="totals">
    <div class="totals-item">
      <label>Subtotal</label>
      <div class="totals-value" id="cart-subtotal">71.97</div>
    </div>
    <div class="totals-item">
      <label>Tax (5%)</label>
      <div class="totals-value" id="cart-tax">3.60</div>
    </div>
    <div class="totals-item">
      <label>Shipping</label>
      <div class="totals-value" id="cart-shipping">15.00</div>
    </div>
    <div class="totals-item totals-item-total">
      <label>Grand Total</label>
      <div class="totals-value" id="cart-total">90.57</div>
    </div>
  </div>
      
      <button class="checkout">Checkout</button>

</div>

  <section>
    <h2 class="cart-title">Shopping Cart</h2>
    <div class="shopping-cart">
      <div class="column-labels">
        <label class="cart-label">Image</label>
        <label class="cart-label">Product</label>
        <label class="cart-label">Price</label>
        <label class="cart-label">Quantity</label>
        <label class="cart-label">Remove</label>
        <label class="cart-label">Total</label>
      </div>

    
      <div class="product">
        <div class="product-image">
          <img src="/Aikon/Assets/karate-dress3.jpg" alt="Karate Dress">
        </div>
        <div class="product-details">
          <div class="product-title">Karate Dress</div>
          <p class="product-description">
            A premium quality Karate Gi made from 100% breathable cotton. Perfect for both beginners and professionals,
            offering maximum comfort and durability during training and competitions. Comes with a free white belt.
          </p>
        </div>
        <div class="product-price">499.00</div>
        <div class="product-quantity">
          <input type="number" value="2" min="1">
        </div>
        <div class="product-removal">
          <button class="remove-product">Remove</button>
        </div>
        <div class="product-line-price">998.00</div>
      </div>

     
      <div class="product">
        <div class="product-image">
          <img src="/Aikon/Assets/protector4.png" alt="Karate Protector">
        </div>
        <div class="product-details">
          <div class="product-title">Karate Protector</div>
          <p class="product-description">Durable and lightweight protector designed for maximum safety during intense training and competitions.</p>
        </div>
        <div class="product-price">299.00</div>
        <div class="product-quantity">
          <input type="number" value="1" min="1">
        </div>
        <div class="product-removal">
          <button class="remove-product">Remove</button>
        </div>
        <div class="product-line-price">299.00</div>
      </div>

   
      <div class="totals">
        <div class="totals-item">
          <label>Subtotal</label>
          <div class="totals-value" id="cart-subtotal">0.00</div>
        </div>
        <div class="totals-item">
          <label>Tax (5%)</label>
          <div class="totals-value" id="cart-tax">0.00</div>
        </div>
        <div class="totals-item">
          <label>Shipping</label>
          <div class="totals-value" id="cart-shipping">0.00</div>
        </div>
        <div class="totals-item totals-item-total">
          <label>Grand Total</label>
          <div class="totals-value" id="cart-total">0.00</div>
        </div>
      </div>
      <div class="order-btn">
        <button class="normal checkout" style="display:none;">Checkout</button>
      </div>
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
      <p>Premium quality dresses for Karate, Judo, and Taekwondo.</p>
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
  <script src="/Aikon/function.js"></script>
  <script src="cart.js"></script>


</body>

</html>