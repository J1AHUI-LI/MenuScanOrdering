<?= $this->extend('template') ?>

<?= $this->section('content') ?>

<!-- Menu management -->
<div class="col">
    <h2 class="mt-4">Menu Management</h2>
    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addDishModal">Add New Dish</button>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Dish Name</th>
                <th scope="col">Price</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dishes as $dish): ?>
                <tr>
                    <th scope="row"><?= esc($dish['MenuID']) ?></th>
                    <td><?= esc($dish['ItemName']) ?></td>
                    <td>$<?= esc($dish['Price']) ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editDishModal<?= $dish['MenuID'] ?>">Edit</button>
                            <a href="<?= base_url('delete_dish/'.$dish['MenuID']) ?>" class="btn btn-danger">Delete</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- End of Menu management -->

<!-- Edit Dish Modal -->
<?php foreach ($dishes as $dish): ?>
    <div class="modal fade" id="editDishModal<?= $dish['MenuID'] ?>" tabindex="-1" aria-labelledby="editDishModalLabel<?= $dish['MenuID'] ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDishModalLabel<?= $dish['MenuID'] ?>">Edit Dish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url('update_dish/'.$dish['MenuID']) ?>">
                        <div class="mb-3">
                            <label for="editDishName<?= $dish['MenuID'] ?>" class="form-label">Dish Name</label>
                            <input type="text" class="form-control" id="editDishName<?= $dish['MenuID'] ?>" name="dishName" value="<?= esc($dish['ItemName']) ?>">
                        </div>
                        <div class="mb-3">
                            <label for="editDishPrice" class="form-label">Price</label>
                            <input type="text" class="form-control" id="editDishPrice" name="dishPrice">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End of Edit Dish Modal -->


<!-- Add Dish Modal -->
<div class="modal fade" id="addDishModal" tabindex="-1" aria-labelledby="addDishModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDishModalLabel">Add New Dish</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('add_dish') ?>">
                    <div class="mb-3">
                        <label for="dishName" class="form-label">Dish Name</label>
                        <input type="text" class="form-control" id="dishName" name="dishName">
                    </div>
                    <div class="mb-3">
                        <label for="dishPrice" class="form-label">Price</label>
                        <input type="number" class="form-control" id="dishPrice" name="dishPrice">
                    </div>
                    <div class="mb-3">
                        <label for="vendorId" class="form-label">Vendor</label>
                        <select class="form-select" id="vendorId" name="vendorId">
                            <?php foreach ($vendors as $vendor): ?>
                                <option value="<?= $vendor['VendorID'] ?>"><?= $vendor['VendorName'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Add Dish Modal -->




<?= $this->endSection() ?>

