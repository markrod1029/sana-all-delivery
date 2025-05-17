<?php include('include/session.php'); ?>
<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
<?php include('include/menubar.php'); ?>

<?php
$today = date('M-d-Y-D');

// Display success or error messages
if (isset($_SESSION['error'])) {
    echo "
        <script type='text/javascript'>
            toastr.error('" . $_SESSION['error'] . "', 'Error');
            toastr.options.timeOut = 3000;
        </script>
    ";
    unset($_SESSION['error']);
}

if (isset($_SESSION['success'])) {
    echo "
        <script type='text/javascript'>
            toastr.success('" . $_SESSION['success'] . "', 'Success');
            toastr.options.timeOut = 3000;
        </script>
    ";
    unset($_SESSION['success']);
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1 class="h3 mb-4 text-gray">Pending Order Transaction</h1>
    </section>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col">
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
                                    $sql = "
                                        SELECT 
                                            o.order_id, 
                                            c.customer_id, 
                                            o.orderDate, 
                                            o.total_q, 
                                            o.total_p, 
                                            o.orderStatus, 
                                            o.paymentMethod
                                        FROM orders o
                                        JOIN customer c ON o.customer_id = c.id
                                        WHERE o.orderStatus NOT IN ('Delivered', 'Cancel', 'wait')
                                    ";

                                    $query = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        // Assign status badges
                                        switch ($row["orderStatus"]) {
                                            case 'Pending':
                                                $status = '<span class="badge badge-warning" style="font-size:15px;">' . $row["orderStatus"] . '</span>';
                                                break;
                                            case 'In Process':
                                                $status = '<span class="badge badge-primary" style="font-size:15px;">' . $row["orderStatus"] . '</span>';
                                                break;
                                            case 'Delivered':
                                                $status = '<span class="badge badge-success" style="font-size:15px;">' . $row["orderStatus"] . '</span>';
                                                break;
                                            default:
                                                $status = '<span class="badge badge-secondary" style="font-size:15px;">' . $row["orderStatus"] . '</span>';
                                        }
                                    ?>

                                        <tr>
                                            <td><?php echo $row['order_id']; ?></td>
                                            <td><?php echo $row['customer_id']; ?></td>
                                            <td><?php echo $row['orderDate']; ?></td>
                                            <td><?php echo $row['total_q']; ?></td>
                                            <td><?php echo $row['total_p']; ?></td>
                                            <td><?php echo $status; ?></td>
                                            <td>
                                                <a name="edit" href="view_order.php?id=<?php echo $row['order_id'] ?>" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-eye"></i></a>
                                                <a name="edit" href="update_order.php?id=<?php echo $row['order_id'] ?>" class="
                                                        btn btn-primary btn-circle btn-sm"><i class="fa fa-credit-card"></i></a>
                                                <a name="delete" onclick="return confirm('Are you sure you want to Cancel this Product?')" href="crud/cancel_order.php?id=<?php echo $row['order_id'] ?>" class="btn btn-danger btn-circle btn-sm delete_button"><i class="fas fa-times"></i></button>
                        </div>
                        </td>
                        </tr>

                    <?php } ?>

                    </tbody>
                    </table>
                    </div> <!-- /.table-responsive -->
                </div> <!-- /.card-body -->
            </div> <!-- /.col -->
        </div> <!-- /.row -->
    </div> <!-- /.card-header -->
</div> <!-- /.card -->
</div> <!-- /.content-wrapper -->

<?php include 'include/footer.php'; ?>
</div> <!-- /.wrapper -->

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