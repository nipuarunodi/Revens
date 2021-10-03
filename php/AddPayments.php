<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Untitled Document</title>
    
	<link href="../css/bootstrap-4.3.1.css" rel="stylesheet">
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/popper.min.js"></script> 
	<script src="../js/bootstrap-4.3.1.js"></script>
	 
  </head>
  <body>
	  
	  <center><h1>Add Other Payments</h1></center><br>
	  <center><form action="AddPayments.php" method="post">
	  <table border="0">
		  <tr>
		  <td>Payment Details</td>
		  <td><input type="text" id="txtPaymentDetails" name="txtPaymentDetails"></td>
		  </tr>
		  <tr>
		  <td>Amount</td>
		  <td><input type="text" id="txtAmount" name="txtAmount"></td>
		  </tr>
		  <tr>
		  <td>&nbsp;</td>
		  <td><input type="submit" id="btnSubmit" name="btnSubmit" value="Add">&nbsp;<input type="reset" id="btnReset" name="btnReset" value="Reset"></td>
		  </tr>
		  </table>
		  <?php
		  if(isset($_POST["btnSubmit"]))
	{
		$paymentDetails = $_POST["txtPaymentDetails"];
		$amount = $_POST["txtAmount"];
		
		$con = mysqli_connect("localhost","root","","jayasiripharmacydb");
					if(!$con)
					{
						die("Cannot connect to the database server");
					}
					
					$sql = "INSERT INTO payment (paymentDetails,amount) VALUES ('$paymentDetails','$amount')";
		
					mysqli_query($con,$sql);
		            
					mysqli_close($con);
		
					echo "<script type='text/javascript'> document.location = 'AddPayments.php' </script>";
	}
		  ?>
	  </form></center>
	  <br>
	  <center>
	  <table border="1">
	  	<tr>
			<th>Payment ID</th>
			<th>Payment Details</th>
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
		while($row = mysqli_fetch_assoc($results))
			{
				
		?>
    <tr>
      <td><?php echo $row['paymentId'];?></td>
      <td><?php echo $row['paymentDetails'];?></td>
      <td><?php echo $row['amount'];?></td>
	  <td><a href="EditPayments.php?id=<?php echo $row['paymentId'];?>">Edit</a>&nbsp;<a href="DeletePayments.php?id=<?php echo $row['paymentId'];?>">Delete</a></td>
    </tr>
	 <?php
			}
	}
		mysqli_close($con);
		?> 
	  </table>
	  </center>
  </body>
</html>