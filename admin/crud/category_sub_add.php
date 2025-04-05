<?php


	include 'session.php';

	if(isset($_POST['submit'])){
		$shop_id = $_POST['shop_id'];
		$categoryid = $_POST['categoryid'];
		$subcategory = $_POST['subcategory'];

	
		
		$insert = "INSERT INTO subcategory(shop_id, categoryid, subcategory) 
		VALUES ('$shop_id', '$categoryid', '$subcategory')";
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