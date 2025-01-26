<?php
include "basic.php";

$cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0;

// Calculate total
foreach ($cartItems as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>

<main>
    <section class="container mx-auto px-4 py-16">
        <h1 class="text-4xl font-bold mb-8 text-red-700 text-center">Checkout</h1>

        <?php if (!empty($cartItems)): ?>
            <div class="grid grid-cols-2 gap-8">
                <!-- Order Summary -->
                <div>
                    <h2 class="text-2xl font-bold mb-4">Order Summary</h2>
                    <table class="w-full border-collapse border border-gray-300 mb-6">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 p-4">Product</th>
                                <th class="border border-gray-300 p-4">Price</th>
                                <th class="border border-gray-300 p-4">Quantity</th>
                                <th class="border border-gray-300 p-4">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cartItems as $item): ?>
                                <tr>
                                    <td class="border border-gray-300 p-4"><?= htmlspecialchars($item['name']); ?></td>
                                    <td class="border border-gray-300 p-4">LKR <?= number_format($item['price'], 2); ?></td>
                                    <td class="border border-gray-300 p-4"><?= $item['quantity']; ?></td>
                                    <td class="border border-gray-300 p-4">LKR <?= number_format($item['price'] * $item['quantity'], 2); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="border border-gray-300 p-4 font-bold text-right">Total:</td>
                                <td class="border border-gray-300 p-4 font-bold">LKR <?= number_format($total, 2); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Checkout Form -->
                <div>
                    <h2 class="text-2xl font-bold mb-4">Billing Details</h2>
                    <form action="php/process_checkout.php" method="POST" class="space-y-4">
                        <div>
                            <label for="name" class="block text-gray-700 mb-2">Full Name</label>
                            <input type="text" name="name" id="name" required class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-red-500">
                        </div>
                        <div>
                            <label for="address" class="block text-gray-700 mb-2">Delivery Address</label>
                            <textarea name="address" id="address" rows="3" required class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-red-500"></textarea>
                        </div>
                        <div>
                            <label for="phone" class="block text-gray-700 mb-2">Phone Number</label>
                            <input type="text" name="phone" id="phone" required class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-red-500">
                        </div>
                        <div>
                            <label for="payment" class="block text-gray-700 mb-2">Payment Method</label>
                            <select name="payment" id="payment" required class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-red-500">
                                <option value="cash">Cash on Delivery</option>
                                <option value="card">Credit/Debit Card</option>
                                <option value="online">Online Payment</option>
                            </select>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-red-500 text-white px-6 py-3 rounded-full hover:bg-red-600 transition">
                                Place Order
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        <?php else: ?>
            <p class="text-gray-600 text-center">Your cart is empty. <a href="menu.php" class="text-red-500 hover:underline">Shop now</a></p>
        <?php endif; ?>
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
