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
		<?php include('component/toast.php'); ?>

	</header>
	<!-- ============================================== HEADER : END ============================================== -->
	<div class="breadcrumb">
		<div class="container">
			<div class="breadcrumb-inner">
				<ul class="list-inline list-unstyled">
					<li><a href="#">Home</a></li>
					<li class='active'>Shopping Cart</li>
				</ul>
			</div><!-- /.breadcrumb-inner -->
		</div><!-- /.container -->
	</div><!-- /.breadcrumb -->



	<?php
	if (isset($_SESSION['error'])) {
		echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
		unset($_SESSION['error']);
	}
	if (isset($_SESSION['success'])) {
		echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
		unset($_SESSION['success']);
	}
	?>

	<div class="body-content outer-top-xs">
		<div class="container">
			<div class="row inner-bottom-sm">
				<div class="shopping-cart">
					<div class="col-md-12 col-sm-12 shopping-cart-table ">
						<div class="table-responsive">


							<form action="crud/order.php?id=<?php echo $user['id'] ?>" name="cart" method="post">

								<?php
								$cuid = $user['id'];
								$view1 = "SELECT *, cart.id AS cart_id from cart
							LEFT JOIN products ON products.id = cart.product_id where cart.customer_id = '$cuid'";
								$result = $conn->query($view1);
								$total = mysqli_num_rows($result);

								if (mysqli_num_rows($result) != 0) {

								?>



									<table class="table table-bordered">
										<thead>
											<tr>
												<th class="cart-romove item">Remove</th>
												<th class="cart-description item">Image</th>
												<th class="cart-product-name item">Product Name</th>

												<th class="cart-qty item">Quantity</th>
												<th class="cart-sub-total item">Price Per unit</th>
												<th class="cart-total last-item">Grandtotal</th>
											</tr>
										</thead><!-- /thead -->



										<?php
										$totalprice = 0;
										$totalqunty = 0;
										while ($view1 = mysqli_fetch_array($result)) {
											$quantity = $view1['cart_quantity'];

											$subtotal = $quantity * $view1['productPrice'] + $view1['shippingCharge'];
											$totalprice += $subtotal;


										?>

											<tr>
												<td class="romove-item">
													<a href="crud/delete_cart.php?id=<?php echo $view1['cart_id'] ?>" name="update" class="btn-upper btn btn-danger  checkout-page-button" style="color:white; font-size:12px;">Delete</a>

												</td>
												<td class="cart-image">
													<a class="entry-thumbnail" href="product-details.php?pid=<?php echo $view1['id'] ?>">
														<img src="<?php echo (!empty($view1['photo1'])) ? '../images/' . $view1['photo1'] : '../images/admin.png'; ?>" alt="" width="114" height="146">
													</a>
												</td>
												<td class="cart-product-name-info">

													<h4 class='cart-product-description'><a href="product-details.php?pid=<?php echo htmlentities($pd = $view1['id']); ?>"><?php echo $view1['productName'];

																																										?></a> <?php echo htmlentities($view1['productDescription']); ?>
						</div>
						</h4>


						<!-- /.row -->

						</td>


						<td class="cart-product-quantity">
							<div class="quant-input">
								<div class="arrows">
									<div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
									<div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
								</div>
								<input type="text" value="<?php echo $view1['cart_quantity']; ?>" name="quantity[]">


							</div>
						</td>
						<td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo "Php" . " " . $view1['productPrice']; ?>.00</span></td>
						<td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php echo $pid = ($quantity * $view1['productPrice'] + $view1['shippingCharge']); ?>.00</span></td>
						<input type="hidden" name="pid[]" value="<?php echo $pid; ?>">
						<input type="hidden" value="<?php echo $view1['shop_id']; ?>" name="farmer[]">
						<input type="hidden" value="<?php echo $view1['product_id']; ?>" name="product[]">
						<input type="hidden" value="<?php echo $view1['cart_id']; ?>" name="cart_id[]">
						<input type="hidden" value="<?php echo $view1['cart_quantity']; ?>" name="cart_quantity[]">


						</tr>



					<?php  }
					?>


					<tfoot>
						<tr>
							<td colspan="7">
								<div class="shopping-cart-btn">
									<a href="index.php" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>


									<input type="submit" name="update" value="Update shopping cart" class="btn btn-upper btn-primary pull-right outer-right-xs">


							</td>
						</tr>
					</tfoot>
					</table>


					</table><!-- /table -->

					</div>
				</div><!-- /.shopping-cart-table -->
				<div class="col-md-4 col-sm-12 estimate-ship-tax">

				</div>


				<div class="col-md-4 col-sm-12 estimate-ship-tax">

				</div>



				<div class="col-md-4 col-sm-12 cart-shopping-total">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>

									<div class="cart-grand-total">
										Grand Total<span class="inner-left-md"><?php echo $_SESSION['tp'] = "$totalprice" . ".00"; ?></span>
									</div>
								</th>
							</tr>
						</thead><!-- /thead -->
						<tbody>
							<tr>
								<td>
									<div class="cart-checkout-btn pull-right">

										<button type="submit" name="ordersubmit" class="btn btn-primary">PROCCED TO CHEKOUT</button>
									</div>
								</td>
							</tr>
						</tbody><!-- /tbody -->
					</table>


				<?php
								} else {
									echo "Your shopping Cart is empty";
								} ?>



				</div>
			</div>
		</div>



		</form>
	</div>
	</div>
	<?php include('include/script.php'); ?>