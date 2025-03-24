<div class="sidebar-widget hot-deals wow fadeInUp">
	<h3 class="section-title">hot deals</h3>
	<div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">
		
<?php
$ret=mysqli_query($conn,"select * from products order by rand() limit 4 ");
while ($rws=mysqli_fetch_array($ret)) {

?>

								        
													<div class="item">
					<div class="products">
						<div class="hot-deal-wrapper">
							<div class="image">
								<img  src="<?php echo (!empty($rws['photo1']))? '../images/'.$rws['photo1']:'../images/admin.png'; ?>" width="200" height="334" alt="">
							</div>
							
						</div><!-- /.hot-deal-wrapper -->

						<div class="product-info text-left m-t-20">
							<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($rws['id']);?>"><?php echo htmlentities($rws['productName']);?></a></h3>
							<div class="rating rateit-small"></div>

							<div class="product-price">	
								<span class="price">
								Php. <?php echo htmlentities($rws['productPrice']);?>.00
								</span>
									
							    <span class="price-before-discount">Php.<?php echo htmlentities($rws['productPriceBeforeDiscount']);?></span>					
							
							</div><!-- /.product-price -->
							
						</div><!-- /.product-info -->

						<div class="cart clearfix animate-effect">
							<div class="action">
								
								<div class="add-cart-button btn-group">
								<?php if($rws['productAvailability']=='Out of Stock' || $rws['quantity'] == 0  ){?>

									<div class="action" style="color:red">Out of Stock</div>
						
							
								<?php } else {?>

							<a href="category.php?page=product&action=add&id=<?php echo $rws['id']; ?>">
							<button class="btn btn-primary" type="button"> <i class="fa fa-shopping-cart"></i>	Add to cart</button></a>
					<?php } ?>
															
								</div>
								
							</div><!-- /.action -->
						</div><!-- /.cart -->
					</div>	
					</div>		
					<?php } ?>        
						
	    
    </div><!-- /.sidebar-widget -->
</div>
