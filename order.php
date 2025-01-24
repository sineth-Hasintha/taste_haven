<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order - Taste Haven</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white text-gray-900">
    <header class="bg-red-50 py-4">
        <div class="container mx-auto flex justify-between items-center px-4">
            <div class="flex items-center">
                <img src="/api/placeholder/100/100" alt="Taste Haven Logo" class="h-12 w-12 mr-4">
                <nav>
                    <ul class="flex space-x-6">
                        <li><a href="menu.php" class="hover:text-red-600 transition">Menu</a></li>
                        <li><a href="order.php" class="hover:text-red-600 transition">Order</a></li>
                        <li><a href="#" class="hover:text-red-600 transition">About Us</a></li>
                    </ul>
                </nav>
            </div>
            <div class="flex items-center space-x-4">
                <button class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 transition">
                    Order Now
                </button>
                <a href="logout.php" class="text-gray-600 hover:text-red-500 transition">
                    Logout
                </a>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-4 py-16">
        <section class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold mb-8 text-red-700 text-center">Place Your Order</h2>
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold mb-6 text-red-700">Your Cart</h3>
                <div class="space-y-6">
                    <!-- Cart Item 1 -->
                    <div class="flex justify-between items-center border-b pb-4">
                        <div class="flex items-center space-x-4">
                            <img src="/api/placeholder/100/100" alt="Spicy Chicken Curry" class="w-16 h-16 rounded-lg">
                            <div>
                                <h4 class="font-semibold">Spicy Chicken Curry</h4>
                                <p class="text-gray-600">Authentic flavor with a perfect blend of spices</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="text-lg font-semibold">$12.99</span>
                            <button class="text-red-500 hover:text-red-600">Remove</button>
                        </div>
                    </div>

                    <!-- Cart Item 2 -->
                    <div class="flex justify-between items-center border-b pb-4">
                        <div class="flex items-center space-x-4">
                            <img src="/api/placeholder/100/100" alt="Vegetarian Pasta" class="w-16 h-16 rounded-lg">
                            <div>
                                <h4 class="font-semibold">Vegetarian Pasta</h4>
                                <p class="text-gray-600">Fresh vegetables, homemade sauce</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="text-lg font-semibold">$9.99</span>
                            <button class="text-red-500 hover:text-red-600">Remove</button>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="mt-8 pt-6 border-t">
                    <h3 class="text-xl font-semibold mb-4 text-red-700">Order Summary</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="font-semibold">$22.98</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Delivery Fee</span>
                            <span class="font-semibold">$3.00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Total</span>
                            <span class="font-semibold text-red-700">$25.98</span>
                        </div>
                    </div>
                    <button class="w-full bg-red-500 text-white px-6 py-3 rounded-lg mt-6 hover:bg-red-600 transition">
                        Place Order
                    </button>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-red-50 py-12">
        <div class="container mx-auto px-4 grid grid-cols-4 gap-8">
            <div>
                <h4 class="font-bold mb-4 text-red-700">Quick Links</h4>
                <ul>
                    <li><a href="#" class="text-gray-600 hover:text-red-500">Menu</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-red-500">Order</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-red-500">About Us</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-4 text-red-700">Customer Service</h4>
                <ul>
                    <li><a href="#" class="text-gray-600 hover:text-red-500">Contact</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-red-500">FAQs</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-red-500">Delivery Info</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-4 text-red-700">Legal</h4>
                <ul>
                    <li><a href="#" class="text-gray-600 hover:text-red-500">Terms of Service</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-red-500">Privacy Policy</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-4 text-red-700">Connect With Us</h4>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-600 hover:text-red-500">Facebook</a>
                    <a href="#" class="text-gray-600 hover:text-red-500">Instagram</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>