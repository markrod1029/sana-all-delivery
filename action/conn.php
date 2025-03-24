<?php
	$conn = new mysqli('sql201.epizy.com', 'epiz_33140008', 'DBefoCibXBQtQrl', 'epiz_33140008_shop');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>
