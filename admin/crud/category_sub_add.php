<?php


	include 'session.php';

	if(isset($_POST['submit'])){
		$farmer_id = $_POST['farmer_id'];
		$categoryid = $_POST['categoryid'];
		$subcategory = $_POST['subcategory'];

	
		
		$insert = "INSERT INTO subcategory(farmer_id, categoryid, subcategory) 
		VALUES ('$farmer_id', '$categoryid', '$subcategory')";
		if($conn->query($insert)){
			$_SESSION['success'] = 'Sub Category Added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}


	}


	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	
    header('location: ../sub_category.php');

    ?>