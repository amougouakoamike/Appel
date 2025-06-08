// function 
let menus = document.querySelector("#bars-menu");
let navBar = document.querySelector(".navbar");



menus.onclick = () =>{
    menus.classList.toggle("fa-times");
    navBar.classList.toggle("active");
}

//function for shifting section bars
let sections = document.querySelectorAll("section");
let navlinks = document.querySelectorAll("header .navbar a");


window.onscroll = () =>{

    menus.classList.remove("fa-times");
    navBar.classList.remove("active");

    
    sections.forEach(sec => {
  let top = window.scrollY;
  let offset = sec.offsetTop - 150;
  let height = sec.offsetHeight;
  let id = sec.getAttribute("id");

if(top >= offset && top < offset + height ){
  navlinks.forEach(links => {
    links.classList.remove("active");
  document.querySelector("header .navbar a[href*="+ id +"]").classList.add("active");
 });

};  

});
}

//swiper function 
var swiper = new Swiper(".swiper", {
  spaceBetween: 30,
  centeredSlides: true,
  autoplay: {
    delay: 6500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  loop:true,
});

  // swiper function 2
  const progressCircle = document.querySelector(".autoplay-progress svg");
  const progressContent = document.querySelector(".autoplay-progress span");
  var swiper = new Swiper(".swiper2", {
    spaceBetween: 180,
    centeredSlides: true,
    autoplay: {
      delay: 5500,
      disableOnInteraction: false
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    },
    on: {
      autoplayTimeLeft(s, time, progress) {
        progressCircle.style.setProperty("--progress", 1 - progress);
        progressContent.textContent = `${Math.ceil(time / 1000)}s`;
      }
    }
  });

// all-products.js Localstorage
const allProducts = [
    // iPhones (101–199)
    { id: 101, name: "IPHONE 16 PRO MAX", price: 200, image: "iphone-1 (31).jpg" },
    { id: 102, name: "IPHONE 15 PRO MAX", price: 220, image: "iphone-1 (29).jpg" },
    { id: 103, name: "IPHONE 12 PRO MAX", price: 400, image: "iphone-1 (46).jpg" },
    { id: 104, name: "IPHONE 11 PRO", price: 200, image: "iphone-1 (45).jpg" },
    { id: 105, name: "IPHONE XR", price: 240, image: "iphone-1 (56).jpg" },
    { id: 105, name: "IPHONE X", price: 240, image: "iphone-1 (49).jpg" },
    { id: 105, name: "IPHONE 6", price: 240, image: "iphone-1 (55).jpg" },
    { id: 105, name: "IPHONE 7", price: 240, image: "iphone-1 (54).jpg" },
  
    // MacBooks (201–299)
    { id: 201, name: "MAC BOOK X", price: 200, image: "iphone-1 (16).jpg" },
    { id: 202, name: "MAC BOOK AIR", price: 400, image: "iphone-1 (17).jpg" },
    { id: 203, name: "MAC BOOK ULTRA", price: 600, image: "iphone-1 (21).jpg" },
    { id: 204, name: "MAC BOOK AIR PLUS 1", price: 240, image: "iphone-1 (24).jpg" },
    { id: 204, name: "MAC BOOK AIR PLUS 2", price: 240, image: "iphone-1 (27).jpg" },
    { id: 204, name: "MAC BOOK AIR PLUS 3", price: 240, image: "iphone-1 (23).jpg" },
    { id: 204, name: "MAC BOOK AIR PLUS 4", price: 240, image: "iphone-1 (25).jpg" },
    { id: 204, name: "MAC BOOK AIR PLUS 5", price: 240, image: "iphone-1 (18).jpg" },
  
  
    // Earpods (301–399)
    { id: 301, name: "EARPOD AIR 1", price: 200, image: "iphone-1 (1).jpg" },
    { id: 302, name: "EARPOD AIR 2", price: 220, image: "iphone-1 (2).jpg" },
    { id: 302, name: "EARPOD AIR 3", price: 220, image: "iphone-1 (3).jpg" },
    { id: 302, name: "EARPOD AIR 4", price: 220, image: "iphone-1 (4).jpg" },
    { id: 302, name: "EARPOD AIR 5", price: 220, image: "iphone-1 (5).jpg" },
    { id: 302, name: "EARPOD AIR 6", price: 220, image: "iphone-1 (6).jpg" },
    { id: 302, name: "EARPOD AIR 7", price: 220, image: "iphone-1 (7).jpg" },
    { id: 302, name: "EARPOD AIR 8", price: 220, image: "iphone-1 (1).jpg" },
  ];
  
// cart.js
let cart = (JSON.parse(localStorage.getItem("cart")) || []).filter(
  (item) => item && item.id
);

// Add to Cart Function
function addToCart(event) {
  const id = parseInt(event.target.dataset.id);
  const product = allProducts.find((p) => p.id === id);
  if (!product) return;

  const existing = cart.find((item) => item.id === id);
  if (existing) {
    existing.quantity += 1;
  } else {
    cart.push({ ...product, quantity: 1 });
  }

  localStorage.setItem("cart", JSON.stringify(cart));
  updateCartIcon();
  alert(`${product.name} added to cart.`);
}

// Remove from Cart
function removeFromCart(event) {
  const productID = parseInt(event.target.dataset.id);
  cart = cart.filter((item) => item.id !== productID);
  SaveToLocalStorage();
  renderCartItems();
  calculateCartTotal();
  updateCartIcon();
}

// Change Quantity
function changeQuantity(event) {
  const productID = parseInt(event.target.dataset.id);
  const quantity = parseInt(event.target.value);
  const cartItem = cart.find((item) => item.id === productID);
  if (cartItem && quantity > 0) {
    cartItem.quantity = quantity;
    SaveToLocalStorage();
    calculateCartTotal();
    updateCartIcon();
  }
}

// Save to localStorage
function SaveToLocalStorage() {
  localStorage.setItem("cart", JSON.stringify(cart));
}

// Render Cart Items
function renderCartItems() {
  const cartItemsElement = document.getElementById("cartItems");
  if (!cartItemsElement) return;

  cartItemsElement.innerHTML = cart
    .map(
      (item) => `
    <div class="cart-item item"> 
      <img src="${item.image}" class="image" alt="${item.name}" width="100px">
      <div class="cart-item info">
        <h4 class="cart-item-title name">${item.name}</h4>
        <input class="cart-item-quantity quantity" type="number" min="1" value="${item.quantity}" data-id="${item.id}">
      </div>
      <h4 class="cart-item-price price">$${item.price}</h4>
      <button class="remove-from-cart" data-id="${item.id}">Remove</button>
    </div>
  `
    )
    .join("");

  document.querySelectorAll(".remove-from-cart").forEach((btn) =>
    btn.addEventListener("click", removeFromCart)
  );
  document.querySelectorAll(".cart-item-quantity").forEach((input) =>
    input.addEventListener("change", changeQuantity)
  );
}

// Calculate Total
function calculateCartTotal() {
  const total = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
  const cartTotalElement = document.getElementById("cartTotal");
  if (cartTotalElement) {
    cartTotalElement.textContent = `Total: $${total.toFixed(2)}`;
  }
}

// Clear Cart
function clearCart() {
  cart = [];
  SaveToLocalStorage();
  updateCartIcon();
  renderCartItems();
  calculateCartTotal();
}

// Update Cart Icon
function updateCartIcon() {
  const totalQuantity = cart.reduce((sum, item) => sum + item.quantity, 0);
  const cartIcon = document.getElementById("cart-item-counts");
  if (cartIcon) {
    cartIcon.setAttribute("data-quantity", totalQuantity);
  }
}


updateCartIcon();
  renderCartItems();
  calculateCartTotal();




  

// //  Checkout Integration order
// document.addEventListener("DOMContentLoaded", () => {
//   const payBtn = document.querySelector(".checkout-btn");

//   if (payBtn) {
//     payBtn.addEventListener("click", () => {
//       const cartItems = (JSON.parse(localStorage.getItem("cart")) || []).filter(
//         (item) => item && item.id && item.quantity > 0
//       );

//       if (cartItems.length === 0) {
//         alert("Your cart is empty.");
//         return;
//       }

//       fetch("place-order.php", {
//         method: "POST",
//         headers: {
//           "Content-Type": "application/json",
//         },
//         body: JSON.stringify({ items: cartItems }),
//       })
//         .then((res) => res.json())
//         .then((data) => {
//           if (data.url) {
//             window.location.href = data.url;
//           } else {
//             console.error("Stripe response missing URL:", data);
//           }
//         })
//         .catch((err) => {
//           console.error("Checkout failed:", err);
//         });
//     });
//   }

  // Initial UI update
// });


