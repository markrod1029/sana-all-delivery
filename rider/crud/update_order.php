<?php
session_start();
include 'conn.php';

if (isset($_POST['submit'])) {
    $order_id = mysqli_real_escape_string($conn, $_POST['order_id']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $location = mysqli_real_escape_string($conn, $_POST['city'] . ' ' . $_POST['province'] . ' ' . $_POST['street']);
    $remark = mysqli_real_escape_string($conn, $_POST['remark']);

    $insert = "INSERT INTO ordertrackhistory(order_id, rider_location, status, remark, postingDate) 
               VALUES ('$order_id', '$location', '$status', '$remark', NOW())";

    if ($conn->query($insert)) {
        $_SESSION['success'] = 'Order In Process Successfully';

        $sql = "SELECT * FROM orders WHERE order_id = '$order_id'";
        $query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($query)) {
            $quantity = $row['total_quantity'];
            $productid = $row['product_id'];

            $sql1 = "SELECT * FROM products WHERE id = '$productid'";
            $query1 = mysqli_query($conn, $sql1);

            while ($row1 = mysqli_fetch_assoc($query1)) {
                $total_q = $row1['quantity'] - $quantity;
                $update1 = "UPDATE products SET quantity = '$total_q' WHERE id = '$productid'";
                mysqli_query($conn, $update1);
            }
        }

        // Update order status
        $update = "UPDATE orders SET orderStatus = '$status' WHERE order_id = '$order_id'";
        mysqli_query($conn, $update);
    } else {
        $_SESSION['error'] = 'Something went wrong while inserting the record.';
    }

    header("Location: ../update_order.php?id=$order_id");
    exit;
} else {
    $_SESSION['error'] = 'Fill up add form first';
    header("Location: ../update_order.php?id=$order_id");
    exit;
}
?>
