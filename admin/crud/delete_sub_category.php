<?php
	include 'session.php';
	
	$id = $_GET['id'];
		$sql = "DELETE FROM subcategory WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Sub Category Deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	header('location: ../sub_category.php');
	
?>