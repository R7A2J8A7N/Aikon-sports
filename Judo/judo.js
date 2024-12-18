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

const JudoUniforms = [
    {
      brand: "Adidas",
      name: "Judo Lightweight Uniform",
      price: 1599,
      image: "/Aikon/Assets/Judo-Uniform1.png",
    },
    {
      brand: "Nike",
      name: "Judo Professional Uniform",
      price: 1799,
      image: "/Aikon/Assets/Judo-Uniform2.png",
    },
    {
      brand: "Puma",
      name: "Judo Training Uniform",
      price: 1399,
      image: "/Aikon/Assets/Judo-Uniform3.png",
    },
    {
      brand: "Reebok",
      name: "Judo Durable Uniform",
      price: 1699,
      image: "/Aikon/Assets/Judo-Uniform4.png",
    },
    {
      brand: "Everlast",
      name: "Judo Breathable Uniform",
      price: 1499,
      image: "/Aikon/Assets/Judo-Uniform1.png",
    },
    {
      brand: "Venum",
      name: "Judo Competition Uniform",
      price: 1899,
      image: "/Aikon/Assets/Judo-Uniform2.png",
    },
    {
      brand: "Under Armour",
      name: "Judo Elite Uniform",
      price: 1999,
      image: "/Aikon/Assets/Judo-Uniform3.png",
    },
    {
      brand: "Decathlon",
      name: "Judo Economy Uniform",
      price: 1199,
      image: "/Aikon/Assets/Judo-Uniform4.png",
    },
  ];
  
  // Dynamically render Judo Uniform products
  const JudoContainer = document.getElementById("JudoContainer");
  
  JudoUniforms.forEach((product) => {
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
    JudoContainer.innerHTML += productHTML;
  });
  