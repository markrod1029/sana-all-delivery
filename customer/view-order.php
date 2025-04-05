<?php
include('include/session.php');
?>


<?php include('include/header.php'); ?>

<body class="cnt-home">
	<header class="header-style-1">
		<?php include('include/top-header.php'); ?>
		<?php include('include/main-header.php'); ?>
		<?php include('include/menu-bar.php'); ?>

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
		<div class="body-content outer-top-xs">
			<div class="container">
				<div class="row inner-bottom-sm">
					<div class="shopping-cart">
						<div class="col-md-12 col-sm-12 shopping-cart-table ">
							<div class="table-responsive">
								<form name="cart" method="post">

									<table class="table table-bordered">
										<thead>
											<tr>
												<th class="cart-description item">Order ID</th>
												<th class="cart-description item">Status</th>
												<th class="cart-product-name item">Location</th>

												<th class="cart-qty item">remark</th>
												<th class="cart-sub-total item">Date</th>
											</tr>
										</thead><!-- /thead -->

										<tbody>

											<?php
											$id = $_GET['id'];
											$query = mysqli_query($conn, "SELECT * FROM ordertrackhistory WHERE order_id = '$id'");
											$cnt = 1;
											$num = mysqli_num_rows($query);
											if ($num > 0) {
												while ($row = mysqli_fetch_array($query)) {


													if ($row["status"] == 'Pending') {
														$status = '<span  style="font-size:15px;">' . $row["status"] . '</span>';
													}

													if ($row["status"] == 'In Process') {
														$status = '<span  style="font-size:15px;">' . $row["status"] . '</span>';
													}

													if ($row["status"] == 'Delivered') {
														$status = '<span  style="font-size:15px;">' . $row["status"] . '</span>';
													}
													if ($row["status"] == 'Cancel') {
														$status = '<span style="font-size:15px;">' . $row["status"] . '</span>';
													}



											?>
													<tr>

														<td class="cart-product-sub-total"><?php echo $price = $row['order_id']; ?> </td>
														<td class="cart-product-sub-total"><?php echo $row['status']; ?> </td>
														<td class="cart-product-sub-total"><?php echo $shippcharge = $row['shop_location']; ?> </td>
														<td class="cart-product-sub-total"><?php echo $row['remark']; ?> </td>
														<td class="cart-product-sub-total"><?php echo $row['postingDate']; ?> </td>
													</tr>
												<?php
												}
											} else { ?>
												<tr>
													<td colspan="8">Wait to Accept your Order</td>
												</tr>
											<?php
											}
											?>

										</tbody><!-- /tbody -->
									</table><!-- /table -->

							</div>
						</div>

					</div><!-- /.shopping-cart -->
				</div> <!-- /.row -->
				</form>



			</div>
			<?php include('include/script.php'); ?>