<?php
session_start();
include '../include/conn.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check admin first
    $admin_sql = "SELECT * FROM admin WHERE email = '$email'";
    $admin_query = $conn->query($admin_sql);

    if ($admin_query->num_rows == 1) {
        $admin = $admin_query->fetch_assoc();
        if (password_verify($password, $admin['password'])) {
            $_SESSION['admin'] = $admin['id'];
            $_SESSION['id'] = $admin['id'];
            header('location: ../rider_login.php');

            exit();
        } else {
            $_SESSION['error'] = 'Incorrect password for Admin';
            header('location: ../rider_login.php');
            exit();
        }
    }

    // If not admin, check rider
    $rider_sql = "SELECT * FROM rider WHERE email = '$email'";
    $rider_query = $conn->query($rider_sql);

    if ($rider_query->num_rows == 1) {
        $rider = $rider_query->fetch_assoc();
        if (password_verify($password, $rider['password'])) {
            $_SESSION['rider'] = $rider['id'];
            $_SESSION['id'] = $rider['id'];
            header('location: ../rider_login.php');

            exit();
        } else {
            $_SESSION['error'] = 'Incorrect password for Rider';
            header('location: ../rider_login.php');
            exit();
        }
    }

    // No account found
    $_SESSION['error'] = 'No account found with that email';
    header('location: ../rider_login.php');
    exit();

} else {
    $_SESSION['error'] = 'Invalid login attempt';
    header('location: ../rider_login.php');
    exit();
}
?>
