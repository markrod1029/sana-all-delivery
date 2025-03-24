<?php include('include/session.php')?>
<?php include('include/header.php')?>
<?php include('include/sidebar.php')?>
<?php include('include/menubar.php')?>

          
  <div class="content-wrapper">

        <section class="content-header">
            <h1 class="h3 mb-4 text-gray">Category List</h1>
        </section>


        


                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        	<div class="row">
                            	<div class="col">
                                    <h6 class="h3 m-0 font-weight-bold text-success">  Sub Category Info</h6>

                            	</div>
                            </div>
                        </div>
                        <div class="card-body">

                            <form  class="form-horizontal box-show" method="POST" action="crud/category_sub_add.php" enctype="multipart/form-data" id="doctor_form">
        
                            <div class="input-group mb-3 ">
                        <label for="cono1" class="col-sm-2 text-right control-label col-form-label text-muted">Farmer Name</label>

                        
                        <div class="input-group col-sm-8 col-xs-11">

                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-tag"></i></span></div>
                        <select type = "text" class="form-control span8 tip" name="farmer_id"  onChange="getSubcat(this.value);"  required>
                                        <option value="" selected>- Select -</option>
                                            
                                        <?php $query=mysqli_query($conn,"select * from farmer");
                                            while($row=mysqli_fetch_array($query))
                                            {?>

                                            <option value="<?php echo $row['id'];?>">Farmer <?php echo $row['fname']. ' ' .$row['lname'];?></option>
                                            <?php } ?>
                                    
                                    
                                    </select>
                        </div>
                    </div>




                    
                            <div class="input-group mb-3 ">
                        <label for="cono1" class="col-sm-2 text-right control-label col-form-label text-muted">Category Name</label>

                        
                        <div class="input-group col-sm-8 col-xs-11">

                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-tag"></i></span></div>
                        <select type = "text" class="form-control" name="categoryid" id="subcategory" class="span8 tip" readonly >
                                    
                                    </select>
                        </div>
                    </div>



                    






                            <div class="form-group  row">
                                <label for="fname" class="col-sm-2 text-right control-label col-form-label text-muted">Sub Category  </label>

                                    <div class="input-group col-sm-8 col-xs-11">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-tag"></i></span></div>
                                        <input type="text" class="form-control" name="subcategory" id="title" placeholder="Category Name Here" required="">
                                </div>
                                </div>


                                
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" name="submit" id="submit_button" class="btn btn-success" value="Add" />
                                    <button type="reset" class="btn btn-default">Reset</button>
                                </div>
                        </form>

                
                        </div>
                    </div>
    </div>



</div>



<?php include 'include/footer.php' ?>



<script>
function getSubcat(val) {
	$.ajax({
	type: "POST",
	url: "get_cat.php",
	data:'cat_id='+val,
	success: function(data){
		$("#subcategory").html(data);
	}
	});
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>

</body>
</html>


