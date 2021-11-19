<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Supplier Details</title>
	  
  <link href="../css/bootstrap-4.3.1.css" rel="stylesheet">
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/popper.min.js"></script> 
	<script src="../js/bootstrap-4.3.1.js"></script>
	
	
	  
  </head>	
	
<body>

	
	

	<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light ">
    <img src="../images/PharmacyLogo.PNG" width="3%" height="3%">
    <img src="../images/JAYASIRIWord.PNG" width="7%" height="7%">
	  <img src="../images/PharmacyWord.PNG" width="7%" height="7%">
	    <div class="collapse navbar-collapse" id="navbarSupportedContent1">
	      <ul class="navbar-nav ml-auto">
			<li class="nav-item"> <a class="nav-link" href="OrderList.php">Customer Orders</a> </li>
	        <li class="nav-item"> <a class="nav-link" href="Supplier.php">Supplier</a> </li>
			<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Stocks </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown1"> <a class="dropdown-item" href="ViewStocks.php">View Stocks</a> <a class="dropdown-item" href="StockManagement.php">Add Stocks</a>
			</li>
	        <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Payments </a>
	          <div class="dropdown-menu" aria-labelledby="navbarDropdown1"> <a class="dropdown-item" href="Payments.php">Payments</a> <a class="dropdown-item" href="AddPayments.php">Add Payment</a>
			  </li>
          </ul>
	      
    </div>
  </nav>
	  <br>
	  <br>
	  <br>
	<table class="table table-striped" align="center" border="1px" style="width:900px; line-height: 40px;">

		<tr>
			<th colspan="7"><h1>Supplier Detail Gathering Venue</h1></th>
		</tr>
		
		<tr>
			<th scope="col">Supplier Id</th>
			<th scope="col">Email</th>
			<th scope="col">Tele No</th>
			<th scope="col">Supplier Name</th>
			<th scope="col">Supplier Company Name</th>
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
<<<<<<< HEAD
<<<<<<< HEAD
				<td><a href="OrderSupplier.php?id=<?php echo $row['supplierId'];?>"</a><input name=Order type="button" class="badge-success"  value="Order" >&nbsp;&nbsp;<a href="SupplierOrdersView.php?id=<?php echo $row['supplierId'];?>"</a><input name=SupplierOrdersView type="button" class="badge-primary"  value="Supplier Orders View" >&nbsp;&nbsp;<a href="DeleteSupplier.php?id=<?php echo $row['supplierId'];?>"</a><input name=Delete type="button" class="badge-secondary"  value="Delete" ></td>
=======
				<td><a href="OrderSupplier.php?id=<?php echo $row['supplierId'];?>"</a><input name=Order type="button" class="btn btn-success"  value="Order" >&nbsp;&nbsp;<a href="SupplierOrdersView.php?id=<?php echo $row['supplierId'];?>"</a><input name=SupplierOrdersView type="button" class="btn btn-primary"  value="Supplier Orders View" >&nbsp;&nbsp;<a href="DeleteSupplier.php?id=<?php echo $row['supplierId'];?>"</a><input name=Delete type="button" class="btn btn-secondary"  value="Delete" ></td>
>>>>>>> origin/master
=======
				<td><a href="OrderSupplier.php?id=<?php echo $row['supplierId'];?>"</a><input name=Order type="button" class="btn btn-success"  value="Order" >&nbsp;&nbsp;<a href="SupplierOrdersView.php?id=<?php echo $row['supplierId'];?>"</a><input name=SupplierOrdersView type="button" class="btn btn-primary"  value="Supplier Orders View" >&nbsp;&nbsp;<a href="DeleteSupplier.php?id=<?php echo $row['supplierId'];?>"</a><input name=Delete type="button" class="btn btn-secondary"  value="Delete" ></td>
>>>>>>> origin/master
			</tr>
		<?php
		    }
	}
		?>
	</table>
	
	</body>
</html>
