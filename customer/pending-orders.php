<?php
include('include/session.php');
?>


<?php include('include/header.php'); ?>
<script language="javascript" type="text/javascript">
	var popUpWin = 0;

	function popUpWindow(URLStr, left, top, width, height) {
		if (popUpWin) {
			if (!popUpWin.closed) popUpWin.close();
		}
		popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 600 + ',height=' + 600 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
	}
</script>

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
												<th class="cart-romove item">#</th>
												<th class="cart-description item">Image</th>
												<th class="cart-description item">Order ID</th>
												<th class="cart-product-name item">Product Name</th>

												<th class="cart-qty item">Quantity</th>
												<th class="cart-sub-total item">Price Per unit</th>
												<th class="cart-sub-total item">Shipping Charge</th>
												<th class="cart-total item">Grandtotal</th>
												<th class="cart-total item">Payment Method</th>
												<th class="cart-total item">Status</th>
												<th class="cart-description item">Order Date</th>
												<th class="cart-total last-item">Action</th>
											</tr>
										</thead><!-- /thead -->

										<tbody>

											<?php
											$id = $user['id'];
											$query = mysqli_query($conn, "SELECT *, products.id AS pid FROM products LEFT JOIN orders ON products.id = orders.product_id 
WHERE orders.orderStatus = 'Pending' OR orders.orderStatus = 'In Process' OR orders.orderStatus = 'Pick Up' AND orders.customer_id = '$id'");
											$cnt = 1;
											while ($row = mysqli_fetch_array($query)) {


												if ($row["orderStatus"] == 'Pending') {
													$status = '<span  style="font-size:15px; ">' . $row["orderStatus"] . '</span>';
												}

												if ($row["orderStatus"] == 'In Process') {
													$status = '<span  style="font-size:15px;">' . $row["orderStatus"] . '</span>';
												}

												if ($row["orderStatus"] == 'Delivered') {
													$status = '<span  style="font-size:15px;">' . $row["orderStatus"] . '</span>';
												}
												if ($row["orderStatus"] == 'Cancel') {
													$status = '<span style="font-size:15px;">' . $row["orderStatus"] . '</span>';
												}
												if ($row["orderStatus"] == 'Pick Up') {
													$status = '<span style="font-size:15px;">' . $row["orderStatus"] . '</span>';
												}



											?>
												<tr>
													<td><?php echo $cnt; ?></td>
													<td class="cart-image">
														<a class="entry-thumbnail" href="detail.html">
															<img src="<?php echo (!empty($row['photo1'])) ? '../images/' . $row['photo1'] : '../images/admin.png'; ?>" data-echo="<?php echo (!empty($row['photo1'])) ? '../images/' . $row['photo1'] : '../images/admin.png'; ?>" alt="" width="84" height="146">
														</a>
													</td>
													<td class="cart-product-sub-total"><?php echo $row['order_id']; ?> </td>

													<td class="cart-product-name-info">
														<h4 class='cart-product-description'><a href="product-details.php?pid=<?php echo $row['pid']; ?>">
																<?php echo $row['productName']; ?></a></h4>


													</td>
													<td class="cart-product-quantity">
														<?php echo $qty = $row['total_quantity']; ?>
													</td>
													<td class="cart-product-sub-total"><?php echo $price = $row['total_pay']; ?> </td>
													<td class="cart-product-sub-total"><?php echo $shippcharge = $row['shippingCharge']; ?> </td>
													<td class="cart-product-grand-total"><?php echo (($qty * $price) + $shippcharge); ?></td>
													<td class="cart-product-sub-total"><?php echo $row['paymentMethod']; ?> </td>
													<td class="cart-product-sub-total"><?php echo $status; ?> </td>
													<td class="cart-product-sub-total"><?php echo $row['orderDate']; ?> </td>

													<td>
														<a href="view-order.php?id=<?php echo htmlentities($row['order_id']); ?>" title="Track order">
															Track
													</td>
												</tr>
											<?php $cnt = $cnt + 1;
											} ?>

										</tbody><!-- /tbody -->
									</table><!-- /table -->

							</div>
						</div>

					</div><!-- /.shopping-cart -->
				</div> <!-- /.row -->
				</form>



			</div>
			<?php include('include/script.php'); ?>