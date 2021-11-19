<?php 
include "config.php";



$sql = "SELECT * FROM stock";



$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JayaSiri Pharmacy View Stocks</title>
	  
    <link href="../css/bootstrap-4.3.1.css" rel="stylesheet">
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/popper.min.js"></script> 
	<script src="../js/bootstrap-4.3.1.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/CustomerOrderListPrint.css" media="print">
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
	<center>
	<h1>View Stocks</h1>
	</center>
	<p><div class="container">
   <p>&nbsp;</p>
   <table width="100" border="2px" align="left" class="table table-striped" style="width:600px; line-height: 40px;">
  <tr>
		  		<th width="33%">Net Worth of Stocks</th>
		        <th width="33%">Total income Without Stock Worth</th>
		        <th width="33%">Total Stock Quantity</th>
  </tr>
		    <tr>
				<?php
				$sql = "SELECT SUM(price) FROM stock";
				$results = mysqli_query($conn,$sql);
				if(mysqli_num_rows($results)>0)
				{
					while($row = mysqli_fetch_assoc($results))
					{
						$total= $row['SUM(price)'];
					}
				?>
		  		<td height="46"><?php echo $total  ?></td>
				<?php
					
				}
				mysqli_close($conn);
				?>
				<?php
				$conn = mysqli_connect("localhost","root","","jayasiripharmacydb");
				if(!$conn)
				{
					die("Cannot connect to the database server");
				}
				$sql = "SELECT SUM(amount) FROM payment";
				$results = mysqli_query($conn,$sql);
				if(mysqli_num_rows($results)>0)
				{
					while($row = mysqli_fetch_assoc($results))
					{
						$income= $row['SUM(amount)'];
					}
				?>
		  		
				<?php
					
				}
				mysqli_close($conn);
					?>
				<td><?php echo $income-$total ?></td>
				<?php
				$conn = mysqli_connect("localhost","root","","jayasiripharmacydb");
				if(!$conn)
				{
					die("Cannot connect to the database server");
				}
				$sql = "SELECT SUM(quantity) FROM stock";
				$results = mysqli_query($conn,$sql);
				if(mysqli_num_rows($results)>0)
				{
					while($row = mysqli_fetch_assoc($results))
					{
						$qty= $row['SUM(quantity)'];
					}
				?>
			  <td><?php echo $qty ?></td>
				<?php
					
				}
				mysqli_close($conn);
				?>
		  	</tr>	</table>
  <p><br>
    <br>
  </p>
  <p>&nbsp; </p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <br>   
	
<p><button onClick="window.print();" class="btn btn-primary" id="print-btn">Print</button>
</p>

  
<p>&nbsp;</p>
<table width="1112" border="1px"align="center" class="table table-striped" style="width:1050px; line-height: 40px;" >
  <thead>
		<tr>
		<th width="77" scope="col">Did</th>
		<th width="125" scope="col" >Drug Code</th>
		<th width="112" scope="col" >Drug Name</th>
		<th width="85" scope="col" >Price</th>
		<th width="123" scope="col" >Quantity</th>
		
	   </tr>
  </thead>
	<tbody id="myTable" >	
		<?php
			if ($result->num_rows > 0) {
				
				while ($row = $result->fetch_assoc()) {
		?>

					<tr>
					<td><?php echo $row['Did']; ?></td>
					<td><?php echo $row['drugCode']; ?></td>
					<td><?php echo $row['drugName']; ?></td>
					<td><?php echo $row['price']; ?></td>
					<td><?php echo $row['quantity']; ?></td>
					</tr>	
					
		<?php		
				}
			}
		?>
	        	
</tbody>
</table>
</body>
</html>