<?php include"header.php"; ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<body style="background: #F2F2F2;">
	<br><br>
	<div class="container">
	<div class="p-4 bg-light shadow-sm rounded">
		<h4 class="m-2">List of Tenants</h4>
		<hr>
		<table class="table table-bordered" id="myTable">
			<thead>
				<tr>
					<th>Sr No </th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>House Rented</th>
					<th>Monthly Rate</th>
				</tr>
			</thead>
			<tbody>
				<?php 
                     $count=1;
                     $sel= "select * from tenant";
                     $res=mysqli_query($mysql,$sel);
                     while ($data=mysqli_fetch_array($res)) {   
				?>
				<tr>
				<td><?php echo $count ?></td>
				<td><?php echo $data['tenant']; ?></td>
				<td><?php echo $data['email']; ?></td>
				<td><?php echo $data['phone']; ?></td>
				<td><?php echo $data['title']; ?></td>
				<td><?php echo $data['price']; ?></td>
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