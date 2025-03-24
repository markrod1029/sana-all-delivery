<?php include('include/session.php'); ?>
<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
<?php include('include/menubar.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1 class="h3 mb-4 text-gray">Pending Order Transaction</h1>
    </section>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="h3 m-0 font-weight-bold text-success">Orders</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="example1" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer ID</th>
                            <th>Date</th>
                            <th>Total Quantity</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                    $sql = "SELECT o.order_id, o.total_q, o.total_p, o.orderDate, c.customer_id, o.orderStatus 
                            FROM orders o 
                            INNER JOIN customer c ON o.customer_id = c.id 
                            WHERE o.orderStatus = 'Delivered'";

                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                        $status = '<span class="badge badge-success" style="font-size:15px;">' . $row["orderStatus"] . '</span>';
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['order_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['customer_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['orderDate']); ?></td>
                            <td><?php echo htmlspecialchars($row['total_q']); ?></td>
                            <td><?php echo htmlspecialchars($row['total_p']); ?></td>
                            <td><?php echo $status; ?></td>
                            <td>
                                <a href="view_order.php?id=<?php echo $row['order_id']; ?>" class="btn btn-primary btn-circle btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>

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
