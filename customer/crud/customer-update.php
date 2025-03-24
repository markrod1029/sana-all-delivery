<?php
include 'session.php';


if(isset($_POST['update']))
	{
		$name=$_POST['name'];
		$contactno=$_POST['contactno'];
		$ship=$_POST['shipaddress'];
		$bill=$_POST['billaddress'];
		$query=mysqli_query($conn,"update customer set name='$name',customer_number='$contactno',customer_address='$ship',billingAddress='$bill'  where id='".$user['id']."'");
		if($query)
		{
			$_SESSION['success'] = 'Customer Information Updated Successfully';

		}

        else{
            $_SESSION['error'] =  mysqli_error($conn);
        }
	}


header("Location:../my-account.php");

    ?>