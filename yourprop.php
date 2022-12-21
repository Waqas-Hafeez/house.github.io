<?php 
include "header.php";
if ($_SESSION['uniqid'] == "") 
{
   echo '<script>location.replace("index.php")</script>';
}
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
.tile{padding: 10px 0;width: 100%;border-radius: 5px;float: left;margin: 8px 2px;background-color: #EAEAEA;box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;}
 </style>
    <div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Your House</span></p>
            <h1 class="mb-3 bread">Your House</h1>
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
          $unid=$_SESSION['uniqid'];
          $sel="select * from house where unid='$unid' limit $start_from,$num_per_page";
          $res=mysqli_query($mysql,$sel);
          if (mysqli_num_rows($res) > 0) {
          while ($data=mysqli_fetch_array($res)) {
            if($data['status'] != "Sold"){
          ?>
          <div class="col-md-4 ftco-animate">
            <div class="properties">
              <?php 
              $img=explode(",", $data['img']);
              foreach($img as $new);
              ?>
              <a href="editprop.php?pro=<?php echo $data['id']; ?>" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(uploads/<?php echo $new; ?>);">
                <div class="icon d-flex justify-content-center align-items-center">
                  <span class="icon-edit"></span>
                </div>
              </a>
              <div class="text p-3">
                <span class="status sale">Rent</span>
                <div class="d-flex">
                  <div class="one">
                    <h3><?php echo $data['location']; ?></h3>
                  </div>
                  <div class="two mr-3">
                    <small>PKR</small>&nbsp;<span class="price font-weight-bold" style="font-size: 15px;">&nbsp;<?php echo $data['price'] ?></span>
                  </div>
                </div>
                <p class="more"><?php echo $data['detail']; ?></p>
                <hr>
                <p class="bottom-area d-flex">
                <span><i class="flaticon-selection"></i> <?php echo $data['area']; ?>&nbsp;<?php echo $data['unit'] ?></span>
                <span class="ml-auto"><i class="flaticon-bathtub"></i> <?php echo $data['bath']; ?></span>
                <span><i class="flaticon-bed"></i> <?php echo $data['bed']; ?></span>
                </p>
              </div>
            </div>
          </div>
        <?php 
         }
         }
         }
         else{
          ?>
          <div class="col-md-12 ftco-animate">
          <h4 class="alert alert-secondary text-center">There are no houses added yet.</h4>
          </div>
          <?php
         }?>
      </div>
      <?php
      $sell="select * from house";
        $ress=mysqli_query($mysql,$sell);
        $total_record=mysqli_num_rows($ress);
        $total_page = ceil($total_record/$num_per_page);
        if ($page>1) 
        {
       echo "<div class='pagination'>
       <a href='yourprop.php?page=".($page-1)."'>Previous</a>
       </div>";
        }

       for ($i=1; $i<$total_page; $i++) 
       { 
      echo "<div class='pagination'>
      <a href='yourprop.php?page=".$i."'>$i</a></div>";
       }

       if ($i>$page) 
        {
       echo "<div class='pagination'><a href='yourprop.php?page=".($page+1)."'>Next</a></div>";
        }
       ?>
    </section>

<?php include "footer.php" ?>
