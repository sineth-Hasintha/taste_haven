<?php

include "basic.php"
 

?>

    <main class="container mx-auto px-4 py-16">
        <section class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold mb-8 text-red-700 text-center">Login</h2>
            <form action="php/login_process.php" method="POST">
                <div class="mb-6">
                    <label for="email" class="block text-gray-700 mb-2">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" 
                           class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 mb-2">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" 
                           class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" required>
                </div>
                <button type="submit" class="w-full bg-red-500 text-white px-6 py-3 rounded-lg hover:bg-red-600 transition">
                    Login
                </button>
            </form>
            <p class="mt-6 text-center text-gray-600">
                Don't have an account? <a href="signup.php" class="text-red-500 hover:underline">Sign Up</a>
            </p>
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