<?php
	session_start();
	include 'conn.php';

	if(!isset($_SESSION['rider']) || trim($_SESSION['rider']) == ''){
		header('location: home.php');
	}

	$sql = "SELECT * FROM rider WHERE id = '".$_SESSION['rider']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
?>