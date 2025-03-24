<?php


	include 'session.php';

	if(isset($_POST['submit'])){
		$categoryid = $_POST['categoryid'];
		$subcategory = $_POST['subcategory'];
		$id = $_POST['id'];


	
		
		$sql = "UPDATE subcategory SET  categoryid = '$categoryid', subcategory = '$subcategory' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Sub Category Updated successfully';
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