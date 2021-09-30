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
  <body>
	  <center><h1>Payment Management</h1></center>
	  <form method="post" action="Payments.php">
	<table width="100%" border="0">
  <tbody>
    <tr>
      <td width="20%" height="37">Customer Name</td>
      <td width="20%"><input type="text" id="txtCustomerName" name="txtCustomerName"></td>
      <td rowspan="8" width="60%"><table width="100%" border="1">
  <tbody>
    <tr>
      <th>Payment ID</th>
      <th>Customer Name</th>
      <th>Supplier Name</th>
      <th>Amount</th>
	  <th>&nbsp;</th>
    </tr>
	<?php
	$con = mysqli_connect("localhost","root","","jayasiripharmacydb");
		if(!$con)
		{
			die("Cannot connect to the database server");
		}
	$sql = "SELECT * FROM payment";
	$results = mysqli_query($con,$sql);
	if(mysqli_num_rows($results)>0)
	{
		$income;
		$expenses;
		$total;
		while($row = mysqli_fetch_assoc($results))
			{
				if(is_null($row['customerName']))
				{

				}
				else
				{
					$income = $income + $row['amount'];
				}
		?>
    <tr>
      <td><?php echo $row['paymentId'];?></td>
      <td><?php echo $row['customerName'];?></td>
      <td><?php echo $row['supplierName'];?></td>
      <td><?php echo $row['amount'];?></td>
	  <td><a href="EditPayments.php?id=<?php echo $row['paymentId'];?>">Edit</a>&nbsp;<a href="DeletePayments.php?id=<?php echo $row['paymentId'];?>">Delete</a></td>
    </tr>
	 <?php
			}
	}
		mysqli_close($con);
		?> 
  </tbody>
</table>
</td>
    </tr>
    <tr>
      <td>Supplier Name</td>
      <td><input type="text" id="txtSupplierName" name="txtSupplierName"></td>
    </tr>
    <tr>
      <td>Amount</td>
      <td><input type="text" id="txtAmount" name="txtAmount"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="btnsubmit" id="btnsubmit" value="Add">  <input type="reset" name="btnreset" id="btnreset" value="Reset"></td>
    </tr>
	  <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
	  <tr>
      <td>Income</td>
      <td><?php echo $income ?></td>
    </tr>
	  <tr>
      <td>Expenses</td>
      <td></td>
    </tr>
	  <tr>
      <td>Total</td>
      <td></td>
    </tr>
  </tbody>
</table>
	  </form>
	  <?php
	  
	if(isset($_POST["btnsubmit"]))
	{
		$customerName = $_POST["txtCustomerName"];
		$supplierName = $_POST["txtSupplierName"];
		$amount = $_POST["txtAmount"];
		
		$con = mysqli_connect("localhost","root","","jayasiripharmacydb");
					if(!$con)
					{
						die("Cannot connect to the database server");
					}
					
					$sql = "INSERT INTO payment (customerName,supplierName,amount) VALUES ('$customerName','$supplierName','$amount')";
		
					mysqli_query($con,$sql);
		            
					mysqli_close($con);
		
					echo "<script type='text/javascript'> document.location = 'Payments.php' </script>";
	}
?>
	  
  </body>
</html>