<?php include('include/session.php')?>
<?php include('include/header.php')?>
<?php include('include/sidebar.php')?>
<?php include('include/menubar.php');
$today = date('M-d-Y-D');
?>

          
  <div class="content-wrapper">

  <section class="content-header">
  <h1 class="h3 mb-4 text-gray"> Order Transaction</h1>
        </section>


<!-- Customer -->
        
        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        	<div class="row">
                        	<div class="col">
                            
                                <div class="card-body">

                              
                              
                                <div class="table-responsive">
                                <table class="table table-bordered text-center"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Customer ID</th>
                                            <th>Email</th>
                                            <th>Contat</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                    <?php 
                    $id = $_GET['id'];
                    $view = "SELECT *, orders.id AS oid FROM orders
                    LEFT JOIN customer ON orders.customer_id = customer.id
                    WHERE order_id = '$id'
                     ";
                    $result = $conn->query($view);
                    $view = $result->fetch_assoc();
                    ?>
                        <tr>
                        <td><?php echo $view['name'];?> </td>
                        <td><?php echo $view['email'];?></td>
                        <td><?php echo $view['customer_number']?></td>

                        </tr>        


                                        
                                    </tbody>
                                </table>
                            </div><br><br>




                 

                                <div class="table-responsive">
                                <table class="table table-bordered text-center" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Product Image</th>
                                            <th>Product Name</th>
                                            <th>Total Quantity</th>
                                            <th>Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                    <?php 
                    $sql = "SELECT *, orders.id AS oid FROM orders
                    LEFT JOIN products ON orders.product_id = products.id
                    WHERE order_id = '$id'";
                    $total = 0;
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($query)) 
                    {

                        $total += $row['total_pay'];

                    ?>
                        <tr>
                        <td><img src="<?php echo (!empty($row['photo1']))? 'images/'.$row['photo1']:'../images/admin.png'; ?>" width="50px" height="50px">  </td>
                        <td><?php echo $row['productName'];?></td>
                        <td><?php echo $row['total_quantity']?></td>
                        <td><?php echo $row['total_pay']?></td>

                    
                        </tr>        

                    
                    
                    <?php
                            }
                    ?>

                        <tr>
                         <td colspan="4">
                        <center><h5><span class="price"> Total: <?php echo $total?></span></h5></center>
                        </td>

                         </tr>



                                        
                                    </tbody>
                                </table>
                            </div>


                                </div>
                            </div>
                        </div>
                        </div>
                    </div>





    </div>


<?php include 'include/footer.php'; ?>
</div>



</body>
</html>



<style>


  </style>