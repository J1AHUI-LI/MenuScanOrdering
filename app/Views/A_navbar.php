<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-light bg-light Navbar">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="<?= base_url('dashboard'); ?>">
            <img src="<?= base_url('img/buns_logo.png'); ?>" alt="Logo" height="70" class="d-inline-block align-text-top">
            <span>MenuScanOrder</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item <?= service('router')->getMatchedRoute()[0] == 'dashboard' ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?= base_url('dashboard'); ?>"><i class="bi bi-house-door"></i> Dashboard</a>
                </li>
                <li class="nav-item <?= service('router')->getMatchedRoute()[0] == 'menu_management' ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?= base_url('menu_management'); ?>"><i class="bi bi-card-list"></i> Menu Management</a>
                </li>
                <li class="nav-item <?= service('router')->getMatchedRoute()[0] == 'table_management' ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?= base_url('table_management'); ?>"><i class="bi bi-table"></i> Table Management</a>
                </li>
                <li class="nav-item <?= service('router')->getMatchedRoute()[0] == 'order_management' ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?= base_url('order_management'); ?>"><i class="bi bi-bag-check"></i> Order Management</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= session('user_role') ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?= base_url('logout'); ?>">Sign out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- End of Navbar -->
