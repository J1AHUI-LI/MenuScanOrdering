<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'A_head.php'; ?>
</head>
<body>
    <?php include 'A_user_navbar.php'; ?>

    <div class="container-fluid">
        <div class="row">
            <?php foreach ($dishes as $dish): ?>
                <div class="col-md-4 mb-4">
                    <form method="post" action="<?= base_url('addToCart') ?>">
                        <input type="hidden" name="ItemName" value="<?= $dish['ItemName'] ?>">
                        <input type="hidden" name="Price" value="<?= $dish['Price'] ?>">
                        <input type="hidden" name="VendorID" value="<?= $dish['VendorID'] ?>">
                        <input type="hidden" name="MenuID" value="<?= $dish['MenuID'] ?>">

                        <div class="card">
                            <?php
                            $imagePath = 'img/' . $dish['ItemName'] . '.jpg';
                            if (!file_exists($imagePath)) {
                                $imagePath = 'img/' . $dish['ItemName'] . '.webp';
                            }
                            ?>
                            <?php if (file_exists($imagePath)): ?>
                                <img src="<?= base_url($imagePath) ?>" class="card-img-top" alt="<?= $dish['ItemName'] ?>">
                            <?php else: ?>
                                <img src="<?= base_url('img/default.jpg') ?>" class="card-img-top" alt="Default Image">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?= $dish['ItemName'] ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">Price: <?= $dish['Price'] ?></h6>
                                <p class="card-text">Vendor ID: <?= $dish['VendorID'] ?></p>
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- scripts here -->
    <?php include 'A_script.php'; ?>
</body>
</html>
