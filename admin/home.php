<?php include('include/session.php')?>
<?php include('include/header.php')?>
<?php include('include/sidebar.php')?>
<?php include('include/menubar.php');
$today = date('Y-m-d');

?>

          
  <div class="content-wrapper">

  <section class="content-header">
  <h1 class="h3 mb-4 text-gray">Dashboard</h1>
        </section>


          <div class="row  mx-auto">

<div class="col-sm-3  mx-auto">
  <a href="farmer.php">
  <div class="info-box bg-gradient-primary">
    <span class="info-box-icon"><i class="far fa-user-alt"></i></span>
      <div class="info-box-content">
        <span class="info-box-text ">Farmers</span>

        <?php

                $sql = "SELECT * FROM farmer ";
                $query = $conn->query($sql);
                $total = $query->num_rows;
              ?>
        <span class="info-box-number"> Total: <?php echo $total?> </span>
   
        </div>
  </div>
</a>
</div>

<div class="col-sm-3  mx-auto">
<a href="customer.php">
  <div class="info-box bg-gradient-success">
    <span class="info-box-icon"><i class="far fa-"></i></span>
      <div class="info-box-content">
      <span class="info-box-text ">Customer</span>
      <?php
        $sql = "SELECT * FROM customer ";
        $query = $conn->query($sql);
        $total = $query->num_rows;
        ?>
        <span class="info-box-number"> Total: <?php echo $total?> </span>
        </div>
  </div>
</a>
</div>



<div class="col-sm-3  mx-auto">
<a href="product.php">
  <div class="info-box bg-gradient-warning">
    <span class="info-box-icon"><i class="fa fa-shopping-cart"></i></span>
      <div class="info-box-content">
        <span class="info-box-text ">Product</span>
        <?php
      $sql = "SELECT * FROM products ";
      $query = $conn->query($sql);
      $total = $query->num_rows;
      ?>
      <span class="info-box-number"> Total: <?php echo $total?> </span>
        </div>
  </div>
</a>
</div>

<div class="col-sm-3  mx-auto">
<a href="today_order.php">
  <div class="info-box bg-gradient-danger">
    <span class="info-box-icon"><i class="fa fa-truck"></i></span>
      <div class="info-box-content">
      <span class="info-box-text ">Transaction Report</span>
      <?php
      $sql = "SELECT  DISTINCT order_id FROM orders Where orderDate = '$today' ";
      $query = $conn->query($sql);
      $total = $query->num_rows;
      ?>
      <span class="info-box-number"> Today: <?php echo $total?> </span>
        </div>
  </div>
</div>
</a>
</div>





        <span id="message"></span>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        	<div class="row">
                            	<div class="col">
                            		<h6 class="h3 m-0 font-weight-bold text-success">Location: San Carlos City, Pangasinan</h6>
                            	</div>
                            </div>
                        </div>
                        <div class="card-body">

                    <!-- table doctor -->



                    
                    <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=san%20carlos%city%20pangasinan&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                      <div></div>
                
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
#gmap_canvas{
    width:100%; 
}



  </style>