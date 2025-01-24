document.addEventListener('DOMContentLoaded', () => {
    // Add menu item to cart
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    addToCartButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const itemId = e.target.dataset.itemId;
            // Send to cart logic
        });
    });
});