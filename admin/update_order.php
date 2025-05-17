<?php include('include/session.php') ?>
<?php include('include/header.php') ?>
<?php include('include/sidebar.php') ?>
<?php include('include/menubar.php');
$today = date('M-d-Y-D');
?>


<div class="content-wrapper">

    <section class="content-header">
        <h1 class="h3 mb-4 text-gray"> Order Transaction</h1>
    </section>

    <script>
        window.onload = function() {


            var $ = new City();
            $.showProvinces("#province");
            $.showCities("#city");

            console.log($.getProvinces("Pangasinan"));

            console.log($.getAllCities());

            console.log($.getCities());

        }
    </script>


    <?php
    if (isset($_SESSION['error'])) {
        echo "
              <script type='text/javascript'>
              toastr.error('" . $_SESSION['error'] . "', 'Error')
              toastr.options.timeOut = 3000;
              </script>
              
          ";
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['success'])) {
        echo "
           
          <script type='text/javascript'>
          toastr.success('" . $_SESSION['success'] . "', 'Success')
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
                    <h6 class="h3 m-0 font-weight-bold text-success">Order ID: <?php echo $_GET['id'] ?> </h6>

                </div>
            </div>
        </div>
        <div class="card-body">



            <?php

            $cuid = $_GET['id'];
            $view = "SELECT * FROM ordertrackhistory WHERE order_id = '$cuid' AND status != 'Deliver'";
            $result = $conn->query($view);
            $total = mysqli_num_rows($result);
            if (mysqli_num_rows($result) != 0) {
            ?>
                <div class="table-responsive">
                    <table class="table table-bordered text-center" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Rider Location</th>
                                <th>Status Delivery</th>
                                <th>Remark</th>
                                <th>Date & Time</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                                <tr>
                                    <td><?php echo $row['order_id']; ?></td>
                                    <td><?php echo $row['rider_location'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                    <td><?php echo $row['remark'] ?></td>
                                    <td><?php echo $row['postingDate'] ?></td>


                                </tr>



                            <?php
                            }
                            ?>






                        </tbody>
                    </table>
                </div>

            <?php
            } ?><br>






        </div>
    </div>
</div>





</div>


<?php include 'include/footer.php'; ?>
</div>



</body>

</html>