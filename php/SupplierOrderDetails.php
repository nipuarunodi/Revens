<?php session_start();

if(!isset($_SESSION["id"]))
{
	header('Location:supplierLogin.php');
}
?>
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
	<script type="text/javascript" >
	  
	  function validateOrderStatus()
		{
			var orderStatus = document.getElementById("txtOrderStatus").value;
			
			if(orderStatus=="  " || orderStatus==null)
				{
					alert("Please select Order Status");
					return false;
				}
			else
				{
					return true;
				}
		}
		
		function validateOrderAmount()
		{
			var orderAmount = document.getElementById("txtOrderAmount").value;
			
			if(orderAmount=="  " || orderAmount==null)
				{
					alert("Please Enter the Order Amount");
					return false;
				}
			else
				{
					return true;
				}
		}
		
		function validateAll()
		{
			if(validateOrderStatus() && validateOrderAmount())
				{
					alert("Successfully updated");
				}
			else
				{
					event.preventDefault();
				}
		}
	  
	  </script>
	  
  </head>
  <body>
	  <center><h1>Order Details</h1></center><br>
	<center><form action="SupplierOrderDetails.php?id=<?php echo $_GET['id']?>" method="post">
		<table border="0">
		<?php
		$con = mysqli_connect("localhost","root","","jayasiripharmacydb");
		if(!$con)
		{	
			die("Cannot connect to DB server");		
		}
		$sql ="SELECT * FROM supplierorder WHERE orderId ='".$_GET['id']."'";	
		$result = mysqli_query($con,$sql);
		if(mysqli_num_rows($result)> 0)
		{
			
			$row = mysqli_fetch_assoc($result);
		?>
			<tr>
			<td>Order ID</td>
			<td><?php echo $row['orderId'] ?></td>
			</tr>
			<tr>
			<td>Order Date</td>
			<td><?php echo $row['orderDate'] ?></td>
			</tr>
			<tr>
			<td>Order Details</td>
			<td><?php echo $row['orderDetails'] ?></td>
			</tr>
			<tr>
			<td>Order Status</td>
			<td><select name="txtOrderStatus" id="txtOrderStatus">
  				<option value="<?php echo $row['orderStatus']?>" selected><?php echo $row['orderStatus']?></option>
				<option value="Pending">Pending</option>
  				<option value="Confirm">Confirm</option>
 				<option value="On the way">on the way</option>
 				<option value="Delivered">Delivered</option>
				</select></td>
			</tr>
			<tr>
			<td>Order Amount</td>
			<td><input type="number" id="txtOrderAmount" name="txtOrderAmount" value="<?php echo $row['totalAmount']?>" onClick="validateAll()"></td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			<td><input type="submit" id="btnUpdate" name="btnUpdate" value="update"></td>
			</tr>
		<?php
		}
		  ?>
		</table>
		</form></center>
	  <?php
	  if(isset($_POST["btnUpdate"]))
	  {
		  $orderAmount = $_POST["txtOrderAmount"];
		  $orderStatus = $_POST["txtOrderStatus"];
		  
		  $con = mysqli_connect("localhost","root","","jayasiripharmacydb");
					if(!$con)
					{
						die("Cannot conect to the database server");
					}
					
					$sql = "UPDATE supplierorder SET orderStatus = '$orderStatus', totalAmount = '$orderAmount' WHERE orderId  = '".$_GET['id']."'";
		
					mysqli_query($con,$sql);
		            
					mysqli_close($con);
					
					echo '<script>alert("Successfully Updated!")</script>';
		
		            echo "<script type='text/javascript'> document.location = 'SupplierOrderList.php'; </script>";
		  
	  }
	  ?>
  </body>
</html>