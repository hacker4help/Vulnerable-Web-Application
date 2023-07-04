// document.addEventListener("DOMContentLoaded", function() {
//     var addToCartButtons = document.getElementsByClassName("add-to-cart-btn");
  
//     // Add event listeners to each "Add to Cart" button
//     for (var i = 0; i < addToCartButtons.length; i++) {
//       addToCartButtons[i].addEventListener("click", function() {
//         var product = this.parentElement;
//         var name = product.getElementsByClassName("product-name")[0].innerText;
//         var price = parseFloat(product.getElementsByClassName("product-price")[0].innerText.slice(1));
//         addToCart(name, price);
//       });
//     }
  
//     // Function to add items to the cart
//     function addToCart(name, price) {
//       var storedCart = localStorage.getItem("cart");
//       var cart = storedCart ? JSON.parse(storedCart) : [];
//       cart.push({ name: name, price: price });
//       localStorage.setItem("cart", JSON.stringify(cart));
//     }
//   });

document.addEventListener("DOMContentLoaded", function() {
    var addToCartButtons = document.getElementsByClassName("add-to-cart-btn");
  
    // Add event listeners to each "Add to Cart" button
    for (var i = 0; i < addToCartButtons.length; i++) {
      addToCartButtons[i].addEventListener("click", function() {
        var product = this.parentElement;
        var nameElement = product.getElementsByClassName("product-name")[0];
        var priceElement = product.getElementsByClassName("product-price")[0];
        var qtyElement = product.getElementsByClassName("product-qty")[0];
  
        // Check if name and price elements are found and have valid content
        if (nameElement && priceElement && qtyElement && qtyElement.value && nameElement.innerText && priceElement.innerText) {
          var name = nameElement.innerText;
          var price = parseFloat(priceElement.innerText.slice(1));
          var qty = parseInt(qtyElement.value);
          console.log("Name:", name);
          console.log("Price:", price);
          console.log("Quantity:", qty);
          addToCart(name, price, qty);
        } else {
          console.error("Error: Missing or invalid product name or price.");
        }
      });
    }
  

// // Function to add items to the cart

function addToCart(name, price, qty) {
    // Check if the item already exists in the cart
    console.log('working');
    var storedCart = localStorage.getItem("cart");
    var cart = storedCart ? JSON.parse(storedCart) : [];
    for (var i = 0; i < cart.length; i++) {
      if (cart[i].name === name) {
        // Replace the existing item
        cart[i].price = price; // Update the price of the existing item
        cart[i].qty = qty;
        localStorage.setItem("cart", JSON.stringify(cart));
        return; // Exit the function after updating the cart
      }
    }
    
    // If the item doesn't exist in the cart, add it as a new item
    cart.push({ name: name, price: price, qty: qty });
    localStorage.setItem("cart", JSON.stringify(cart));
  }

   });