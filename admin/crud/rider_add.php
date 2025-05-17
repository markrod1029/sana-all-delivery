<?php
include 'session.php';

if (isset($_POST['submit'])) {
    $riderid = $_POST['riderid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $street = $_POST['street'];
    $password = $_POST['password'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $position = "Rider";
    $location = NULL; 
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Secure password hashing

    // Check if image is uploaded
    if (!empty($_FILES["photo"]["name"])) {
        $fileinfo = pathinfo($_FILES["photo"]["name"]);
        $newFilename = $fileinfo['filename'] . "." . $fileinfo['extension'];
        move_uploaded_file($_FILES["photo"]["tmp_name"], '../../images/' . $newFilename);
        $location = $newFilename; // save only filename, not full path
    }

    // Check if email already exists
    $check = "SELECT email FROM rider WHERE email = '$email'";
    $query = $conn->query($check);
    $count = mysqli_num_rows($query);

    if ($count == 1) {
        $_SESSION['error'] = 'Email already exists!';
    } else {
        $insert = "INSERT INTO rider 
            (user_id, photo, fname, lname, email, position, contactno, password, street, city, state, regDate) 
            VALUES 
            ('$riderid', " . ($location ? "'$location'" : "NULL") . ", '$fname', '$lname', '$email', '$position', '$contact', '$hashed_password', '$street', '$city', '$state', NOW())";

        if ($conn->query($insert) === TRUE) {
            $_SESSION['success'] = 'Rider added successfully.';
        } else {
            $_SESSION['error'] = "Error: " . $conn->error;
        }
    }
} else {
    $_SESSION['error'] = 'Fill up add form first';
}

header('Location: ../rider.php');
exit();
?>
