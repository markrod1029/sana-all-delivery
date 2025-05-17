<?php
session_start();
include '../include/conn.php';

if (isset($_POST['login'])) {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $contact  = $_POST['contact'];
    $address  = $_POST['address'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Handle image upload
    $location = NULL;
    if (isset($_FILES["photo"]) && !empty($_FILES["photo"]["name"])) {
        $fileinfo     = PATHINFO($_FILES["photo"]["name"]);
        $newFilename  = $fileinfo['filename'] . "." . $fileinfo['extension'];
        $uploadPath   = 'images/' . $newFilename;

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $uploadPath)) {
            $location = $newFilename;
        }
    }

    // Generate customer ID
    $numbers = '0123456789';
    $customer_id = substr(str_shuffle($numbers), 0, 9);

    // Check if email already exists
    $check_sql = "SELECT email FROM customer WHERE email = '$email'";
    $check_query = mysqli_query($conn, $check_sql);
    
    if (mysqli_num_rows($check_query) > 0) {
        $_SESSION['error'] = 'Email already exists';
    } else {
        if ($location === NULL) {
            $insert_sql = "INSERT INTO customer (customer_id, photo, name, email, customer_number, customer_address, password, regDate)
                           VALUES ('$customer_id', NULL, '$name', '$email', '$contact', '$address', '$password', NOW())";
        } else {
            $insert_sql = "INSERT INTO customer (customer_id, photo, name, email, customer_number, customer_address, password, regDate)
                           VALUES ('$customer_id', '$location', '$name', '$email', '$contact', '$address', '$password', NOW())";
        }

        if (mysqli_query($conn, $insert_sql)) {
            $_SESSION['success'] = 'Customer registered successfully';
        } else {
            $_SESSION['error'] = 'Database error: ' . mysqli_error($conn);
        }
    }
} else {
    $_SESSION['error'] = 'Please fill up the form first';
}

header('Location: ../customer_login.php');
exit;
?>
