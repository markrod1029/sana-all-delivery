<?php


	include 'conn.php';

	if(isset($_POST['submit'])){
		$order_id = $_POST['order_id'];
		$status = $_POST['status'];
		$location = $_POST['city'].' '.$_POST['province'].' '.$_POST['street'];
		$remark = $_POST['remark'];

		
            
        $insert = "INSERT INTO ordertrackhistory(order_id,shop_location, status, remark, postingDate) 
		VALUES ('$order_id', '$location','$status', '$remark', NOW())";
		if($conn->query($insert)){
			$_SESSION['success'] = 'Order In Process Successfully';


			$sql = "SELECT * FROM  orders WHERE order_id = '$order_id'";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($query)) 
{

	$quantity = $row['total_quantity'];

	
	$productid = $row['product_id'];
	$sql1 = "SELECT * FROM  products WHERE id = '$productid'";
	$query1 = mysqli_query($conn, $sql1);
	while ($row1 = mysqli_fetch_assoc($query)) {

		$total_q = $row1['quantity'] - $quantity;
	$update1 ="UPDATE product SET quantity = '$total_q' Where id = '$productid'  ";
echo $total_q;
	}
		
	}
	$update ="UPDATE orders SET orderStatus = '$status' Where order_id = '$order_id'  ";
	

	}
}


	else{
		$_SESSION['error'] = 'Fill up add form first';
	}
    ?>