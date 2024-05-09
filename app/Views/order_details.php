<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<!-- main content -->
<div class="col">
    <h2>Order Details</h2>
    <p>Order ID: <?= $order['OrderID'] ?></p>
    <p>User ID: <?= $order['UserID'] ?></p>
    <p>Table ID: <?= $order['TableID'] ?></p>
    <p>Status: <?= $order['Status'] ?></p>
    <p>Order Time: <?= $order['OrderTime'] ?></p>

    <h3>Ordered Items:</h3>
    <ul>
        <?php foreach ($menuItems as $item): ?>
            <li><?= $item['ItemName'] ?> - Price: <?= $item['Price'] ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<!-- End of main content -->
<?= $this->endSection() ?>
