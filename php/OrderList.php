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
	<center><table width="60%" border="0">
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
  <table width="782" height="80" border="0">
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

        <td> <a href="orderdetails.php?orderId=<?php echo $row['orderId']; ?>"> View Order </a></td>
        </tr>

		<?php
        }
    }
	   mysqli_close($con);
	    ?>	
    </tbody>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>