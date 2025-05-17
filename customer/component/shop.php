<div class="sidebar-widget hot-deals wow ">
<center><h3 class="section-title">Shop</h3></center>
	<div class="owl-carousel sidebar-carousel custom-carousel owl-theme ">
		
<?php
$id = $_GET['id'];
$ret=mysqli_query($conn,"SELECT * from shops WHERE id ='$id' ");
while ($rws=mysqli_fetch_array($ret)) {

?>

								        
													<div class="item">
					<div class="products">
						<div class="hot-deal-wrapper">
							<div class="image">
							<center><img  src="<?php echo (!empty($rws['shop_logo']))? '../images/'.$rws['shop_logo']:'../images/admin.png'; ?>" width="200" height="334" alt="" ></center>
							</div>
							
						</div><!-- /.hot-deal-wrapper -->

						<div class="product-info text-left m-t-20">
						<center><h3 class="name">Shop Name: <?php echo $rws['shop_name'];?></h3></center>

							
							
						</div><!-- /.product-info -->

						
					</div>	
					</div>		
					<?php } ?>        
						
	    
    </div><!-- /.sidebar-widget -->
</div>
