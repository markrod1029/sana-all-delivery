<?php

session_start();

	include '../include/conn.php';

	if(isset($_POST['login'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$street = $_POST['address'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $fileinfo=PATHINFO($_FILES["photo"]["name"]);
        $newFilename=$fileinfo['filename']. "." . $fileinfo['extension'];
        move_uploaded_file($_FILES["photo"]["tmp_name"],'images/' .$newFilename);
        $location = 'images/'.$newFilename;


        $numbers = '';
            
        for($i = 0; $i < 10; $i++){
            $numbers .= $i;
        }
        $customer_id = substr(str_shuffle($numbers), 0, 9);


        $sql = "SELECT email FROM customer  WHERE email = '".$email."' ";
        $query = $conn->query($sql);
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);
    
        $row = $query->fetch_assoc();
        
    
    
    
    
        if ($count == 1 ) {
        $_SESSION['error'] = 'Have already Email Address ';
    
        } 
        
        else{

            
        $insert = "INSERT INTO customer(customer_id, photo, name, email, customer_number, customer_address, password, regDate) 
		VALUES ('$customer_id', '$location', '$name', '$email', '$contact','$address', '$password', NOW())";
		if($conn->query($insert)){
			$_SESSION['success'] = 'Customer Register Successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}


	}
}


	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	
    header('location: ../customer_login.php');

    ?>