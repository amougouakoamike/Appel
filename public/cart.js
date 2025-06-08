
document.addEventListener("DOMContentLoaded", () => {
  const payBtn = document.querySelector(".checkout-btn")
  if (payBtn) {
    payBtn.addEventListener("click", () => {
      let cartItems = JSON.parse(localStorage.getItem("cart")) || [];

        cartItems = cartItems
        .filter(item => item && item.id && item.quantity > 0)
        .map(item => {
          return {
            product_title: item.name || "",
             image: item.image || "",
            quantity: parseInt(item.quantity) || 1,
            product_price: parseFloat(item.price) || 0
          };
        });

      if (cartItems.length === 0) {
        alert("Your cart is empty. Please add some items before buying.");
        window.location.href = "../public/cancel.php";
        return;
      }
         const isValid = cartItems.every(item =>
        typeof item.product_title === "string" && item.product_title.trim() !== "" &&
        typeof item.image === "string" && item.image.trim() !== "" &&
        typeof item.product_price === "number" && item.product_price > 0 &&
        Number.isInteger(item.quantity) && item.quantity > 0
      );

      if (!isValid) {
        alert("One or more items in your cart are invalid. Please check again.");
        return;
      }
     

      // Send order to backend
      fetch("place-order.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify({ items: cartItems })
      })
        .then(res => res.text())
        .then(text => {
          console.log("Server response:", text);
          let data;
          try {
            data = JSON.parse(text);
          } catch {
            alert("Thank you for your purchase!");
            function clearCart() {
              cart = [];
              SaveToLocalStorage();
              updateCartIcon();
              renderCartItems();
              calculateCartTotal();
              }
            clearCart();
            window.location.href = "../public/success.php";
            return;
          }

          if (data.status === "success") {
            alert("Thank you for your purchase!");
            clearCart();
            window.location.href = "../public/success.php";
          } else {
            alert("Error: " + data.message);
          }
        });
    });
  }

  function clearCart() {
    localStorage.removeItem("cart");
    updateCartIcon?.();
    renderCartItems?.();
    calculateCartTotal?.();
  }
});

