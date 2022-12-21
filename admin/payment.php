<?php include "header.php"; ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<body style="background: #F2F2F2;">
	<br><br>
	<div class="container">
	<div class="p-4 bg-light shadow-sm rounded">
		<div class="row">
		<div class="col-sm-6">
		<h4 class="m-2">List of Payments</h4>
		</div>
		<div class="col-sm-4"></div>
		<div class="col-sm-2">
		<button class="btn btn-primary btn-block btn-sm" type="button" data-toggle="modal" data-target="#mymodal">New Entry</button>
		<div class="modal fade" id="mymodal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">New Payment</h4>
					</div>
					<form method="post">
					<div class="modal-body">
						<div class="form-group">
							<h5 class="text-black-50">Tenant</h5>
					    <select class="form-control" name="tenant">
					    <?php
              $sele= "select * from tenant";
              $resu=mysqli_query($mysql,$sele);
              while ($data1=mysqli_fetch_array($resu)) 
               {
              ?>
					    <option value="<?php echo $data1['id'];?>"><?php echo $data1['tenant'];?></option>
					    <?php 
              }
              ?>
							</select>
						</div>
						<div class="form-group">
							<h5 class="text-black-50">Amount Paid:</h5>
							<input type="number" class="form-control" name="amount">
						</div>
					</div>
					<div class="modal-footer">
						<div class=" d-flex flex-row-reverse">
						<button class="btn btn-secondary" type="submit" data-dismiss="modal">Cancel</button>
						<button class="btn btn-primary mr-2" type="submit" name="pay">Save</button>
					    </div>
					</div>
				    </form>
				</div>
			</div>
		</div>
		</div>
	    </div>
		<hr>

	<table class="table table-bordered" id="myTable">
		<thead>
			<tr>
				<th>Sr No</th>
				<th>Date</th>
				<th>Tenant</th>
				<th>Amount</th>
				<th class="text-center">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
             $count=1;
             $sel= "select * from payment";
             $res=mysqli_query($mysql,$sel);
             while ($data=mysqli_fetch_array($res)) {
             $aa=$data['tenant'];   
             $sel1= "select * from tenant where id='$aa'";
             $res1=mysqli_query($mysql,$sel1);
						 $data0=mysqli_fetch_array($res1);
		    ?>
			<tr>
				<td class="text-center"><?php echo $count; ?></td>
				<td><?php echo date("d-m-Y"); ?></td>
				<td class="font-weight-bold"><?php echo $data0['tenant']; ?></td>
				<td class="font-weight-bold text-right"><?php echo $data['amount']; ?>.00</td>
				<td class="d-flex justify-content-center">
					<button class="btn btn-outline-primary btn-sm" type="submit" data-toggle="modal" data-target="#edit<?php echo $data['id'] ;?>">Edit</button>&nbsp;
					<div class="modal fade" id="edit<?php echo $data['id'] ;?>">
									<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Manage Payment</h4>
					</div>
					<form method="post">
					<div class="modal-body">
						<div class="form-group">
							<h5 class="text-black-50">Tenant</h5>
						<input type="hidden" name="hide" value="<?php echo $data['id'] ;?>">
				    <select name="tenant" class="form-control">
				    <?php
            $sel1= "select * from tenant";
            $res1=mysqli_query($mysql,$sel1);
						while($data11=mysqli_fetch_array($res1)){
            ?>
				    <option value="<?php echo $data11['id'] ;?>" <?php if($data11['id'] == $data['tenant']){ echo "selected";} ?> ><?php echo $data11['tenant']; ?></option>
					  <?php 
				    }
				    ?>
						</select>
						</div>
						<div class="form-group">
							<h5 class="text-black-50">Amount Paid:</h5>
							<input type="hidden" name="hide" value="<?php echo $data['id'] ;?>">
							<input type="number" class="form-control" name="amount" value="<?php echo $data['amount'];?>">
						</div>
					</div>
					<div class="modal-footer">
						<div class=" d-flex flex-row-reverse">
						<button class="btn btn-secondary" type="submit" data-dismiss="modal">Cancel</button>
						<button class="btn btn-primary mr-2" type="submit" name="edit">Update</button>
					    </div>
					</div>
				    </form>
				</div>
			</div>
					</div>
					<a href="delpay.php?id=<?php echo $data['id']; ?>" class="btn btn-outline-danger btn-sm" type="submit">Delete</a>
				</td>
			</tr>
			<?php $count++;  } ?>
		</tbody>
	</table>

	</div>
	</div>
</body>
 <script>  
 $(document).ready( function () {
    $('#myTable').DataTable();
} );  
 $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myList option").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
 </script>

<?php 
if  (isset($_POST['pay'])) {
	$a=$_POST['tenant'];
	$b=$_POST['amount'];
	$c=date("d-m-Y");
	$insert="insert into payment(tenant,amount,date) values('$a','$b','$c')";
	$chk=mysqli_query($mysql,$insert);

    if (!$chk) 
    {
   	echo mysqli_error();
    }
    else
    {
    	echo '<script>location.replace("payment.php")</script>';
    }
}
?>
<?php
if  (isset($_POST['edit'])) 
{
	$hide=$_POST['hide'];
	$ab=$_POST['tenant'];
	$bb=$_POST['amount'];
	$cb=date("d-m-Y");
	$upd="update payment set tenant='$ab',amount='$bb',date='$cb' where id='$hide'";
	 $chk1=mysqli_query($mysql, $upd);

	if (!$chk1) {
		echo mysqli_error();
	}
	else{
		echo '<script>location.replace("payment.php")</script>';
	}
}
?>