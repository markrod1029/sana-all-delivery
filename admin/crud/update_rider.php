<?php
include 'session.php';

if (isset($_POST['submit'])) {
    $fname   = $_POST['fname'];
    $lname   = $_POST['lname'];
    $email   = $_POST['email'];
    $contact = $_POST['contact'];
    $street  = $_POST['street'];
    $city    = $_POST['city'];
    $state   = $_POST['state'];
    $id      = $_POST['id'];

    // Start building the update query
    $sql = "UPDATE rider SET 
                fname = '$fname', 
                lname = '$lname', 
                email = '$email', 
                contactno = '$contact',
                street = '$street', 
                city = '$city', 
                state = '$state'";

    // If password is not empty, update it
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql .= ", password = '$password'";
    }

    $sql .= " WHERE id = '$id'";

    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Rider updated successfully';
    } else {
        $_SESSION['error'] = $conn->error;
    }

} else {
    $_SESSION['error'] = 'Fill up the update form first';
}

header('location: ../rider.php');
exit();
