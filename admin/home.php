<?php include('include/session.php') ?>
<?php include('include/header.php') ?>
<?php include('include/sidebar.php') ?>
<?php include('include/menubar.php');
$today = date('Y-m-d');

?>


<div class="content-wrapper">

  <section class="content-header">
    <h1 class="h3 mb-4 text-gray">Dashboard</h1>
  </section>


  <div class="row  mx-auto">

    <div class="col-sm-3  mx-auto">
      <a href="shop.php">
        <div class="info-box bg-gradient-primary">
          <span class="info-box-icon"><i class="far fa-user-alt"></i></span>
          <div class="info-box-content">
            <span class="info-box-text ">Shops</span>

            <?php

            $sql = "SELECT * FROM shops ";
            $query = $conn->query($sql);
            $total = $query->num_rows;
            ?>
            <span class="info-box-number"> Total: <?php echo $total ?> </span>

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
            <span class="info-box-number"> Total: <?php echo $total ?> </span>
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
            <span class="info-box-number"> Total: <?php echo $total ?> </span>
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
            <span class="info-box-number"> Today: <?php echo $total ?> </span>
          </div>
        </div>
    </div>
    </a>
  </div>





 

</div>









<?php include 'include/footer.php'; ?>
</div>



</body>

</html>



<style>
  #gmap_canvas {
    width: 100%;
  }
</style>