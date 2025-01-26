<?php

session_start();

$loggedIn = isset($_SESSION['username']);
$userId = $_SESSION['user_id'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Taste Haven</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white text-gray-900">
    <header class="bg-red-50 py-4">
        <div class="container mx-auto flex justify-between items-center px-4">
            <div class="flex items-center">
                <img src="/api/placeholder/100/100" alt="Taste Haven Logo" class="h-12 w-12 mr-4">
                <nav>
                    <ul class="flex space-x-6">
                    <li><a href="index.php" class="hover:text-red-600 transition">Home</a></li>
                        <li><a href="menu.php" class="hover:text-red-600 transition">Menu</a></li>
                        <li><a href="order.php" class="hover:text-red-600 transition">Order</a></li>
                        <li><a href="#" class="hover:text-red-600 transition">About Us</a></li>
                    </ul>
                </nav>
            </div>
            <div class="flex items-center space-x-4">
                <?php if ($loggedIn): ?>
                    <!-- Display user information -->
                    <span class="text-gray-600">Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
                    <a href="logout.php" class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 transition">
                        Logout
                    </a>
                <?php else: ?>
                    <!-- Default links for non-logged-in users -->
                    <a href="signup.php" class="text-gray-600 hover:text-red-500 transition">
                        Sign Up
                    </a>
                    <a href="login.php" class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 transition">
                        Login
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </header>
