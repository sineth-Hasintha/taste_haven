<?php
include "database_connection.php"; // Include session start and database connection

// Check if the cart is not empty and form data is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_SESSION['cart'])) {
    $cartItems = $_SESSION['cart'];
    $totalAmount = 0; 

    // Collect form data
    $userName = htmlspecialchars($_POST['name']);
    $deliveryAddress = htmlspecialchars($_POST['address']);
    $phone = htmlspecialchars($_POST['phone']);
    $paymentMethod = htmlspecialchars($_POST['payment']);
    $deliveryType = 'Delivery'; // Assuming delivery type is always Delivery for now

    // Calculate the total amount
    foreach ($cartItems as $item) {
        $totalAmount += $item['price'] * $item['quantity'];
    }

    // Insert into `orders` table
    $query = "INSERT INTO orders (user_id, total_amount, delivery_address, payment_method, delivery_type, order_date) 
              VALUES (?, ?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ddsss',$userId, $totalAmount, $deliveryAddress, $paymentMethod, $deliveryType);

    if ($stmt->execute()) {
        $orderId = $stmt->insert_id; // Get the last inserted order ID

        // Insert each cart item into `orderitems` table
        $itemQuery = "INSERT INTO orderitems (order_id, item_id, quantity, item_price) VALUES (?, ?, ?, ?)";
        $itemStmt = $conn->prepare($itemQuery);

        foreach ($cartItems as $itemId => $item) {
            $itemPrice = $item['price'];
            $quantity = $item['quantity'];

            $itemStmt->bind_param('iiid', $orderId, $itemId, $quantity, $itemPrice);
            $itemStmt->execute();
        }

        // Clear the cart session after order processing
        unset($_SESSION['cart']);

        // Redirect to a success page
        header("Location: order_success.php?order_id=$orderId");
        exit();
    } else {
        echo "Error: Unable to process your order. Please try again.";
    }

    $stmt->close();
    $conn->close();
} else {
    // Redirect to cart if no items or invalid request
    header("Location: ../cart.php");
    exit();
}
?>
