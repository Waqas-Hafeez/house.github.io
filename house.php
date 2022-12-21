<?php include "header.php" ;
?>

<style type="text/css">
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

</style>
    <div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Rent</span></p>
            <h1 class="mb-3 bread">Rental houses</h1>
          </div>
        </div>
      </div>
    </div>

 
    

    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">
    			<?php
    			if (isset($_GET['page'])) 
					{
					 $page = $_GET['page'];
					}
					else
					{
					  $page = 1;
					}

					$num_per_page = 06 ;
          $start_from = ($page-1)*06;
    			$sel="select * from house limit $start_from,$num_per_page";
          $res=mysqli_query($mysql,$sel);
          if (mysqli_num_rows($res) > 0) {
          while ($data=mysqli_fetch_array($res)) {
            if($data['status'] != "Sold"){
          ?>
            <div class="col-md-4 ftco-animate">
            <div class="properties">
              <a href="house-single.php?uid=<?php echo $data['id']; ?>" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(uploads/<?php echo $data['img'] ?>);">
                <div class="icon d-flex justify-content-center align-items-center">
                  <span class="icon-edit"></span>
                </div>
              </a>
              <div class="text p-3">
                <span class="status sale">Rent</span>
                <div class="d-flex">
                  <div class="one">
                    <h3><a href="house-single.php"><?php echo $data['location'] ?></a></h3>
                    <p>Apartment</p>
                  </div>
                  <div class="two mr-3">
                    <span>PKR<span class="price font-weight-bold ">&nbsp;<?php echo $data['price'] ?></span></span>
                  </div>
                </div>
                <p class="more"><?php echo $data['detail'] ?></p>
                <hr>
                <p class="bottom-area d-flex">
                  <span><i class="flaticon-selection"></i> <?php echo $data['area'] ?>&nbsp;<?php echo $data['unit'] ?></span>
                  <span class="ml-auto"><i class="flaticon-bathtub"></i> <?php echo $data['bath'] ?></span>
                  <span><i class="flaticon-bed"></i> <?php echo $data['bed'] ?></span>
                </p>
              </div>
            </div>
          </div>
    			<?php } } }
          else { ?>
            <div class="col-md-12 ftco-animate">
          <h4 class="alert alert-secondary text-center">There are no houses added yet.</h4>
          </div>
        <?php }  ?>
    	</div>
       <?php
			  $sell="select * from house";
			  $ress=mysqli_query($mysql,$sell);
			  $total_record=mysqli_num_rows($ress);
			  $total_page = ceil($total_record/$num_per_page);
			  if ($page>1) 
			  {
			 echo "<div class='pagination'>
			 <a href='house.php?page=".($page-1)."'>Previous</a>
			 </div>";
			  }

			 for ($i=1; $i<$total_page; $i++) 
			 { 
			echo "<div class='pagination'>
			<a href='house.php?page=".$i."'>$i</a></div>";
			 }

			 if ($i>$page) 
			  {
			 echo "<div class='pagination'><a href='house.php?page=".($page+1)."'>Next</a></div>";
			  }
			  ?>
    </section>

<?php include "footer.php" ?>