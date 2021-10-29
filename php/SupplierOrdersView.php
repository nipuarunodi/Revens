<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Supplier Order Details</title>
	  
  <link href="../css/bootstrap-4.3.1.css" rel="stylesheet">
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/popper.min.js"></script> 
	<script src="../js/bootstrap-4.3.1.js"></script>
	  
  </head>	
	
 <body>
	
	<table align="center" border="1px" style="width:600px; line-height: 40px;">
		<tr>
			<th colspan="7"><h2>Supplier Orders View</h2></th>
		</tr>
		
		<tr>
			<th>Order Id</th>
			<th>Supplier Id</th>
			<th>Order Date</th>
			<th>Order Details</th>
			<th>Order Status</th>
			<th>Total Amount</th>	
		</tr>
		
		
	<?php
	$supplierId = $_GET['id'];
    $con = mysqli_connect("localhost","root","","jayasiripharmacydb");
		
		if(!$con)
		{
			die("Cannot get that details,Please try again");
		}
	$sql = "SELECT * FROM supplierorder WHERE supplierId = '$supplierId'";
	
	$results = mysqli_query($con,$sql);
	
	if(mysqli_num_rows($results)>0)
	{
		while($row = mysqli_fetch_assoc($results))
		{
	?>
		    <tr>
				<td><?php echo $row['orderId']; ?></td>
				<td><?php echo $row['supplierId']; ?></td>
				<td><?php echo $row['orderDate']; ?></td>
				<td><?php echo $row['orderDetails']; ?></td>
				<td><?php echo $row['orderStatus']; ?></td>
				<td><?php echo $row['totalAmount']; ?></td>
				
			</tr>
		<?php
		    }
	}
		?>
	</table>
	
 </body>
</html>
