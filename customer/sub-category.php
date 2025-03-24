<?php
include('include/session.php');
if (isset($_GET['id'])) {
	$product_id = $_GET['id'];
	$sql_p = "SELECT * FROM products WHERE id={$product_id}";
	$query_p = mysqli_query($conn, $sql_p);
	if (mysqli_num_rows($query_p) != 0) {
		$row_p = mysqli_fetch_array($query_p);
		$farmer_id = $row_p['farmer_id'];
		$customer_id = $user['id'];
		$product_id = $_GET['id'];

		$insert = "INSERT INTO cart( farmer_id, customer_id,  product_id, cart_quantity, cart_date)
					VALUES( '$farmer_id', '$customer_id', '$product_id', '1', NOW())";
		$query = mysqli_query($conn, $insert);

		$_SESSION['success'] = '"Product has been added to the cart';
	} else {

		$_SESSION['error'] = '"Product ID is invalid';
	}
	echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
}

$sid = intval($_GET['sid']); ?>


<?php include('include/header.php'); ?>

<body class="cnt-home">



	<!-- ============================================== HEADER ============================================== -->
	<header class="header-style-1">
		<?php include('include/top-header.php'); ?>
		<?php include('include/main-header.php'); ?>
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
										<h4 class="widget-title">Farmer Shop Category</h4>
									</div>
									<div class="sidebar-widget-body m-t-10">
										<?php $sql = mysqli_query($conn, "SELECT * from category ");
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
									<img src="assets/images/banners/cat-banner-2.jpg" alt="" class="img-responsive">
								</div>
								<div class="container-fluid">
									<div class="caption vertical-top text-left">
										<div class="big-text">
											<br />
										</div>

										<?php $sql = mysqli_query($conn, "SELECT * from subcategory where id='$sid'");
										while ($row = mysqli_fetch_array($sql)) {
										?>

											<div class="excerpt hidden-sm hidden-md">
												<?php echo htmlentities($row['subcategory']); ?> PRODUCT
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
											$ret = mysqli_query($conn, "SELECT *, products.id AS pid FROM products 
LEFT JOIN subcategory ON subcategory.id =  products.subCategory_id  WHERE products.subCategory_id='$sid'");
											$num = mysqli_num_rows($ret);
											if ($num > 0) {
												while ($row = mysqli_fetch_array($ret)) { ?>
													<div class="col-sm-6 col-md-4 wow fadeInUp">
														<div class="products">
															<div class="product">
																<div class="product-image">
																	<div class="image">
																		<a href="product-details.php?pid=<?php echo $row['pid']; ?>">
																			<img src="<?php echo (!empty($row['photo1'])) ? '../images/' . $row['photo1'] : '../images/admin.png'; ?>" data-echo="<?php echo (!empty($row['photo1'])) ? '../images/' . $row['photo1'] : '../images/admin.png'; ?>" width="200" height="300" alt="">
																		</a>
																	</div><!-- /.image -->
																</div><!-- /.product-image -->


																<div class="product-info text-left">
																	<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a></h3>
																	<div class="rating rateit-small"></div>
																	<div class="description"></div>

																	<div class="product-price">
																		<span class="price">
																			Php. <?php echo htmlentities($row['productPrice']); ?> </span>
																		<span class="price-before-discount">Php. <?php echo htmlentities($row['productPriceBeforeDiscount']); ?></span>

																	</div><!-- /.product-price -->

																</div><!-- /.product-info -->
																<div class="cart clearfix animate-effect">
																	<div class="action">
																		<ul class="list-unstyled">
																			<li class="add-cart-button btn-group">

																				<?php if ($row['productAvailability'] == 'Out of Stock' || $row['quantity'] == 0) { ?>

																					<div class="action" style="color:red">Out of Stock</div>

																				<?php } else { ?>

																					<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																						<i class="fa fa-shopping-cart"></i>
																					</button>
																					<a href="category.php?id=<?php echo $row['pid']; ?>">
																						<button class="btn btn-primary" type="button">Add to cart</button></a>
																				<?php } ?>

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