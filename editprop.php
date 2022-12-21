<?php 
include "header.php"; 
if ($_SESSION['uniqid'] == "") 
{
   echo '<script>location.replace("index.php")</script>';
}
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
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.php">Home</a></span> <span class="mr-2"><a href="blog.php">Blog</a></span> <span>Your House</span></p>
            <h1 class="mb-3 bread">Edit House</h1>
          </div>
        </div>
      </div>
    </div>

<?php
$pro=$_GET['pro'];
$sel="select * from house where id='$pro'";
$res=mysqli_query($mysql,$sel);
$data=mysqli_fetch_array($res); 
?>
    <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
          	<div class="row">
          		<div class="col-md-12 ftco-animate">
          			<div class="p-2 border rounded">
              <h5 class="pt-2 pl-2 font-weight-bold"><?php echo $data['title'] ;?></h5>
              <p class="m-2"><span><?php echo $data['location']; ?></span><span>,<?php echo $data['city']; ?></span></p>
              </div>
          		<form method="post" enctype="multipart/form-data">
          			<div class="single-slider owl-carousel">
          				<div class="item">
          					<div class="properties-img" style="background-image: url(uploads/<?php echo $data['img'] ;?>)"></div>
          						<label for="firstimg" style="cursor: pointer;"><span class="icon-camera pic "></span></label>
          						<input type="file" id="firstimg" name="img" style="display: none;visibility: none;">
          				</div>
          				<div class="item">
          					<div class="properties-img" style="background-image: url(uploads/<?php echo $data['img'] ;?>)"></div>
          					<a  href="#">
          						<label for="firstimg" style="cursor: pointer;"><span class="icon-camera pic "></span></label>
          						<input type="file" id="firstimg" name="img" style="display: none;visibility: none;">
          					</a>
          				</div>
          				<div class="item">
          					<div class="properties-img" style="background-image: url(uploads/<?php echo $data['img'] ;?>);"></div>
          					<a  href="#">
          						<label for="firstimg" style="cursor: pointer;"><span class="icon-camera pic "></span></label>
          						<input type="file" id="firstimg" name="img" style="display: none;visibility: none;">
          					</a>
          				</div>
          			</div>
                 <div class="col-md-12 mt-4 d-flex justify-content-center">
                <button type="submit" name="cha-img" class="btn btn-primary" style="border-radius: 3px !important;">Edit Image</button>
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
          		<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#mymodal<?php echo $data['id'] ; ?>" style="border-radius: 3px !important;">Edit House</button>
    						<div class="modal ftco-animate" id="mymodal<?php echo $data['id'] ; ?>">
    							<div class="modal-dialog modal-lg">
    								<div class="modal-content">
    									<div class="modal-header">
    										<h4 class="modal-title">Edit House</h4>
    										<button class="close" type="button" data-dismiss="modal">&times;</button>
    										
    									</div>
    									<div class="modal-body">
									<form method="post">
    												<div class="row">
    											  <div class="col-sm-2"></div>
    											  <div class="col-sm-8">
    												<label class="font-weight-bold mb-2 mr-sm-2">City:</label>
    												<input type="text" name="city" class="form-control mb-2 mr-sm-2" value="<?php echo $data['city']; ?>">
    											  </div>
    											  <div class="col-sm-2"></div>
    											  </div>
    												 <div class="row">
    											  <div class="col-sm-2"></div>
    											  <div class="col-sm-8">
    												<label class="font-weight-bold mb-2 mr-sm-2">Location:</label>
    												<input type="text" name="location" class="form-control mb-2 mr-sm-2" value="<?php echo $data['location']; ?>">
    											  </div>
    											  <div class="col-sm-2"></div>
    											  </div>
    												 <div class="row">
    											  <div class="col-sm-2"></div>
    											  <div class="col-sm-8">
    												<label class="font-weight-bold mb-2 mr-sm-2">Postal Code:</label>
    												<input type="number" name="code" class="form-control mb-2 mr-sm-2" value="<?php echo $data['code']; ?>">
    											  </div>
    											  <div class="col-sm-2"></div>
    											  </div>
    											  <div class="row">
    											  <div class="col-sm-2"></div>
    											  <div class="col-sm-8">
    												<label class="font-weight-bold mb-2 mr-sm-2">House Title:</label>
    												<input type="text" name="title" class="form-control mb-2 mr-sm-2" value="<?php echo $data['title']; ?>">
    											  </div>
    											  <div class="col-sm-2"></div>
    											  </div>
    											  <div class="row">
    											  <div class="col-sm-2"></div>
    											  <div class="col-sm-8">
    												<label class="font-weight-bold mb-2 mr-sm-2">Description:</label>
    												<textarea type="text" name="detail" class="form-control mb-2 mr-sm-2"><?php echo $data['detail']; ?></textarea>
    											  </div>
    											  <div class="col-sm-2"></div>
    											  </div>
    											  <div class="row">
    											  <div class="col-sm-2"></div>
    											  <div class="col-sm-8">
    												<label class="font-weight-bold mb-2 mr-sm-2">House Price:</label>
    												<input type="number" name="price" class="form-control mb-2 mr-sm-2" value="<?php echo $data['price']; ?>">
    											  </div>
    											  <div class="col-sm-2"></div>
    											  </div>
    											  <div class="row">
    											  <div class="col-sm-2"></div>
    											  <div class="col-sm-8">
    												<label class="font-weight-bold mb-2 mr-sm-2">Land Area:</label>
    												<input type="number" name="area" class="form-control mb-2 mr-sm-2" value="<?php echo $data['area']; ?>">
    											  </div>
    											  <div class="col-sm-2"></div>
    											  </div>
                            <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                            <label class="font-weight-bold mb-2 mr-sm-2">Unit:</label>
                            <select name="unit"  class="form-control" value="<?php echo $data['unit']; ?>">
                            <option style="display: none;visibility: none" <?php if($data['id'] == $data['unit']){ echo "selected";} ?>><?php echo $data['unit']; ?></option>
                            <option value="Marla" >Marla</option>
                            <option value="Kanal" >Kanal</option>
                            </select>
                            </div>
                            <div class="col-sm-2"></div>
                            </div>
    											  <div class="row">
    											  <div class="col-sm-2"></div>
    											  <div class="col-sm-8">
    												<label class="font-weight-bold mb-2 mr-sm-2">Bed:</label>
    												<select name="bed"  class="form-control">
		                      	<option style="display: none;visibility: none"  <?php if($data['id'] == $data['bed']){ echo "selected";} ?>><?php echo $data['bed']; ?></option>
		                      	<option value="1" >1</option>
		                        <option value="2" >2</option>
		                        <option value="3" >3</option>
		                        <option value="4" >4</option>
		                        <option value="5" >5</option>
		                      	</select>
    											  </div>
    											  <div class="col-sm-2"></div>
    											  </div>
    											  <div class="row">
    											  <div class="col-sm-2"></div>
    											  <div class="col-sm-8">
    												<label class="font-weight-bold mb-2 mr-sm-2">Bathroom:</label>
    												<select name="bath"  class="form-control" value="<?php echo $data['bed']; ?>">
		                      	<option style="display: none;visibility: none" <?php if($data['id'] == $data['bath']){ echo "selected";} ?>><?php echo $data['bath']; ?></option>
		                      	<option value="1" >1</option>
		                        <option value="2" >2</option>
		                        <option value="3" >3</option>
		                        <option value="4" >4</option>
		                        <option value="5" >5</option>
		                      	</select>
    											  </div>
    											  <div class="col-sm-2"></div>
    											  </div>
    											  <button class="btn btn-primary float-right my-2" name="change" type="submit">Save</button>
    											</form>
    									</div>
    								</div>
    							</div>
    						</div>
                <button class="btn btn-danger ml-3" type="submit" data-toggle="modal" data-target="#deletemodal<?php echo $data['id'] ; ?>" style="border-radius: 3px !important;">Delete House</button>
        <div class="modal ftco-animate" id="deletemodal<?php echo $data['id'] ; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want yo delete your property?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                    <a class="btn btn-primary" href="delprop.php?id=<?php echo $data['id']; ?>">Yes</a>
                </div>
            </div>
        </div>
    </div>
          	</div>
          </div> <!-- .col-md-8 -->
      </div>
    </section> <!-- .section -->
		

<?php
include "footer.php";
?>
<?php 
if (isset($_POST['change'])) 
{
   $a=$_POST['city'];
   $b=$_POST['location'];
   $c=$_POST['code'];
   $d=$_POST['title'];
   $e=$_POST['detail'];
   $f=$_POST['price'];
   $g=$_POST['area'];
   $h=$_POST['unit'];
   $i=$_POST['bed'];
   $j=$_POST['bath'];
   $dt=date("d-m-Y");
    $update="update house set city='$a', location='$b' , code='$c' , title='$d', detail='$e' ,
    price='$f' , area='$g' ,unit='$h', bed='$i' , bath='$j' , dt= '$dt' where id='$pro' ";
    $chk=mysqli_query($mysql, $update);

	if (!$chk) {
		echo mysqli_error();
	}
}
  ?>
<?php 
if 
(isset($_POST['cha-img']))
{
$folder="uploads/";
$filename=$_FILES['img']['name'];
$target=$folder.$filename;
move_uploaded_file($_FILES['img']['tmp_name'], $target);
$upd="update house set img='$filename' where id='$pro'";
$chk1=mysqli_query($mysql,$upd);

if (!$chk1) {
mysqli_error();
}
}

?>