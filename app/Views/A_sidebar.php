<!-- Sidebar Offcanvas -->
<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100">
        <a href="#" class="d-block align-items-center pb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <span class="fs-5">MenuScanOrder</span>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li>
                <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                </a>
                <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="<?= base_url('revenue'); ?>" class="nav-link px-0"> <span class="d-none d-sm-inline"> Revenue</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline"> Menu Management</span>
                </a>
                <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                    <li>
                        <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">normal menu</span></a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Special menu</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Orders</span>
                </a>
                <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="<?= base_url('order_management'); ?>" class="nav-link px-0"> <span class="d-none d-sm-inline"> Order management</span> 1</a>
                    </li>
                    <li>
                        <a href="<?= base_url('dashboard'); ?>" class="nav-link px-0"> <span class="d-none d-sm-inline"> Table Management</span> 2</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#submenu4" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline"> QR Code Management</span>
                </a>
                <ul class="collapse nav flex-column ms-1" id="submenu4" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="<?= base_url('qr_code_management'); ?>" class="nav-link px-0"> <span class="d-none d-sm-inline"> Generate QR code</span></a>
                    </li>
                    <li>
                        <a href="<?= base_url('qr_code_management'); ?>" class="nav-link px-0"> <span class="d-none d-sm-inline"> Delete QR code</span></a>
                    </li>
                </ul>
            </li>
        </ul>
        <hr>
        <!-- user state -->
        <div class="dropdown pb-4">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="<?= base_url('uifaces-popular-image.jpg'); ?>" alt="hugenerd" width="30" height="30" class="rounded-circle">
                <span class="d-none d-sm-inline mx-1">Admin</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
        </div>
        <!-- end of user state -->
    </div>
</div>
<!-- End of Sidebar Offcanvas -->
