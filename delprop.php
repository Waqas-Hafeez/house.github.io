<?php 
include "connection.php";
$id=$_GET['id'];
	$del="delete from house where id ='$id'";

	$chk=mysqli_query($mysql, $del);

	if (!$chk) {
		echo mysqli_error();
	}
	else
	{
		header("location:yourprop.php");
	}
?>