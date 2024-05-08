<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<!-- Table Management -->
<div class="col">
  <h2 class="mt-4">Table Management</h2>
  <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addTableModal">Add New Table</button>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Table ID</th>
        <th scope="col">Seats</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      <!-- PHP 循环输出餐桌信息 -->
      <?php foreach ($tables as $table): ?>
        <tr>
          <th scope="row"><?= esc($table['TableID']) ?></th>
          <td><?= esc($table['Seats']) ?></td>
          <td><?= esc($table['Status']) ?></td>
          <td>
            <div class="btn-group" role="group" aria-label="Basic example">
              <form method="post" action="<?= base_url('edit_table/'.$table['TableID']) ?>">
                <div class="input-group">
                  <select id="status" name="Status" class="form-select me-2">
                    <option value="Available">Available</option>
                    <option value="Occupied">Occupied</option>
                    <option value="Reserved">Reserved</option>
                  </select>
                  <button type="submit" class="btn btn-primary me-2">Edit</button>
                </div>
              </form>
              <a href="/menu2ordering<?= route_to('delete_table', $table['TableID']) ?>" class="btn btn-danger">Delete</a>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>
</div>
<!-- End of Table Management -->


<!-- Add Table Modal -->
<div class="modal fade" id="addTableModal" tabindex="-1" aria-labelledby="addTableModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addTableModalLabel">Add New Table</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url('add_table') ?>">
          <div class="mb-3">
            <label for="tableNumber" class="form-label">Table Number</label>
            <input type="text" class="form-control" id="tableNumber" name="vendorId">
          </div>
          <div class="mb-3">
            <label for="seats" class="form-label">Seats</label>
            <input type="number" class="form-control" id="seats" name="seats">
          </div>
          <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status">
              <option value="Available">Available</option>
              <option value="Occupied">Occupied</option>
              <option value="Reserved">Reserved</option>
            </select>
          </div>
          <div class="mb-3">
              <label for="vendorId" class="form-label">Vendor</label>
              <select class="form-select" id="vendorId" name="vendorId">
                  <option value="1">Vendor1</option>
                  <option value="2">Vendor2</option>
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End of Add Table Modal -->

<?= $this->endSection() ?>
