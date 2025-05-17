<?php include('include/session.php') ?>
<?php include('include/header.php') ?>
<?php include('include/sidebar.php') ?>
<?php include('include/menubar.php');

$today = date('M-d-Y-D');

// Handle rider assignment
if (isset($_POST['assign_rider'])) {
    $rider_id = $_POST['rider_id'];
    $order_id = $_POST['order_id'];

    $assign = $conn->query("UPDATE orders SET rider_id = '$rider_id' WHERE order_id = '$order_id'");

    if ($assign) {
        $_SESSION['success'] = "Rider assigned successfully.";
    } else {
        $_SESSION['error'] = "Failed to assign rider.";
    }

    echo "<script>window.location.href='view_order.php?id=" . $order_id . "';</script>";
    exit();
}

$id = $_GET['id'];

?>

<div class="content-wrapper">

    <?php
    if (isset($_SESSION['error'])) {
        echo "
              <script type='text/javascript'>
              toastr.error('" . $_SESSION['error'] . "', 'Error')
              toastr.options.timeOut = 3000;
              </script>
              
          ";
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['success'])) {
        echo "
           
          <script type='text/javascript'>
          toastr.success('" . $_SESSION['success'] . "', 'Success')
          toastr.options.timeOut = 3000;
          </script>
          ";
        unset($_SESSION['success']);
    }
    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col">
                    <div class="card-body">

                        <!-- Customer Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Customer ID</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $view = "SELECT *, orders.id AS oid FROM orders
                                        LEFT JOIN customer ON orders.customer_id = customer.id
                                        WHERE order_id = '$id'";
                                    $result = $conn->query($view);
                                    $view = $result->fetch_assoc();
                                    ?>
                                    <tr>
                                        <td><?php echo $view['name']; ?></td>
                                        <td><?php echo $view['email']; ?></td>
                                        <td><?php echo $view['customer_number']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><br><br>

                        <!-- Product Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Total Quantity</th>
                                        <th>Total Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT *, orders.id AS oid FROM orders
                                        LEFT JOIN products ON orders.product_id = products.id
                                        WHERE order_id = '$id'";
                                    $total = 0;
                                    $query = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        $total += $row['total_pay'];
                                    ?>
                                        <tr>
                                            <td><img src="<?php echo (!empty($row['photo1'])) ? '../images/' . $row['photo1'] : '../images/admin.png'; ?>" width="50px" height="50px"></td>
                                            <td><?php echo $row['productName']; ?></td>
                                            <td><?php echo $row['total_quantity']; ?></td>
                                            <td><?php echo $row['total_pay']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan="4">
                                            <center>
                                                <h5><span class="price">Total: <?php echo $total; ?></span></h5>
                                            </center>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Rider Assignment -->
                        <div class="card mt-4">
                            <div class="card-header">
                                <h5 class="mb-0">Assign Rider</h5>
                            </div>
                            <div class="card-body">
                                <?php
                                $assignedRider = $conn->query("SELECT rider_id FROM orders WHERE order_id = '$id'")->fetch_assoc();
                                if (!empty($assignedRider['rider_id'])) {
                                    $riderData = $conn->query("SELECT fname, lname FROM rider WHERE id = '" . $assignedRider['rider_id'] . "'")->fetch_assoc();
                                    echo "<p><strong>Currently Assigned:</strong> " . $riderData['fname'] . " " . $riderData['lname'] . "</p>";
                                }
                                ?>

                                <form method="POST">
                                    <div class="form-group text-left">
                                        <label for="rider_id"><strong>Select Rider</strong></label>
                                        <select name="rider_id" class="form-control" required>
                                            <option value="">-- Choose Rider --</option>
                                            <?php
                                            $riders = $conn->query("SELECT * FROM rider");
                                            while ($r = $riders->fetch_assoc()) {
                                                echo "<option value='" . $r['id'] . "'>" . $r['fname'] . " " . $r['lname'] . " (" . $r['email'] . ")</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <input type="hidden" name="order_id" value="<?php echo $id; ?>">
                                    <button type="submit" name="assign_rider" class="btn btn-primary mt-2">Assign Rider</button>
                                </form>
                            </div>
                        </div>

                    </div><!-- card-body -->
                </div>
            </div>
        </div>
    </div>

</div><!-- content-wrapper -->

<?php include 'include/footer.php'; ?>
</div><!-- wrapper -->
</body>

</html>