<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Supplier Details</title>
</head>	
<body>
	
	<table align="center" border="1px" style="width:900px; line-height: 40px;">
		<tr>
			<th colspan="7"><h2>Supplier Detail Gathering Venue</h2></th>
		</tr>
		
		<tr>
			<th>Supplier Id</th>
			<th>Email</th>
			<th>Tele No</th>
			<th>Supplier Name</th>
			<th>Supplier Company Name</th>
			<th>&nbsp;</th>
		</tr>
	<?php
    $con = mysqli_connect("localhost","root","","jayasiripharmacydb");
		
		if(!$con)
		{
			die("Cannot get that details,Please try again");
		}
	$sql = "SELECT * FROM supplier";
	
	$results = mysqli_query($con,$sql);
	
	if(mysqli_num_rows($results)>0)
	{
		while($row = mysqli_fetch_assoc($results))
		{
	?>
		    <tr>
				<td><?php echo $row['supplierId']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['teleNo']; ?></td>
				<td><?php echo $row['supplierName']; ?></td>
				<td><?php echo $row['supplierCompanyName']; ?></td>
				<td><a href="OrderSupplier.php?id=<?php echo $row['supplierId'];?>">Order</a>&nbsp;/&nbsp;<a href="SupplierOrdersView.php?id=<?php echo $row['supplierId'];?>">Supplier Orders View</a>&nbsp;/&nbsp;<a href="DeleteSupplier.php?id=<?php echo $row['supplierId'];?>">Delete</a></td>
			</tr>
		<?php
		    }
	}
		?>
	</table>
	
	</body>
</html>
