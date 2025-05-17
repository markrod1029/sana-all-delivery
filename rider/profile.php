<?php include('include/session.php') ?>
<?php include('include/header.php') ?>
<?php include('include/sidebar.php') ?>
<?php include('include/menubar.php') ?>


<div class="content-wrapper">

    <section class="content-header">
        <h1 class="h3 mb-4 text-gray">Profile Setting</h1>
    </section>



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
                    <h6 class="h3 m-0 font-weight-bold text-success">Profile Info</h6>

                </div>
            </div>
        </div>
        <div class="card-body">

            <form class="form-horizontal" method="POST" action="crud/profile_update.php" enctype="multipart/form-data" id="doctor_form">

                <center>

                    <img class="img-circle mb-3" src="<?php echo !empty($user['photo']) ? '../images/' . $user['photo'] : '../images/logo.png'; ?>" width="150px" height="150px" style="object-fit: cover; border: 2px solid #ccc;">

                    <div class="form-group row">
                        <label for="photo" class="col-sm-3 text-right control-label col-form-label text-muted">Profile Picture</label>
                        <div class="input-group col-sm-6 col-xs-11">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-image"></i></span></div>
                            <input type="file" class="form-control" name="photo" accept="image/*">
                        </div>
                    </div>

                    <div class="form-group  row mt-4">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label text-muted">Firtst Name </label>

                        <div class="input-group col-sm-6 col-xs-11">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                            <input type="text" class="form-control" name="fname" id="title" value="<?php echo $user['fname'] ?>" placeholder="Firtst Name Here" required="">
                        </div>
                    </div>

                    <div class="form-group  row ">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label text-muted">Last Name </label>

                        <div class="input-group col-sm-6 col-xs-11">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                            <input type="text" class="form-control" name="lname" id="title" value="<?php echo $user['lname'] ?>" placeholder="Last Name Here" required="">
                        </div>
                    </div>


                    <div class="form-group  row ">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label text-muted">Phone Number </label>

                        <div class="input-group col-sm-6 col-xs-11">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone"></i></span></div>
                            <input type="text" class="form-control" name="number" id="title" value="<?php echo $user['contactno'] ?>" placeholder="Contact Here" required="">
                        </div>
                    </div>

                    <div class="form-group  row ">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label text-muted">Email Address </label>

                        <div class="input-group col-sm-6 col-xs-11">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
                            <input type="text" class="form-control" name="email" id="title" value="<?php echo $user['email'] ?>" placeholder="Email Here" required="">
                        </div>
                    </div>

                    <div class="form-group  row ">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label text-muted">Address </label>

                        <div class="input-group col-sm-6 col-xs-11">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-home"></i></span></div>
                            <input type="text" class="form-control" name="street" id="title" value="<?php echo $user['street'] ?>" placeholder="Street Here" required="">
                        </div>
                    </div>

                    <div class="form-group  row ">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label text-muted"> </label>

                        <div class="input-group col-sm-6 col-xs-11">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-home"></i></span></div>
                            <input type="text" class="form-control" name="city" id="title" value="<?php echo $user['city'] ?>" placeholder="City Here" required="">
                        </div>
                    </div>


                    <div class="form-group  row ">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label text-muted"> </label>

                        <div class="input-group col-sm-6 col-xs-11">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-home"></i></span></div>
                            <input type="text" class="form-control" name="province" id="title" value="<?php echo $user['state'] ?>" placeholder="State Here" required="">
                        </div>
                    </div>


                    <div class="form-group  row ">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label text-muted">Position </label>

                        <div class="input-group col-sm-6 col-xs-11">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-home"></i></span></div>
                            <input type="text" class="form-control" name="province" id="title" value="<?php echo $user['position'] ?>" placeholder="position" readonly="">
                        </div>
                    </div>




                </center>
        </div>
        <div class="modal-footer">
            <input type="submit" name="submit" id="submit_button" class="btn btn-success" value="Update" />
            <button type="reset" class="btn btn-default">Reset</button>
        </div>
        </form>

    </div>
</div>
</div>



</div>



<?php include 'include/footer.php' ?>

</div>


</body>

</html>