// script.js


  window.addEventListener('scroll', () => {
    const header = document.getElementById('header');
    if (window.scrollY > 50) { // Add class when scrolled 50px or more
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
  });



// ================navbar dropdown ==================

const dropdownToggle = document.getElementById('productsDropdown');
const dropdownMenu = document.querySelector('.dropdown-menu');

// Toggle the dropdown menu on click
dropdownToggle.addEventListener('click', (e) => {
  e.preventDefault(); // Prevent default link behavior
  dropdownMenu.classList.toggle('active');
});

// Optional: Close dropdown if clicked outside
document.addEventListener('click', (event) => {
  if (!dropdownMenu.contains(event.target) && event.target !== dropdownToggle) {
    dropdownMenu.classList.remove('active');
  }
});

// ====================== Humburger menu ==========================

const bar = document.getElementById('bar');
const close = document.getElementById('close');
const nav = document.getElementById('navbar');

// Open navbar on click
if (bar) {
  bar.addEventListener('click', () => {
    nav.classList.add('active');
  });
}

// Close navbar on click
if (close) {
  close.addEventListener('click', () => {
    nav.classList.remove('active');
  });
}

// Close navbar when clicking outside
document.addEventListener('click', (event) => {
  if (!nav.contains(event.target) && event.target !== bar) {
    nav.classList.remove('active');
  }
});


const slider = document.querySelector('.slider');
const slides = document.querySelectorAll('.slide');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');

let index = 0;

const showSlide = (i) => {
  slider.style.transform = `translateX(-${i * 100}%)`;
};

const nextSlide = () => {
  index = (index + 1) % slides.length;
  showSlide(index);
};

const prevSlide = () => {
  index = (index - 1 + slides.length) % slides.length;
  showSlide(index);
};

nextBtn.addEventListener('click', nextSlide);
prevBtn.addEventListener('click', prevSlide);

// Auto-slide every 5 seconds
setInterval(nextSlide, 3000);

// =========== Feature Product Array ============

// Product Array
const products = [
  {
    brand: "Adidas",
    name: "Chest Guard",
    price: 499,
    image: "Assets/CHEST-GUARD.png",
  },
  {
    brand: "Nike",
    name: "Boxing Gloves",
    price: 799,
    image: "Assets/Judo-Uniform3.png",
  },
  {
    brand: "Puma",
    name: "Shin Guard",
    price: 299,
    image: "Assets/taekwondo-shoes8.png",
  },
  {
    brand: "Reebok",
    name: "Helmet",
    price: 999,
   image: "Assets/taekwondo-shoes4.png",
  },
  {
    brand: "Everlast",
    name: "Punching Bag",
    price: 1999,
   image: "Assets/CHEST-GUARD.png",
  },
  {
    brand: "Everlast",
    name: "Punching Bag",
    price: 1999,
   image: "Assets/CHEST-GUARD.png",
  },
  {
    brand: "Everlast",
    name: "Punching Bag",
    price: 1999,
   image: "Assets/CHEST-GUARD.png",
  },
  {
    brand: "Everlast",
    name: "Punching Bag",
    price: 1999,
   image: "Assets/CHEST-GUARD.png",
  },
];

// Dynamically render products
const productContainer = document.getElementById("productContainer");

products.forEach((product) => {
  const productHTML = `
    <div class="pro">
      <img src="${product.image}" alt="${product.name}" onclick="window.location.href='sproduct.php';" />
      <div class="des">
        <span>${product.brand}</span>
        <h5>${product.name}</h5>
        <div class="star">
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
        </div>
        <h4>₹${product.price}</h4>
      </div>
      <div class="add-cart">
        <a href="#"><i class="fa-solid fa-cart-plus"></i></a>
      </div>
    </div>
  `;
  productContainer.innerHTML += productHTML;
});


// =========== New Arrival Product Array ============

// Product Array
const newproducts = [
  {
    brand: "Adidas",
    name: "Chest Guard",
    price: 499,
    image: "Assets/karate-dress1.jpg",
  },
  {
    brand: "Nike",
    name: "Boxing Gloves",
    price: 799,
   image: "Assets/karate-dress2.jpg",
  },
  {
    brand: "Puma",
    name: "Shin Guard",
    price: 299,
    image: "Assets/karate-dress3.jpg",
  },
  {
    brand: "Reebok",
    name: "Helmet",
    price: 999,
   image: "Assets/karate-dress4.jpg",
  },
  {
    brand: "Everlast",
    name: "Punching Bag",
    price: 1999,
   image: "Assets/CHEST-GUARD.png",
  },
  {
    brand: "Everlast",
    name: "Punching Bag",
    price: 1999,
   image: "Assets/karate-dress1.jpg",
  },
  {
    brand: "Everlast",
    name: "Punching Bag",
    price: 1999,
   image: "Assets/karate-dress2.jpg",
  },
  {
    brand: "Everlast",
    name: "Punching Bag",
    price: 1999,
   image: "Assets/karate-dress3.jpg",
  },
];

// Dynamically render products
const newArrivalproductContainer = document.getElementById("newArrivalproductContainer");

newproducts.forEach((newproduct) => {
  const productHTML = `
    <div class="pro">
      <img src="${newproduct.image}" alt="${newproduct.name}" />
      <div class="des">
        <span>${newproduct.brand}</span>
        <h5>${newproduct.name}</h5>
        <div class="star">
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
        </div>
        <h4>₹${newproduct.price}</h4>
      </div>
      <div class="add-cart">
        <a href="#"><i class="fa-solid fa-cart-plus"></i></a>
      </div>
    </div>
  `;
  newArrivalproductContainer.innerHTML += productHTML;
});


// ==============offer section ==============

// Select all .banner-box elements
const bannerBoxes = document.querySelectorAll('.banner-box');

// Add Intersection Observer
const observer = new IntersectionObserver(
  (entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Determine animation based on the index of the banner box
        const index = Array.from(bannerBoxes).indexOf(entry.target);

        // Add animation based on the order
        if (index === 0) {
          entry.target.classList.add('animate__fadeInLeft');
        } else {
          entry.target.classList.add('animate__fadeInRight');
        }

        // Stop observing once animation is applied
        observer.unobserve(entry.target);
      }
    });
  },
  {
    threshold: 0.3, // Trigger when 80% of the element is visible
  }
);

// Observe each banner-box
bannerBoxes.forEach((box) => observer.observe(box));

// Set the current year dynamically
document.getElementById('currentYear').textContent = new Date().getFullYear();


// ======================= Shop page function ====================

window.addEventListener("load", () => {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
});
