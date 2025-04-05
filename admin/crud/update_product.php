<?php


	include 'session.php';

	if(isset($_POST['submit'])){
		$shop_id = $_POST['shop_id'];
		$category = $_POST['category'];
		$subcategory = $_POST['subcategory'];
		$pname = $_POST['pname'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		$quantity = $_POST['quantity'];
		$id = $_POST['id'];


        $fileinfo=PATHINFO($_FILES["photo1"]["name"]);
        $newFilename=$fileinfo['filename']. "." . $fileinfo['extension'];
        move_uploaded_file($_FILES["photo1"]["tmp_name"],'../../images/' .$newFilename);
        $location1 = $newFilename;
        

        
           if(empty($location1) || $location1 == '.' ){



		
        $sql = "UPDATE products SET  shop_id = '$shop_id',  category = '$category', subCategory_id = '$subcategory', productName = '$pname', productPrice = '$price', quantity = '$quantity', productDescription = '$description' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Product Updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}

    else{

        $sql = "UPDATE products SET  shop_id = '$shop_id',  category = '$category', subCategory_id = '$subcategory', productName = '$pname', productPrice = '$price', quantity = '$quantity', productDescription = '$description', photo1 = '$location1' WHERE id = '$id'";

    }
  }


	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	
    header('location: ../product.php');

    ?>