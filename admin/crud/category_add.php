<?php


	include 'session.php';

	if(isset($_POST['submit'])){
		$category = $_POST['category'];
		$desc = $_POST['description'];

		$sql = "SELECT categoryName FROM category  WHERE categoryName = '".$category."' ";
		$query = $conn->query($sql);
		$result = mysqli_query($conn,$sql);
		$count = mysqli_num_rows($result);

		$row = $query->fetch_assoc();
		
	
		if ($count == 1 ) {
		$_SESSION['error'] = 'Have already Category Name';

		}
		
		else{
		
		$insert = "INSERT INTO category(categoryName, categoryDescription) 
		VALUES ('$category', '$desc')";
		if($conn->query($insert)){
			$_SESSION['success'] = 'Category Added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}


	}


}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	
    header('location: ../category.php');

    ?>