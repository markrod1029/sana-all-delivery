<?php include('include/session.php') ?>
<?php include('include/header.php') ?>
<?php include('include/sidebar.php') ?>
<?php include('include/menubar.php');
$today = date('M-d-Y-D');
?>


<div class="content-wrapper">

    <section class="content-header">
        <h1 class="h3 mb-4 text-gray">Update Order Transaction</h1>
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




            <form class="form-horizontal" method="POST" action="crud/update_order.php" enctype="multipart/form-data" id="doctor_form">


                <div class="input-group mb-3 ">
                    <label for="cono1" class="col-sm-2 text-right control-label col-form-label text-muted">Product Availability</label>


                    <div class="input-group col-sm-8 col-xs-11">

                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-tag"></i></span></div>
                        <select type="text" class="form-control" name="status" id="position" required>
                            <option value="" selected>- Select -</option>
                            <option value="In Process">In Process</option>
                            <option value="Delivered">Delivered</option>



                        </select>
                    </div>
                </div>



                <div class="input-group mb-3 ">
                    <label for="province" class="col-sm-2 text-right control-label col-form-label text-muted">Location/Address</label>

                    <div class="input-group col-sm-8 col-xs-11">

                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-home"></i></span></div>
                        <select class="form-control form-control-line size " name="province" id="province" required="">
                            <option>Select Province</option>
                        </select>
                    </div>
                </div>


                <div class="input-group mb-3 ">
                    <label for="city" class="col-sm-2 text-right control-label col-form-label"></label>


                    <div class="input-group col-sm-8 col-xs-11">

                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-home"></i></span></div>
                        <select class="form-control form-control-line size " name="city" id="city" required="">
                            <option>Select City/Municipality</option>
                        </select>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <label for="street" class="col-sm-2 text-right control-label col-form-label text-muted">Street</label>
                    <div class="input-group col-sm-8 col-xs-11">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-road"></i></span></div>
                        <input type="text" class="form-control" name="street" id="street" placeholder="Enter street address" required>
                    </div>
                </div>


                <div class="form-group row ">

                    <label for="fname" class="col-sm-2 text-right control-label col-form-label text-muted">Remark</label>
                    <div class="input-group col-sm-8 col-xs-11">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-at"></i></span></div>

                        <textarea rows="3" class="form-control " name="remark" id="description" required></textarea>

                    </div>


                </div>







        </div>
        <div class="modal-footer">
            <input type="hidden" name="order_id" id="title" value="<?php echo $cuid  ?>" required="">

            <input type="submit" name="submit" id="submit_button" class="btn btn-success" value="Update" />
            <button type="reset" class="btn btn-default">Reset</button>
        </div>
        </form>


    </div>
</div>
</div>





</div>


<?php include 'include/footer.php'; ?>
</div>



</body>

</html>