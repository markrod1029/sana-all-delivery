<?php

include 'session.php';

$id = $_GET['id'];

$sql = "DELETE FROM cart WHERE id = '$id'";
if($conn->query($sql)){
$_SESSION['success'] = 'Delete Successfully';



} 

else {
    $_SESSION['error'] = 'Delete Cart Error';
}
header("Location:../my-cart.php");

?>