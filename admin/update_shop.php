<?php include('include/session.php') ?>
<?php include('include/header.php') ?>
<?php include('include/sidebar.php') ?>
<?php include('include/menubar.php') ?>


<div class="content-wrapper">

    <section class="content-header">
        <h1 class="h3 mb-4 text-gray">Farmer List</h1>
    </section>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col">
                    <h6 class="h3 m-0 font-weight-bold text-success">Farmer Info</h6>
                    <?php
                    $ID = $_GET['id'];
                    $view = "SELECT * from farmer where id = '$ID'";
                    $result = $conn->query($view);
                    $row = $result->fetch_assoc();

                    ?>

                </div>
            </div>
        </div>
        <div class="card-body">

            <form class="form-horizontal" method="POST" action="crud/update_shop.php" enctype="multipart/form-data" id="doctor_form">

                <div class="form-group  row">
                    <label for="fname" class="col-sm-2 text-right control-label col-form-label text-muted">Farmer ID </label>

                    <div class="input-group col-sm-8 col-xs-11">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user-circle"></i></span></div>
                        <input type="text" class="form-control" name="fname" id="title" value="<?php echo $row['farmerid']; ?>" placeholder="Farmers ID Here" required="">
                    </div>
                </div>


                <div class="form-group  row">
                    <label for="fname" class="col-sm-2 text-right control-label col-form-label text-muted">First Name </label>

                    <div class="input-group col-sm-8 col-xs-11">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                        <input type="text" class="form-control" name="fname" id="title" placeholder="Farmer Last Name Here" required="" value="<?php echo $row['fname']; ?>" required>
                    </div>
                </div>


                <div class="form-group  row">
                    <label for="fname" class="col-sm-2 text-right control-label col-form-label text-muted">Last Name </label>

                    <div class="input-group col-sm-8 col-xs-11">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                        <input type="text" class="form-control" name="lname" id="title" placeholder="Farmer Last Name Here" required="" value="<?php echo $row['lname']; ?>" required>
                    </div>
                </div>


                <div class="form-group  row">
                    <label for="fname" class="col-sm-2 text-right control-label col-form-label text-muted">Email </label>

                    <div class="input-group col-sm-8 col-xs-11">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
                        <input type="text" class="form-control" name="email" id="title" placeholder="Email Here" required="" value="<?php echo $row['email']; ?>" required>
                    </div>
                </div>


                <div class="form-group  row">
                    <label for="fname" class="col-sm-2 text-right control-label col-form-label text-muted">Phone Number </label>

                    <div class="input-group col-sm-8 col-xs-11">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone"></i></span></div>
                        <input type="text" class="form-control" name="contact" id="title" placeholder="Contact Here" required="" value="<?php echo $row['contactno']; ?>" required>
                    </div>
                </div>

                <div class="input-group mb-3 ">
                    <label for="cono1" class="col-sm-2 text-right control-label col-form-label text-muted">Shop Category</label>


                    <div class="input-group col-sm-8 col-xs-11">

                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-tag"></i></span></div>
                        <select type="text" class="form-control" name="shop_category" id="position" required>
                            <option value="" selected>- Select -</option>

                            <?php
                            $sql = "SELECT * FROM category  ";
                            $query = $conn->query($sql);
                            while ($prow = $query->fetch_assoc()) {
                                echo "
                                            <option value='" . $prow['id'] . "'>" . $prow['categoryName'] . "</option>
                                            ";
                            }
                            ?>


                        </select>
                    </div>
                </div>

                <div class="form-group  row">
                    <label for="fname" class="col-sm-2 text-right control-label col-form-label text-muted">Barangay </label>

                    <div class="input-group col-sm-8 col-xs-11">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-home"></i></span></div>
                        <input type="text" class="form-control" name="street" id="title" placeholder="Street Here" required="" value="<?php echo $row['street']; ?>" required>
                    </div>
                </div>


                <div class="form-group  row">
                    <label for="fname" class="col-sm-2 text-right control-label col-form-label text-muted">City </label>

                    <div class="input-group col-sm-8 col-xs-11">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-home"></i></span></div>
                        <input type="text" class="form-control" name="city" id="title" placeholder="City Here" required="" value="<?php echo $row['city']; ?>" required>
                    </div>
                </div>


                <div class="form-group  row">
                    <label for="fname" class="col-sm-2 text-right control-label col-form-label text-muted">Province </label>

                    <div class="input-group col-sm-8 col-xs-11">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-home"></i></span></div>
                        <input type="text" class="form-control" name="state" id="title" placeholder="State Here" required="" value="<?php echo $row['state']; ?>" required>
                    </div>
                </div>

                <div class="form-group  row">
                    <label for="fname" class="col-sm-2 text-right control-label col-form-label text-muted">Password </label>

                    <div class="input-group col-sm-8 col-xs-11">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-lock"></i></span></div>
                        <input type="password" class="form-control" name="password" id="title" placeholder="Password Here" required="" value="<?php echo $row['password']; ?>" required>
                    </div>
                </div>


                <div class="form-group  row">
                    <label for="fname" class="col-sm-2 text-right control-label col-form-label text-muted">Shop Name </label>

                    <div class="input-group col-sm-8 col-xs-11">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-home"></i></span></div>
                        <input type="text" class="form-control" name="sname" id="title" placeholder="Shop Name Here" value="<?php echo $row['shop_name']; ?>" required="">
                    </div>
                </div>



        </div>
        <div class="modal-footer">
            <input type="hidden" class="form-control" name="id" id="title" placeholder="State Here" required="" value="<?php echo $row['id']; ?>">
            <input type="submit" name="submit" id="submit_button" class="btn btn-success" value="Update" />
            <button type="reset" class="btn btn-default">Reset</button>
        </div>
        </form>


    </div>
</div>
</div>



</div>



<?php include 'include/footer.php' ?>



</body>

</html>