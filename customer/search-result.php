<?php include('include/session.php');

$find = "%{$_POST['product']}%"; ?>
<?php include('include/header.php'); ?>

<body class="cnt-home">



	<!-- ============================================== HEADER ============================================== -->
	<header class="header-style-1">
		<?php include('include/top-header.php'); ?>
		<?php include('include/main-header.php'); ?>
		<?php include('include/menu-bar.php'); ?>
		</div><!-- /.breadcrumb -->
		<div class="body-content outer-top-xs">
			<div class='container'>
				<div class='row outer-bottom-sm'>
					<div class='col-md-3 sidebar'>
						<!-- ================================== TOP NAVIGATION ================================== -->
						<!-- <div class="side-menu animate-dropdown outer-bottom-xs">       
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i>Sub Categories</div>        
    <nav class="yamm megamenu-horizontal" role="navigation">
  
        <ul class="nav">
            <li class="dropdown menu-item">
              <?php $sql = mysqli_query($conn, "select id,subcategory  from subcategory");

				while ($row = mysqli_fetch_array($sql)) {
				?>
                <a href="sub-category.php?scid=<?php echo $row['id']; ?>" class="dropdown-toggle"><i class="icon fa fa-desktop fa-fw"></i>
                <?php echo $row['subcategory']; ?></a>
                <?php } ?>
                        
</li>
</ul>
    </nav>
</div>

</div> -->
						<!-- /.side-menu -->
						<!-- ================================== TOP NAVIGATION : END ================================== -->
						<div class="sidebar-module-container">
							<h3 class="section-title">shop by</h3>
							<div class="sidebar-filter">
								<!-- ============================================== SIDEBAR CATEGORY ============================================== -->
								<div class="sidebar-widget wow fadeInUp outer-bottom-xs ">
									<div class="widget-header m-t-20">
										<h4 class="widget-title">Category</h4>
									</div>
									<div class="sidebar-widget-body m-t-10">
										<?php $sql = mysqli_query($conn, "select id,categoryName  from category");
										while ($row = mysqli_fetch_array($sql)) {
										?>
											<div class="accordion">
												<div class="accordion-group">
													<div class="accordion-heading">
														<a href="category.php?cid=<?php echo $row['id']; ?>" class="accordion-toggle collapsed">
															<?php echo $row['categoryName']; ?> Product Shop
														</a>
													</div>
												</div>
											</div>
										<?php } ?>
									</div><!-- /.sidebar-widget-body -->
								</div><!-- /.sidebar-widget -->




								<!-- ============================================== COLOR: END ============================================== -->

							</div><!-- /.sidebar-filter -->
						</div><!-- /.sidebar-module-container -->
					</div><!-- /.sidebar -->
					<div class='col-md-9'>
						<!-- ========================================== SECTION – HERO ========================================= -->

						<div id="category" class="category-carousel hidden-xs">
							<div class="item">
								<div class="image">
									<img src="../plugin/assets/images/banners/cat-banner-3.jpg" alt="" class="img-responsive">
								</div>
								<div class="container-fluid">
									<div class="caption vertical-top text-left">
										<div class="big-text">
											<br />
										</div>



									</div><!-- /.caption -->
								</div><!-- /.container-fluid -->
							</div>
						</div>

						<div class="search-result-container">
							<div id="myTabContent" class="tab-content">
								<div class="tab-pane active " id="grid-container">
									<div class="category-product  inner-top-vs">
										<div class="row">
											<?php
											$ret = mysqli_query($conn, "select * from products where productName like '$find'");
											$num = mysqli_num_rows($ret);
											if ($num > 0) {
												while ($row = mysqli_fetch_array($ret)) { ?>
													<div class="col-sm-6 col-md-4 wow fadeInUp">
														<div class="products">
															<div class="product">
																<div class="product-image">
																	<div class="image">
																		<a href="product-details.php?pid=<?php echo $row['id']; ?>">
																			<img src="<?php echo (!empty($row['photo1'])) ? 'images/' . $row['photo1'] : '../images/admin.png'; ?>" data-echo="<?php echo (!empty($row['photo1'])) ? 'images/' . $row['photo1'] : '../images/admin.png'; ?>" width="200" height="300" alt="">
																		</a>
																	</div><!-- /.image -->
																</div><!-- /.product-image -->


																<div class="product-info text-left">
																	<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a></h3>
																	<div class="rating rateit-small"></div>
																	<div class="description"></div>

																	<div class="product-price">
																		<span class="price">
																			Rs. <?php echo htmlentities($row['productPrice']); ?> </span>
																		<span class="price-before-discount">Rs.<?php echo htmlentities($row['productPriceBeforeDiscount']); ?></span>

																	</div><!-- /.product-price -->

																</div><!-- /.product-info -->
																<div class="cart clearfix animate-effect">
																	<div class="action">
																		<ul class="list-unstyled">
																			<li class="add-cart-button btn-group">
																				<?php if ($row['productAvailability'] == 'In Stock') { ?>
																					<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																						<i class="fa fa-shopping-cart"></i>
																					</button>
																					<a href="category.php?page=product&action=add&id=<?php echo $row['id']; ?>">
																						<button class="btn btn-primary" type="button">Add to cart</button></a>
																				<?php } else { ?>
																					<div class="action" style="color:red">Out of Stock</div>
																				<?php } ?>

																			</li>

																			<li class="lnk wishlist">
																				<a class="add-to-cart" href="category.php?pid=<?php echo htmlentities($row['id']) ?>&&action=wishlist" title="Wishlist">
																					<i class="icon fa fa-heart"></i>
																				</a>
																			</li>


																		</ul>
																	</div><!-- /.action -->
																</div><!-- /.cart -->
															</div>
														</div>
													</div>
												<?php }
											} else { ?>

												<div class="col-sm-6 col-md-4 wow fadeInUp">
													<h3>No Product Found</h3>
												</div>

											<?php } ?>










										</div><!-- /.row -->
									</div><!-- /.category-product -->

								</div><!-- /.tab-pane -->



							</div><!-- /.search-result-container -->

						</div><!-- /.col -->
					</div>
				</div>

			</div>
		</div>
		<?php include('include/script.php'); ?>


</body>

</html>