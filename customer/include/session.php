<?php
	session_start();
	include 'include/config.php';

	if(!isset($_SESSION['customer']) || trim($_SESSION['customer']) == ''){
		header('location: index.php');
	}

	$sql = "SELECT * FROM customer WHERE id = '".$_SESSION['customer']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	$extra="my-cart.php";

	
?>