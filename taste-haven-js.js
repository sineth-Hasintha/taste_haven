// app.js
document.addEventListener('DOMContentLoaded', () => {
    // Menu to Cart Functionality
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    const cart = [];

    addToCartButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const item = e.target.closest('.menu-item');
            const itemDetails = {
                id: item.dataset.itemId,
                name: item.querySelector('.item-name').textContent,
                price: parseFloat(item.querySelector('.item-price').textContent.replace('$', ''))
            };
            cart.push(itemDetails);
            updateCartDisplay();
        });
    });

    function updateCartDisplay() {
        const cartElement = document.getElementById('cart-items');
        const cartTotal = document.getElementById('cart-total');
        
        cartElement.innerHTML = cart.map(item => 
            `<div>${item.name} - $${item.price.toFixed(2)}</div>`
        ).join('');

        const total = cart.reduce((sum, item) => sum + item.price, 0);
        cartTotal.textContent = `$${total.toFixed(2)}`;
    }

    // Checkout Process
    const checkoutForm = document.getElementById('checkout-form');
    if (checkoutForm) {
        checkoutForm.addEventListener('submit', (e) => {
            e.preventDefault();
            // Implement checkout logic
            processOrder(cart);
        });
    }

    function processOrder(cartItems) {
        // Send order to backend/database
        fetch('/api/orders', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                items: cartItems,
                // Add other order details from form
            })
        });
    }
});
