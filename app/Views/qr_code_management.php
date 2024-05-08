<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<!-- Main content -->

<div class="col">
    <h1>QR Code Management</h1>
    <div class="row">
        <?php
        use chillerlan\QRCode\QRCode;
        use chillerlan\QRCode\QROptions;
        
        require_once('./../vendor/autoload.php');
        
        $options = new QROptions(
          [
            'eccLevel' => QRCode::ECC_L,
            'outputType' => QRCode::OUTPUT_MARKUP_SVG,
            'version' => 5,
          ]
        );

        foreach ($Table as $table) {
            $url = base_url('menu?table_id=' . $table['TableID']);
            $qrcode = (new QRCode($options))->render($url);
        ?>

        <div class="col-md-4">
            <div class="table">
                <h2>Table <?= $table['TableID'] ?></h2>
                <div><img src="<?= $qrcode ?>" alt="QR Code for Table <?= $table['TableID'] ?>"></div>
                <p><a href="#" id="printQRTable<?= $table['TableID'] ?>">Print QR Code</a></p>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>

<!-- End of main content -->
<?= $this->endSection() ?>

