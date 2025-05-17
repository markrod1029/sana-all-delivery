
	<?php 
	session_start();
	?>


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


				<!-- Login Buttons -->
				<div class="col-md-3 col-12">
					<div class="d-flex justify-content-between gap-2">

                    <?php if (isset($_SESSION['admin']) && strlen($_SESSION['admin']) > 0) { ?>
					
							<a href="admin/home.php" class="btn btn-primary btn-lg w-50 shop-login">Dashboard</a>


							<?php } else if (isset($_SESSION['customer']) && strlen($_SESSION['customer']) > 0) { ?>
							<a href="customer_login.php" class="btn btn-primary btn-lg w-50 shop-login">Dashboard</a>

						<?php } else if(isset($_SESSION['customer']) && strlen($_SESSION['customer']) > 0){?>


						<?php } else {
						?>
							<a href="rider_login.php" class="btn btn-primary btn-lg w-50 shop-login">Rider Login</a>
						
							<a href="customer_login.php" class="btn btn-primary btn-lg w-50 shop-login">Customer Login</a>

						<?php } ?>

					</div>
				</div>

			</div>

			<style>
				.main-header .top-search-holder .search-area {
					border: none !important;
					-webkit-border-radius: 0px;
					-moz-border-radius: 0px;
					border-radius: 0px;
					margin: 8px 0 0;
				}

				.shop-login {
					background-color: #FDB21B;
					color: #fff;
					border: none;
					margin-top: 5px;
				}
			</style>