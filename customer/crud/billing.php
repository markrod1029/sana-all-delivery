	<?php
    
	include 'session.php';
    
    if(isset($_POST['billupdate']))
	{
		$baddress=$_POST['billingaddress'];
		$id=$_POST['customer_id'];
		$query=mysqli_query($conn,"update customer set billingAddress='$baddress' where id='$id'");
		if($query)
		{
            $_SESSION['success'] = 'Billing Address Updated successfully';

        
        }
        else{
            $_SESSION['error'] = $conn->error;
        }
    }

    header("Location:../my-cart.php");


    ?>
