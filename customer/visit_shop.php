<?php
include('include/session.php');

?>
<?php include('include/header.php'); ?>

<body class="cnt-home">



	<!-- ============================================== HEADER ============================================== -->
	<header class="header-style-1">
		<?php include('include/top-header.php'); ?>
		<?php include('include/main-header.php'); ?>
		<?php include('include/menu-bar.php'); ?>

		<div class="body-content ">
			<div class='container'>
				<div class='row   '>

					<div class='col-sm-4 wow'>



						<?php include('component/farmer_shop.php'); ?>
						<br>
						<?php include('component/category_farmer.php'); ?>

					</div>
					<br>
					<br>


					<?php
					$ret = mysqli_query($conn, "SELECT * from products WHERE farmer_id = '$id'");
					while ($row = mysqli_fetch_array($ret)) { ?>

						<div class="col-sm-2 mt-4 wow1">



							<div class="item item-carousel mx-auto farmer_product">
								<div class="products">

									<div class="product ">
										<div class="product-image">
											<div class="image">
												<a href="product-details.php?pid=<?php echo $row['id']; ?>">
													<img class="images" style="position:relative; top:20px;" src="<?php echo (!empty($row['photo1'])) ? '../images/' . $row['photo1'] : '../images/admin.png'; ?>" data-echo="<?php echo (!empty($row['photo1'])) ? '../images/' . $row['photo1'] : '../images/admin.png'; ?>" width="140" height="220" alt=""></a>
											</div><!-- /.image -->


										</div><!-- /.product-image -->


										<div class="product-info text-left" style="margin-top:40px;">
											<h4 class="name"><a href="product-details.php?pid=<?php echo $row['id']; ?>"><?php echo $row['productName']; ?></a></h4>
											<div class="rating rateit-small"></div>
											<div class="description"></div>


											<div class="product-price">
												<span class="price">
													Quantity: <?php echo htmlentities($row['quantity']); ?></span>

											</div><!-- /.product-price -->



											<div class="product-price">
												<span class="price">
													₱<?php echo htmlentities($row['productPrice']); ?></span>
												<span class="price-before-discount">₱<?php echo htmlentities($row['productPriceBeforeDiscount']); ?> </span>

											</div><!-- /.product-price -->

										</div><!-- /.product-info -->

										<?php if ($row['productAvailability'] == 'Out of Stock' || $row['quantity'] == 0) { ?>
											<div class="action" style="color:red">Out of Stock</div>

										<?php } else { ?>
											<div class="action"><a href="category.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">Add to Cart</a></div>

										<?php } ?>
									</div><!-- /.product -->

								</div><!-- /.products -->
							</div>




						</div>
					<?php } ?>





				</div>
			</div>


		</div><!-- /.section -->


		</div>
		</div>
		<?php include('include/script.php'); ?>
</body>

</html>