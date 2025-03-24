<div class="main-header">
	<div class="container">
		<div class="row align-items-center">
			<!-- Logo Section -->
			<div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
				<div class="logo">
					<a href="index.php">
						<h4 style="color:#FDB21B; font-weight: bold;">SANA ALL DELIVERY</h4>
					</a>
				</div>
			</div>

			<!-- Search Bar Section -->
			<!-- <div class="col-xs-12 col-sm-12col-md-6 top-search-holder"> -->
			<div class="col-md-6 col-12  col-md-6 top-search-holder">

				<div class="search-area">
					<form name="search" method="post" action="search-result.php" class="d-flex w-100">
						<input type="text" class="search-field form-control w-100"
							style="height: 45px; font-size: 16px; padding: 10px; border-radius: 5px; border: 1px solid #ccc;"
							placeholder="Search products..." name="product" required />


					</form>

					<!-- Login Buttons -->

				</div><!-- /.search-area -->

				<div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row">
				</div><!-- /.row -->

			</div><!-- /.container -->
			<div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row">
				<!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
				<?php

				$cuid = $user['id'];
				$view = "SELECT *, cart.id AS cart_id from cart
 LEFT JOIN products ON products.id = cart.product_id where cart.customer_id = '$cuid'";
				$result = $conn->query($view);
				$total = mysqli_num_rows($result);
				if (mysqli_num_rows($result) != 0) {
				?>
					<div class="dropdown dropdown-cart">
						<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
							<div class="items-cart-inner">
								<div class="total-price-basket">
									<span class="lbl">cart -</span>
									<span class="total-price">
										<span class="sign">Php.<?php echo $_SESSION['tp'] ?></span>
										<span class="value"><?php
															//  echo $_SESSION['tp']; 
															?></span>
									</span>
								</div>
								<div class="basket">
									<i class="glyphicon glyphicon-shopping-cart"></i>
								</div>
								<div class="basket-item-count"><span class="count"><?php echo $total; ?></span></div>

							</div>
						</a>
						<ul class="dropdown-menu">



							<?php
							$totalprice = 0;
							$totalqunty = 0;
							while ($view = mysqli_fetch_array($result)) {
								$quantity = $view['cart_quantity'];

								$subtotal = $quantity * $view['productPrice'] + $view['shippingCharge'];
								$totalprice += $subtotal;
								$_SESSION['qnty'] = $totalqunty += $quantity;

							?>




								<li>
									<div class="cart-item product-summary">
										<div class="row">
											<div class="col-xs-4">
												<div class="image">
													<a href="product-details.php?pid=<?php echo $view['id']; ?>"><img src="<?php echo (!empty($view['photo1'])) ? '../images/' . $view['photo1'] : '../images/admin.png'; ?>" width="35" height="50" alt=""></a>
												</div>
											</div>
											<div class="col-xs-7">

												<h3 class="name"><a href="product-details.php?pid=<?php echo $view['id']; ?>"><?php echo $view['productName']; ?></a></h3>
												<div class="price">Php.<?php echo ($view['productPrice'] + $view['shippingCharge']) * $quantity; ?></div><br>
											</div>

										</div>
									</div><!-- /.cart-item -->


								<?php } ?>

								<div class="clearfix"></div>
								<hr>

								<div class="clearfix cart-total">
									<div class="pull-right">

										<span class="text">Total :</span><span class='price'>Php.<?php echo $_SESSION['tp'] = "$totalprice" . ".00"; ?></span>

									</div>

									<div class="clearfix"></div>

									<a href="my-cart.php" class="btn btn-upper btn-primary btn-block m-t-20">My Cart</a>
								</div><!-- /.cart-total-->


								</li>
						</ul><!-- /.dropdown-menu-->
					</div><!-- /.dropdown-cart -->
				<?php } else { ?>
					<div class="dropdown dropdown-cart">
						<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
							<div class="items-cart-inner">
								<div class="total-price-basket">
									<span class="lbl">cart -</span>
									<span class="total-price">
										<span class="sign">Php.</span>
										<span class="value">00.00</span>
									</span>
								</div>
								<div class="basket">
									<i class="glyphicon glyphicon-shopping-cart"></i>
								</div>
								<div class="basket-item-count"><span class="count">0</span></div>

							</div>
						</a>
						<ul class="dropdown-menu">




							<li>
								<div class="cart-item product-summary">
									<div class="row">
										<div class="col-xs-12">
											Your Shopping Cart is Empty.
										</div>


									</div>
								</div><!-- /.cart-item -->


								<hr>

								<div class="clearfix cart-total">

									<div class="clearfix"></div>

									<a href="index.php" class="btn btn-upper btn-primary btn-block m-t-20">Continue Shooping</a>
								</div><!-- /.cart-total-->


							</li>
						</ul><!-- /.dropdown-menu-->
					</div>
				<?php } ?>




				<!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
			</div><!-- /.top-cart-row -->
		</div><!-- /.row -->

	</div><!-- /.container -->

</div>