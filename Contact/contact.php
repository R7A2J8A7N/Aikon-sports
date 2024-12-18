<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="/Aikon/style.css">
  <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
  rel="stylesheet"
/>
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
      <a href="/Aikon/Login/login.php"><i class="fa-solid fa-user"></i></a>
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
      <li><a href="contact.php">CONTACT</a></li>
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
        <h2>Contact us</h2>
        <p>Contact us for any query</p>
       <div class="page-render">
        <a href="/Aikon/index.php">Home &nbsp;</a>
        <p>> Contact</p>
       </div>
      </section>

  <!-- Contact Section -->
   <section>
  <section>
    <div class="contactSection container-fluid">
      <div class="row">
        <div class="col-md-3 col-6">
          <div class="contactSectionBox">
            <span class="Contactsicon"><i class="bi bi-geo-alt"></i></span>
            <div>
              <p>Address</p>
              <address>123 Street, NY, USA</address>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="contactSectionBox">
            <span class="Contactsicon"><i class="bi bi-telephone"></i></span>
            <div>
              <p>Call Us</p>
              <a href="tel:+91950xxxxx">+91 9508xxxx</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="contactSectionBox">
            <span class="Contactsicon"><i class="bi bi-envelope"></i></span>
            <div>
              <p>Email Us</p>
              <a href="mailto:aikon@gmail.com">aikon@gmail.com</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="contactSectionBox">
            <span class="Contactsicon"><i class="bi bi-share"></i></span>
            <div>
              <p>Follow Us</p>
              <div class="socialMediaLinks">
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-youtube"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Form and Map Section -->
  <section class="contactFormSection">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.9780392673615!2d77.21514667528896!3d28.63042027566586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd04f7bf3f3f%3A0xdbd8fcc24a525d9d!2sCaunaut%20Place!5e0!3m2!1sen!2sin!4v1732533937357!5m2!1sen!2sin"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="col-md-6">
          <div class="contact-form">
            <form>
              <div class="form-input mb-3">
                <input class="form-control" type="text" name="name" placeholder="Your Name">
              </div>
              <div class="form-input mb-3">
                <input class="form-control" type="email" name="email" placeholder="Your Email">
              </div>
              <div class="form-input mb-3">
                <input class="form-control" type="text" name="subject" placeholder="Subject">
              </div>
              <div class="form-input mb-3">
                <textarea class="form-control" rows="9" name="message" placeholder="Message"></textarea>
              </div>
              <div class="form-input">
                <input class="form-control" type="submit" value="Submit">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</section>



  <script src="/Aikon/function.js"></script>
</body>
</html>
