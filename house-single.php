<?php 
include "header.php"; 
?>
<style type="text/css">
  .pic{position: absolute;
bottom:50%;
right:50%;
opacity: 0.8;
border-radius:50%;
background: grey;
color:white;
text-transform:uppercase;
padding:12px;
text-decoration: none;
display: none;}
.item:hover .pic{display: block;}
.edit-modal{
margin: 20px 420px;
}
</style>
  


 

    <div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.php">Home</a></span> <span class="mr-2"><a href="blog.php">Blog</a></span> <span>House</span></p>
            <h1 class="mb-3 bread">Rental Houses</h1>
          </div>
        </div>
      </div>
    </div>

<?php
$uid=$_GET['uid'];
$sel="select * from house where id='$uid'";
$res=mysqli_query($mysql,$sel);
$data=mysqli_fetch_array($res); 
?>
    <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="row">
              <div class="col-md-12 ftco-animate">
              <div class="p-1 border rounded">
              <h5 class="m-1 font-weight-bold"><?php echo $data['title'] ;?></h5>
              <p class="m-1"><span><?php echo $data['location']; ?></span><span>,<?php echo $data['city']; ?></span></p>
              </div>
              <form method="post" enctype="multipart/form-data">
                <div class="single-slider owl-carousel">
                  <div class="item">
                    <div class="properties-img" style="background-image: url(uploads/<?php echo $data['img'] ?>);"></div>
                      <label for="firstimg" style="cursor: pointer;"><span class="icon-camera pic "></span></label>
                      <input type="file" id="firstimg" name="img" style="display: none;visibility: none;">
                  </div>
                  <div class="item">
                    <div class="properties-img" style="background-image: url(uploads/<?php echo $data['img'] ?>);"></div>
                    <a  href="#">
                      <label for="firstimg" style="cursor: pointer;"><span class="icon-camera pic "></span></label>
                      <input type="file" id="firstimg" name="img" style="display: none;visibility: none;">
                    </a>
                  </div>
                  <div class="item">
                    <div class="properties-img" style="background-image: url(uploads/<?php echo $data['img'] ?>);"></div>
                    <a  href="#">
                      <label for="firstimg" style="cursor: pointer;"><span class="icon-camera pic "></span></label>
                      <input type="file" id="firstimg" name="img" style="display: none;visibility: none;">
                    </a>
                  </div>
                </div>
            </form>
              </div>
                            <div class="col-md-6 mt-5 ftco-animate">
                <div class="d-flex justify-content-between">
                <div class="d-flex flex-column">
                  <h6><i class="flaticon-bed ml-3"></i></h6>
                  <?php echo $data['bed'] ?>&nbsp;Beds
                </div>
                <div class="d-flex flex-column">
                  <h6><i class="flaticon-bathtub ml-3"></i></h6> 
                  <?php echo $data['bath'] ?>&nbsp;Baths
                </div>
                <div class="d-flex flex-column">
                  <h6><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-rulers ml-3" viewBox="0 0 16 16"><path d="M1 0a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h5v-1H2v-1h4v-1H4v-1h2v-1H2v-1h4V9H4V8h2V7H2V6h4V2h1v4h1V4h1v2h1V2h1v4h1V4h1v2h1V2h1v4h1V1a1 1 0 0 0-1-1H1z"/></svg></h6> 
                  <?php echo $data['area'] ?>&nbsp;Sq
                </div>
                </div>
              </div>
              <div class="col-md-6"></div>
           <div class="border border-right-0 border-bottom-0 border-left-0 col-md-12 mt-4"></div>
           <h5 class="font-weight-bold mt-4 col-md-12">Details</h5>
              <div class="col-md-6 ftco-animate">
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <td>City</td>
                      <td><?php echo $data['city'] ?></td>
                    </tr>
                    <tr>
                      <td>Location</td>
                      <td><?php echo $data['location'] ?></td>
                    </tr>
                    <tr>
                      <td>Bath(s)</td>
                      <td><?php echo $data['bed'] ?></td>
                    </tr>
                  </tbody>
                </table> 
              </div>
              <div class="col-md-6 ftco-animate">
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <td>Area</td>
                      <td><?php echo $data['area'] ?> <span><?php echo $data['unit'] ?></span></td>
                    </tr>
                    <tr>
                      <td>Price</td>
                      <td><?php echo $data['price'] ?></td>
                    </tr>
                    <tr>
                      <td>Bath(s)</td>
                      <td><?php echo $data['bath'] ?></td>
                    </tr>
                  </tbody>
                </table> 
              </div>

            
          <div class="border border-right-0 border-bottom-0 border-left-0 col-md-12 mt-4"></div>
          <h5 class="font-weight-bold mt-4 col-md-12">Description</h5>
          <p class="col-md-12"><?php echo $data['detail'] ;?></p>
          <div class="border border-right-0 border-bottom-0 border-left-0 col-md-12 mt-4"></div>
            </div>

            <div class="col-md-12 mt-5 d-flex justify-content-center">
              <?php
              $uid=$_SESSION['uniqid'];
              $sel1="select * from register where uniqid = '$uid'";
              $res1=mysqli_query($mysql,$sel1);
              $data1=mysqli_fetch_array($res1);
               if ($data1['status'] == "Tenant"){ ?>
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#mymodal<?php echo $data1['id'] ; ?>" style="border-radius: 3px !important;">Rent House</button>
            <?php } ?>
            <div class="modal ftco-animate" id="mymodal<?php echo $data1['id'] ; ?>">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                        <h4 class="modal-title">Confirmation!</h4>
                        <button class="close" type="button" data-dismiss="modal">&times;</button>
                  </div>
                   <form method="post">
                  <div class="modal-body mt-2">
                       <input type="hidden" name="tenant" value="<?php echo $data1['fname']."&nbsp;".$data1['lname'];?>">
                       <input type="hidden" name="email" value="<?php echo $data1['email'] ;?>">
                       <input type="hidden" name="phone" value="<?php echo $data1['phone'] ;?>">
                       <input type="hidden" name="title" value="<?php echo $data['title'] ;?>">
                       <input type="hidden" name="price" value="<?php echo $data['price'] ;?>">
                      <h5 class="text-secondary">Are you sure you want to rent the house?</h5>
                  </div>
                  <button class="btn btn-info my-2 float-right mr-2" type="submit">Yes</button>
                  <button class="btn btn-secondary my-2 float-right mr-2" type="button" data-dismiss="modal">No</button>
                  </form>
                </div>
              </div>
            </div>
            </div>

          </div> <!-- .col-md-8 -->
            <div class="col-md-4">
             
          </div> <!-- colmd4 end-->
      </div>
    </section> <!-- .section -->
    

<?php
include "footer.php";
if ($_POST)
{
  $unid=$_SESSION['uniqid'];
  $a=$_POST['tenant'];
  $b=$_POST['email'];
  $c=$_POST['phone'];
  $d=$_POST['title'];
  $e=$_POST['price'];
  $status="Sold";
  $dt=date("d-m-y");
  $insert="insert into tenant(unid,tenant,email,phone,title,price,date) values ('$unid','$a','$b','$c','$d','$e','$dt')";
  $chk=mysqli_query($mysql,$insert);
  $hid=$data['unid'];
  $update="update house set status='$status' where unid = '$data'";
  $up=mysqli_query($mysql,$update);
  if (!$chk && !$up) 
   {
    echo mysqli_error();
   }
   else
   {
    echo '<script>location.replace("house.php")</script>';
   }
}
?>
