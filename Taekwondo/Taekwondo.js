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


const taekwondoProducts = [
    {
      brand: "Adidas",
      name: "Taekwondo Chest Guard",
      price: 599,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Nike",
      name: "Taekwondo Gloves",
      price: 799,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Puma",
      name: "Taekwondo Shin Guard",
      price: 499,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Reebok",
      name: "Taekwondo Helmet",
      price: 999,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Everlast",
      name: "Taekwondo Uniform",
      price: 1199,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Venum",
      name: "Taekwondo Belt",
      price: 299,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Under Armour",
      name: "Taekwondo Hand Wraps",
      price: 199,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Decathlon",
      name: "Taekwondo Kicking Pad",
      price: 699,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
  ];
  
  // Dynamically render Taekwondo products
  const taekwondoContainer = document.getElementById("TaekwondoContainer");
  
  taekwondoProducts.forEach((product) => {
    const productHTML = `
      <div class="pro">
        <img src="${product.image}" alt="${product.name}"/>
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
    taekwondoContainer.innerHTML += productHTML;
  });


//   ==========================Helmet ==========================
  

const taekwondoHelmets = [
    {
      brand: "Adidas",
      name: "Pro Taekwondo Helmet",
      price: 899,
      image: "/Aikon/Assets/taekwondo-helmet1.png",
    },
    {
      brand: "Nike",
      name: "Elite Taekwondo Helmet",
      price: 999,
      image: "/Aikon/Assets/taekwondo-helmet2.png",
    },
    {
      brand: "Puma",
      name: "Classic Taekwondo Helmet",
      price: 799,
      image: "/Aikon/Assets/taekwondo-helmet3.png",
    },
    {
      brand: "Reebok",
      name: "Impact Taekwondo Helmet",
      price: 1199,
      image: "/Aikon/Assets/taekwondo-helmet4.png",
    },
    {
      brand: "Everlast",
      name: "Lightweight Helmet",
      price: 699,
      image: "/Aikon/Assets/taekwondo-helmet5.png",
    },
    {
      brand: "Venum",
      name: "Taekwondo Sparring Helmet",
      price: 1099,
      image: "/Aikon/Assets/taekwondo-helmet6.png",
    },
    {
      brand: "Under Armour",
      name: "Advanced Taekwondo Helmet",
      price: 1299,
      image: "/Aikon/Assets/taekwondo-helmet7.png",
    },
    {
      brand: "Decathlon",
      name: "Durable Taekwondo Helmet",
      price: 799,
      image: "/Aikon/Assets/taekwondo-helmet8.png",
    },
  ];
  
  // Dynamically render Taekwondo Helmets
  const taekwondoHelmetContainer = document.getElementById("TaekwondoHelmet");
  
  taekwondoHelmets.forEach((product) => {
    const productHTML = `
      <div class="pro">
        <img src="${product.image}" alt="${product.name}"/>
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
    taekwondoHelmetContainer.innerHTML += productHTML;
  });
  
// ========================Shoes========================

  const taekwondoShoes = [
    {
      brand: "Adidas",
      name: "Pro Taekwondo Shoes",
      price: 1299,
      image: "/Aikon/Assets/taekwondo-shoes1.png",
    },
    {
      brand: "Nike",
      name: "Grip Taekwondo Shoes",
      price: 1399,
      image: "/Aikon/Assets/taekwondo-shoes2.png",
    },
    {
      brand: "Puma",
      name: "Lightweight Taekwondo Shoes",
      price: 1199,
      image: "/Aikon/Assets/taekwondo-shoes3.png",
    },
    {
      brand: "Reebok",
      name: "Comfort Taekwondo Shoes",
      price: 1499,
      image: "/Aikon/Assets/taekwondo-shoes4.png",
    },
    {
      brand: "Everlast",
      name: "Durable Taekwondo Shoes",
      price: 999,
      image: "/Aikon/Assets/taekwondo-shoes5.png",
    },
    {
      brand: "Venum",
      name: "Elite Taekwondo Shoes",
      price: 1599,
      image: "/Aikon/Assets/taekwondo-shoes6.png",
    },
    {
      brand: "Under Armour",
      name: "Advanced Taekwondo Shoes",
      price: 1699,
      image: "/Aikon/Assets/taekwondo-shoes7.png",
    },
    {
      brand: "Decathlon",
      name: "Budget Taekwondo Shoes",
      price: 899,
      image: "/Aikon/Assets/taekwondo-shoes8.png",
    },
  ];
  
  // Dynamically render Taekwondo Shoes
  const taekwondoShoesContainer = document.getElementById("TaekwondoShoes");
  
  taekwondoShoes.forEach((product) => {
    const productHTML = `
      <div class="pro">
        <img src="${product.image}" alt="${product.name}"/>
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
    taekwondoShoesContainer.innerHTML += productHTML;
  });
  
//   ====================Protector ==========================

const taekwondoProtectors = [
    {
      brand: "Adidas",
      name: "Chest Protector",
      price: 1499,
      image: "/Aikon/Assets/protector1.png",
    },
    {
      brand: "Nike",
      name: "Shin Protector",
      price: 999,
      image: "/Aikon/Assets/protector2.png",
    },
    {
      brand: "Puma",
      name: "Forearm Protector",
      price: 799,
      image: "/Aikon/Assets/protector3.png",
    },
    {
      brand: "Reebok",
      name: "Groin Protector",
      price: 699,
      image: "/Aikon/Assets/protector4.png",
    },
    {
      brand: "Everlast",
      name: "Head Protector",
      price: 1299,
      image: "/Aikon/Assets/protector5.png",
    },
    {
      brand: "Venum",
      name: "Foot Protector",
      price: 899,
      image: "/Aikon/Assets/protector6.png",
    },
    {
      brand: "Under Armour",
      name: "Arm Protector",
      price: 599,
      image: "/Aikon/Assets/protector7.png",
    },
    {
      brand: "Decathlon",
      name: "Full Body Protector",
      price: 2499,
      image: "/Aikon/Assets/protector8.png",
    },
  ];
  
  // Dynamically render Taekwondo Protectors
  const taekwondoProtectorContainer = document.getElementById("TaekwondoProtector");
  
  taekwondoProtectors.forEach((product) => {
    const productHTML = `
      <div class="pro">
        <img src="${product.image}" alt="${product.name}"/>
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
    taekwondoProtectorContainer.innerHTML += productHTML;
  });
  