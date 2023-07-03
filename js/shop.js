document.addEventListener("DOMContentLoaded", function() {
    var addToCartButtons = document.getElementsByClassName("add-to-cart-btn");
  
    // Add event listeners to each "Add to Cart" button
    for (var i = 0; i < addToCartButtons.length; i++) {
      addToCartButtons[i].addEventListener("click", function() {
        var product = this.parentElement;
        var name = product.getElementsByClassName("product-name")[0].innerText;
        var price = parseFloat(product.getElementsByClassName("product-price")[0].innerText.slice(1));
        addToCart(name, price);
      });
    }
  
    // Function to add items to the cart
    function addToCart(name, price) {
      var storedCart = localStorage.getItem("cart");
      var cart = storedCart ? JSON.parse(storedCart) : [];
      cart.push({ name: name, price: price });
      localStorage.setItem("cart", JSON.stringify(cart));
    }
  });