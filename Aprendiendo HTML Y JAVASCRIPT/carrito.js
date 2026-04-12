document.addEventListener("DOMContentLoaded", function() {
    displayCartItems();
});

function displayCartItems() {
    var cartItemsDiv = document.getElementById("cart-items");
    var cartItems = JSON.parse(localStorage.getItem("cart")) || [];
    cartItemsDiv.innerHTML = ""; // Limpiar el contenido anterior

    if (cartItems.length === 0) {
        cartItemsDiv.innerHTML = "<p>El carrito está vacío.</p>";
    } else {
        var ul = document.createElement("ul");
        cartItems.forEach(function(item) {
            var li = document.createElement("li");
            li.textContent = item.name + " - $" + item.price;
            ul.appendChild(li);
        });
        cartItemsDiv.appendChild(ul);
    }
}
function addToCart(item) {
    var cart = JSON.parse(localStorage.getItem("cart")) || [];
    cart.push(item);
    localStorage.setItem("cart", JSON.stringify(cart));
    alert("¡Producto agregado al carrito!");
}
<button onclick="addToCart({ name: 'Producto 1', price: 10 })">Agregar al Carrito</button>
