
<?php
include 'basic.php';

?>




<body class="bg-white text-gray-900">
    <header class="bg-red-50 py-4">
        <!-- Similar header to homepage -->
    </header>

    <main class="container mx-auto px-4 py-12">
        <section>
            <h1 class="text-4xl font-bold mb-8 text-red-700">Our Delicious Menu</h1>
            
            <div class="flex mb-8">
                <input type="text" placeholder="Search menu items" 
                       class="flex-grow px-4 py-2 border rounded-l-full border-gray-300 focus:outline-none focus:ring-2 focus:ring-red-500">
                <select class="px-4 py-2 border border-l-0 border-gray-300 focus:outline-none focus:ring-2 focus:ring-red-500">
                    <option>All Categories</option>
                    <option>Appetizers</option>
                    <option>Mains</option>
                    <option>Desserts</option>
                    <option>Beverages</option>
                </select>
                <button class="bg-red-500 text-white px-6 py-2 rounded-r-full hover:bg-red-600 transition">
                    Search
                </button>
            </div>

            <div class="grid grid-cols-3 gap-8">
                <!-- Menu Item Template -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition">
                    <img src="/api/placeholder/300/200" alt="Menu Item" class="rounded-lg mb-4">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-xl font-semibold">Dish Name</h3>
                        <span class="text-red-600 font-bold">$12.99</span>
                    </div>
                    <p class="text-gray-600 mb-4">Brief description of the dish and its ingredients</p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-2">
                            <span class="text-green-600">Vegan</span>
                            <span class="text-yellow-600">Spicy</span>
                        </div>
                        <button class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600">
                            Add to Cart
                        </button>
                    </div>
                </div>
                <!-- Repeat for multiple menu items -->
            </div>
        </section>
    </main>

    <footer class="bg-red-50 py-12">
        <!-- Similar footer to homepage -->
    </footer>
</body>
</html>
