<?php
	include 'session.php';
	
	$id = $_GET['id'];
		$sql = "DELETE FROM customer WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Customer Deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	header('location: ../customer.php');
	
?>