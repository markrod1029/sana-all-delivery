<?php


	include 'session.php';

	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$street = $_POST['street'];
		$city = $_POST['city'];
		$state = $_POST['state'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$id = $_POST['id'];


		
        $sql = "UPDATE customer SET  name = '$name', email = '$email', customer_number = '$contact', customer_street = '$street',
		 customer_city = '$city',  customer_state = '$state', password = '$password'  WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Customer Updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}


	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	
    header('location: ../customer.php');

    ?>