<?php
session_start();
error_reporting(0);
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

$pid = intval($_GET['pid']);

?>

<body class="cnt-home">
	<?php include('include/header.php'); ?>

	<header class="header-style-1">

		<?php include('include/top-header.php'); ?>
		<?php include('include/main-header.php'); ?>
		<?php include('include/menu-bar.php'); ?>

	</header>

	<div class="breadcrumb">
		<div class="container">
			<div class="breadcrumb-inner">
				<?php
				$ret = mysqli_query($conn, "SELECT category.categoryName as
 catname,subCategory.subcategory as subcatname,products.productName as
  pname from products join category on category.id=products.category 
  join subcategory on subcategory.id=products.subCategory_id where products.id='$pid'");
				while ($rw = mysqli_fetch_array($ret)) {

				?>


					<ul class="list-inline list-unstyled">
						<li><a href="index.php">Home</a></li>
						<li><?php echo htmlentities($rw['catname']); ?></a></li>
						<li><?php echo htmlentities($rw['subcatname']); ?></li>
						<li class='active'><?php echo htmlentities($rw['pname']); ?></li>
					</ul>
				<?php } ?>
			</div><!-- /.breadcrumb-inner -->
		</div><!-- /.container -->
	</div><!-- /.breadcrumb -->
	<div class="body-content outer-top-xs">
		<div class='container'>
			<div class='row single-product outer-bottom-sm '>
				<div class='col-md-3 sidebar'>
					<div class="sidebar-module-container">



						<?php include('component/category.php'); ?>
						<?php include('component/hot_deals.php'); ?>

					</div>
				</div><!-- /.sidebar -->
				<?php
				$ret = mysqli_query($conn, "select * from products where id='$pid'");
				while ($row = mysqli_fetch_array($ret)) {

				?>


					<div class='col-md-9'>
						<div class="row  wow fadeInUp">
							<div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
								<div class="product-item-holder size-big single-product-gallery small-gallery">

									<div id="owl-single-product">

										<div class="single-product-gallery-item" id="slide1">
											<a data-lightbox="image-1" data-title="<?php echo htmlentities($row['productName']); ?>" href="../images/<?php echo htmlentities($row['photo1']); ?>">
												<img class="img-responsive" alt="" src="<?php echo (!empty($row['photo1'])) ? '../images/' . $row['photo1'] : '../images/admin.png'; ?>" data-echo="<?php echo (!empty($row['photo1'])) ? '../images/' . $row['photo1'] : '../images/admin.png'; ?>" style="height:350px;" />
											</a>
										</div>

									</div><!-- /.single-product-slider -->

								</div>
							</div>




							<?php include('component/product_description.php'); ?>
							<?php include('component/customer_review.php');

							?>

						<?php
						$cid = $row['category'];
						$subcid = $row['subCategory_id'];
					} ?>

						<?php include('component/related_product.php'); ?>




						</div><!-- /.home-owl-carousel -->
						</section><!-- /.section -->



					</div>
					<div class="clearfix"></div>
			</div>

		</div>
	</div>
	<?php include('include/script.php'); ?>
</body>

</html>