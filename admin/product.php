<?php include('include/session.php')?>
<?php include('include/header.php')?>
<?php include('include/sidebar.php')?>
<?php include('include/menubar.php')?>

          
  <div class="content-wrapper">

        <section class="content-header">
            <h1 class="h3 mb-4 text-gray">Product List</h1>
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
                                            <th>#</th>
                                            <th>Product Name</th>
                                            <th>Farmer ID</th>
                                            <th>category</th>
                                            <th>Sub Category</th>
                                            <th>Product Price</th>
                                            <th>Quantity</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                    <?php 

      


                    $sql = "SELECT *, products.id AS pid FROM products
                     LEFT JOIN subcategory ON subcategory.id =  products.subCategory_id
                     LEFT JOIN farmer ON farmer.id =  products.farmer_id 
                     LEFT JOIN category ON category.id=farmer.shop_category ";

                    $query = mysqli_query($conn, $sql);
                    $c=1;

                    while ($row = mysqli_fetch_assoc($query)) 
                    {
                        $c++;
                    ?>
                        <tr>
                        <td><?php echo $c;?> </td>
                        <td><?php echo $row['productName'];?></td>
                        <td><?php echo $row['farmer_id'];?></td>
                        <td><?php echo $row['categoryName'];?></td>
                        <td><?php echo $row['subcategory'];?></td>
                        <td><?php echo $row['productPrice']?></td>
                        <td><?php echo $row['quantity']?></td>

                    

                    <div align="center">
                    <td>
                    <a  name="edit" href="update_product.php?id=<?php echo $row['pid']?>" class="btn btn-warning btn-circle btn-sm" ><i class="fas fa-edit"></i></a>
                    <a  name="delete" onclick="return confirm('Are you sure you want to go to delete this Product?')" href="crud/delete_product.php?id=<?php echo $row['pid']?>"  class="btn btn-danger btn-circle btn-sm delete_button" ><i class="fas fa-times"></i></button>
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


