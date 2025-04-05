<?php
	include 'session.php';
	
	$id = $_GET['id'];
		$sql = "DELETE FROM shops WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Shop Deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	header('location: ../shop.php');
	
?>