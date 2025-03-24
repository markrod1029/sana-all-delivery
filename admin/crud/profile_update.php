<?php


	include 'session.php';

	if(isset($_POST['submit'])){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$street = $_POST['street'];
		$city = $_POST['city'];
		$state = $_POST['province'];
		$id = $user['id'];



		
        $sql = "UPDATE admin SET  fname = '$fname',  lname = '$lname', email = '$email', contact = '$contact',
		 street = '$street', city = '$city', province = '$state', photo = '$location'  WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Admin Updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}


	else{
		$_SESSION['error'] = 'Fill up add form first';
	}



	
    header('location: ../profile.php');

    ?>