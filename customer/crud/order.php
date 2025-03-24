<?php
	include 'session.php';

if(isset($_POST['ordersubmit'])) 
{
	

	$custmer=$_GET['id'];
	$numbers = '';
            
	for($i = 0; $i < 10; $i++){
		$numbers .= $i;
	}
	$order_id = substr(str_shuffle($numbers), 0, 9);

	foreach($_POST['product'] as $row => $value){          
		$product=$_POST['product'][$row];
		$farmer=$_POST['farmer'][$row];
		$quantity=$_POST['quantity'][$row];
		$pid=$_POST['pid'][$row];



		$sql1= "SELECT * FROM products WHERE id ='$value' ";
		$query = mysqli_query($conn, $sql1);
		$row = $query->fetch_assoc();


	if( $quantity<=$row['quantity']){

		$sql ="INSERT INTO orders(order_id, farmer_id, customer_id, product_id, total_quantity, total_pay, orderDate,orderStatus)
		  VALUES ('$order_id', '$farmer','$custmer','$value','$quantity','$pid',NOW(), 'wait')";



		$total = $row['quantity'] - $quantity;

		if( $row['quantity']>0){
		$query=mysqli_query($conn,"UPDATE products set quantity='$total'  where id='$value'");

		}


if($conn->query($sql)){
	$_SESSION['success'] = 'Order Purchased successfully';


	$sql = "DELETE FROM cart WHERE customer_id = '$custmer'";
	$conn->query($sql);


		
} else {
	$_SESSION['error'] = $sql . "<br>" . mysqli_error($conn);


}

header("Location:../payment.php?id=" . $order_id);

}


else{
	$_SESSION['error'] = 'You Cant Order Quantity of this Product 0';

header("Location:../my-cart.php");


}



}
	

		






}





if(isset($_POST['update'])) 
{
	

    foreach($_POST['quantity'] as $row => $value){          
		$quantity=$_POST['quantity'][$row];
		$id=$_POST['cart_id'][$row];



		echo $quantity;
$sql = "UPDATE cart SET  cart_quantity = '$quantity' WHERE id = '$id'";

if($conn->query($sql)){
	$_SESSION['success'] = 'Cart Updated successfully';

		
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

header("Location:../my-cart.php");

}


?>