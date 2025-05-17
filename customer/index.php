<?php
include('include/session.php');
if (isset($_GET['id'])) {
	$product_id = $_GET['id'];
	$sql_p = "SELECT * FROM products WHERE id={$product_id}";
	$query_p = mysqli_query($conn, $sql_p);
	if (mysqli_num_rows($query_p) != 0) {
		$row_p = mysqli_fetch_array($query_p);
		$shop_id = $row_p['shop_id'];
		$customer_id = $user['id'];
		$product_id = $_GET['id'];

		$insert = "INSERT INTO cart( shop_id, customer_id,  product_id, cart_quantity, cart_date)
					VALUES( '$shop_id', '$customer_id', '$product_id', '1', NOW())";
		$query = mysqli_query($conn, $insert);

		$_SESSION['success'] = '"Product has been added to the cart';
	} else {

		$_SESSION['error'] = '"Product ID is invalid';
	}
	echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
}


?>
<?php include('include/header.php'); ?>

<body class="cnt-home">



	<!-- ============================================== HEADER ============================================== -->
	<header class="header-style-1">
		<?php include('include/top-header.php'); ?>
		<?php include('include/main-header.php'); ?>
		<?php include('include/menu-bar.php'); ?>

		<div class="body-content outer-top-xs" id="top-banner-and-menu">
			<div class="container">
				<div class="furniture-container homepage-container">
					<div class="row">
						<div class="col-xs-12 col-lg-12 col homebanner-holder">
							<div id="hero" class="homepage-slider3">
								<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-lf">
									<!-- Image 1 -->
									<div class="item">
										<img src="../plugin/assets/sliders/sana-all.jpg" alt="Slider 1">
									</div>
									<!-- Image 2 -->
									<div class="item">
										<img src="../plugin/assets/sliders/sana-all-delivery.jpg" alt="Slider 2">
									</div>
								</div><!-- /.owl-carousel -->
							</div>
						</div>
					</div>

					<div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs wow fadeInUp">
						<div class="more-info-tab clearfix">
							<h3 class="new-product-title pull-left">Shops</h3>

						</div>

						<div class="tab-content outer-top-xs">
							<div class="tab-pane in active" id="all">
								<div class="product-slider">
									<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

										<?php
										$ret = mysqli_query($conn, "select * from shops");
										while ($row = mysqli_fetch_array($ret)) {
											# code...


										?>
											<div class="item item-carousel">
												<div class="products">

													<div class="product">
														<div class="product-image">
															<div class="image">
																<a href="visit_shop.php?id=<?php echo htmlentities($row['id']); ?>">
																	<img src="<?php echo (!empty($row['shop_logo'])) ? '../images/' . $row['shop_logo'] : '../images/admin.png'; ?>" data-echo="<?php echo (!empty($row['shop_logo'])) ? '../images/' . $row['shop_logo'] : '../images/admin.png'; ?>" width="130" height="250"  alt=""></a>
															</div>

														</div>


														<div class="product-info text-left" style="position:relative;left:18px;">
															<h3 class="name"><a href="visit_shop.php?id=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['shop_name']); ?></a></h3>
															<div class="rating rateit-small"></div>
															<div class="description"></div>
															<div class="action"><a href="visit_shop.php?id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Visit Shop</a></div>




														</div>

													</div>

												</div>
											</div>
										<?php } ?>




									</div>

								</div>
							</div>

							<?php include('include/script.php'); ?>

</body>

</html><!-- ✅ Updated CSS for Full Image Display -->
<style>
	#owl-main .item {
		display: flex;
		justify-content: center;
		align-items: center;
		width: 100%;
		height: 500px;
		/* Adjust height as needed */
	}

	#owl-main .item img {
		width: 100%;
		height: 160%;
	}
</style>