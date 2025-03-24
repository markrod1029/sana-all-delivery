<?php


	include 'session.php';

	if(isset($_POST['submit'])){
		$farmer_id = $_POST['farmer_id'];
		$subcategory = $_POST['subcategory'];
		$pname = $_POST['pname'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		$quantity = $_POST['quantity'];

        $fileinfo=PATHINFO($_FILES["photo1"]["name"]);
        $newFilename=$fileinfo['filename']. "." . $fileinfo['extension'];
        move_uploaded_file($_FILES["photo1"]["tmp_name"],'../../images/' .$newFilename);
        $location1 = $newFilename;
        

  
            
        $insert = "INSERT INTO products(farmer_id, subCategory_id, productName, productPrice,quantity, productDescription,photo1,postingDate) 
		VALUES ('$farmer_id', '$subcategory', '$pname', '$price', '$quantity', '$description','$location1',  NOW())";
		if($conn->query($insert)){
			$_SESSION['success'] = 'Product Added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}


	}


	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	
    header('location: ../product.php');

    ?>