<?php
	include 'session.php';
	
	$id = $_GET['id'];
		
    $sql ="UPDATE orders SET orderStatus = 'Cancel' Where order_id = '$id'  ";

		if($conn->query($sql)){
			$_SESSION['success'] = 'Orders Already Cancel';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	header('location: ../cancel_order.php');
	
?>