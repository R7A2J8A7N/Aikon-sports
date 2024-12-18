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


const karateProducts = [
  {
    brand: "Adidas",
    name: "Karate Gi Premium",
    price: 1299,
    image: "/Aikon/Assets/protector7.png",
  },
  {
    brand: "Nike",
    name: "Karate Gi Lightweight",
    price: 1099,
    image: "/Aikon/Assets/protector7.png",
  },
  {
    brand: "Puma",
    name: "Karate Belt White",
    price: 299,
    image: "/Aikon/Assets/protector7.png",
  },
  {
    brand: "Reebok",
    name: "Karate Sparring Gloves",
    price: 799,
    image: "/Aikon/Assets/protector7.png",
  },
  {
    brand: "Everlast",
    name: "Karate Head Protector",
    price: 999,
    image: "/Aikon/Assets/protector7.png",
  },
  {
    brand: "Venum",
    name: "Karate Shin Guards",
    price: 699,
    image: "/Aikon/Assets/protector7.png",
  },
  {
    brand: "Under Armour",
    name: "Karate Groin Guard",
    price: 499,
    image: "/Aikon/Assets/protector7.png",
  },
  {
    brand: "Decathlon",
    name: "Karate Kicking Pad",
    price: 899,
    image: "/Aikon/Assets/protector7.png",
  },
];

// Dynamically render Karate products
const karateContainer = document.getElementById("karateContainer");

karateProducts.forEach((product) => {
  const productHTML = `
      <div class="pro">
        <img src="${product.image}" alt="${product.name}" />
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
  karateContainer.innerHTML += productHTML;
});

// ============================Helmet ==========================

const karateHelmets = [
    {
      brand: "Adidas",
      name: "Karate Helmet Pro",
      price: 999,
      image: "/Aikon/Assets/taekwondo-Helmet1.png",
    },
    {
      brand: "Nike",
      name: "Karate Head Guard Lightweight",
      price: 899,
      image: "/Aikon/Assets/taekwondo-Helmet2.png",
    },
    {
      brand: "Puma",
      name: "Karate Head Protector",
      price: 1099,
      image: "/Aikon/Assets/taekwondo-Helmet3.png",
    },
    {
      brand: "Reebok",
      name: "Karate Full Head Guard",
      price: 1299,
      image: "/Aikon/Assets/taekwondo-Helmet4.png",
    },
    {
      brand: "Everlast",
      name: "Karate Face Shield Helmet",
      price: 1199,
      image: "/Aikon/Assets/taekwondo-Helmet5.png",
    },
    {
      brand: "Venum",
      name: "Karate Protective Helmet",
      price: 999,
      image: "/Aikon/Assets/taekwondo-Helmet6.png",
    },
    {
      brand: "Under Armour",
      name: "Karate Sparring Helmet",
      price: 1099,
      image: "/Aikon/Assets/taekwondo-Helmet7.png",
    },
    {
      brand: "Decathlon",
      name: "Karate Ventilated Helmet",
      price: 899,
      image: "/Aikon/Assets/taekwondo-Helmet8.png",
    },
  ];
  
  // Dynamically render Karate Helmet products
  const karateHelmetContainer = document.getElementById("KarateHelmet");
  
  karateHelmets.forEach((product) => {
    const productHTML = `
      <div class="pro">
        <img src="${product.image}" alt="${product.name}" />
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
    karateHelmetContainer.innerHTML += productHTML;
  });

//   =================== Shoes ========================

const karateShoes = [
    {
      brand: "Adidas",
      name: "Karate Lightweight Shoes",
      price: 1299,
      image: "/Aikon/Assets/taekwondo-Shoes1.png",
    },
    {
      brand: "Nike",
      name: "Karate Grip Shoes",
      price: 1199,
      image: "/Aikon/Assets/taekwondo-Shoes2.png",
    },
    {
      brand: "Puma",
      name: "Karate Flexible Shoes",
      price: 1099,
      image: "/Aikon/Assets/taekwondo-Shoes3.png",
    },
    {
      brand: "Reebok",
      name: "Karate Non-Slip Shoes",
      price: 1399,
      image: "/Aikon/Assets/taekwondo-Shoes4.png",
    },
    {
      brand: "Everlast",
      name: "Karate Breathable Shoes",
      price: 1299,
      image: "/Aikon/Assets/taekwondo-Shoes5.png",
    },
    {
      brand: "Venum",
      name: "Karate Training Shoes",
      price: 1199,
      image: "/Aikon/Assets/taekwondo-Shoes6.png",
    },
    {
      brand: "Under Armour",
      name: "Karate High Grip Shoes",
      price: 1499,
      image: "/Aikon/Assets/taekwondo-Shoes7.png",
    },
    {
      brand: "Decathlon",
      name: "Karate Durable Shoes",
      price: 999,
      image: "/Aikon/Assets/taekwondo-Shoes8.png",
    },
  ];
  
  // Dynamically render Karate Safety Shoes products
  const karateShoesContainer = document.getElementById("KarateShoes");
  
  karateShoes.forEach((product) => {
    const productHTML = `
      <div class="pro">
        <img src="${product.image}" alt="${product.name}" />
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
    karateShoesContainer.innerHTML += productHTML;
  });
  
  