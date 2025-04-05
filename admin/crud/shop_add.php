<?php


	include 'session.php';

	if(isset($_POST['submit'])){
		$shopid = $_POST['shopid'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$shop_category = $_POST['shop_category'];
		$street = $_POST['street'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$sname = $_POST['sname'];
		$position = "Shop Owner";

        $fileinfo=PATHINFO($_FILES["photo"]["name"]);
        $newFilename=$fileinfo['filename']. "." . $fileinfo['extension'];
        move_uploaded_file($_FILES["photo"]["tmp_name"],'../../images/' .$newFilename);
		$location = '../../images/'.$newFilename;

        $fileinfo=PATHINFO($_FILES["shop_logo"]["name"]);
        $newFilename=$fileinfo['filename']. "." . $fileinfo['extension'];
        move_uploaded_file($_FILES["shop_logo"]["tmp_name"],'../../images/' .$newFilename);
        $location1 = $newFilename;



        $sql = "SELECT email FROM shops  WHERE email = '".$email."' ";
        $query = $conn->query($sql);
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);
    
        $row = $query->fetch_assoc();
        
    
    
    
        if ($count == 1) {
			$_SESSION['error'] = 'Email already exists!';
		} else {
			// Insert into shop table
			$insert = "INSERT INTO shops (shopid, photo, fname, lname, email, position, contactno, `shop_category`, street, city, state, shop_logo, shop_name, regDate) 
			VALUES ('$shopid', '$location', '$fname', '$lname', '$email', '$position', '$contact', '$shop_category', '$street', '$city', '$state', '$location1', '$sname', NOW())";
	
			if ($conn->query($insert) === TRUE) {
				$_SESSION['success'] = 'Shop Added successfully';
			} else {
				$_SESSION['error'] = "Error: " . $conn->error . " - Query: " . $insert;
			}
		}
}


	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	
    header('location: ../shop.php');

    ?>