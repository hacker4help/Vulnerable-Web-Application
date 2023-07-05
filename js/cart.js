document.addEventListener("DOMContentLoaded", function() {
    // Get the elements
    var addToCartButtons = document.getElementsByClassName("add-to-cart-btn");
    var cartItems = document.getElementById("cart-items");
    var cartTotal = document.getElementById("cart-total");
  
    // Set up cart variables
    var cart = [];
    var total = 0;
  
    // Add event listeners to each "Add to Cart" button
    for (var i = 0; i < addToCartButtons.length; i++) {
      addToCartButtons[i].addEventListener("click", function() {
        var product = this.parentElement;
        var name = product.getElementsByClassName("product-name")[0].innerText;
        var price = parseFloat(product.getElementsByClassName("product-price")[0].innerText.slice(1));
        var qty = parseInt(product.getElementsByClassName("product-qty")[0].innerText);
        addToCart(name, price, qty);
      });
    }
  
    // Check if there are items in local storage and populate the cart
    var storedCart = localStorage.getItem("cart");
    if (storedCart) {
      cart = JSON.parse(storedCart);
      total = calculateTotal();
      renderCart();
    }
  
    
    // Function to add items to the cart
    function addToCart(name, price, qty) {
        // Check if the item already exists in the cart
        for (var i = 0; i < cart.length; i++) {
        if (cart[i].name === name) {
            // Replace the existing item
            total -= (cart[i].price * cart[i].qty); // Deduct the existing item price from the total
            cart[i].price = price; // Update the price of the existing item
            cart[i].qty = qty;
            total += price*qty; // Add the new price to the total
            saveCart();
            renderCart();
            return; // Exit the function after updating the cart
        }
        }
        
        // If the item doesn't exist in the cart, add it as a new item
        cart.push({ name: name, price: price, qty: qty });
        total += price*qty;
        saveCart();
        renderCart();
    }


    // Function to save the cart to local storage
    function saveCart() {
      localStorage.setItem("cart", JSON.stringify(cart));
    }
  
    // Function to calculate the total price of the cart items
    function calculateTotal() {
      var sum = 0;
      for (var i = 0; i < cart.length; i++) {
        sum += cart[i].price*cart[i].qty;
      }
      return sum;
    }
  
    // Function to render the cart
    function renderCart() {
      cartItems.innerHTML = "";
      for (var i = 0; i < cart.length; i++) {
        var item = document.createElement("li");
        item.innerText = cart[i].name + " - $" + cart[i].price + "  Qty: " + cart[i].qty;
        cartItems.appendChild(item);
      }
      cartTotal.innerText = "Total: $" + total.toFixed(2);
    }

    function buyItems(){
      var priceElement = document.getElementByClassName("buy");
      var total = parseFloat(priceElement.innerText.slice(1));      
      var myForm = document.createElement("form");
            myForm.setAttribute("id", "myForm");
            document.body.appendChild(myForm);

            var amountInput = document.createElement("input");
            amountInput.setAttribute("type", "hidden");
            amountInput.setAttribute("name", "amount");
            amountInput.setAttribute("value", total);
            myForm.appendChild(amountInput);

            myForm.method = "POST";
            myForm.action = "receipt.html";
            myForm.submit();
            console.log("Success")
    }
  });