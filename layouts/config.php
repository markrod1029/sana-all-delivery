<?php
define('DB_SERVER','sql201.epizy.com');
define('DB_USER','epiz_33140008');
define('DB_PASS' ,'DBefoCibXBQtQrl');
define('DB_NAME', 'epiz_33140008_shop');
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>