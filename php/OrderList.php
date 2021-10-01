<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
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