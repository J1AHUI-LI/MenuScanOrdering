
<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<div class="col">
    <h2 class="mt-4">Menu</h2>
    
    <?php foreach ($dishes as $dish): ?>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title"><?= $dish['ItemName'] ?></h5>
                <h6 class="card-subtitle mb-2 text-muted">Price: <?= $dish['Price'] ?></h6>
                <p class="card-text">Vendor ID: <?= $dish['VendorID'] ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection() ?>

