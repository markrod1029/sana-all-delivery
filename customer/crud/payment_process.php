<?php
	include 'session.php';

if(isset($_POST['submit'])) 
{
	
	$id = $_GET['id'];
	$payment = $_POST['payment'];
	$quantity = $_POST['q'];
	$pay = $_POST['p'];

    $sql = "UPDATE orders SET paymentMethod = '$payment', total_q = '$quantity',  total_p = '$pay', orderStatus = 'Pending'
     WHERE order_id = '$id'";
    if($conn->query($sql)){
        $_SESSION['success'] = 'Submit successfully';

        
    }
    else{
        $_SESSION['error'] = $conn->error;
    }

		








header("Location:../index.php");
}

?>