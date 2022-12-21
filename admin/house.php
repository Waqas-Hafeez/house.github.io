<?php include"header.php"; ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<body style="background: #F2F2F2;">
	<br><br>
	<div class="container">
	<div class="p-4 bg-light shadow-sm rounded">
		<h4 class="m-2">List of houses</h4>
		<hr>
		<table class="table table-bordered" id="myTable">
			<thead>
				<tr>
					<th>Sr No </th>
					<th>Location</th>
					<th>Code</th>
					<th>Title</th>
					<th>Description</th>
					<th>Price</th>
					<th>Area</th>
					<th>Bed</th>
					<th>Bath</th>
					<th>Image</th>
				</tr>
			</thead>
			<tbody>
				<?php 
                     $count=1;
                     $sel= "select * from house";
                     $res=mysqli_query($mysql,$sel);
                     while ($data=mysqli_fetch_array($res)) {   
				?>
				<tr>
				<td><?php echo $count ?></td>
				<td><?php echo $data['location']; ?></td>
				<td><?php echo $data['code']; ?></td>
				<td><?php echo $data['title']; ?></td>
				<td><?php echo $data['detail']; ?></td>
				<td><?php echo $data['price']; ?></td>
				<td><?php echo $data['area']; ?>&nbsp;<span><small><?php echo $data['unit']; ?></small></span></td>
				<td><?php echo $data['bed']; ?></td>
				<td><?php echo $data['bath']; ?></td>
				<?php 
				$img=explode(",", $data['img']);
                foreach($img as $new){
				?>
				<td><img class="float-left" width="100px" height="100px" src="../uploads/<?php echo $new; ?>"></td>
			    <?php } ?>
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
 </script>