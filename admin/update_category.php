<?php include('include/session.php')?>
<?php include('include/header.php')?>
<?php include('include/sidebar.php')?>
<?php include('include/menubar.php')?>

          
  <div class="content-wrapper">

        <section class="content-header">
            <h1 class="h3 mb-4 text-gray">Category List</h1>
        </section>


        <?php
$ID = $_GET['id'];
 $view = "SELECT * from category where id = '$ID'";
 $result = $conn->query($view);
 $row = $result->fetch_assoc();
  
 ?>
 


                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        	<div class="row">
                            	<div class="col">
                                    <h6 class="h3 m-0 font-weight-bold text-success"> Update Category</h6>

                            	</div>
                            </div>
                        </div>
                        <div class="card-body">

                            <form  class="form-horizontal box-show" method="POST" action="crud/category_update.php" enctype="multipart/form-data" id="doctor_form">
        
                                <div class="form-group  row">
                                <label for="fname" class="col-sm-2 text-right control-label col-form-label text-muted">Category Name </label>

                                    <div class="input-group col-sm-8 col-xs-11">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-tag"></i></span></div>
                                        <input type="text" class="form-control" name="category" id="title" placeholder="Category Name Here" required="" value="<?php echo $row['categoryName'];?>"> 
                                </div>
                                </div>

                            <div class="form-group row ">

                            <label for="fname" class="col-sm-2 text-right control-label col-form-label text-muted">Category Description</label>
                            <div class="input-group col-sm-8 col-xs-11">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-at"></i></span></div>
                                
                                <textarea rows="3" class="form-control " name="description" id="description" required><?php echo $row['categoryDescription'];?></textarea>

                            </div>


                            </div>


                                
                                </div>
                                <div class="modal-footer">
                                        <input type="hidden" class="form-control" name="id" id="title" placeholder="Category Name Here" required="" value="<?php echo $row['id'];?>"> 

                                    <input type="submit" name="submit" id="submit_button" class="btn btn-success" value="Add" />
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


