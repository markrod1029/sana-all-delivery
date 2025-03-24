<?php
include('include/config.php');


$cid = intval($_GET['cid']); ?>


<?php include('include/header.php'); ?>

<body class="cnt-home">



	<!-- ============================================== HEADER ============================================== -->
	<header class="header-style-1">
		<?php include('include/top-search.php'); ?>
		<?php include('include/menu-bar.php'); ?>

		<div class="body-content outer-top-xs">
			<div class='container'>
				<div class='row outer-bottom-sm'>
					<div class='col-md-3 sidebar'>
						<div class="side-menu animate-dropdown outer-bottom-xs">
							<div class="side-menu animate-dropdown outer-bottom-xs">

							</div>
						</div><!-- /.side-menu -->
						<!-- ================================== TOP NAVIGATION : END ================================== -->
						<div class="sidebar-module-container">
							<h3 class="section-title">shop by</h3>
							<div class="sidebar-filter">
								<!-- ============================================== SIDEBAR CATEGORY ============================================== -->
								<div class="sidebar-widget wow fadeInUp outer-bottom-xs ">
									<div class="widget-header m-t-20">
										<h4 class="widget-title"> Shop Sub Category</h4>
									</div>
									<div class="sidebar-widget-body m-t-10">
										<?php $sql = mysqli_query($conn, "SELECT * from subcategory WHERE categoryid = $cid ");
										while ($row = mysqli_fetch_array($sql)) {
										?>
											<div class="accordion">
												<div class="accordion-group">
													<div class="accordion-heading">
														<a href="sub-category.php?sid=<?php echo $row['id']; ?>" class="accordion-toggle collapsed">
															<?php echo $row['subcategory']; ?>
														</a>
													</div>
												</div>
											</div>
										<?php } ?>
									</div><!-- /.sidebar-widget-body -->
								</div><!-- /.sidebar-widget -->





							</div><!-- /.sidebar-filter -->
						</div><!-- /.sidebar-module-container -->
					</div><!-- /.sidebar -->
					<div class='col-md-9'>
						<!-- ========================================== SECTION – HERO ========================================= -->

						<div id="category" class="category-carousel hidden-xs">
							<div class="item">
								<div class="image">
									<img src="plugin/assets/images/banners/cat-banner-1.jpg" alt="" class="img-responsive">
								</div>
								<div class="container-fluid">
									<div class="caption vertical-top text-left">
										<div class="big-text">
											<br />
										</div>

										<?php $sql = mysqli_query($conn, "select categoryName  from category where id='$cid'");
										while ($row = mysqli_fetch_array($sql)) {
										?>

											<div class="excerpt hidden-sm hidden-md">
												<?php echo htmlentities($row['categoryName']); ?> PRODUCT SHOP
											</div>
										<?php } ?>

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
											$ret = mysqli_query($conn, "SELECT * FROM farmer WHERE shop_category = '$cid' ");
											$num = mysqli_num_rows($ret);
											if ($num > 0) {
												while ($row = mysqli_fetch_array($ret)) { ?>

													<div class="col-sm-6 col-md-4  fadeInUp">
														<div class="products">
															<div class="product">
																<div class="product-image">
																	<div class="image">
																		<a href="visit_shop.php?id=<?php echo $row['id']; ?>">
																			<img src="<?php echo (!empty($row['shop_logo'])) ? 'images/' . $row['shop_logo'] : '../images/admin.png'; ?>" data-echo="<?php echo (!empty($row['shop_logo'])) ? 'images/' . $row['shop_logo'] : '../images/admin.png'; ?>" width="120" height="250" alt="">
																		</a>
																	</div><!-- /.image -->
																</div><!-- /.product-image -->


																<div class="product-info text-left">
																	<h3 class="name"><a href="visit-shop.php?id=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['shop_name']); ?></a></h3>
																	<div class="rating rateit-small"></div>

																	<div class="description"></div>
																	<div class="action"><a href="visit_shop.php?id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Visit Shop</a></div>


																</div><!-- /.product-info -->




															</div>
														</div>
													</div>
												<?php }
											} else { ?>

												<div class="col-sm-6 col-md-4 wow fadeInUp">
													<h3>No Product Shop Found</h3>
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