<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-light bg-light Navbar">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="<?= base_url('menu'); ?>">
            <img src="<?= base_url('img/buns_logo.png'); ?>" alt="Logo" height="70" class="d-inline-block align-text-top">
            <span>MenuScanOrder</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('cart'); ?>">Shopping Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- End of Navbar -->
