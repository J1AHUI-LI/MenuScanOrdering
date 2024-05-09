<!-- Sidebar Offcanvas -->
<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100">
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li>
                <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                </a>
                <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="<?= base_url('dashboard'); ?>" class="nav-link px-0"> <span class="d-none d-sm-inline"> Today's Menu</span></a>
                    </li>
                    <li class="w-100">
                        <a href="<?= base_url('user_management'); ?>" class="nav-link px-0"> <span class="d-none d-sm-inline"> User Management</span></a>
                    </li>
                    
                </ul>
            </li>
            <li>
                <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline"> Menu </span>
                </a>
                <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                    <li>
                        <a href="<?= base_url('menu_management'); ?>" class="nav-link px-0"> <span class="d-none d-sm-inline">Items</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-receipt"></i> <span class="ms-1 d-none d-sm-inline">Order</span>
                </a>
                <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="<?= base_url('order_management'); ?>" class="nav-link px-0"> <span class="d-none d-sm-inline"> Order management</span> 1</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#submenu5" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Table</span>
                </a>
                <ul class="collapse nav flex-column ms-1" id="submenu5" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="<?= base_url('table_management'); ?>" class="nav-link px-0"> <span class="d-none d-sm-inline"> Table management</span> 1</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#submenu4" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline"> QR Code</span>
                </a>
                <ul class="collapse nav flex-column ms-1" id="submenu4" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="<?= base_url('qr_code_management'); ?>" class="nav-link px-0"> <span class="d-none d-sm-inline"> Generate QR code</span></a>
                    </li>
                </ul>
            </li>
        </ul>
        <hr>
    </div>
</div>
<!-- End of Sidebar Offcanvas -->
