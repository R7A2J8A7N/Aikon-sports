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

const MainImg = document.getElementById("MainImg");
const smallimg = document.getElementsByClassName("small-img");

for (let i = 0; i < smallimg.length; i++) {
  smallimg[i].onclick = function () {
    // Add fade-out class
    MainImg.classList.add("fade");

    // Change the image source after the fade-out duration
    setTimeout(() => {
      MainImg.src = smallimg[i].src;

      // Remove fade-out and trigger fade-in
      MainImg.classList.remove("fade");
    }, 300); // Matches the CSS transition duration
  };
}

function updateQuantity(change) {
  const quantityInput = document.getElementById("quantity");
  let currentValue = parseInt(quantityInput.value);

  if (!isNaN(currentValue)) {
    currentValue += change;
    if (currentValue < 1) currentValue = 1; // Ensure minimum quantity of 1
    quantityInput.value = currentValue;
  } else {
    quantityInput.value = 1; // Reset to 1 if invalid
  }
}

const similarProducts = [
  {
    brand: "Adidas",
    name: "Chest Guard",
    price: 499,
    image: "Assets/CHEST-GUARD.png",
    url: "sproduct.php",
  },
  {
    brand: "Nike",
    name: "Boxing Gloves",
    price: 799,
    image: "Assets/CHEST-GUARD.png",
  },
  {
    brand: "Puma",
    name: "Shin Guard",
    price: 299,
    image: "Assets/CHEST-GUARD.png",
  },
  {
    brand: "Reebok",
    name: "Helmet",
    price: 999,
    image: "Assets/CHEST-GUARD.png",
  },
];

const similarProductsContainer = document.getElementById("similarProducts");

similarProducts.forEach((product) => {
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
  similarProductsContainer.innerHTML += productHTML;
});

// =============================================
// =============== Add to cart button animation ================

const button = document.querySelector("button");
let timer;
let timer2;

button.addEventListener("click", function () {
  if (!this.classList.contains("added")) {
    clearTimeout(timer);
    clearTimeout(timer2);
  }

  if (
    this.classList.contains("tapis-roulant") &&
    !this.classList.contains("added")
  ) {
    document.querySelector(
      ".tapis-roulant>div:nth-child(4)>div"
    ).style.animationPlayState = "paused";
    document.querySelector(
      ".tapis-roulant>div:nth-child(2)>div"
    ).style.animationPlayState = "paused";
    this.style.pointerEvents = "none";
    this.classList.add("canceled");
    setTimeout(() => {
      this.style.pointerEvents = "initial";
      this.classList.remove("tapis-roulant");
      this.classList.remove("canceled");
    }, 1000);
  }

  if (!this.classList.contains("tapis-roulant")) {
    this.classList.add("tapis-roulant");
    document.querySelector(
      ".tapis-roulant>div:nth-child(4)>div"
    ).style.animationPlayState = "running";
    document.querySelector(
      ".tapis-roulant>div:nth-child(2)>div"
    ).style.animationPlayState = "running";
    timer = setTimeout(() => {
      this.classList.add("added");
      this.style.pointerEvents = "none";
      timer2 = setTimeout(() => {
        this.classList.remove("added");
        this.classList.remove("tapis-roulant");
        this.style.pointerEvents = "initial";
      }, 1600);
    }, 1400);
  }
});
