<?php
include 'basic.php';
?>

<main>
    <section class="container mx-auto px-4 py-16 grid grid-cols-2 gap-8 items-center">
        <div>
            <h1 class="text-5xl font-bold mb-6 text-red-700">Fresh Meals, Delivered Fresh</h1>
            <p class="text-xl mb-8 text-gray-700">Delicious, home-style cooking brought directly to your doorstep. Discover local flavors that comfort and inspire.</p>
            <div class="flex space-x-4">
                <input type="text" placeholder="Enter your delivery address" 
                       class="flex-grow px-4 py-3 border rounded-l-full border-gray-300 focus:outline-none focus:ring-2 focus:ring-red-500">
                <button class="bg-red-500 text-white px-6 py-3 rounded-r-full hover:bg-red-600 transition">
                    Find Food
                </button>
            </div>
        </div>
        <div>
            <img src="/api/placeholder/600/400" alt="Delicious Meal Spread" class="rounded-lg shadow-2xl">
        </div>
    </section>

    <section class="bg-gray-100 py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-12 text-red-700">Our Most Popular Dishes</h2>
            <div class="grid grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition">
                    <img src="./img/R.jpg" alt="Dish 1" class="rounded-lg mb-4">
                    <h3 class="text-xl font-semibold mb-2">Spicy Chicken Curry</h3>
                    <p class="text-gray-600 mb-4">Authentic flavor with a perfect blend of spices</p>
                    <form action="php/add_to_cart.php" method="POST">
                        <input type="hidden" name="dish_name" value="Spicy Chicken Curry">
                        <input type="hidden" name="product_price" value="350.00">
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600">
                            Add to Cart
                        </button>
                    </form>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition">
                    <img src="/api/placeholder/300/200" alt="Dish 2" class="rounded-lg mb-4">
                    <h3 class="text-xl font-semibold mb-2">Vegetarian Pasta</h3>
                    <p class="text-gray-600 mb-4">Fresh vegetables, homemade sauce</p>
                    <form action="php/add_to_cart.php" method="POST">
                        <input type="hidden" name="dish_name" value="Vegetarian Pasta">
                        <input type="hidden" name="product_price" value="100.00">
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600">
                            Add to Cart
                        </button>
                    </form>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition">
                    <img src="/api/placeholder/300/200" alt="Dish 3" class="rounded-lg mb-4">
                    <h3 class="text-xl font-semibold mb-2">Seafood Paella</h3>
                    <p class="text-gray-600 mb-4">Traditional Spanish recipe, fresh seafood</p>
                    <form action="php/add_to_cart.php" method="POST">
                        <input type="hidden" name="dish_name" value="Seafood Paella">
                        <input type="hidden" name="product_price" value="500.00">
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600">
                            Add to Cart
                        </button>
                    </form>
                </div>
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
