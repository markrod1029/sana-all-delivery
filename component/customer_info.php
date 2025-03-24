<div class="sidebar-widget hot-deals wow ">
	<h3 class="section-title">Your Information</h3>
	<div class="owl-carouselcustom-carousel owl-theme outer-top-xs">
		


								        
													<div class="item">
					<div class="products">
						<div class="hot-deal-wrapper">
							<div class="image">
								<img  src="<?php echo (!empty($user['photo1']))? '../images/'.$user['photo1']:'../images/admin.png'; ?>" width="200" height="200" alt="">
							</div>
							
						</div><!-- /.hot-deal-wrapper -->

						<div class="product-info text-left m-t-20">
							<h3 class="name">Customer Id: <?php echo htmlentities($user['customer_id']);?></h3>

							<h3 class="name">Name: <?php echo htmlentities($user['name']);?></h3>
							<h3 class="name">Contact: <?php echo htmlentities($user['customer_number']);?></h3>
							<h3 class="name">Address: <?php echo htmlentities($user['customer_address']);?></h3>

                         
							
						</div><!-- /.product-info -->

					</div>	
					</div>		
						
	    
    </div><!-- /.sidebar-widget -->
</div>
