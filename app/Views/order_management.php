<?= $this->extend('template') ?>

<?= $this->section('content') ?>

<!-- Order Management -->
<div class="col">
  <h2 class="mt-4">Order Management</h2>
  <table class="table">
    <thead>
    <tr>
      <th scope="col">OrderID</th>
      <th scope="col">UserID</th>
      <th scope="col">TableID</th>
      <th scope="col">OrderTime</th>
      <th scope="col">Status</th>
    </tr>
    </thead>
    <tbody>
    <!-- 这里可以用 PHP 循环输出订单信息 -->
    <?php foreach ($orders as $order): ?>
      <tr>
        <th scope="row"><?= esc($order['OrderID']) ?></th>
        <td><?= esc($order['UserID']) ?></td>
        <td><?= esc($order['TableID']) ?></td>
        <td><?= esc($order['OrderTime']) ?></td>
        <td><?= esc($order['Status']) ?></td>

        <td>
            <div class="btn-group" role="group" aria-label="Basic example">
              <a href="/menu2ordering<?= route_to('complete_order', $order['OrderID']) ?>" class="btn btn-success">Confirm</a>
              <a href="/menu2ordering<?= route_to('cancel_order', $order['OrderID']) ?>" class="btn btn-danger">Cancel</a>
              <a href="/menu2ordering<?= route_to('view_order_details', $order['OrderID']) ?>" class="btn btn-info">Details</a>
            </div>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
<!-- End of Order Management -->


<?= $this->endSection() ?>