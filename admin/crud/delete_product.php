<?php
	include 'session.php';
	
	$id = $_GET['id'];
		$sql = "DELETE FROM products WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Product Deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	header('location: ../product.php');
	
?>