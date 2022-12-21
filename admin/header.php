<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<title>HRMS</title>
  <style type="text/css">
    *{
      font-family: 'Poppins',sans-serif;
    }
  </style>
</head>
<body>
	
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #6663df;">
  <div class="container">
  <a class="navbar-brand mt-1" href="index.php" style="letter-spacing: 4px;"><h3 class="font-weight-bold">HRMS</h3></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <?php 
  $tab=$_SERVER['PHP_SELF'];
  ?>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item <?php if($tab=='/royal/admin/index.php'){ echo 'active';}?>">
        <a class="nav-link font-weight-bold mr-3" href="index.php">HOME</a>
      </li>
      <li class="nav-item <?php if($tab=='/royal/admin/house.php'){ echo 'active';}?>">
        <a class="nav-link font-weight-bold mr-3" href="house.php">HOUSES</a>
      </li>
      <li class="nav-item <?php if($tab=='/royal/admin/tenant.php'){ echo 'active';}?>">
        <a class="nav-link font-weight-bold mr-3" href="tenant.php">TENANTS</a>
      </li>
      <li class="nav-item <?php if($tab=='/royal/admin/payment.php'){ echo 'active';}?>">
        <a class="nav-link font-weight-bold mr-3" href="payment.php">PAYMENTS</a>
      </li> 
      <li class="nav-item <?php if($tab=='/royal/admin/logout.php'){ echo 'active';}?>">
        <a class="nav-link font-weight-bold mr-3 btn btn-primary" style="color: white;" href="logout.php">LOGOUT</a>
      </li>   
    </ul>  
    </div>
</nav>
</body>
</html>