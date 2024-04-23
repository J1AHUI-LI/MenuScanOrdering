<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<!-- Main content -->
<div class="container">
    <h1>QR Code Management</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="table">
                <h2>Table 1</h2>
                <img src="<?= base_url('img/QR_code1.png'); ?>" alt="QR Code Table 1" class="img-fluid">
                <p><a href="#">Print QR Code</a></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="table">
                <h2>Table 2</h2>
                <img src="<?= base_url('img/QR_code2.png'); ?>" alt="QR Code Table 2" class="img-fluid">
                <p><a href="#">Print QR Code</a></p>
            </div>
        </div>
        <!-- Add more table blocks as needed -->
    </div>
</div>
<!-- End of main content -->
<?= $this->endSection() ?>


