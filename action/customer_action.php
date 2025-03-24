

<?php
	session_start();
	include '../include/conn.php';

	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];


        $sql = "SELECT * FROM customer WHERE email = '$email'";
		$query = $conn->query($sql);


        if ($query->num_rows >= 1) {

            $row = $query->fetch_assoc();
			if(password_verify($password, $row['password'])){
				$_SESSION['customer'] = $row['id'];
				$_SESSION['id'] = $row['id'];
				$extra="my-cart.php";
				$_SESSION['login']=$email;
				$_SESSION['username']=$row['name'];
				$uip=$_SERVER['REMOTE_ADDR'];

				
			}

			else{
				$_SESSION['error'] = 'Incorrect password';
			}

    
        } 



      

    else{
        $_SESSION['error'] = 'Cannot find account with the Email';


    }

	
}



else{
$_SESSION['error'] = 'Cannot find account Login';


}




	header('location: ../customer_login.php');

?>



