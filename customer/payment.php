<?php
include('include/session.php');



?>
<?php include('include/header.php'); ?>
<?php include('component/toast.php'); ?>

<body class="cnt-home">



  <!-- ============================================== HEADER ============================================== -->
  <header class="header-style-1">
    <?php include('include/top-header.php'); ?>
    <?php include('include/main-header.php'); ?>
    <?php include('include/menu-bar.php'); ?>

    <div class="body-content outer-top-xs" id="top-banner-and-menu">
      <div class="container">
        <div class="furniture-container homepage-container">




          <?php
          if (isset($_SESSION['error'])) {
            echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
            unset($_SESSION['error']);
          }
          if (isset($_SESSION['success'])) {
            echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
            unset($_SESSION['success']);
          }
          ?>
          <div class='container'>
            <div class='row '>

              <div class='col-sm-4 wow'>

                <?php include('component/customer_info.php'); ?>

              </div>

              <div class='col-sm-8 '>

                <div class="table-responsive outer-top-xs">

                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th class="cart-romove item">#</th>
                        <th class="cart-description item">Order ID</th>
                        <th class="cart-description item">Image</th>
                        <th class="cart-description item">Product</th>
                        <th class="cart-product-name item">Order Date</th>
                        <th class="cart-product-name item">Qantity</th>
                        <th class="cart-product-name item">Price</th>

                      </tr>
                    </thead><!-- /thead -->

                    <tbody>

                      <?php
                      $c = 0;
                      $quantity = 0;
                      $total = 0;
                      $id = $_GET['id'];
                      $ret = "SELECT *, orders.id AS oid FROM orders
                                LEFT JOIN products ON products.id = orders.product_id
                                 WHERE order_id  ='$id' ";
                      $result = $conn->query($ret);


                      while ($row = mysqli_fetch_array($result)) {
                        $c++;

                        $total += $row['total_pay'] * $row['total_quantity'];
                        $quantity += $row['total_quantity'];
                      ?>

                        <tr>
                          <td><?php echo $c ?></td>
                          <td><?php echo $row['order_id'] ?></td>
                          <td><img src="<?php echo (!empty($row['photo1'])) ? '../images/' . $row['photo1'] : '../images/admin.png'; ?>" width="50" height="50" alt=""></td>
                          <td><?php echo $row['productName'] ?></td>
                          <td><?php echo $row['orderDate'] ?></td>
                          <td><?php echo $row['total_quantity'] ?></td>
                          <td><?php echo $row['total_pay'] ?></td>
                        </tr>

                      <?php
                      } ?>

                      <tr>
                        <td colspan="7">
                          <center>
                            <h3><span class="price"> Total:<?php echo $total ?></span></h3>
                          </center>
                        </td>

                      </tr>

                    </tbody>
                  </table>
                  <form action="crud/payment_process.php?id=<?php echo $id ?>" method="POST">
                    <center>
                      <div class="input-group col-sm-18 col-xs-11">
                        <select type="text" class="form-control span8 tip" name="payment" required>
                          <option value="COP">Cash On Pickup</option>



                        </select>
                      </div>
                </div>

                <input type="hidden" class="form-control" name="p" id="title" value="<?php echo $total ?>" required="">
                <input type="hidden" class="form-control" name="q" id="title" value="<?php echo $quantity ?>" required="">

                <br>

                <div class="cart-checkout-btn " style=" display: flex; justify-content: center;">

                  <button type="submit" name="submit" class="btn btn-primary" style="background:#4E7AB5; color:white;">Submit Order</button>
                </div>

                </center>
                </form>





              </div>
            </div>
          </div>




        </div>

      </div>
    </div>
    <?php include('include/script.php'); ?>

</body>

</html>