<?php include('include/footer.php');?>
	
	<script src="../plugin/assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="../plugin/assets/js/bootstrap.min.js"></script>
	
	<script src="../plugin/assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="../plugin/assets/js/owl.carousel.min.js"></script>
	
	<script src="../plugin/assets/js/echo.min.js"></script>
	<script src="../plugin/assets/js/jquery.easing-1.3.min.js"></script>
	<script src="../plugin/assets/js/bootstrap-slider.min.js"></script>
    <script src="../plugin/assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="../plugin/assets/js/lightbox.min.js"></script>
    <script src="../plugin/assets/js/bootstrap-select.min.js"></script>
    <script src="../plugin/assets/js/wow.min.js"></script>
	<script src="../plugin/assets/js/scripts.js"></script>

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>