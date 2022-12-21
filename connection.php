<?php 
$mysql=mysqli_connect("localhost","root","","mysite");
if (!$mysql) {
	echo mysqli_error();
}
?>
