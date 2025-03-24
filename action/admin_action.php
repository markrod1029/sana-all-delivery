

<?php
	session_start();
	include '../include/conn.php';

	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];


        $sql = "SELECT * FROM admin WHERE email = '$email'";
		$query = $conn->query($sql);


        if ($query->num_rows >= 1) {

            $row = $query->fetch_assoc();
			if(password_verify($password, $row['password'])){
				$_SESSION['admin'] = $row['id'];
				$_SESSION['id'] = $row['id'];

				
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




	header('location: ../admin_login.php');

?>



