<?php
include 'session.php';
if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $contact = $_POST['number'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['province'];
    $id = $user['id'];

    $location = $user['photo']; // default to existing

    // Check if a new photo is uploaded
    if(isset($_FILES['photo']) && $_FILES['photo']['name'] != ""){
        $filename = $_FILES['photo']['name'];
        $tempname = $_FILES['photo']['tmp_name'];
        $folder = "../../images/" . $filename;

        // Check for upload errors
        if ($_FILES['photo']['error'] !== UPLOAD_ERR_OK) {
            $_SESSION['error'] = 'Error uploading image: ' . $_FILES['photo']['error'];
            header('location: ../profile.php');
            exit();
        }

        // Optional: delete old photo if exists and is not the default
        if(!empty($user['photo']) && file_exists("../images/" . $user['photo'])){
            unlink("../images/" . $user['photo']);
        }

        // Try to move the uploaded file
        if(move_uploaded_file($tempname, $folder)){
            $location = $filename;
        } else {
            $_SESSION['error'] = 'Failed to upload image. Please check folder permissions or file type.';
            header('location: ../profile.php');
            exit();
        }
    }

    // Update profile in the database
    $sql = "UPDATE rider SET fname = '$fname', lname = '$lname', email = '$email', contactno = '$contact',
            street = '$street', city = '$city', state = '$state', photo = '$location' WHERE id = '$id'";

    if($conn->query($sql)){
        $_SESSION['success'] = 'Profile updated successfully';
    } else {
        $_SESSION['error'] = 'Error: ' . $conn->error;
    }
} else {
    $_SESSION['error'] = 'Fill up the form first';
}

header('location: ../profile.php');
