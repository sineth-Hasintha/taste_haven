<?php
include "basic.php";

$cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// Handle quantity updates
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : null;
    $itemId = isset($_POST['item_id']) ? $_POST['item_id'] : null;

    if ($action && $itemId && isset($cartItems[$itemId])) {
        if ($action === 'increase') {
            $cartItems[$itemId]['quantity'] += 1;
        } elseif ($action === 'decrease' && $cartItems[$itemId]['quantity'] > 1) {
            $cartItems[$itemId]['quantity'] -= 1;
        } elseif ($action === 'remove') {
            unset($cartItems[$itemId]);
        }
        $_SESSION['cart'] = $cartItems;
        header("Location: cart.php");
        exit();
    }
}
?>

<main>
    <section class="container mx-auto px-4 py-16">
        <h1 class="text-4xl font-bold mb-8 text-red-700 text-center">Your Cart</h1>
        <?php if (!empty($cartItems)): ?>
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border border-gray-300 p-4">Product</th>
                        <th class="border border-gray-300 p-4">Price</th>
                        <th class="border border-gray-300 p-4">Quantity</th>
                        <th class="border border-gray-300 p-4">Subtotal</th>
                        <th class="border border-gray-300 p-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($cartItems as $itemId => $item):
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    ?>
                        <tr>
                            <td class="border border-gray-300 p-4"><?= htmlspecialchars($item['name']); ?></td>
                            <td class="border border-gray-300 p-4">LKR <?= number_format($item['price'], 2); ?></td>
                            <td class="border border-gray-300 p-4"><?= $item['quantity']; ?></td>
                            <td class="border border-gray-300 p-4">LKR <?= number_format($subtotal, 2); ?></td>
                            <td class="border border-gray-300 p-4">
                                <form action="cart.php" method="POST" class="inline">
                                    <input type="hidden" name="item_id" value="<?= $itemId; ?>">
                                    <input type="hidden" name="action" value="increase">
                                    <button type="submit" class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600">+</button>
                                </form>
                                <form action="cart.php" method="POST" class="inline">
                                    <input type="hidden" name="item_id" value="<?= $itemId; ?>">
                                    <input type="hidden" name="action" value="decrease">
                                    <button type="submit" class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">-</button>
                                </form>
                                <form action="cart.php" method="POST" class="inline">
                                    <input type="hidden" name="item_id" value="<?= $itemId; ?>">
                                    <input type="hidden" name="action" value="remove">
                                    <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">Remove</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="border border-gray-300 p-4 font-bold text-right">Total:</td>
                        <td class="border border-gray-300 p-4 font-bold">LKR <?= number_format($total, 2); ?></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
            <div class="mt-8 flex justify-end">
                <a href="checkout.php" class="bg-red-500 text-white px-6 py-3 rounded-full hover:bg-red-600 transition">
                    Proceed to Checkout
                </a>
            </div>
        <?php else: ?>
            <p class="text-gray-600 text-center">Your cart is empty. <a href="menu.php" class="text-red-500 hover:underline">Shop now</a></p>
        <?php endif; ?>
    </section>
</main>

<footer class="bg-red-50 py-12">
    <div class="container mx-auto px-4 grid grid-cols-4 gap-8">
        <!-- Footer content remains unchanged -->
    </div>
</footer>
</body>
</html>
