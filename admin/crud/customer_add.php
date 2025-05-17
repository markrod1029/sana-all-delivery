<?php
include 'session.php';

if (isset($_POST['submit'])) {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $contact  = $_POST['contact'];
    $street   = $_POST['street'];
    $city     = $_POST['city'];
    $state    = $_POST['state'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Optional photo upload
    $location = NULL;
    if (isset($_FILES["photo"]) && !empty($_FILES["photo"]["name"])) {
        $fileinfo    = PATHINFO($_FILES["photo"]["name"]);
        $newFilename = $fileinfo['filename'] . "." . $fileinfo['extension'];
        $uploadPath  = '../../images/' . $newFilename;

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $uploadPath)) {
            $location = $newFilename;
        }
    }

    // Generate customer ID
    $numbers = '0123456789';
    $customer_id = substr(str_shuffle($numbers), 0, 9);

    // Check if email exists
    $check_sql = "SELECT email FROM customer WHERE email = '$email'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        $_SESSION['error'] = 'Email address already exists';
    } else {
        // Prepare insert query
        $photo_value = ($location !== NULL) ? "'$location'" : "NULL";

        $insert_sql = "INSERT INTO customer (
                customer_id, photo, name, email, customer_number, 
                customer_street, customer_city, customer_state, password, regDate
            ) VALUES (
                '$customer_id', $photo_value, '$name', '$email', '$contact',
                '$street', '$city', '$state', '$password', NOW()
            )";

        if (mysqli_query($conn, $insert_sql)) {
            $_SESSION['success'] = 'Customer added successfully';
        } else {
            $_SESSION['error'] = 'Database error: ' . mysqli_error($conn);
        }
    }
} else {
    $_SESSION['error'] = 'Please fill up the form first';
}

header('Location: ../customer.php');
exit;
?>
