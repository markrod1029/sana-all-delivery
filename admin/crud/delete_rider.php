<?php
	include 'session.php';
	
	$id = $_GET['id'];
		$sql = "DELETE FROM rider WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Rider Deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	header('location: ../rider.php');
	
?>