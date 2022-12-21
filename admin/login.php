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
</head>
<body class="bg-info">
  <div class="container">
  		

  		
  		<br>
			<br>
			<h4 class="text-white text-center"><b>HOUSE RENTAL MANAGEMENT SYSTEM</b></h4>
			<br>
			<br>
			<div class="row justify-content-center">
  		<div class="col-sm-4">
  			<div class="card shadow-lg">
  				<div class="card-body">
            <div class="d-flex justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle mt-2 mb-5" viewBox="0 0 16 16">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
              <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
          </div>
  					<form method="post">
                <?php
                  if (isset($_SESSION['pas'])) 
                  {
                  echo $_SESSION['pas'];
                  unset($_SESSION['pas']);
                  }
                  ?>
  						<div class="form-group">
  							<label for="username" class="control-label text-secondary font-weight-bold">Username</label>
  							<input type="text" id="username" name="fname" class="form-control">
  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label text-secondary font-weight-bold">Password</label>
  							<input type="password" id="password" name="pass" class="form-control">
  						</div>
  						<center><button class="btn btn-block btn-success" type="submit" name="login">Login</button></center>
  					</form>
  					<?php
          if (isset($_POST['login']))
          {
            $fname=$_POST['fname'];
            $pass=$_POST['pass'];
            $sel="select * from admin where fname = '$fname' and pass = '$pass'";
            $res=mysqli_query($mysql,$sel);
            $data=mysqli_fetch_array($res);
            if (isset($data['fname']) !=$fname && isset($data['pass'])!=$pass){
              $_SESSION['pas'] ='<div class="alert alert-secondary alert-dismissible fade show text-center" role="alert">
                 Username or Password is incorrect.
                </div>';
              echo '<script>location.replace("login.php")</script>';
            }
            elseif($fname == $data['fname'] && $pass == $data['pass']){
             $_SESSION['fname'] = $data['fname'];
             echo '<script>location.replace("index.php")</script>';
            }
          } 
          ?>
  				</div>
  			</div>
  		</div>
  		</div>
   

  </div>
</body>
</html>