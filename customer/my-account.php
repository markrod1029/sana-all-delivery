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
						<li class='active'>Checkout</li>
					</ul>
				</div><!-- /.breadcrumb-inner -->
			</div><!-- /.container -->
		</div><!-- /.breadcrumb -->

		<div class="body-content outer-top-bd">
			<div class="container">
				<div class="checkout-box inner-bottom-sm">
					<div class="row">
						<div class="col-md-8">
							<div class="panel-group checkout-steps" id="accordion">
								<!-- checkout-step-01  -->


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
								<div class="panel panel-default checkout-step-01">

									<!-- panel-heading -->
									<div class="panel-heading">
										<h4 class="unicase-checkout-title">
											<a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
												<span>1</span>My Profile
											</a>
										</h4>
									</div>
									<!-- panel-heading -->

									<div id="collapseOne" class="panel-collapse collapse in">

										<!-- panel-body  -->
										<div class="panel-body">
											<div class="row">
												<h4>Personal info</h4>
												<div class="col-md-12 col-sm-12 already-registered-login">


													<form class="register-form" action="crud/customer-update.php" role="form" method="post">
														<div class="form-group">
															<label class="info-title" for="name">Name<span>*</span></label>
															<input type="text" class="form-control unicase-form-control text-input" value="<?php echo $user['name']; ?>" id="name" name="name" required="required">
														</div>



														<div class="form-group">
															<label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
															<input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="<?php echo $user['email']; ?>" readonly>
														</div>
														<div class="form-group">
															<label class="info-title" for="Contact No.">Contact No. <span>*</span></label>
															<input type="text" class="form-control unicase-form-control text-input" id="contactno" name="contactno" required="required" value="<?php echo $user['customer_number']; ?>" maxlength="10">
														</div>

														<div class="form-group">
															<label class="info-title" for="Contact No.">Shiping Address <span>*</span></label>
															<input type="text" class="form-control unicase-form-control text-input" id="contactno" name="shipaddress" required="required" value="<?php echo $user['customer_address']; ?>" maxlength="10">
														</div>

														<div class="form-group">
															<label class="info-title" for="Contact No.">Billing Addresss. <span>*</span></label>
															<input type="text" class="form-control unicase-form-control text-input" id="contactno" name="billaddress" required="required" value="<?php echo $user['billingAddress']; ?>" maxlength="10">
														</div>
														<button type="submit" name="update" class="btn-upper btn btn-primary checkout-page-button">Update</button>
													</form>
												</div>
												<!-- already-registered-login -->

											</div>
										</div>
										<!-- panel-body  -->

									</div><!-- row -->
								</div>
								<!-- checkout-step-01  -->
								<!-- checkout-step-02  -->
								<div class="panel panel-default checkout-step-02">
									<div class="panel-heading">
										<h4 class="unicase-checkout-title">
											<a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">
												<span>2</span>Change Password
											</a>
										</h4>
									</div>
									<div id="collapseTwo" class="panel-collapse collapse">
										<div class="panel-body">

											<form class="register-form" action="crud/password-change.php" role="form" method="post">
												<div class="form-group">
													<label class="info-title" for="Current Password">Current Password<span>*</span></label>
													<input type="password" class="form-control unicase-form-control text-input" id="cpass" name="cpass" required="required">
												</div>



												<div class="form-group">
													<label class="info-title" for="New Password">New Password <span>*</span></label>
													<input type="password" class="form-control unicase-form-control text-input" id="npass" name="newpass">
												</div>
												<div class="form-group">
													<label class="info-title" for="Confirm Password">Confirm Password <span>*</span></label>
													<input type="password" class="form-control unicase-form-control text-input" id="cnpass" name="cnfpass" required="required">
												</div>
												<button type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button">Change </button>
											</form>




										</div>
									</div>
								</div>
								<!-- checkout-step-02  -->

							</div><!-- /.checkout-steps -->
						</div>
						<?php include('include/myaccount-sidebar.php'); ?>
					</div><!-- /.row -->
				</div><!-- /.checkout-box -->

			</div>
		</div>

		<?php include('include/script.php'); ?>


		<script>
			$(document).ready(function() {
				$(".changecolor").switchstylesheet({
					seperator: "color"
				});
				$('.show-theme-options').click(function() {
					$(this).parent().toggleClass('open');
					return false;
				});
			});

			$(window).bind("load", function() {
				$('.show-theme-options').delay(2000).trigger('click');
			});
		</script>
</body>

</html>