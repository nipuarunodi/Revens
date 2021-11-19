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
	<link rel="stylesheet" type="text/css" href="../css/CustomerOrderListPrint.css" media="print">
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
		<center>
  <h1>Customer Payment Report</h1></center><br>
		<table class="table table-striped" align="center" border="1px" style="width:600px; line-height: 40px;">
			<tr>
			<th scope="col">Order ID</th>
			<th scope="col">Customer ID</th>
			<th scope="col">Amount</th>
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
		</table> <br>
		<center><button onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button></center>
	</body>
</html>

