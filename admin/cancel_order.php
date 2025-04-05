<?php include('include/session.php'); ?>
<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
<?php include('include/menubar.php'); ?>

<?php
$today = date('M-d-Y');
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1 class="h3 mb-4 text-gray">Cancelled Order Transactions</h1>
  </section>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List of Cancelled Orders</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered text-center" id="example1" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Shop ID</th>
              <th>Customer ID</th>
              <th>Date</th>
              <th>Total Quantity</th>
              <th>Total Amount</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $sql = "
              SELECT 
                o.order_id,
                o.total_q,
                o.total_p,
                o.orderDate,
                o.orderStatus,
                c.customer_id AS customer_id,
                f.shopid AS shop_id
              FROM orders o
              LEFT JOIN customer c ON o.customer_id = c.id
              LEFT JOIN shop s ON o.shop_id = s.id
              WHERE o.orderStatus = 'Cancel'
            ";

            $query = mysqli_query($conn, $sql);

            if ($query) {
              while ($row = mysqli_fetch_assoc($query)) {
                $status = '<span class="badge badge-danger" style="font-size:15px;">' . $row["orderStatus"] . '</span>';
                echo "<tr>
                        <td>{$row['order_id']}</td>
                        <td>{$row['shop_id']}</td>
                        <td>{$row['customer_id']}</td>
                        <td>{$row['orderDate']}</td>
                        <td>{$row['total_q']}</td>
                        <td>{$row['total_p']}</td>
                        <td>{$status}</td>
                      </tr>";
              }
            } else {
              echo "<tr><td colspan='7'>Failed to fetch data: " . mysqli_error($conn) . "</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php include 'include/footer.php'; ?>
</div>

</body>
</html>

<style>
#gmap_canvas {
  width: 100%; 
}
@media (max-width: 667px) {
  #gmap_canvas {
    position: absolute;
    top: 450px;
    width: 90%;
    left: 10px;
  }
}
</style>
