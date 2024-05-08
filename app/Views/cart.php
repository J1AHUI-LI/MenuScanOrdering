<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'A_head.php'; ?>
</head>
<body>
    <!-- Navbar -->
    <?php include 'A_user_navbar.php'; ?>
    <!-- cart页面 -->
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h2 class="mt-4">Cart</h2>
                <ul id="cart-list" class="list-group mt-4">
                    <?php foreach ($_SESSION['cart'] as $index => $cartItem): ?>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p>Item Name: <?= $cartItem['itemName'] ?></p>
                                    <p>Price: <?= $cartItem['price'] ?></p>
                                    <p>Vendor ID: <?= $cartItem['vendorId'] ?></p>
                                </div>
                                <form method="post" action="<?= base_url('removeFromCart') ?>">
                                    <input type="hidden" name="index" value="<?= $index ?>">
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <form method="post" action="<?= base_url('submitOrder') ?>" class="mt-4">
                    <button type="submit" class="btn btn-primary">Submit Order</button>
                </form>
            </div>
        </div>
    </div>

    <!-- scripts here -->
    <?php include 'A_script.php'; ?>
</body>
</html>

