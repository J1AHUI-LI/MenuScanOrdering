<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'A_head.php'; ?>
</head>
<body>
    <!-- Navbar -->
    <?php include 'A_user_navbar.php'; ?>
    <!-- cart page -->
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h2 class="mt-4">Cart</h2>
                <ul id="cart-list" class="list-group mt-4">
                <?php if (isset($_SESSION['cart'])): ?>
                    <?php foreach ($_SESSION['cart'] as $index => $cartItem): ?>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p>Item Name: <?= $cartItem['itemName'] ?></p>
                                    <p>Price: <?= $cartItem['price'] ?></p>
                                    <p>Vendor ID: <?= $cartItem['vendorId'] ?></p>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Your cart is empty.</p>
                <?php endif; ?>
                </ul>
                <form method="post" action="<?= base_url('submitOrder') ?>" class="mt-4">
                    <button type="submit" class="btn btn-primary">Submit Order</button>
                </form>
            </div>
        </div>
    </div>

    <!-- scripts here -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var userID = '<?php echo session()->get('user_id'); ?>';
            var tableID = '<?php echo session()->get('table_id'); ?>';

            if (!userID || !tableID) {
                alert("Please scan QR code before ordering. (You can use admin account login to find QR code)");
                window.location.href = "<?php echo base_url('menu'); ?>";
            }
        });
    </script>
    <?php include 'A_script.php'; ?>
</body>
</html>

