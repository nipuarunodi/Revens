<?php session_start();

if(!isset($_SESSION["id"]))
{
	header('Location:customerLogin.php');
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<h1 align="center">Order History</h1>
	<table border = 1 align="center">
	 <tbody>
      <tr>
        <td width="200">OrderID </td>
        <td width="200">Date</td>
		<td width="200">Status</td>
        <td width="200">Total Amount</td>
      </tr>
		
		<?php
		$con = mysqli_connect("localhost","root","","jayasiripharmacydb");
		if(!$con)
		{
			die("Sorry, we are facing a technical issue");
		}
		$sql = "SELECT * FROM `customerorder` WHERE customerId='".$_SESSION["id"]."'";
		$result = mysqli_query($con,$sql);
		if(mysqli_num_rows($result)>0)
		{
			$row = mysqli_fetch_assoc($result);
		?>
		 <tr>
			 <td height="49"><?php echo $row['orderId'];?></td>
			 <td><?php echo $row['orderDate'];?></td>
			 <td><?php echo $row['orderStatus'];?></td>
			 <td><?php echo $row['totalAmount'];?></td>
		 </tr>
		
		<?php
		}
		mysqli_close($con);
		?>
		 
		</tbody>
	</table>
</body>
</html>
