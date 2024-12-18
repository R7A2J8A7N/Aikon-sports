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


const myshopproducts = [
    {
      brand: "Adidas",
      name: "Chest Guard",
      price: 499,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Nike",
      name: "Boxing Gloves",
      price: 799,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Puma",
      name: "Shin Guard",
      price: 299,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Reebok",
      name: "Helmet",
      price: 999,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Everlast",
      name: "Punching Bag",
      price: 1999,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Everlast",
      name: "Punching Bag",
      price: 1999,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Everlast",
      name: "Punching Bag",
      price: 1999,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Everlast",
      name: "Punching Bag",
      price: 1999,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Adidas",
      name: "Chest Guard",
      price: 499,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Nike",
      name: "Boxing Gloves",
      price: 799,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Puma",
      name: "Shin Guard",
      price: 299,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Reebok",
      name: "Helmet",
      price: 999,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Everlast",
      name: "Punching Bag",
      price: 1999,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Everlast",
      name: "Punching Bag",
      price: 1999,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Adidas",
      name: "Chest Guard",
      price: 499,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Nike",
      name: "Boxing Gloves",
      price: 799,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Puma",
      name: "Shin Guard",
      price: 299,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Reebok",
      name: "Helmet",
      price: 999,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Everlast",
      name: "Punching Bag",
      price: 1999,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Everlast",
      name: "Punching Bag",
      price: 1999,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Everlast",
      name: "Punching Bag",
      price: 1999,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Everlast",
      name: "Punching Bag",
      price: 1999,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Everlast",
      name: "Punching Bag",
      price: 1999,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Everlast",
      name: "Punching Bag",
      price: 1999,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Everlast",
      name: "Punching Bag",
      price: 1999,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Everlast",
      name: "Punching Bag",
      price: 1999,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Everlast",
      name: "Punching Bag",
      price: 1999,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Everlast",
      name: "Punching Bag",
      price: 1999,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Everlast",
      name: "Punching Bag",
      price: 1999,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Everlast",
      name: "Punching Bag",
      price: 1999,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Everlast",
      name: "Punching Bag",
      price: 1999,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Everlast",
      name: "Punching Bag",
      price: 1999,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Everlast",
      name: "Punching Bag",
      price: 1999,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Everlast",
      name: "Punching Bag",
      price: 1999,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Everlast",
      name: "Punching Bag",
      price: 1999,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
    {
      brand: "Everlast",
      name: "Punching Bag",
      price: 1999,
      image: "/Aikon/Assets/CHEST-GUARD.png",
    },
  ];
  
  // Dynamically render products
  const shopContainer = document.getElementById("shopContainer");
  
  myshopproducts.forEach((shopproduct) => {
    const shopproductHTML = `
      <div class="pro">
        <img src="${shopproduct.image}" alt="${shopproduct.name}" />
        <div class="des">
          <span>${shopproduct.brand}</span>
          <h5>${shopproduct.name}</h5>
          <div class="star">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
          </div>
          <h4>₹${shopproduct.price}</h4>
        </div>
        <div class="add-cart">
          <a href="#"><i class="fa-solid fa-cart-plus"></i></a>
        </div>
      </div>
    `;
    shopContainer.innerHTML += shopproductHTML; // Corrected here
  });
  
  