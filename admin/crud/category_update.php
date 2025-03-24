<?php


	include 'session.php';

	if(isset($_POST['submit'])){
		$category = $_POST['category'];
		$desc = $_POST['description'];
		$id = $_POST['id'];


		
        $sql = "UPDATE category SET  categoryName = '$category', categoryDescription = '$desc' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Category Updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}


	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	
    header('location: ../category.php');

    ?>