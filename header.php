<?php
include "connection.php";
session_start();
error_reporting(0);
$uid=$_SESSION['uniqid'];
$sel1="select * from register where uniqid = '$uid'";
$res1=mysqli_query($mysql,$sel1);
$data1=mysqli_fetch_array($res1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>BookMyHouse - House Rental Management System</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
<link rel="stylesheet" href="css/animate.css">

<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="css/magnific-popup.css">

<link rel="stylesheet" href="css/aos.css">

<link rel="stylesheet" href="css/ionicons.min.css">

<link rel="stylesheet" href="css/bootstrap-datepicker.css">
<link rel="stylesheet" href="css/jquery.timepicker.css">
<script
src="https://code.jquery.com/jquery-3.6.0.js"
integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>

<link rel="stylesheet" href="css/flaticon.css">
<link rel="stylesheet" href="css/icomoon.css">
<link rel="stylesheet" href="css/style.css">
<style type="text/css">
.modal{background: rgba(0, 0, 0, 0.5);}
</style>
</head>
<body>
<div class="top">
<div class="container">
<div class="row d-flex align-items-center">
<div class="col">
	<p class="social d-flex">
		<a href="#"><span class="icon-facebook"></span></a>
		<a href="#"><span class="icon-twitter"></span></a>
		<a href="#"><span class="icon-google"></span></a>
		<a href="#"><span class="icon-pinterest"></span></a>
	</p>
</div>
</div>
</div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
<div class="container">
<a class="navbar-brand" href="index.php">BookMy<span class="font-italic">House</span></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
<span class="oi oi-menu"></span> Menu
</button>

<div class="collapse navbar-collapse" id="ftco-nav">
<ul class="navbar-nav ml-auto">

  <?php
  $tab=$_SERVER['PHP_SELF'];
  ?>
  <li class="nav-item <?php if($tab=='/royal/index.php'){ 
   echo 'active';}?>"><a href="index.php" class="nav-link font-weight-bold">HOME</a></li>
  <li class="nav-item <?php if($tab=='/royal/house.php'){
   echo 'active';}?>"><a href="house.php" class="nav-link font-weight-bold">HOUSE</a></li>
  <li class="nav-item <?php if($tab=='/royal/about.php'){
   echo 'active';}?>"><a href="about.php" class="nav-link font-weight-bold">ABOUT</a></li>
  <li class="nav-item <?php if($tab=='/royal/contact.php'){
   echo 'active';}?>"><a href="contact.php" class="nav-link font-weight-bold">CONTACT</a></li>
  <li class="nav-item cta">
    <?php if (isset($_SESSION['uniqid']) == ""){ ?>
    <a href="index.php" id="open" class="nav-link  ml-lg-2" data-toggle="modal" data-target="#login"><span class="icon-user" style="background-color: ;"></span> Log-In</a>
  <?php }
   else{
   ?>
    <a href="logout.php" class="nav-link  ml-lg-2"><span class="icon-user"></span> Log-Out</a>
  <?php } ?>
  </li>   
    <div class="modal ftco-animate" id="login">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #109FD1;">
          <h4 class="modal-title text-white">Log In</h4>
          <button class="close text-white" id="close" style="opacity: 1" data-dismiss="modal" type="button">&times;</button>
        </div>
        <div class="modal-body">
          <form method="post">
            <?php
              if (isset($_SESSION['pas'])) 
              {
              echo $_SESSION['pas'];
              unset($_SESSION['pas']);
              }
              ?>
            <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
            <input type="email" name="eemail" class="form-control my-3 " placeholder="Enter Email" required>
            </div>
            <div class="col-sm-2"></div>
            </div>
            <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
            <input type="password" name="passs" class="form-control" placeholder="Enter Password" required>
            </div>
            <div class="col-sm-2"></div>
            </div>
            <button class="btn mt-3 float-right text-white" style="background-color: #109FD1;" type="submit" name="login">Log In</button>
          </form>
          <?php
          if (isset($_POST['login']))
          {
            $eemail=$_POST['eemail'];
            $passs=$_POST['passs'];
            $sel="select * from register where email = '$eemail' and pass = '$passs'";
            $res=mysqli_query($mysql,$sel);
            $data=mysqli_fetch_array($res);
            if (isset($data['email']) !=$eemail && isset($data['pass'])!=$passs){
              $_SESSION['pas'] ='<div class="alert alert-secondary alert-dismissible fade show" role="alert">
                <strong>Sorry!</strong> Your Password is incorrect.
                </div>';
              echo '<script>location.replace("index.php")</script>';
            }
            elseif($eemail == $data['email'] && $passs == $data['pass']){
             $_SESSION['email'] = $data['email'];
             $_SESSION['uniqid'] = $data['uniqid'];
             echo '<script>location.replace("index.php")</script>';
            }
          } 
          ?>
        </div>
      </div>
    </div>
  </div>

  <li class="nav-item cta cta-colored">
    <?php if (isset($_SESSION['uniqid']) == ""){ ?>
    <a href="#" class="nav-link" data-toggle="modal" data-target="#signup" id="open">
      <span class="icon-pencil"></span> Sign-Up</a>
       <?php } ?>
    </li>
  <li class="nav-item dropdown <?php if($tab=='/royal/addprop.php'){
   echo 'active'; } ?>">
   <?php if ($data1['status'] == "Owner"){
    ?>
   <a href="addprop.php" class="nav-link dropdown-toggle font-weight-bold">ADD HOUSE</a>
   <div class="dropdown-menu">
     <a href="yourprop.php" class="dropdown-item">YOUR HOUSE</a>
   </div>
   <?php
    } ?>
   </li>
<div class="modal ftco-animate" id="signup">
<div class="modal-dialog modal-lg">
<div class="modal-content"> 
<div class="modal-header" style="background-color: #FF8F56;">
<h4 class="modal-title text-white">Sign Up</h4>
<button class="close text-white" id="close" style="opacity: 1" data-dismiss="modal" type="button">&times;</button>
</div>
<div class="modal-body">
<form method="post">
<div class="row mt-3">
  <div class="col-sm-6">
    <div class="form-group">
      <label class="font-weight-bold">First Name</label>
      <input type="text" placeholder="Enter Your First Name" class="form-control" name="fname" required>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="form-group">
      <label class="font-weight-bold">Last Name</label>
      <input type="text" placeholder="Enter Your Last Name" class="form-control" name="lname" required>
    </div>
  </div>
</div>
<div class="row mt-3">
  <div class="col-sm-6">
    <div class="form-group">
      <label class="font-weight-bold">Email</label>
      <input type="email" placeholder="Enter Your Email" class="form-control" name="email" required>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="form-group">
      <label class="font-weight-bold">Phone Number</label>
      <input type="text" placeholder="Enter Your Phone Number" class="form-control" name="phone" required>
    </div>
  </div>
</div>
<div class="row mt-3">
  <div class="col-sm-6">
    <div class="form-group">
      <label class="font-weight-bold">Password</label>
      <input type="password" placeholder="Enter Your Password" class="form-control" name="pass" required>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="form-group">
      <label class="font-weight-bold">Confirm Password</label>
      <input type="password" placeholder="Confirm Your Password" class="form-control" name="cpass" required>
    </div>
  </div>
</div>
<div class="row mt-3">
   <div class="col-sm-6">
    <div class="form-group">
      <label class="font-weight-bold">User Role</label>
      <select class="form-control" name="status" required>
        <option value="" disabled selected>Select Role</option>    
        <option value="Tenant">Tenant</option>
        <option value="Owner">Owner</option>
      </select>
    </div>
  </div>
</div>
  <button class="btn float-right text-white" type="submit" name="signup" required style="background-color: #FF8F56;">Sign Up</button>
</form>
</div>
</div>
</div>
</div>
</ul>
</div>
</div>
</nav>
<?php
if (isset($_SESSION['status'])) 
{
 echo $_SESSION['status'];
 unset($_SESSION['status']);
}
?>
<?php
if (isset($_SESSION['error'])) 
{
echo $_SESSION['error'];
unset($_SESSION['error']);
}
?>
<?php
if (isset($_SESSION['exist'])) 
{
echo $_SESSION['exist'];
unset($_SESSION['exist']);
}
?>
<?php
if (isset($_SESSION['exist1'])) 
{
echo $_SESSION['exist1'];
unset($_SESSION['exist1']);
}
?>
<?php
if (isset($_POST['signup'])) 
{
$a=$_POST['fname'];
$b=$_POST['lname'];
$c=$_POST['email'];
$d=$_POST['phone'];
$e=$_POST['pass'];
$f=$_POST['cpass'];
$h=$_POST['status'];
$g= uniqid();
$sql="select * from register where email='$c'";

      $res=mysqli_query($mysql,$sql);

      if (mysqli_num_rows($res) > 0) 
      {  
        $row = mysqli_fetch_assoc($res);
        if($c==isset($row['email']))
        {
        $_SESSION['exist'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Email entered is already in use.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;
        </button>
        </div>'; 
        echo '<script>location.replace("index.php")</script>';
        }
        if ($d==isset($row['phone'])) {
        $_SESSION['exist1'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Phone number entered is already in use.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;
        </button>
        </div>'; 
        echo '<script>location.replace("index.php")</script>';
        }
      }

    else{

    if ($e == $f) 
    {
    $insert="insert into register(fname,lname,email,phone,pass,status,uniqid) values ('$a','$b','$c','$d','$e','$h','$g')";
    $chk=mysqli_query($mysql,$insert);

    if ($chk)
    {
    $_SESSION['status'] ='<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Your Account has been created.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;
      </button>
      </div>';
      echo '<script>location.replace("index.php")</script>';
    } 
    }
    else 
    {
    $_SESSION['error'] = '<div class="alert alert-secondary alert-dismissible fade show" role="alert">
    <strong>Sorry!</strong> Your password does not match.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;
    </button>
    </div>';
    echo '<script>location.replace("index.php")</script>';
    }
}

}
?>
