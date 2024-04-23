<!DOCTYPE html>
<html lang="en">
<?php include 'A_head.php'; ?>
<body>
    <?php include 'A_navbar.php'; ?>

    <div class="container-fluid">
        <div class="row">
            <?php include 'A_sidebar.php'; ?>

            <?= $this->renderSection('content') ?>
        </div>
    </div>
    <!-- scripts here -->
    <?php include 'A_script.php'; ?>

</body>
</html>
