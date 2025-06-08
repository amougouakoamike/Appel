

const products = allProducts.filter(p => p.name.toUpperCase().includes("MAC BOOK"));
const productListHTML = document.getElementById("productList");

function renderProducts() {
  productListHTML.innerHTML = products.map(product => `
    <div class="product">
      <img src="${product.image}" alt="${product.name}" class="product-img"/>
      <div class="product-info">
        <h2 class="product-title">${product.name}</h2>
        <p class="product-price">$${product.price.toFixed(2)}</p>
        <a class="add-to-cart" data-id="${product.id}">Add to cart</a>
      </div>
    </div>
  `).join("");

  document.querySelectorAll(".add-to-cart").forEach(btn =>
    btn.addEventListener("click", addToCart)
  );
}

renderProducts();
























