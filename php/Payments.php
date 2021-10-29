<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JayaSiri Pharmacy Payments</title>
    <link href="../css/bootstrap-4.3.1.css" rel="stylesheet">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script> 
	<script src="../js/bootstrap-4.3.1.js"></script>
	  
  </head>
  <body style="padding-top: 70px">
	  
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
<center><h1>Payment Management</h1></center><br>
	  <center><table border="1" width="50%">
			<tr>
		  		<th width="33%">Income&nbsp;-</th>
				<th width="33%">Expenses</th>
				<th width="34%">=  Total Amount</th>
		  	</tr>
		    <tr>
				<?php
				$con = mysqli_connect("localhost","root","","jayasiripharmacydb");
				if(!$con)
				{
					die("Cannot connect to the database server");
				}
				$sql = "SELECT SUM(totalAmount) FROM customerorder";
				$results = mysqli_query($con,$sql);
				if(mysqli_num_rows($results)>0)
				{
					while($row = mysqli_fetch_assoc($results))
					{
						$income= $row['SUM(totalAmount)'];
					}
				?>
		  		<td height="46"><?php echo $income  ?></td>
				<?php
					
				}
				mysqli_close($con);
					?>
				<?php
				$con = mysqli_connect("localhost","root","","jayasiripharmacydb");
				if(!$con)
				{
					die("Cannot connect to the database server");
				}
				$sql = "SELECT SUM(totalAmount) FROM supplierorder";
				$results = mysqli_query($con,$sql);
				if(mysqli_num_rows($results)>0)
				{
					while($row = mysqli_fetch_assoc($results))
					{
						$expenses= $row['SUM(totalAmount)'];
					}
				?>
			  <td><?php echo $expenses ?></td>
				<?php
					
				}
				mysqli_close($con);
				?>
				<td><?php echo $income-$expenses ?></td>
		  	</tr>
		</table></center>
	  <br>
	  <center><a href="AddPayments.php">Add Another Payment</a></center>
	  <br>
	  <table border="0" width="100%">
	  <tr>
		<td width="50%">
		<table border="1" width="99%">
			<tr>
			<th>Order ID</th>
			<th>Customer ID</th>
			<th>Amount</th>
		    </tr>
			<?php
				$con = mysqli_connect("localhost","root","","jayasiripharmacydb");
				if(!$con)
				{
					die("Cannot connect to the database server");
				}
				$sql = "SELECT * FROM customerorder";
				$results = mysqli_query($con,$sql);
				if(mysqli_num_rows($results)>0)
				{
					while($row = mysqli_fetch_assoc($results))
					{
						
			?>
			<tr>
			<td><?php echo $row['orderId'];?></td>
			<td><?php echo $row['customerId'];?></td>
		    <td><?php echo $row['totalAmount'];?></td>
			</tr>
			<?php
					}
				}
			mysqli_close($con);
			?>
		</table>  
		</td>
		<td width="50%">
		<table border="1" width="99%">
		<tr>
			<th>Order ID</th>
			<th>Supplier ID</th>
			<th>Amount</th>
		</tr>
		<?php
				$con = mysqli_connect("localhost","root","","jayasiripharmacydb");
				if(!$con)
				{
					die("Cannot connect to the database server");
				}
				$sql = "SELECT * FROM supplierorder";
				$results = mysqli_query($con,$sql);
				if(mysqli_num_rows($results)>0)
				{
					$expenses;
					while($row = mysqli_fetch_assoc($results))
					{
						
			?>
			<tr>
			<td><?php echo $row['orderId'];?></td>
			<td><?php echo $row['supplierId'];?></td>
		    <td><?php echo $row['totalAmount'];?></td>
			</tr>
			<?php
					}
				}
			mysqli_close($con);
			?>
		</table>
		</td>
	  </tr>
	  </table>
	  
  </body>
</html>