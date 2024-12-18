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

const fitnessProducts = [
    {
        brand: "FitPro",
        name: "Treadmill 3000X",
        price: 35999,
        image: "/Assets/treadmill.png",
    },
    {
        brand: "GymStar",
        name: "Dumbbell Set (20kg)",
        price: 2599,
        image: "/Assets/dumbbell.png",
    },
    {
        brand: "CoreFit",
        name: "Resistance Bands",
        price: 799,
        image: "/Assets/resistance-bands.png",
    },
    {
        brand: "FlexGear",
        name: "Yoga Mat Pro",
        price: 1199,
        image: "/Assets/yoga-mat.png",
    },
    {
        brand: "MaxFit",
        name: "Kettlebell (12kg)",
        price: 1899,
        image: "/Assets/kettlebell.png",
    },
    {
        brand: "PowerPro",
        name: "Pull-Up Bar",
        price: 2499,
        image: "/Assets/pullup-bar.png",
    },
    {
        brand: "ActiveGear",
        name: "Exercise Ball",
        price: 999,
        image: "/Assets/exercise-ball.png",
    },
    {
        brand: "BodyTech",
        name: "Adjustable Bench",
        price: 4999,
        image: "/Assets/adjustable-bench.png",
    },
];

// Dynamically render Fitness Equipment products
const equipmentContainer = document.getElementById("Equipments");

fitnessProducts.forEach((product) => {
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
    equipmentContainer.innerHTML += productHTML;
});
