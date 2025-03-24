<?php include('include/session.php')?>
<?php include('include/header.php')?>
<?php include('include/sidebar.php')?>
<?php include('include/menubar.php')?>

          
  <div class="content-wrapper">

        <section class="content-header">
            <h1 class="h3 mb-4 text-gray">Category List</h1>
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
                                            <th>Farmer ID</th>
                                            <th>Category Name</th>
                                            <th>Sub Category </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                    <?php 

      


                    $sql = "SELECT *, subcategory.id AS subid FROM subcategory LEFT JOIN farmer ON farmer.id=subcategory.farmer_id
                    LEFT JOIN category ON category.id = farmer.shop_category ";
                    $query = mysqli_query($conn, $sql);
                    $data = array();

                    while ($row = mysqli_fetch_assoc($query)) 
                    {
                       
                    ?>
                        <tr>
                        <td><?php echo $row['farmer_id'];?></td>
                        <td><?php echo $row['categoryName'];?></td>
                        <td><?php echo $row['subcategory'];?></td>

                    

                    <div align="center">
                    <td>
                    <a  name="edit" href="update_sub_category.php?id=<?php echo $row['subid']?>" class="btn btn-warning btn-circle btn-sm" ><i class="fas fa-edit"></i></a>
                    <a  name="delete" onclick="return confirm('Are you sure you want to go to delete this Sub Category?')" href="crud/delete_sub_category.php?id=<?php echo $row['subid']?>"  class="btn btn-danger btn-circle btn-sm delete_button" ><i class="fas fa-times"></i></button>
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


