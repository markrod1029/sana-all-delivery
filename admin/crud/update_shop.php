<?php


	include 'session.php';

	if(isset($_POST['submit'])){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$shop_category = $_POST['shop_category'];
		$street = $_POST['street'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$sname = $_POST['sname'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

		$id = $_POST['id'];


		
        $sql = "UPDATE farmer SET  fname = '$fname',  lname = '$lname', email = '$email', contactno = '$contact',
		shop_category = '$shop_category', street = '$street', city = '$city', state = '$state', password = '$password', shop_name = '$sname'  WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Shop Updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}


	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	
    header('location: ../shop.php');

    ?>