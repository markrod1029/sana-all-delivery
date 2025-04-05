<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
<center><h3 class="section-title">Shop Sub Category</h3> </center>
	<div class="sidebar-widget-body m-t-10">
		<div class="accordion">

		            <?php 
					$id = $_GET['id'];
					$sql=mysqli_query($conn,"SELECT *, subcategory.id AS sid FROM subcategory LEFT JOIN category 
					ON category.id = subcategory.categoryid WHERE shop_id = '$id' ");
while($row=mysqli_fetch_array($sql))
{
    ?>
	    	<div class="accordion-group">
	            <div class="accordion-heading">
	              <center>  <a href="sub-category.php?sid=<?php echo $row['sid'];?>"  class="accordion-toggle collapsed">
	                  <h5> <?php echo $row['subcategory'];?></h5>
	                </a></center>
	            </div>
	          
	        </div>
	        <?php } ?>
	    </div>
	</div>
</div>