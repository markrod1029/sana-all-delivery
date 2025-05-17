<?php include('include/session.php'); ?>
<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
<?php include('include/menubar.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1 class="h3 mb-4 text-gray">Password Setting</h1>
    </section>

    <?php
    if (isset($_SESSION['error'])) {
        echo "
            <script type='text/javascript'>
                toastr.error('" . $_SESSION['error'] . "', 'Error');
                toastr.options.timeOut = 3000;
            </script>
        ";
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['success'])) {
        echo "
            <script type='text/javascript'>
                toastr.success('" . $_SESSION['success'] . "', 'Success');
                toastr.options.timeOut = 3000;
            </script>
        ";
        unset($_SESSION['success']);
    }
    ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="h3 m-0 font-weight-bold text-success">Password Info</h6>
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="crud/password_update.php" enctype="multipart/form-data" id="doctor_form">
                <center>
                    <img class="img-circle" src="../images/logo.jpg" width="150px" height="150px">

                    <div class="form-group row mt-4">
                        <label for="old_password" class="col-sm-3 text-right control-label col-form-label text-muted">Current Password</label>
                        <div class="input-group col-sm-6">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-lock"></i></span></div>
                            <input type="password" class="form-control" name="old" id="old_password" placeholder="Enter Current Password" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="new_password" class="col-sm-3 text-right control-label col-form-label text-muted">New Password</label>
                        <div class="input-group col-sm-6">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-lock"></i></span></div>
                            <input type="password" class="form-control" name="new" id="new_password" placeholder="Enter New Password" required minlength="6">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="confirm_password" class="col-sm-3 text-right control-label col-form-label text-muted">Confirm Password</label>
                        <div class="input-group col-sm-6">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-lock"></i></span></div>
                            <input type="password" class="form-control" name="confirm" id="confirm_password" placeholder="Confirm New Password" required minlength="6">
                        </div>
                    </div>

                </center>
                <div class="modal-footer">
                    <input type="submit" name="submit" id="submit_button" class="btn btn-success" value="Update">
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'include/footer.php'; ?>

</body>
</html>
