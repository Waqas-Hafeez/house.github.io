<?php 
include "header.php";
if ($_SESSION['uniqid'] == "") 
{
  echo '<script>location.replace("index.php")</script>';
}
error_reporting(0);
 ?>
 <style type="text/css">
 	.more{
 		    text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
 	}
 	.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
}
.pagination a:hover:not(.active) {background-color: #ddd;}
.tile{padding: 10px 0;width: 100%;border-radius: 5px;float: left;margin: 8px 2px;background-color: grey;color: white;}
 </style>
    <div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Add House</span></p>
            <h1 class="mb-3 bread">Add House</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-search bg-white">
    	<div class="container">
	    	<div class="row bg-secondary rounded" style="box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;">
					<div class="col-md-12 search-wrap">
					<form method="post" class="search-property" enctype="multipart/form-data">
<br>
						<div class="tile shadow-sm">&nbsp;&nbsp;&nbsp;HOUSE LOCATION</div>

						    <div class="row justify-content-center">
	        				<div class="col-sm-3 mt-3">
	        					<div class="form-group">
	        					<p for="#" class="text-right text-white mt-3">City</p>
	        				  </div>
	        				</div>
	          				<div class="col-sm-6 mt-3">
	          					<div class="form-group">
	          					<div class="form-field">
			                <input required type="text" class="form-control text-white" placeholder="City Name" name="city" style="width: 40%;color: white !important;">
			                </div>
			              </div>
			              </div>
		            </div>

	        			<div class="row justify-content-center">
	        				<div class="col-sm-3 mt-3">
	        					<div class="form-group">
	        					<p for="#" class="text-right text-white mt-3">Location</p>
	        				  </div>
	        				</div>
	          				<div class="col-sm-6 mt-3">
	          					<div class="form-group">
	          					<div class="form-field">
	          					<div class="icon"><span class="icon-my_location"></span></div>
			                <input required type="text" class="form-control" placeholder="Location Name" name="location" style="width: 40%;color: white !important;">
			                </div>
			              </div>
			              </div>
		            </div>
	        			
	        			<div class="row justify-content-center">
	        				<div class="col-sm-3 mt-3">
	        					<div class="form-group">
	        					<p for="#" class="text-right text-white mt-3">Postal Code</p>
	        				  </div>
	        				</div>
	          				<div class="col-sm-6 mt-3">
	          					<div class="form-group">
	          					<div class="form-field">
	                      <input required type="text" name="code" placeholder="Your Code" class="form-control" style="width: 40%;color: white !important;">
	                    </div>
			              </div>
		              </div>
	        			</div>

           <div class="tile shadow-sm">&nbsp;&nbsp;&nbsp;HOUSE DETAILS</div>
                   
                  	<div class="row justify-content-center">
	        				<div class="col-sm-3 mt-3">
	        					<div class="form-group">
	        					<p for="#" class="text-right text-white mt-3">House Title</p>
	        					</div>
	        				</div>
	          				<div class="col-sm-6 mt-3">
	          					<div class="form-group">
	          					<div class="form-field">
	          					<input required type="text" name="title" placeholder="Your Title" class="form-control" style="width: 40%;color: white !important;">
				              </div>
			              </div>
		        			</div>
		        		</div>

	        				<div class="row justify-content-center">
	        				<div class="col-sm-3 mt-3">
	        					<div class="form-group">
	        					<p for="#" class="text-right text-white mt-3">Decription</p>
	        					</div>
	        				</div>
	          				<div class="col-sm-6 mt-3">
	          					<div class="form-group">
	          					<div class="form-field">
	          					<textarea required class="form-control" name="detail" style="width: 400px;color: white !important;" rows="5"></textarea>
				              </div>
			              </div>
		        			</div>
		        		 </div>

		        		<div class="row justify-content-center">
	        				<div class="col-sm-3 mt-3">
	        					<div class="form-group">
	        					<p for="#" class="text-right text-white mt-3">House Price</p>
	        					</div>
	        				</div>
	          				<div class="col-sm-6 mt-3">
	          					<div class="form-group">
	          					<div class="form-field">
	          					<input required type="number" name="price" placeholder="Enter Price" class="form-control" style="width: 40%;color: white !important;">
				              </div>
			              </div>
		        			</div>
		        		</div>

		        		<div class="row">
		        			<div class="col-sm-3 mt-3"></div>
	        				<div class="col-sm-1 mt-3 ml-5">
	        					<div class="form-group">
	        					<p for="#" class="text-right text-white mt-3">Land Area</p>
	        					</div>
	        				</div>
	          				<div class="col-sm-3 mt-3">
	          					<div class="form-group">
	          					<div class="form-field">
	          					<input required type="number" name="area" placeholder="Enter Area" class="form-control" style="color: white !important;">
				              </div>
			              </div>
		        			</div>
		        			<div class="col-sm-1 mt-3">
	        					<div class="form-group">
	        					<p for="#" class="text-right text-white mt-3">Unit</p>
	        					</div>
	        				</div>
	        				<div class="col-sm-2 mt-3">
	          					<div class="form-group">
	          					<div class="form-field">
	          					<div class="select-wrap">
	                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                      <select name="unit" required class="form-control" style="color: white !important;">
	                      	<option value="Marla" style="background-color: grey !important;">Marla</option>
	                        <option value="Kanal" style="background-color: grey !important;">Kanal</option>
	                      </select>
	                    </div>
				              </div>
			              </div>
		        			</div>
		        			<div class="col-sm-1"></div>
		        		</div>

	        		<div class="row justify-content-center">
	        				<div class="col-sm-3 mt-3">
	        					<div class="form-group">
	        					<p for="#" class="text-right text-white mt-3 ">Beds</p>
	        				  </div>
	        				</div>
	        				<div class="col-sm-6 mt-3">
	        				  <div class="form-group">
	        					<div class="form-field">
	          					<div class="select-wrap">
	                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                      <select name="bed" required class="form-control" style="width: 40%;color: white !important;">
	                      	<option value="1" style="background-color: grey !important;">1</option>
	                        <option value="2" style="background-color: grey !important;">2</option>
	                        <option value="3" style="background-color: grey !important;">3</option>
	                        <option value="4" style="background-color: grey !important;">4</option>
	                        <option value="5" style="background-color: grey !important;">5</option>
	                      </select>
	                    </div>
			              </div>
			              </div>
		              </div>
	        			</div>

	        			<div class="row justify-content-center">
	        				<div class="col-sm-3 mt-3">
	        					<div class="form-group">
	        					<p for="#" class="text-right text-white mt-3 ">Bathrooms</p>
	        				  </div>
	        				</div>
	        				<div class="col-sm-6 mt-3">
	        				  <div class="form-group">
	        					<div class="form-field">
	          					<div class="select-wrap">
	                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                      <select name="bath" required class="form-control" style="width: 40%;color: white !important;">
	                      	<option value="1" style="background-color: grey !important;">1</option>
	                        <option value="2" style="background-color: grey !important;">2</option>
	                        <option value="3" style="background-color: grey !important;">3</option>
	                        <option value="4" style="background-color: grey !important;">4</option>
	                        <option value="5" style="background-color: grey !important;">5</option>
	                      </select>
	                    </div>
			              </div>
			              </div>
		              </div>
	        			</div>

                 <div class="tile shadow-sm">&nbsp;&nbsp;&nbsp;ADD IMAGES</div>
                  
	        			<div class="row">
	        				<div class="col-sm-3"></div>
	        				<div class="col-sm-2">
	        				<div class="form-group">
	        					<div class="form-field float-right">
	        					<label for="urimg" class="text-white mt-3 p-2 bg-info rounded text-center" style="cursor: pointer;">Upload Image</label>
	        					<input required type="file" name="img[]" id="urimg" multiple style="display: none;visibility: none;">
                    </div>
		                </div>
		              </div>
		              <div class="col-sm-6">
		              	<i class="fas fa-danger"></i>
		              	<div class="p-2 bg-warning rounded mt-3 text-white">Press CTRL key while selecting images to upload multiple images at once</div>
		              </div>
		              </div>

	        		<div class="row justify-content-center">
	        			<div class="col-sm-3 mt-5 ">
	        				<div class="form-group">
	        					<div class="form-field">
	          					<input type="submit" name="" value="SUBMIT" class="btn btn-dark">
			              </div>
		              </div>
	        			</div>
	        		</div>

	        	</form>
					</div>
	    	</div>
	    </div>
    </section>
    


<?php include "footer.php" ?>
<?php 
if ($_POST) 
{
	 $unid=$_SESSION['uniqid'];
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
	 $folder="uploads/";
	 $filename=$_FILES['img']['name'];
	 $target=$folder.$filename;
    move_uploaded_file ($_FILES['img']['tmp_name'], $target);
   $insert="insert into house (unid,city,location,code,title,detail,price,area,unit,bed,bath,dt,img) values('$unid','$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$dt','$filename')";
   $chk=mysqli_query($mysql,$insert);

   if (!$chk) 
   {
   	echo mysqli_error();
   }
}
?>