
<?php
 
 include 'session.php';
  
  $ID = $user['id'];
 
     if (isset($_POST["submit"]))
     {
         // Get all input fields
         $current_password = $_POST["cpass"];
         $new_password = $_POST["npass"];
         $confirm_password = $_POST["cnpass"];
  
         // Check if current password is correct
         $sql = "SELECT * FROM customer WHERE id = '" . $ID . "'";
         $result = mysqli_query($conn, $sql);
         $row = mysqli_fetch_object($result);
          
         if (password_verify($current_password, $row->password))
         {
             // Check if password is same
             if ($new_password == $confirm_password)
             {
                 if($new_password == $current_password && $current_password ==  $confirm_password){
                     $_SESSION['error'] = 'Password Already use in Current Password';
         
                 }
 
                 else{
 
                     $sql = "UPDATE customer SET password = '" . password_hash($new_password, PASSWORD_DEFAULT) . "' WHERE id = '" . $ID . "'";
                     mysqli_query($conn, $sql);
      
                     $_SESSION['success'] = 'Password has been changed';
 
 
 
                 }
 
                
             }
             else
             {
                 $_SESSION['error'] = 'New and Confirm Password does not match';
             }
         }
 
         
         else
         {
             $_SESSION['error'] = 'Current Password is not correct';
 
         }
     }
 
 header('location: ../my-account.php');
 
 ?>