<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link rel="stylesheet" type="text/css" href="./styles.css">
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
	<table class="table table-striped" align="center" border="1px" style="width:600px; line-height: 40px;">

		<tr>
			<?php
				$con = mysqli_connect("localhost","root","","jayasiripharmacydb");
				if(!$con)
				{
					die("Cannot connect to the database server");
				}
				$sql = "SELECT count(orderStatus) FROM customerorder where orderStatus = 'Pending'";
				$results = mysqli_query($con,$sql);
				
				
					while($row = mysqli_fetch_array($results))
					{
					  
					
				?>
		<td width="20%">No Of Pending Orders : <?php echo $row['count(orderStatus)']; ?></td>
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
				$sql = "SELECT count(orderStatus) FROM customerorder where orderStatus = 'Confirmed'";
				$results = mysqli_query($con,$sql);
				
				
					while($row = mysqli_fetch_array($results))
					{
					  
					
				?>
		<td width="20%">No Of Confirmed Orders : <?php echo $row['count(orderStatus)']; ?></td>
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
				$sql = "SELECT count(orderStatus) FROM customerorder where orderStatus = 'Rejected'";
				$results = mysqli_query($con,$sql);
				
				
					while($row = mysqli_fetch_array($results))
					{
					  
					
				?>
		<td width="20%">No Of Rejected Orders : <?php echo $row['count(orderStatus)']; ?></td>
			<?php
					}
				
				mysqli_close($con);
					?>
		</tr>
</table></center>
<form id="form1" name="form1" method="post">
  <table align="center" border="1px" style="width:600px; line-height: 40px;">
    <tbody>
      <tr>
        <td width="166">OrderID </td>
        <td width="236">Customer Name</td>
        <td width="292">Date</td>
		<td width="292">Status</td>
        <td width="404">&nbsp;</td>
      </tr>
		<?php
		$con = mysqli_connect("localhost","root","","jayasiripharmacydb");
		
		
		$sql="SELECT customerorder.orderId, customer.customerName, customerorder.orderDate,customerorder.orderStatus FROM customerorder INNER JOIN customer ON customerorder.customerId=customer.customerId ";
        $result = mysqli_query($con,$sql);
		
		if(mysqli_num_rows($result)> 0){
            while($row = mysqli_fetch_assoc($result))
            {         
                
        ?>
        
        <tr>
        <td><?php echo $row['orderId'];?></td>
        <td><?php echo $row['customerName'];?></td>
        <td><?php echo $row['orderDate'];?></td>
		<td><?php echo $row['orderStatus'];?></td>

        <td> <a href="orderdetails.php?orderId=<?php echo $row['orderId']; ?>"</a><input name=viewOrder type="button" class="btn btn-success"  value="View Order" ></td>

        </tr>

		<?php
        }
    }
	   mysqli_close($con);
	    ?>	
    </tbody>
  </table>
	<p>&nbsp;</p>
	<div class="text-center">
        <a href="CustomerOrderListPrint.php" class="btn btn-primary">Print</a>
    </div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>