<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<!-- User Management -->
<div class="col">
  <h2 class="mt-4">User Management</h2>
  <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addUserModal">Add New User</button>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">User ID</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Role</th>
        <th scope="col">Phone</th>
        <th scope="col">Address</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <!-- PHP 循环输出用户信息 -->
      <?php foreach ($users as $user): ?>
        <tr>
          <th scope="row"><?= esc($user['UserID']) ?></th>
          <td><?= esc($user['FirstName']) ?></td>
          <td><?= esc($user['LastName']) ?></td>
          <td><?= esc($user['Role']) ?></td>
          <td><?= esc($user['Phone']) ?></td>
          <td><?= esc($user['Address']) ?></td>
          <td>
            <div class="btn-group" role="group" aria-label="Basic example">
              <form method="post" action="<?= base_url('edit_user/'.$user['UserID']) ?>">
                <div class="input-group">
                  <select id="role" name="Role" class="form-select me-2">
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                  </select>
                  <button type="submit" class="btn btn-primary me-2">Edit</button>
                </div>
              </form>
              <a href="<?= base_url('delete_user/'.$user['UserID']) ?>" class="btn btn-danger">Delete</a>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>
</div>
<!-- End of User Management -->

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url('add_user') ?>">
          <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstName" name="FirstName">
          </div>
          <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="LastName">
          </div>
          <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="Role">
              <option value="Admin">Admin</option>
              <option value="User">User</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="Phone">
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="Address">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" class="form-control" id="password" name="Password">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="Email">
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End of Add User Modal -->
<?= $this->endSection() ?>