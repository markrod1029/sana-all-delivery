<?php include('include/session.php')?>
<?php include('include/header.php')?>
<?php include('include/sidebar.php')?>
<?php include('include/menubar.php')?>

          
  <div class="content-wrapper">

        <section class="content-header">
            <h1 class="h3 mb-4 text-gray">Buyer List</h1>
        </section>


        
        <?php
        if(isset($_SESSION['error'])){
          echo"
              <script type='text/javascript'>
              toastr.error('".$_SESSION['error']."', 'Error')
              toastr.options.timeOut = 3000;
              </script>
              
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
           
          <script type='text/javascript'>
          toastr.success('".$_SESSION['success']."', 'Success')
          toastr.options.timeOut = 3000;
          </script>
          ";
          unset($_SESSION['success']);
        }
      ?>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        	<div class="row">
                        	<div class="col">
                            	
                        <div class="card-body">

                        <div class="table-responsive">
                                <table class="table table-bordered text-center" id="example1" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Customer ID</th>
                                            <th>Customer Name</th>
                                            <th>Contact No.</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                    <?php 

      


                    $sql = "SELECT * FROM customer";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($query)) 
                    {
                       
                    ?>
                        <tr>
                        <td><img src="<?php echo (!empty($row['photo']))? '../images/'.$row['photo']:'../images/admin.png'; ?>" width="50px" height="50px"> 

                       </td>
                        <td><?php echo $row['customer_id'];?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['customer_number'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['customer_street'].' '.$row['customer_city'].' '.$row['customer_state'];?></td>

                    

                    <div align="center">
                    <td>
                    <a  name="edit" href="update_customer.php?id=<?php echo $row['id']?>" class="btn btn-warning btn-circle btn-sm" ><i class="fas fa-edit"></i></a>
                    <a  name="delete" onclick="return confirm('Are you sure you want to go to delete this Customer?')" href="crud/delete_customer.php?id=<?php echo $row['id']?>"  class="btn btn-danger btn-circle btn-sm delete_button" ><i class="fas fa-times"></i></button>
                    </div>
                    </td>
                    
                    <?php
                            }
                    ?>

                        </tr>        


                                        
                                    </tbody>
                                </table>
                            </div>

                
                        </div>
                        </div>
                    </div>
    </div>



</div>



<?php include 'include/footer.php' ?>



</body>
</html>


