<?php
session_start(); // Start the session

// Retrieve product details from the form submission
$dish_name = isset($_POST['dish_name']) ? $_POST['dish_name'] : null;
$product_price = isset($_POST['product_price']) ? $_POST['product_price'] : null; // Optional, can be added dynamically
$product_quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

// Validate the product details
if ($dish_name) {
    // Create the cart session if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Generate a unique ID for the product based on the name
    $product_id = md5($dish_name);

    // Check if the product already exists in the cart
    if (isset($_SESSION['cart'][$product_id])) {
        // Update the quantity of the product
        $_SESSION['cart'][$product_id]['quantity'] += $product_quantity;
    } else {
        // Add the product to the cart
        $_SESSION['cart'][$product_id] = [
            'name' => $dish_name,
            'price' => $product_price ?? 0, // Default price to 0 if not provided
            'quantity' => $product_quantity
        ];
    }

    // Redirect to cart.php
    header("Location: ../cart.php");
    exit();
} else {
    echo "Invalid product data. <a href='shop.php'>Go back</a>";
}
